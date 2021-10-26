@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        @isset($item->id)
                            Edit
                        @else
                            New
                        @endisset
                        Order
                    </div>

                    <form action="{{ route('orders.update', ['order' => $item->id]) }}" method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="status">Status</label>

                                <select class="form-control @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                    <option value="unpaid"
                                            @if(old('status', $item->status ?? null) === 'unpaid') selected @endif>
                                        Unpaid
                                    </option>
                                    <option value="paid"
                                            @if(old('status', $item->status ?? null) === 'paid') selected @endif>Paid
                                    </option>
                                    <option value="processing"
                                            @if(old('status', $item->status ?? null) === 'processing') selected @endif>
                                        Processing
                                    </option>
                                    <option value="send"
                                            @if(old('status', $item->status ?? null) === 'send') selected @endif>Send
                                    </option>
                                    <option value="Done"
                                            @if(old('status', $item->status ?? null) === 'done') selected @endif>Done
                                    </option>
                                </select>

                                @error('status')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_title">Title</label>
                                <input class="form-control @error('customer_title') is-invalid @enderror"
                                       id="customer_title" type="text"
                                       name="customer_title"
                                       value="{{ old('customer_title', $item->customer_title ?? null) }}">
                                @error('customer_title')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_email">E-mail</label>
                                <input class="form-control @error('customer_email') is-invalid @enderror"
                                       id="customer_email" type="text"
                                       name="customer_email"
                                       value="{{ old('customer_email', $item->customer_email ?? null) }}">
                                @error('customer_email')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_phone">Phone</label>
                                <input class="form-control @error('customer_phone') is-invalid @enderror"
                                       id="customer_phone" type="text"
                                       name="customer_phone"
                                       value="{{ old('customer_phone', $item->customer_phone ?? null) }}">
                                @error('customer_phone')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="customer_address">Address</label>
                                <input class="form-control @error('customer_address') is-invalid @enderror"
                                       id="customer_address" type="text"
                                       name="customer_address"
                                       value="{{ old('customer_address', $item->customer_address ?? null) }}">
                                @error('customer_address')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
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
                                    <th>Actions</th>
                                </tr>

                                @foreach($item->items as $orderItem)
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
                                        <td>
                                            <a class="btn btn-sm btn-outline-primary" href="{{ route('orders.item.edit', ['order' => $item->id, 'orderItem' => $orderItem->id]) }}">Edit</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="card-footer">
                            <input type="submit" class="btn btn-sm btn-outline-success" value="Save">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection