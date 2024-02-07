@extends('master')

@section('page_title', 'Sub Category Edit Page')

@section('content')

    <div class="row">
        <div class="col-8 m-auto">
            <div class="d-flex justify-content-start my-4">
                <a href="{{ route('laravel.subcategory.index') }}" class="btn btn-primary text-right">Subcatogory</a>
            </div>
            @if (session('status'))
                <div class="alert alert-success">{{ session('status') }}</div>
            @endif
            <form action="{{ route('laravel.subcategory.update',[$selectedSubcategory->id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    <select
                        class="form-select my-3 @error('selected_category_id')
                is-invalid
            @enderror"
                        name="selected_category_id">
                        <option>Select a Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" @if ($category->id == $selectedSubcategory->category_id) selected @endif>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('selected_category_id')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                    <label for="subcategory-name" class="form-label">Subcategory Name</label>
                    <input type="text"
                        class="form-control @error('subcategory_name')
                    is-invalid
                @enderror"
                        id="subcategory-name" value="{{ $selectedSubcategory->name }}" name="subcategory_name" placeholder="Please provide Category name">
                    @error('subcategory_name')
                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                    @enderror
                </div>
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" @if ($selectedSubcategory->is_active == true) checked @endif
                        name="is_active" id="isActive">
                    <label class="form-check-label" for="isActive">
                        Active/Inactive
                    </label>
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>

@endsection
