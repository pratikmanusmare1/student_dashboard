@extends('layouts.app')

@section('content')
<!-- Navigation for Dashboard -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand" href="{{ route('dashboard') }}">
            <i class="bi bi-lightning-charge-fill"></i>
            Student Dashboard
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">
                        <i class="bi bi-speedometer2"></i> Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="{{ route('profile.show') }}">
                        <i class="bi bi-person"></i> Profile
                    </a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li>
                            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="dropdown-item">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Success/Error Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <i class="bi bi-exclamation-circle"></i> {{ session('error') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

@if(session('info'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        <i class="bi bi-info-circle"></i> {{ session('info') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-person-badge"></i> My Profile</h2>
                <div>
                    @if($profile)
                        <a href="{{ route('profile.edit') }}" class="btn btn-primary me-2">
                            <i class="bi bi-pencil"></i> Edit Profile
                        </a>
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal">
                            <i class="bi bi-trash"></i> Delete Profile
                        </button>
                    @else
                        <a href="{{ route('profile.create') }}" class="btn btn-success">
                            <i class="bi bi-plus-circle"></i> Create Profile
                        </a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @if($profile)
        <div class="row">
            <!-- Personal Details -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-person"></i> Personal Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Full Name:</strong>
                            <p class="mb-1">{{ $profile->full_name }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Email:</strong>
                            <p class="mb-1">{{ Auth::user()->email }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Date of Birth:</strong>
                            <p class="mb-1">{{ $profile->date_of_birth ? $profile->date_of_birth->format('F d, Y') : 'Not provided' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Contact Number:</strong>
                            <p class="mb-1">{{ $profile->contact_number ?: 'Not provided' }}</p>
                        </div>
                        <div class="mb-0">
                            <strong>Address:</strong>
                            <p class="mb-0">{{ $profile->address ?: 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Educational Details -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-success text-white">
                        <h5 class="mb-0"><i class="bi bi-mortarboard"></i> Educational Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Highest Qualification:</strong>
                            <p class="mb-1">{{ $profile->highest_qualification ?: 'Not provided' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Year of Passing:</strong>
                            <p class="mb-1">{{ $profile->year_of_passing ?: 'Not provided' }}</p>
                        </div>
                        <div class="mb-0">
                            <strong>University/Institute:</strong>
                            <p class="mb-0">{{ $profile->university_institute ?: 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Professional Details -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-info text-white">
                        <h5 class="mb-0"><i class="bi bi-briefcase"></i> Professional Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <strong>Current Organization:</strong>
                            <p class="mb-1">{{ $profile->current_organization ?: 'Not provided' }}</p>
                        </div>
                        <div class="mb-3">
                            <strong>Years of Experience:</strong>
                            <p class="mb-1">{{ $profile->years_of_experience !== null ? $profile->years_of_experience . ' years' : 'Not provided' }}</p>
                        </div>
                        <div class="mb-0">
                            <strong>Skills:</strong>
                            <p class="mb-0">{{ $profile->skills ?: 'Not provided' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12">
                <div class="card shadow text-center">
                    <div class="card-body py-5">
                        <i class="bi bi-person-plus display-1 text-muted mb-3"></i>
                        <h3>No Profile Found</h3>
                        <p class="text-muted mb-4">You haven't created your profile yet. Create one to get started!</p>
                        <a href="{{ route('profile.create') }}" class="btn btn-success btn-lg">
                            <i class="bi bi-plus-circle"></i> Create Profile
                        </a>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>

<!-- Delete Confirmation Modal -->
@if($profile)
<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">Delete Profile</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete your profile? This action cannot be undone.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <form action="{{ route('profile.destroy') }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete Profile</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
