@extends('layouts.app')

@section('content')
<!-- Success/Error Messages -->
@if(session('success'))
    <div class="alert alert-success alert-dismissible fade show position-fixed" style="top: 20px; right: 20px; z-index: 9999;" role="alert">
        <i class="bi bi-check-circle"></i> {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-white fixed-top shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#home">
            <i class="bi bi-lightning-charge-fill text-primary"></i>
            <!-- {{ config('app.name', 'Designed and developed by Pratik') }} -->
        </a>
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#contact">Contact Us</a>
                </li>

                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">
                            <i class="bi bi-speedometer2"></i> Dashboard
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
                @else
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">Sign In</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#signupModal">Sign Up</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<!-- Hero Section -->
<section id="home" class="hero-section">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6">
                <div class="hero-content">
                    <h1 class="display-4 fw-bold">Student management system</h1>
                    <p class="lead">Discover the power of modern web development with our innovative platform.</p>
                    <div class="hero-buttons">
                        <button class="btn btn-primary-custom btn-custom" data-bs-toggle="modal" data-bs-target="#signupModal">
                            Get Started
                        </button>
                        <button class="btn btn-outline-custom btn-custom" data-bs-toggle="modal" data-bs-target="#loginModal">
                            Sign In
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="text-center">
                    <!-- <i class="bi bi-laptop display-1 opacity-75"></i> -->
                     <img src="{{ asset('img/stud.png') }}">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- About Us Section -->
<section id="about" class="about-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">About Us</h2>
                <p class="lead text-muted">We're passionate about creating exceptional digital experiences</p>
            </div>
        </div>
        
        <div class="row">
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center">
                    <i class="bi bi-rocket-takeoff feature-icon"></i>
                    <h4>Fast & Reliable</h4>
                    <p>Built with modern technologies to ensure lightning-fast performance and reliability for all your needs.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center">
                    <i class="bi bi-shield-check feature-icon"></i>
                    <h4>Secure & Safe</h4>
                    <p>Your data security is our top priority. We implement industry-standard security measures to protect your information.</p>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="feature-card text-center">
                    <i class="bi bi-people feature-icon"></i>
                    <h4>User Friendly</h4>
                    <p>Designed with user experience in mind. Our intuitive interface makes it easy for anyone to get started.</p>
                </div>
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-6">
                <h3>Our Mission</h3>
                <p>We strive to provide innovative solutions that empower businesses and individuals to achieve their goals through technology. Our team is dedicated to delivering exceptional quality and outstanding customer service.</p>
            </div>
            <div class="col-lg-6">
                <h3>Why Choose Us?</h3>
                <ul class="list-unstyled">
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Expert team</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>24/7 customer support</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>multiple technology stack</li>
                    <li><i class="bi bi-check-circle-fill text-primary me-2"></i>Affordable pricing</li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Contact Us Section -->
<section id="contact" class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center mb-5">
                <h2 class="display-5 fw-bold">Contact Us</h2>
                <p class="lead">Get in touch with us.</p>
            </div>
        </div>
        
        <div class="row">
           
            </div>
        </div>
        
        <div class="row mt-5">
            <div class="col-lg-4 text-center">
                <i class="bi bi-geo-alt display-6 mb-3"></i>
                <h5>Address</h5>
                <p>sadar<br>Near Gaddigodam Metro station, Nagpur</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="bi bi-telephone display-6 mb-3"></i>
                <h5>Phone</h5>
                <p>+91 7030281823</p>
            </div>
            <div class="col-lg-4 text-center">
                <i class="bi bi-envelope display-6 mb-3"></i>
                <h5>Email</h5>
                <p>Pratik@gmail.com</p>
            </div>
        </div>
    </div>
</section>

<!-- Sign In Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Sign In</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if($errors->any() && session('login_error'))
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="loginEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="loginEmail" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="loginPassword" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="loginPassword" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Sign Up Modal -->
<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Sign Up</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('register') }}" method="POST">
                @csrf
                <div class="modal-body">
                    @if($errors->any() && session('signup_error'))
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="signupFirstName" class="form-label">First Name</label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror"
                                   id="signupFirstName" name="first_name" value="{{ old('first_name') }}" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="signupLastName" class="form-label">Last Name</label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror"
                                   id="signupLastName" name="last_name" value="{{ old('last_name') }}" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="signupEmail" class="form-label">Email Address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                               id="signupEmail" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="signupPassword" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                               id="signupPassword" name="password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <div class="form-text">Password must be at least 8 characters long.</div>
                    </div>
                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror"
                               id="confirmPassword" name="password_confirmation" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="agreeTerms" required>
                        <label class="form-check-label" for="agreeTerms">
                            I agree to the <a href="#" class="text-decoration-none">Terms and Conditions</a>
                        </label>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- JavaScript for handling modal display on validation errors -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Show login modal if there are login errors
    @if(session('login_error'))
        var loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
        loginModal.show();
    @endif

    // Show signup modal if there are signup errors
    @if(session('signup_error'))
        var signupModal = new bootstrap.Modal(document.getElementById('signupModal'));
        signupModal.show();
    @endif

    // Auto-hide success messages after 5 seconds
    setTimeout(function() {
        var alerts = document.querySelectorAll('.alert');
        alerts.forEach(function(alert) {
            var bsAlert = new bootstrap.Alert(alert);
            bsAlert.close();
        });
    }, 5000);
});
</script>
@endsection


