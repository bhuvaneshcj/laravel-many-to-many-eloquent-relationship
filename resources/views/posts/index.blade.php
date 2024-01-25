@extends('layouts.app')
@section('title', 'Posts')
@section('content')

<div class="container mt-5">
    <div class="row align-items-center g-3 mb-3">
        <div class="col-md-6">
            <h4 class="mb-0">Posts</h4>
        </div>
        <div class="col-md-6 text-md-end">
            <a class="btn btn-primary" href="{{route('posts.create')}}">
                Create
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($posts as $post)
                <tr>
                    <th scope="row">{{++$i}}</th>
                    <td>{{$post->name}}</td>
                    <td>{{$post->created_at->format('M d, Y')}}</td>
                    <td>{{$post->updated_at->format('M d, Y')}}</td>
                    <td class="text-center">
                        <form action="{{route('posts.destroy', $post->id)}}" method="post">
                            @csrf @method('delete')
                            <a class="text-success fw-medium" href="{{route('posts.edit', $post->id)}}">
                                Edit
                            </a>
                            <button class="border-0 bg-transparent text-danger fw-medium" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if($posts instanceof \Illuminate\Pagination\LengthAwarePaginator)
        <div class="mt-4">
            {!! $posts->links() !!}
        </div>
        @endif
    </div>
</div>

@endsection