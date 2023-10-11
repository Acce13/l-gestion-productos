@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container py-5">
    <div class="row gy-4">
        <div class="col-12">
            <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                <div>
                    <h4 class="text-light">Categories</h4>
                </div>
                <div>
                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-fab-lg border border-light fw-bolder rounded-circle">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="py-3 px-3 rounded shadow">
                <form action="{{ route('categories.store') }}" method="post">
                    @csrf
                    @method('post')
                    <div class="row gy-3">
                        <div class="col-12">
                            <h4 class="text-secondary">Form</h4>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputCategory" class="form-label text-secondary">Category <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="inputCategory" value="{{ old('name') }}" placeholder="Category">
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