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

<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2><i class="bi bi-pencil-square"></i> Edit Profile</h2>
                <a href="{{ route('profile.show') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back to Profile
                </a>
            </div>
        </div>
    </div>

    <form action="{{ route('profile.update') }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <!-- Personal Details -->
            <div class="col-lg-4 mb-4">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0"><i class="bi bi-person"></i> Personal Details</h5>
                    </div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="first_name" class="form-label">First Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('first_name') is-invalid @enderror" 
                                   id="first_name" name="first_name" value="{{ old('first_name', $profile->first_name) }}" required>
                            @error('first_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="last_name" class="form-label">Last Name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('last_name') is-invalid @enderror" 
                                   id="last_name" name="last_name" value="{{ old('last_name', $profile->last_name) }}" required>
                            @error('last_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="date_of_birth" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" 
                                   id="date_of_birth" name="date_of_birth" 
                                   value="{{ old('date_of_birth', $profile->date_of_birth ? $profile->date_of_birth->format('Y-m-d') : '') }}">
                            @error('date_of_birth')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="tel" class="form-control @error('contact_number') is-invalid @enderror" 
                                   id="contact_number" name="contact_number" value="{{ old('contact_number', $profile->contact_number) }}">
                            @error('contact_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-0">
                            <label for="address" class="form-label">Address</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" 
                                      id="address" name="address" rows="3">{{ old('address', $profile->address) }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            <label for="highest_qualification" class="form-label">Highest Qualification</label>
                            <select class="form-select @error('highest_qualification') is-invalid @enderror" 
                                    id="highest_qualification" name="highest_qualification">
                                <option value="">Select Qualification</option>
                                <option value="High School" {{ old('highest_qualification', $profile->highest_qualification) == 'High School' ? 'selected' : '' }}>High School</option>
                                <option value="Diploma" {{ old('highest_qualification', $profile->highest_qualification) == 'Diploma' ? 'selected' : '' }}>Diploma</option>
                                <option value="Bachelor's Degree" {{ old('highest_qualification', $profile->highest_qualification) == "Bachelor's Degree" ? 'selected' : '' }}>Bachelor's Degree</option>
                                <option value="Master's Degree" {{ old('highest_qualification', $profile->highest_qualification) == "Master's Degree" ? 'selected' : '' }}>Master's Degree</option>
                                <option value="PhD" {{ old('highest_qualification', $profile->highest_qualification) == 'PhD' ? 'selected' : '' }}>PhD</option>
                                <option value="Other" {{ old('highest_qualification', $profile->highest_qualification) == 'Other' ? 'selected' : '' }}>Other</option>
                            </select>
                            @error('highest_qualification')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-3">
                            <label for="year_of_passing" class="form-label">Year of Passing</label>
                            <input type="number" class="form-control @error('year_of_passing') is-invalid @enderror" 
                                   id="year_of_passing" name="year_of_passing" 
                                   value="{{ old('year_of_passing', $profile->year_of_passing) }}" 
                                   min="1950" max="{{ date('Y') }}">
                            @error('year_of_passing')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        
                        <div class="mb-0">
                            <label for="university_institute" class="form-label">University/Institute Name</label>
                            <input type="text" class="form-control @error('university_institute') is-invalid @enderror" 
                                   id="university_institute" name="university_institute" 
                                   value="{{ old('university_institute', $profile->university_institute) }}">
                            @error('university_institute')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                            <label for="current_organization" class="form-label">Current Organization</label>
                            <input type="text" class="form-control @error('current_organization') is-invalid @enderror" 
                                   id="current_organization" name="current_organization" 
                                   value="{{ old('current_organization', $profile->current_organization) }}">
                            @error('current_organization')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Optional - Leave blank if not applicable</div>
                        </div>
                        
                        <div class="mb-3">
                            <label for="years_of_experience" class="form-label">Years of Experience</label>
                            <input type="number" class="form-control @error('years_of_experience') is-invalid @enderror" 
                                   id="years_of_experience" name="years_of_experience" 
                                   value="{{ old('years_of_experience', $profile->years_of_experience) }}" 
                                   min="0" max="50">
                            @error('years_of_experience')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Enter 0 if you're a fresher</div>
                        </div>
                        
                        <div class="mb-0">
                            <label for="skills" class="form-label">Skills</label>
                            <textarea class="form-control @error('skills') is-invalid @enderror" 
                                      id="skills" name="skills" rows="4" 
                                      placeholder="e.g., JavaScript, Python, Communication, Leadership">{{ old('skills', $profile->skills) }}</textarea>
                            @error('skills')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <div class="form-text">Separate multiple skills with commas</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <button type="submit" class="btn btn-success btn-lg me-3">
                            <i class="bi bi-check-circle"></i> Update Profile
                        </button>
                        <a href="{{ route('profile.show') }}" class="btn btn-secondary btn-lg">
                            <i class="bi bi-x-circle"></i> Cancel
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
