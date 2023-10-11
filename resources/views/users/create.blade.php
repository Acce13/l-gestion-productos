@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container py-5">
    <div class="row gy-4">
        <div class="col-12">
            <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                <div>
                    <h4 class="text-light">Users</h4>
                </div>
                <div>
                    <a href="{{ route('users.index') }}" class="btn btn-primary btn-fab-lg border border-light fw-bolder rounded-circle">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="py-3 px-3 rounded shadow">
                <form action="{{ route('users.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row gy-3">
                        <div class="col-12">
                            <h4 class="text-secondary">Form</h4>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="selectRole" class="form-label text-secondary">Role <span class="text-danger">*</span></label>
                                <select class="form-select" name="role" id="selectRole">
                                    <option value="">-- Select a Role --</option>
                                    <option value="User">User</option>
                                    <option value="Customer">Customer</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputName" class="form-label text-secondary">Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="inputName" value="{{ old('name') }}" placeholder="Name">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputEmail" class="form-label text-secondary">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" name="email" id="inputEmail" value="{{ old('email') }}" placeholder="Email">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputAddress" class="form-label text-secondary">Address <span class="text-danger">*</span></label>
                                <input type="text" min="0" class="form-control" name="address" id="inputAddress" value="{{ old('address') }}" placeholder="Address">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary border border-light fw-semibold py-2">
                                    <i class="bi bi-send-fill"></i>
                                    Register
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