@extends('master')

@section('page_title', 'Sub Category Create Page')

@section('content')

    <div class="row">
        <div class="col-8 m-auto">
            <div class="d-flex justify-content-end my-4">
                <a href="{{ route('laravel.subcategory.create') }}" class="btn btn-primary text-right">Create Subcatogory</a>
            </div>
            @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
            <table class="table">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Category Name</th>
                    <th scope="col">Subategory Name</th>
                    <th scope="col">Created At</th>
                    <th class="text-center" scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($subcategories as $subcategory)
                    <tr>
                    <th scope="row">{{ $subcategory->id }}</th>
                    <td>{{ $subcategory->category->name }}</td>
                    <td>{{ $subcategory->name }}</td>
                    <td>{{ $subcategory->created_at->diffForHumans() }}</td>
                    <td class="d-flex gap-2 justify-content-center"><a href="{{ route('laravel.subcategory.edit',[$subcategory->id]) }}" class="btn btn-sm btn-info">Edit</a>
                        <form action="{{ route('laravel.subcategory.destroy', ['subcategory' => $subcategory->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm">Del</button>
                        </form>
                    </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
        </div>
    </div>

@endsection
