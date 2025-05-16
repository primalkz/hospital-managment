<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::with(['appointment.doctor', 'patient'])
            ->when(Auth::user()->type === 'patient', function ($query) {
                return $query->where('patient_id', Auth::id());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.transaction.index', compact('transactions'));
    }

    public function processPayment(Request $request)
    {
        $validated = $request->validate([
            'transaction_id' => 'required|exists:transactions,id',
            'payment_method' => 'required|in:upi,card,cash',
            'upi_id' => 'required_if:payment_method,upi',
            'card_number' => 'required_if:payment_method,card',
            'expiry_date' => 'required_if:payment_method,card',
            'cvv' => 'required_if:payment_method,card'
        ]);

        $transaction = Transaction::findOrFail($request->transaction_id);
    
        // For now, Im marking the transaction as paid
        $transaction->update([
            'payment_method' => $request->payment_method,
            'status' => 'paid'
        ]);

        return redirect()->route('dashboard.transactions')
            ->with('success', 'Payment processed successfully!');
    }

    // public function processPayment(Request $request)
    // {
    //     $validated = $request->validate([
    //         'transaction_id' => 'required|exists:transactions,id',
    //         'payment_method' => 'required|in:upi,card,cash',
    //         'upi_id' => 'required_if:payment_method,upi',
    //         'card_number' => 'required_if:payment_method,card',
    //         'expiry_date' => 'required_if:payment_method,card',
    //         'cvv' => 'required_if:payment_method,card'
    //     ]);

    //     $transaction = Transaction::findOrFail($request->transaction_id);
    //     $transaction->update([
    //         'payment_method' => $request->payment_method,
    //         'status' => 'paid'
    //     ]);

    //     return redirect()->route('dashboard.transactions')
    //         ->with('success', 'Payment processed successfully!');
    // }
}
