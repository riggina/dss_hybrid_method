@extends('layouts.main')

@section('container')

<div class="container d-flex justify-content-center p-0">
    <div class="row">
        @if(session()->has('failure'))
        <div class="alert alert-danger alert-dismissible fade show m-0" role="alert">
            {{ session('failure') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>  
</div>

<div class="container-fluid container_login">
    <div class="card card_login">
        <div class="row h-100">
            <div class="col-md-6">
                <img class="img_login" src="https://images.unsplash.com/photo-1512917774080-9991f1c4c750?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1170&q=80"  alt="...">
                <div class="overlay"></div>
            </div>
            <div class="col-md-6 login_form_right">
                <div class="row justify-content-center mb-3">   
                    <img class="img_login_logo" src="img/Logo2.png" alt="Logo SPK"/>
                </div>
                <div class="col-md-12 login-page mb-2">
                    <h6>Selamat Datang Your Dream House</h6>
                    <p>Jika bukan admin, tidak perlu login untuk menjelajah</p>
                </div>
                <form action="{{ route('login.post') }}" method="POST">
                    @csrf
                    <div class="row mx-5 my-4">
                        <div class="form-group mb-2">
                          <input type="text" name="username" class="form-control login @error('username')is-invalid @enderror" id="username" placeholder="Enter Username" required value="{{ old('username') }}" required>
                          @error('username')
                          <div class="invalid-feedback">
                            {{ $message }}
                          </div>
                          @enderror
                        </div>
                        <div class="password-container">
                            <input type="password" class="form-control login" id="password" name="password" placeholder="Enter Password" required>
                            <span class="toggle-password" onclick="togglePasswordVisibility()">
                              <i class="bi bi-eye-fill"></i>
                            </span>
                        </div>
                    </div>
                    <div class="row mx-5">
                        <div class="col-md-12 d-flex justify-content-center">
                            <button class="btn login-btn" type="submit">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
  </div>
  <script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        var toggleIcon = document.querySelector(".toggle-password i");

        if (passwordField.type === "password") {
        passwordField.type = "text";
        toggleIcon.classList.remove("bi-eye-fill");
        toggleIcon.classList.add("bi-eye-slash");
        } else {
        passwordField.type = "password";
        toggleIcon.classList.remove("bi-eye-slash");
        toggleIcon.classList.add("bi-eye-fill");
        }
    }
  </script>
@endsection

@php
    $showHeader = false;
    $showFooter = false;
@endphp