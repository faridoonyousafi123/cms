@extends('layouts.app')
@section('content')
@include('admin.partials.errors')
@include('admin.partials.session')

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
                <label for="name">Category</label>
                <select name="category_id" id="category_id" class="form-control">
                    @if(isset($post))
                        @if($post->category()->count() > 0)
                            @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                            @if ($category->id == $post->category->id )
                                            selected
                                            @endif
                                            >
                                        {{ $category->name }}
                                    </option>
                            @endforeach
                        @else
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                    @endforeach
                        @endif
                    @else
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ $category->name }}
                            </option>
                        @endforeach
                    @endif
                </select>
            </div>
                @if (isset($tags))
                    <div class="form-group">
                        <label for="Tags">Tags</label>
                        <select name="tags[]" id="tags" class="form-control tags-selector" multiple>
                            @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}"
                                        @if(isset($post))
                                            @if($post->hasTag($tag->id))
                                                selected
                                            @endif
                                        @endif
                                        >
                                        {{ $tag->title }}
                                    </option>
                            @endforeach
                    </select>
                    </div>
                @endif
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script>
    flatpickr("#published_at", {

            enableTime:true,
            enableSeconds:true
        });

        $(document).ready(function() {
            $('.tags-selector').select2();
        });

</script>
@endsection

@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.1.0/trix.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
@stop
