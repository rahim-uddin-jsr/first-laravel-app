@extends('master')

@section('page_title', 'Category-Create-Page')

@section('content')

<div class="row">
    <div class="col-8 m-auto">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form action="{{ route('laravel.category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category-name" class="form-label">Category Name</label>
                <input type="text" class="form-control @error('category_name')
                    is-invalid
                @enderror" id="category-name" name="category_name" placeholder="Please provide Category name">
                @error('category_name')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" id="isActive">
                <label class="form-check-label" for="isActive">
                  Active/Inactive
                </label>
              </div>
            <button type="submit" class="btn btn-dark">Submit</button>
        </form>
    </div>
</div>

@endsection
