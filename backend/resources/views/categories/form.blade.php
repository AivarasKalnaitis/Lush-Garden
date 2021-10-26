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
                        category
                    </div>

                    <form action="{{ route('categories.'.(isset($item->id) ? 'update' : 'store'), isset($item->id) ? ['category' => $item->id] : []) }}"
                          method="post" enctype="multipart/form-data">
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
                                       name="title" value="{{ old('title', $item->title ?? '') }}">
                                @error('title')
                                <em class="alert-danger">{{ $message }}</em>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="slug">Slug</label>
                                <input class="form-control @error('slug') is-invalid @enderror" id="slug" type="text"
                                       name="slug" value="{{ old('slug', $item->slug ?? '') }}">
                                @error('slug')
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