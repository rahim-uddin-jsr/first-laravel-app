@extends('master')

@section('page_title', 'Sub Category Create Page')

@section('content')

<div class="row">
    <div class="col-8 m-auto">
        @if (session('status'))
            <div class="alert alert-success">{{ session('status') }}</div>
        @endif
        <form action="{{ route('laravel.subcategory.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <select class="form-select my-3 @error('selected_category_id')
                is-invalid
            @enderror" name="selected_category_id" >
                    <option selected value="">Select a Category</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                  </select>
                  @error('selected_category_id')
                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                @enderror
                <label for="subcategory-name" class="form-label">Subcategory Name</label>
                <input type="text" class="form-control @error('subcategory_name')
                    is-invalid
                @enderror" id="subcategory-name" name="subcategory_name" placeholder="Please provide Category name">
                @error('subcategory_name')
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
