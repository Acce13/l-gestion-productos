@extends('layouts.app')

@section('title', 'Categories')

@section('content')
<div class="container py-5">
    <div class="row gy-4">
        @if (session('success'))
        <div class="col-12">
            <div class="alert bg-success bg-gradient" role="alert">
                <p class="m-0 text-light">{{ session('success') }}</p>
            </div>
        </div>
        @endif
        <div class="col-12">
            <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                <div class="">
                    <h4 class="text-light">Categories</h4>
                </div>
                <div class="">
                    <a href="{{ route('categories.create') }}" class="btn btn-primary btn-fab-lg border border-light fw-bolder rounded-circle">
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row gy-3">
                @if (count($categories) > 0)
                    @foreach($categories as $category)
                    <div class="col-lg-6 col-xl-6 col-xxl-4">
                        <div class="border border-primary-subtle py-3 px-3 rounded shadow-sm">
                            <div>
                                <h4 class="text-secondary">{{ $category->name }}</h4>
                            </div>
                            <div class="d-flex">
                                <a href="{{ route('categories.edit', $category) }}" class="btn btn-primary btn-fab-small border border-light fw-bolder rounded-circle">
                                    <i class="bi bi-pencil-fill"></i>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger border btn-fab-small border-light fw-bolder rounded-circle">
                                        <i class="bi bi-trash-fill"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                    @endforeach
                @else
                    <div class="col-12">
                        <h4 class="text-secondary">Empty</h4>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection