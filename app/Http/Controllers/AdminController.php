<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    public function getDoctorslist() {
        $doctors = User::where('type', 'doctor')->get();
        return view('dashboard.admin.doctors.admin-doctors', compact('doctors'));
    }

    public function getDoctor($id)
    {
        $doctor = User::where('type', 'doctor')->findOrFail($id);
        return response()->json($doctor);
    }

    public function updateDoctor(Request $request, $id)
    {
        $doctor = User::where('type', 'doctor')->findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|string|max:12',
            'specialty' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean'
        ]);

        // Handle file upload if profile image is provided
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('doctors', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $validated['status'] = $request->has('status') ? 1 : 0;
        $doctor->update($validated);

        if ($request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Doctor updated successfully']);
        }

        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor updated successfully');
    }

    public function deleteDoctor($id)
    {
        $doctor = User::where('type', 'doctor')->findOrFail($id);
        
        // Delete the doctor's profile image if it exists
        if ($doctor->profile_image) {
            Storage::disk('public')->delete($doctor->profile_image);
        }
        
        $doctor->delete();
        
        if (request()->ajax()) {
            return response()->json(['success' => true, 'message' => 'Doctor deleted successfully']);
        }
        
        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor deleted successfully');
    }

    public function storeDoctors(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|string|max:12',
            'specialty' => 'required|string',
            'experience_years' => 'required|integer|min:0',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'bio' => 'nullable|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean'
        ]);

        // Handle file upload if profile image is provided
        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('doctors', 'public');
            $validated['profile_image'] = $imagePath;
        }

        // Generate random password for doctor
        $validated['password'] = Hash::make('12345678');
        $validated['type'] = 'doctor';
        $validated['status'] = $request->has('status') ? 1 : 0;

        User::create($validated);

        return redirect()->route('admin.doctors')
            ->with('success', 'Doctor added successfully');
    }

    // Patient Management Methods
    public function getPatientsList() {
        $patients = User::where('type', 'patient')->get();
        return view('dashboard.admin.patients.admin-patients', compact('patients'));
    }

    public function getPatient($id)
    {
        $patient = User::where('type', 'patient')->findOrFail($id);
        return response()->json($patient);
    }

    public function updatePatient(Request $request, $id)
    {
        $patient = User::where('type', 'patient')->findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,'.$id,
            'mobile' => 'required|string|max:12',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean'
        ]);

        if ($request->hasFile('profile_image')) {
            // Delete old image if exists
            if ($patient->profile_image) {
                Storage::disk('public')->delete($patient->profile_image);
            }
            $imagePath = $request->file('profile_image')->store('patients', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $validated['status'] = $request->has('status') ? 1 : 0;
        $patient->update($validated);

        return redirect()->route('admin.patients')
            ->with('success', 'Patient updated successfully');
    }

    public function deletePatient($id)
    {
        $patient = User::where('type', 'patient')->findOrFail($id);
        
        if ($patient->profile_image) {
            Storage::disk('public')->delete($patient->profile_image);
        }
        
        $patient->delete();
        
        return redirect()->route('admin.patients')
            ->with('success', 'Patient deleted successfully');
    }

    public function storePatient(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'mobile' => 'required|string|max:12|unique:users',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'status' => 'boolean'
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('patients', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $validated['password'] = Hash::make('12345678'); // Default password
        $validated['type'] = 'patient';
        $validated['status'] = $request->has('status') ? 1 : 0;

        User::create($validated);

        return redirect()->route('admin.patients')
            ->with('success', 'Patient added successfully');
    }

    public function profile()
    {
        return view('dashboard.admin.common.profile');
    }

    public function updateProfile(Request $request)
    {
        $user = auth()->user();
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'mobile' => 'required|string|max:12',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
        ]);

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    public function updatePassword(Request $request)
    {
        $validated = $request->validate([
            'current_password' => 'required|current_password',
            'password' => 'required|string|min:8|confirmed',
        ]);

        auth()->user()->update([
            'password' => Hash::make($validated['password'])
        ]);

        return redirect()->route('profile')->with('success', 'Password updated successfully');
    }

    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        $user = auth()->user();

        if ($user->profile_image) {
            Storage::disk('public')->delete($user->profile_image);
        }

        $imagePath = $request->file('profile_image')->store('profile-photos', 'public');
        $user->update(['profile_image' => $imagePath]);

        return redirect()->route('profile')->with('success', 'Profile photo updated successfully');
    }

    public function addAdmin()
    {
        return view('dashboard.admin.add-admin.index');
    }

    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'mobile' => 'required|string|max:12',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip_code' => 'required|string',
            'profile_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        if ($request->hasFile('profile_image')) {
            $imagePath = $request->file('profile_image')->store('admins', 'public');
            $validated['profile_image'] = $imagePath;
        }

        $validated['password'] = Hash::make($validated['password']);
        $validated['type'] = 'admin';
        $validated['status'] = 1;

        User::create($validated);

        return redirect()->route('admin.add')
            ->with('success', 'Admin user created successfully');
    }
}
