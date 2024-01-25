@extends('layouts.app')
@section('title', 'Edit Post')
@section('content')

<div class="container mt-5">
    <form class="row g-3" action="{{route('posts.update', $post->id)}}" method="post">
        @csrf @method('put')
        <div class="col-md-4">
            <label class="form-label" for="nameInp">Name</label>
            <input class="form-control" id="nameInp" type="text" name="name" value="{{$post->name}}">
            @error('name')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <label class="form-label" for="categoryInp">Category</label>
            <select class="form-select" id="categoryInp" name="category_ids[]" multiple>
                <option selected hidden value="">Choose category</option>
                @forelse($categories as $category)
                <option value="{{ $category->id }}" {{ in_array($category->id, old('category_ids',
                    $post->categories->pluck('id')->toArray())) ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
                @empty
                <option disabled>No Category Found</option>
                @endforelse
            </select>
            @error('category_ids')<small class="text-danger">{{$message}}</small>@enderror
        </div>
        <div class="col-12">
            <button class="btn btn-primary" type="submit">Update</button>
        </div>
    </form>
</div>

@endsection