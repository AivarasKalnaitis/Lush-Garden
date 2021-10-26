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
                        Products
                    </div>

                    <form action="{{ route('products.'. (isset($item->id) ? 'update' : 'store'), isset($item->id) ? ['product' => $item->id] : []) }}" method="post" enctype="multipart/form-data">
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
                                <label for="title">Title</label>
                                <input class="form-control @error('title') is-invalid @enderror" id="title" type="text"
                                       name="title" value="{{ old('title', $item->title ?? null) }}">
                                @error('title')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                       name="slug" value="{{ old('slug', $item->slug ?? null) }}">
                                @error('slug')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="image1">Change Image</label>
                                <input class="form-control-file" id="image1" name="image1" type="file">
                                @error('image1')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="price">Price</label>
                                <input class="form-control @error('price') is-invalid @enderror" id="price" type="text"
                                       name="price" value="{{ old('price', $item->price ?? 0.01) }}" min="0.01">
                                @error('price')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="vat">Vat</label>

                                <select class="form-control @error('vat') is-invalid @enderror" id="vat" name="vat">
                                    <option value="21" @if(old('vat', $item->vat ?? null) === 21) selected @endif>21</option>
                                    <option value="5" @if(old('vat', $item->vat ?? null) === 5) selected @endif>5</option>
                                    <option value="0" @if(old('vat', $item->vat ?? null) === 0) selected @endif>0</option>
                                </select>

                                @error('vat')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="categories">Categories</label>
                                @foreach($categories as $id => $title)
                                    <input type="checkbox" id="categories" name="categories[]"
                                           value="{{ $id }}"
                                           @if(in_array($id, old('categories', $categoryIds ?? []))) checked @endif
                                    > {{ $title }}
                                @endforeach
                            </div>

                            <div class="form-group">
                                <label for="description">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror"
                                          id="description" name="description">{{ old('description', $item->description ?? null) }}</textarea>
                                @error('description')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="quantity">Quantity</label>
                                <input class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                       type="text"
                                       name="quantity" value="{{ old('quantity', $item->quantity ?? 0) }}">
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