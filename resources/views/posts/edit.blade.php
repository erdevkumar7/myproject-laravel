@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class='form-group'>
                <label for="title">Title </label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>

            <div class="form-group">
                <label for='description'>Description</label>
                <input type="text" name="description" id="description" value="{{ $post->description }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-success">Update </button>
        </form>
    </div>
@endsection

{{-- <h1>{{$post->id}}<h1> --}}