@extends('layout.dashboard.main')
@section('title', 'Profile Settings')
@section('content')

<main class="main-content" id="mainContent">
    <div class="container-fluid py-4">
        @if ($errors->any())
            <div class="alert alert-danger rounded-lg border-0 shadow-sm">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if (session('success'))
            <div class="alert alert-success rounded-3 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <!-- Profile Photo Section -->
            <div class="col-12 col-md-4 mb-4">
                <div class="card border-0 shadow-sm rounded-lg">
                    <div class="card-body p-4 text-center">
                        <div class="profile-photo-section mb-4">
                            <img src="{{ Auth::user()->profile_image ? asset('storage/' . Auth::user()->profile_image) : 'https://placehold.co/200x200?text=' . substr(Auth::user()->name, 0, 1) }}" 
                                 alt="Profile Photo" 
                                 class="rounded-circle shadow-sm mb-3"
                                 style="width: 150px; height: 150px; object-fit: cover;">
                            <h5 class="mb-1">{{ Auth::user()->name }}</h5>
                            <p class="text-muted mb-3">{{ ucfirst(Auth::user()->type) }}</p>
                            <form action="{{ route('profile.update.photo') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <input type="file" class="form-control" name="profile_image" id="profile_image" accept="image/*" required>
                                </div>
                                <button type="submit" class="btn btn-primary px-4">
                                    <i class="bi bi-camera me-2"></i> Update Photo
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Profile Details Section -->
            <div class="col-12 col-md-8">
                <div class="card border-0 shadow-sm rounded-lg mb-4">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0">Profile Information</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('profile.update') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ Auth::user()->name }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="email" class="form-label">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ Auth::user()->email }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="mobile" class="form-label">Phone Number</label>
                                    <input type="tel" class="form-control" id="mobile" name="mobile" value="{{ Auth::user()->mobile }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="address" class="form-label">Address</label>
                                    <input type="text" class="form-control" id="address" name="address" value="{{ Auth::user()->address }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="city" class="form-label">City</label>
                                    <input type="text" class="form-control" id="city" name="city" value="{{ Auth::user()->city }}" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="zip_code" class="form-label">ZIP Code</label>
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{ Auth::user()->zip_code }}" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-check-lg me-2"></i> Save Changes
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Change Password Section -->
                <div class="card border-0 shadow-sm rounded-lg">
                    <div class="card-header bg-white border-0 py-3">
                        <h5 class="mb-0">Change Password</h5>
                    </div>
                    <div class="card-body p-4">
                        <form action="{{ route('profile.update.password') }}" method="POST">
                            @csrf
                            <div class="row g-3">
                                <div class="col-md-12">
                                    <label for="current_password" class="form-label">Current Password</label>
                                    <input type="password" class="form-control" id="current_password" name="current_password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password" class="form-label">New Password</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <div class="col-md-6">
                                    <label for="password_confirmation" class="form-label">Confirm New Password</label>
                                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary px-4">
                                        <i class="bi bi-lock me-2"></i> Update Password
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection
