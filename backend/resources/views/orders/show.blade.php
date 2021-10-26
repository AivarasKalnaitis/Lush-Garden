@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Orders view
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="row">
                            <div class="col-md-4">Order status:</div>
                            <div class="col-md-8">{{ $order->status }}</div>
                        </div>
                            <div class="row">
                                <div class="col-md-4">Created:</div>
                                <div class="col-md-8">{{ $order->created_at }}</div>
                            </div>
                            <div class="row">
                                <div class="col-md-4">Last update:</div>
                                <div class="col-md-8">{{ $order->updated_at }}</div>
                            </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-header">Customer</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>Name</td>
                                        <td>{{ $order->user->name }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>{{ $order->user->email }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card-header">Delivery</div>
                            <div class="card-body">
                                <table class="table">
                                    <tr>
                                        <td>Title</td>
                                        <td>{{ $order->customer_title }}</td>
                                    </tr>
                                    <tr>
                                        <td>E-mail</td>
                                        <td>{{ $order->customer_email }}</td>
                                    </tr>
                                    <tr>
                                        <td>Phone</td>
                                        <td>{{ $order->customer_phone }}</td>
                                    </tr>
                                    <tr>
                                        <td>Address</td>
                                        <td>{{ $order->customer_address }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="card-header">
                        Order Items
                    </div>

                    <div class="card-body">
                        <table class="table">
                            <tr>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Price</th>
                                <th>VAT</th>
                                <th>Quantity</th>
                            </tr>

                            @foreach($order->items as $orderItem)
                                <tr>
                                    <td>
                                        @if ($orderItem->product)
                                            <img src="{{ $orderItem->product->getFirstImageUrl() }}" width="70" alt="">
                                        @endif
                                    </td>
                                    <td>{{ $orderItem->title }}</td>
                                    <td>{{ $orderItem->price }}</td>
                                    <td>{{ $orderItem->vat }}</td>
                                    <td>{{ $orderItem->quantity }}</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td></td>
                                <th class="text-right">Viso:</th>
                                <td>{{ $order->items->sum('price') }}</td>
                                <td></td>
                                <td>{{ $order->items->sum('quantity') }}</td>
                            </tr>
                        </table>
                    </div>

                    <div class="card-footer">
                        <a class="btn btn-sm btn-outline-success" href="{{ route('orders.index') }}">To list</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection