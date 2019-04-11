@extends('layouts.app')
@section('content')
@include('admin.partials.errors')

<div class="card">
    <div class="card-header">
        {{ isset($post) ? 'Edit Post' : 'Create a Post' }}
    </div>
    <div class="card-body">
        <form action="{{ isset($post) ? route('posts.update', $post->id ) : route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if (isset($post))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="name">Title</label>
                <input type="text" name="title" value="{{ isset($post) ? $post->title : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" class="form-control">{{ isset($post) ? $post->description : '' }} </textarea>
            </div>
            <div class="form-group">
                <label for="content">Content</label>
                <input id="content" type="hidden" name="content" value="{{ isset($post) ? $post->content : ''}}">
                <trix-editor input="content"></trix-editor>
            </div>
            <div class="form-group">
                <label for="content">Published At</label>
                <input type="text" name="published_at" id="published_at" value="{{ isset($post) ? $post->published_at : '' }}" class="form-control">
            </div>
            <div class="form-group">
                <img src="{{ isset($post) ? asset('storage/' . $post->image) : '' }}" class="img-responsive" style="with 100%;" alt="">
            </div>
            <div class="form-group">
                <label for="image"></label>
                <input type="file" name="image" value="" class="form-control" />
            </div>
            <div class="form-group">
                <div style="float:right;">
                    <button class="btn btn-success">
                            {{ isset($post) ? 'Update post' : 'Create post' }}
                        </button>
                </div>
            </div>
    </div>
    </form>
</div>
</div>

@stop
@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#published_at", {

            enableTime:true
        });

</script>
@endsection

@section('css')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
