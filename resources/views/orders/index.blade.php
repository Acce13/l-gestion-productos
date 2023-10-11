@extends('layouts.app')

@section('title', 'Orders')

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
        @if (session('error'))
        <div class="col-12">
            <div class="alert bg-danger bg-gradient" role="alert">
                <p class="m-0 text-light">{{ session('error') }}</p>
            </div>
        </div>
        @endif
        <div class="col-12">
            <div class="bg-primary bg-gradient d-flex justify-content-between align-items-center py-2 px-3 rounded shadow">
                <div class="">
                    <h4 class="text-light">Orders</h4>
                </div>
                <div class="">
                    <a href="{{ route('orders.create') }}" class="btn btn-primary btn-fab-lg border border-light fw-bolder rounded-circle">
                        <i class="bi bi-plus-lg"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12">
            <div class="row gy-3">
                @if (count($orders) > 0)
                    @foreach($orders as $order)
                    <div class="col-lg-6 col-xl-6 col-xxl-4">
                        <div class="border border-primary-subtle py-3 px-3 rounded shadow-sm">
                            <div class="text-secondary">
                                <h4 class="m-0 text-secondary">{{ $order->customer->name }}</h4>
                                <p class="m-0">{{ $order->date }}</p>
                                <p class="m-0">Cantidad de productos: {{ $order->productItems->count() }}</p>
                                <p class="m-0">$ {{ $order->getFinalAmount() }}</p>
                            </div>
                            <div class="d-flex">
                                <!-- <a href="{{ route('orders.edit', $order) }}" class="btn btn-primary btn-fab-small border border-light fw-bolder rounded-circle">
                                    <i class="bi bi-pencil-fill"></i>
                                </a> -->
                                <form action="{{ route('orders.destroy', $order) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <!-- <button type="submit" class="btn btn-danger border btn-fab-small border-light fw-bolder rounded-circle">
                                        <i class="bi bi-trash-fill"></i>
                                    </button> -->
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