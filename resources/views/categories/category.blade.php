@extends('master')

@section('page_title', 'Category')

@section('content')
    <div class="row">
        <div class="col-8 m-auto">
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <div class="d-flex my-4">
                <a href="{{ route('laravel.category.create') }}" class="btn btn-success">Create Category</a>
            </div>
            <table class="table w-100">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category Name</th>
                        <th scope="col">Created</th>
                        <th class="text-center" scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    {{ $count = 1 }}
                    @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $count }}</th>
                            {{ $count++ }}
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->created_at->diffForHumans() }}</td>

                            <td class="d-flex w-100 justify-content-center gap-2">
                                <div><a href="{{ route('laravel.category.edit', ['category' => $category->id]) }}"
                                        class="btn btn-info">Edit</a></div>
                                <div>

                                    <form action="{{ route('laravel.category.destroy', ['category' => $category->id]) }}"
                                        method="post">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger show-confirm">Del</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
