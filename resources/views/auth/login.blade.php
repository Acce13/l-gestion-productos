@extends('layouts.app')

@section('title', 'Sign In')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-5 col-xxl-4">
            @if (session('success'))
                <div class="alert bg-success bg-gradient" role="alert">
                    <p class="m-0 text-light">{{ session('success') }}</p>
                </div>
            @endif
            <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                <div class="">
                    <h4 class="text-light">Sign In</h4>
                </div>
            </div>
            <div class="py-3 px-3 rounded shadow mt-4">
                <form action="{{ route('login') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row gy-3">
                        <div class="col-12">
                            <h4 class="text-secondary">Form</h4>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label text-secondary">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="inputEmail" value="{{ old('email') }}" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputPassword" class="form-label text-secondary">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" name="password" id="inputPassword" value="{{ old('password') }}" placeholder="Password">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary border border-light fw-semibold py-2">
                                    <i class="bi bi-send-fill"></i>
                                    Log In
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection