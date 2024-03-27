@extends('master')
@section('page_title', 'Blog Posts')

@section('content')
    @if ($page_name == true)
        <h1>{{ $page_name }}</h1>
    @endif
    {{-- {{ $blog_posts_trashed }} --}}
    {{-- <h2>Blog Posts</h2> --}}
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Slug</th>
                <th scope="col">Description</th>
                <th scope="col">Post</th>
                <th class="text-center" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($blog_posts as $blog_post)
                <tr>
                    <th scope="row">{{ $blog_post->id }}</th>
                    <td>{{ $blog_post->slug }}</td>
                    <td>{{ $blog_post->title }}</td>
                    <td>{{ $blog_post->description }}</td>
                    <td>{{ $blog_post->post }}</td>
                    <td class="d-flex gap-2 justify-content-center">
                        {{-- <a href="{{ route('laravel.subcategory.edit', [$blog_post->id]) }}"
                            class="btn btn-sm btn-info">Edit</a> --}}
                        <form action="{{ route('Destroy BLOG POST', [$blog_post->id]) }}" method="post">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger btn-sm show-confirm">Del</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <br><br><br>
    {{-- {{ $blog_posts }} --}}
    @if (count($blog_posts_trashed) > 0)
        <h2>Deleted Blog Posts</h2>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Slug</th>
                    <th scope="col">Description</th>
                    <th scope="col">Post</th>
                    <th class="text-center" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($blog_posts_trashed as $blog_post)
                    <tr>
                        <th scope="row">{{ $blog_post->id }}</th>
                        <td>{{ $blog_post->slug }}</td>
                        <td>{{ $blog_post->title }}</td>
                        <td>{{ $blog_post->description }}</td>
                        <td>{{ $blog_post->post }}</td>
                        <td class="d-flex gap-2 justify-content-center">
                            {{-- <a href="{{ route('laravel.subcategory.edit', [$blog_post->id]) }}"
                                class="btn btn-sm btn-info">Edit</a> --}}
                            <form action="{{ route('RESTORE SOFT DELETED BLOG POST', [$blog_post->id]) }}" method="post">
                                @method('PUT')
                                @csrf
                                <button type="submit" class="btn btn-outline-primary btn-sm show-confirm">Restore</button>
                            </form>
                            <form action="{{ route('DELETE SOFT DELETED SINGLE BLOG POST', [$blog_post->id]) }}"
                                method="post">
                                @method('DELETE')
                                @csrf
                                <button title="delete forever" type="submit"
                                    class="btn btn-danger btn-sm show-confirm">delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
@endsection
