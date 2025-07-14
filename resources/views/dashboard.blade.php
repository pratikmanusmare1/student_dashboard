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
               
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="bi bi-person-circle"></i>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="{{ route('profile.show') }}"><i class="bi bi-person"></i> View Profile</a></li>
                        @if(Auth::user()->studentProfile)
                            <li><a class="dropdown-item" href="{{ route('profile.edit') }}"><i class="bi bi-pencil"></i> Edit Profile</a></li>
                        @else
                            <li><a class="dropdown-item" href="{{ route('profile.create') }}"><i class="bi bi-plus-circle"></i> Create Profile</a></li>
                        @endif
                            <li><hr class="dropdown-divider"></li>
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

<!-- Dashboard Content -->
<div class="container-fluid py-4">
    <div class="row">
        <!-- Welcome Section -->
        <div class="col-12 mb-4">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h2 class="card-title">
                                <i class="bi bi-house-door"></i>
                                Welcome back, {{ Auth::user()->studentProfile ? Auth::user()->studentProfile->full_name : Auth::user()->name }}!
                            </h2>
                            <p class="card-text">Here's your student dashboard. You can manage your profile.</p>
                        </div>
                        <div class="col-md-4 text-end">
                            @if(!Auth::user()->studentProfile)
                                <div class="alert alert-warning mb-0">
                                    <i class="bi bi-exclamation-triangle"></i>
                                    <strong>Profile Incomplete!</strong><br>
                                    <a href="{{ route('profile.create') }}" class="btn btn-sm btn-light mt-2">
                                        <i class="bi bi-plus-circle"></i> Create Profile
                                    </a>
                                </div>
                            @else
                                <div class="text-white-50">
                                    <i class="bi bi-check-circle"></i> Profile Complete
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    
    

<!-- Custom Dashboard Styles -->
<style>
.border-left-primary {
    border-left: 0.25rem solid #4e73df !important;
}
.border-left-success {
    border-left: 0.25rem solid #1cc88a !important;
}
.border-left-info {
    border-left: 0.25rem solid #36b9cc !important;
}
.border-left-warning {
    border-left: 0.25rem solid #f6c23e !important;
}
.text-gray-800 {
    color: #5a5c69 !important;
}
</style>
@endsection
