@extends('layouts.master')

@section('css')
@parent
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
@endsection
@section('content')

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h6>Change Password User</h6>
            </div>
            <div class="card-body px-2 pt-0 pb-2">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
               
                <form method="POST" action="{{ route('vendor.change-password.update', $user->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="form-group">
                        <label for="name">Nama</label>
                        <input name="name" type="text" class="form-control" id="name"
                            aria-describedby="emailHelp" placeholder="Music"
                            value="{{ isset($user) ? $user->name : old('name') }}">
                        @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="password">Old Password</label>
                        <div class="input-group">
                            <!-- Password input field -->
                            <input name="old_password" type="password" class="form-control" id="old_password" aria-describedby="mew_password" placeholder="your password">
                            
                            <!-- Icon to toggle password visibility -->
                            <div class="input-group-append">
                                <span class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="toggleOldPassword()">
                                    <!-- Eye icon -->
                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>
                        </div>
                    
                    </div>
                    <!-- Password Field with Toggle Visibility -->
                    <div class="form-group">
                        <label for="password">NewPassword</label>
                        <div class="input-group">
                            <!-- Password input field -->
                            <input name="new_password" type="password" class="form-control" id="new_password" aria-describedby="new_password" placeholder="your password">
                            
                            <!-- Icon to toggle password visibility -->
                            <div class="input-group-append">
                                <span class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="toggleNewPassword()">
                                    <!-- Eye icon -->
                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>
                        </div>
                    
                     
                    </div>
                    <div class="form-group">
                        <label for="password">Confirm Password</label>
                        <div class="input-group">
                            <!-- Password input field -->
                            <input name="confirm_password" type="password" class="form-control" id="confirm_password" aria-describedby="confirm_password" placeholder="your password">
                            
                            <!-- Icon to toggle password visibility -->
                            <div class="input-group-append">
                                <span class="position-absolute" style="right: 10px; top: 50%; transform: translateY(-50%); cursor: pointer;" onclick="toggleConfirmPassword()">
                                    <!-- Eye icon -->
                                    <i class="fas fa-eye" id="togglePasswordIcon"></i>
                                </span>
                            </div>
                        </div>
                    
                      
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection


@section('script-top')
<script>
    function toggleNewPassword() {
        var passwordField = document.getElementById("new_password");
        
        var toggleIcon = document.getElementById("togglePasswordIcon");
        
        // Toggle the input type between 'password' and 'text'
        if (passwordField.type === "password") {
            passwordField.type = "text";  // Show password
            toggleIcon.classList.remove("fa-eye");  // Change icon to "eye-slash"
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";  // Hide password
            toggleIcon.classList.remove("fa-eye-slash");  // Change icon back to "eye"
            toggleIcon.classList.add("fa-eye");
        }
    }
    function toggleOldPassword() {
        var passwordField = document.getElementById("new_password");
        var passwordField = document.getElementById("old_password");
        
        var toggleIcon = document.getElementById("togglePasswordIcon");
        
        // Toggle the input type between 'password' and 'text'
        if (passwordField.type === "password") {
            passwordField.type = "text";  // Show password
            toggleIcon.classList.remove("fa-eye");  // Change icon to "eye-slash"
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";  // Hide password
            toggleIcon.classList.remove("fa-eye-slash");  // Change icon back to "eye"
            toggleIcon.classList.add("fa-eye");
        }
    }
    function toggleConfirmPassword() {
        var passwordField = document.getElementById("confirm_password");
     
        
        var toggleIcon = document.getElementById("togglePasswordIcon");
        
        // Toggle the input type between 'password' and 'text'
        if (passwordField.type === "password") {
            passwordField.type = "text";  // Show password
            toggleIcon.classList.remove("fa-eye");  // Change icon to "eye-slash"
            toggleIcon.classList.add("fa-eye-slash");
        } else {
            passwordField.type = "password";  // Hide password
            toggleIcon.classList.remove("fa-eye-slash");  // Change icon back to "eye"
            toggleIcon.classList.add("fa-eye");
        }
    }
    
     
</script>

@endsection


