@extends('layouts.app')

@section('title', 'Orders')

@section('content')
<div class="container py-5">
    <form action="{{ route('orders.store') }}" method="post">
        @csrf
        @method('post')
        <div class="row gy-4">
            <div class="col-12">
                <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                    <div>
                        <h4 class="text-light">Orders</h4>
                    </div>
                    <div>
                        <a href="{{ route('orders.index') }}" class="btn btn-primary btn-fab-lg border border-light fw-bolder rounded-circle">
                            <i class="bi bi-arrow-left"></i>
                        </a>
                    </div>
                </div>
            </div>
            @isUser
            <div class="col-12">
                <div class="py-3 px-3 rounded shadow">    
                    <div class="row gy-3">
                        <div class="col-12">
                            <h4 class="text-secondary">Form</h4>
                        </div>
                        <div class="col-12">
                            <div class="mb-3">
                                <label class="form-label text-secondary">Customer <span class="text-danger">*</span></label>
                                <select class="select2" name="user_id">
                                    <option value="">-- Select a Customer --</option>
                                    @foreach($customers as $customer)
                                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @else
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
            @endisUser
            <div class="col-12">
                <div class="py-3 px-3 rounded shadow">
                    <div class="d-flex justify-content-end">
                        <button type="button" class="btn btn-primary border btn-fab-small border-light fw-bolder rounded-circle btn-addProduct">
                            <i class="bi bi-plus"></i>
                        </button>
                    </div>
                    <div class="row product-list">
                        <div class="col-12">
                            <div class="row align-items-center product-item">
                                <div class="col-4">
                                    <label for="selectProduct" class="form-label text-secondary">Product <span class="text-danger">*</span></label>
                                    <select class="select2" name="products[0][product_id]" id="selectProduct">
                                        <option value="">-- Select a Product --</option>
                                        @foreach($products as $product)
                                            <option value="{{ $product->id }}">{{ $product->name }} - $ {{ $product->price }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-4">
                                    <label for="inputQuantity" class="form-label text-secondary">Quantity <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="products[0][quantity]" id="inputQuantity" placeholder="Quantity">
                                </div>
                                <div class="col-4"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-12">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary border border-light fw-semibold py-2">
                                    <i class="bi bi-send-fill"></i>
                                    Register
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@push('scripts')
    <script>
        $(function() {
            $('.select2').select2({ width: '100%' });
        });
        //----
        $(".btn-addProduct").click(function() {
            var newItem = `
                <div class="col-12">
                    <div class="row align-items-center product-item">
                        <div class="col-4">
                            <label class="form-label text-secondary">Product <span class="text-danger">*</span></label>
                            <select class="select2" name="products[${ $(".product-item").length }][product_id]">
                                <option value="">-- Select a Product --</option>
                                @foreach($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->name }} - $ {{ $product->price }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-4">
                            <label class="form-label text-secondary">Quantity <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="products[${ $(".product-item").length }][quantity]" placeholder="Quantity">
                        </div>
                        <div class="col-4">
                            <div class="d-grid gap-2">
                                <button type="button" class="btn btn-danger border border-light fw-semibold mt-custom-4 btn-delete-product">
                                    <i class="bi bi-trash-fill"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `
            //----
            $(".product-list").children().append(newItem);
            //----
            $(".product-item:last .select2").select2({ width: '100%' });
        });

        //----
        $(document).on("click", ".btn-delete-product", function() {
            //----
            var productItem = $(this).closest(".product-item");
            //----
            productItem.remove();
        });
    </script>
@endpush