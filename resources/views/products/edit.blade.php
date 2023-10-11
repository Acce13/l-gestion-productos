@extends('layouts.app')

@section('title', 'Products')

@section('content')
<div class="container py-5">
    <div class="row gy-4">
        <div class="col-12">
            <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                <div>
                    <h4 class="text-light">Products</h4>
                </div>
                <div>
                    <a href="{{ route('products.index') }}" class="btn btn-primary btn-fab-lg border border-light fw-bolder rounded-circle">
                        <i class="bi bi-arrow-left"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="py-3 px-3 rounded shadow">
                <form action="{{ route('products.update', $product) }}" method="post">
                    @csrf
                    @method('put')
                    <div class="row gy-3">
                        <div class="col-12">
                            <h4 class="text-secondary">Form</h4>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="selectCategory" class="form-label text-secondary">Category <span class="text-danger">*</span></label>
                                <select class="form-select" name="category_id" id="selectCategory">
                                    <option value="">-- Select a Category --</option>
                                    @foreach($categories as $category)
                                        <option {{ ($category->id == $product->category_id) ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputProduct" class="form-label text-secondary">Product <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="name" id="inputProduct" value="{{ old('name', $product->name) }}" placeholder="Product">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputDescription" class="form-label text-secondary">Description <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" name="description" id="inputDescription" value="{{ old('description', $product->description) }}" placeholder="Description">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label for="inputPrice" class="form-label text-secondary">Price <span class="text-danger">*</span></label>
                                <input type="number" min="0" class="form-control" name="price" id="inputPrice" value="{{ old('price', $product->price) }}" placeholder="Price">
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary border border-light fw-semibold py-2">
                                    <i class="bi bi-send-fill"></i>
                                    Update
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