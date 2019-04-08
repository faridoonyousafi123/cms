@extends('layouts.app')

@section('content')

@include('admin.partials.errors')

<div class="card">
        <div class="card-header">

            Create a new Post

        </div>

        <div class="card-body">

            <form action="{{ isset($post) ? route('posts.update', $post->id ) : route('posts.store') }}" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="form-group">

                <label for="name">Title</label>
                <input type="text" name="title" value="{{ isset($post) ? $post->title : '' }}" class="form-control">
                </div>

                <div class="form-group">

                    <label for="description">Description</label>
                    <input type="text" name="description" value="{{ isset($post) ? $post->description : '' }}" class="form-control">
                </div>

                <div class="form-group">

                    <label for="content">Content</label>
                    <input type="text" name="content" value="{{ isset($post) ? $post->content : '' }}" class="form-control">
                </div>


                <div class="form-group">

                    <label for="content">Published At</label>
                    <input type="text" name="published_at" value="{{ isset($post) ? $post->published_at : '' }}" class="form-control">
                </div>


                <div class="form-group">

                    <label for="image">Image</label>
                    <input type="file" name="image" value="" class="form-control">
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
