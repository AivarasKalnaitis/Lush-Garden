@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Orders
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table class="table">
                            <tr>
                                <th>#</th>
                                <th>Status</th>
                                <th>Customer</th>
                                <th>Created</th>
                                <th>Actions</th>
                            </tr>

                            @foreach($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td>{{ $item->customer_title }}</td>
                                    <td>{{ $item->created_at }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-outline-primary" href="{{ route('orders.edit', ['order' => $item->id]) }}">{{ __('Edit') }}</a>
                                        <a class="btn btn-sm btn-outline-success" href="{{ route('orders.show', ['order' => $item->id]) }}">{{ __('Show') }}</a>
                                    </td>
                                </tr>
                            @endforeach

                        </table>
                    </div>

                    <div class="card-footer">
                        {{ $list->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection