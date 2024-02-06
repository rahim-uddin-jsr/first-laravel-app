@extends('master')

@section('page_title', 'Category-Create-Page')

@section('content')

<div class="row">
    <div class="col-8 m-auto">
        <form action="{{ route('laravel.category.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="category-name" class="form-label">Category Name</label>
                <input type="text" class="form-control" id="category-name" name="category_name" placeholder="Please provide Category name">
            </div>
            <div class="mb-3">
                <label for="category-slug" class="form-label">Category Slug</label>
                <input type="text" class="form-control" id="category-slug" name="category_slug" placeholder="Please provide Category slug">
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="is_active" id="isActive">
                <label class="form-check-label" for="isActive">
                  Active/Inactive
                </label>
              </div>
            <button type="submit" class="btn btn-danger">Submit</button>
        </form>
    </div>
</div>

@endsection
