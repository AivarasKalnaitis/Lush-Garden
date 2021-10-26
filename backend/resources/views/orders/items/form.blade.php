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
                            Add
                        @endisset
                        Order item
                    </div>

                    <form action="{{ route('orders.item.update', ['order' => $item->order_id, 'orderItem' => $item->id]) }}"
                          method="post"
                          enctype="multipart/form-data">
                        @csrf
                        @isset($item->id)
                            @method('put')
                        @endisset

                        <div class="card-body">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif

                            <div class="form-group">
                                <label for="productId">Product</label>

                                <select class="form-control @error('product_id') is-invalid @enderror" id="productId"
                                        name="product_id">
                                    <option value="">---</option>

                                    @foreach($products as $product)
                                        <option value="{{ $product->id }}"
                                                @if(old('product_id', $item->product_id ?? null) === $product->id) selected @endif>
                                            {{ $product->title }} ({{ $product->price }})
                                        </option>
                                    @endforeach

                                </select>

                                @error('product_id')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="title">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror"
                                       id="title" type="text" name="title"
                                       value="{{ old('title', $item->title ?? null) }}">
                                @error('title')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror"
                                       id="price" type="text" name="price"
                                       value="{{ old('price', $item->price ?? null) }}">
                                @error('price')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="vat">VAT</label>
                                <input class="form-control @error('vat') is-invalid @enderror"
                                       id="vat" type="text" name="vat"
                                       value="{{ old('vat', $item->vat ?? null) }}">
                                @error('vat')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input class="form-control @error('quantity') is-invalid @enderror"
                                       id="quantity" type="text" name="quantity"
                                       value="{{ old('quantity', $item->quantity ?? null) }}">
                                @error('quantity')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

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

@push('scripts')

    <script>
        {{-- todo: Script for trigger select product change --}}
    </script>

@endpush