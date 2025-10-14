@extends('layouts.app')
@section('content')
<div class="container">
    <h2>Edit Post</h2>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf
        @method('PUT')
        <textarea name="content" class="form-control" rows="4">{{ $post->content }}</textarea>
        <button type="submit" class="btn btn-primary mt-2">Update</button>
    </form>
</div>
@endsection
