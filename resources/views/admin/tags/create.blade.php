@extends('layouts.app')

@section('content')

@include('admin.partials.errors')

<div class="card">
        <div class="card-header">

            Create a new Tag

        </div>

        <div class="card-body">

            <form action="{{ isset($tag) ? route('tags.update', $tag->id ) : route('tags.store') }}" method="POST">
                @csrf
                @if (isset($tag))
                    @method('PUT')
                @endif
                <div class="form-group">

                    <label for="name">Title</label>
                <input type="text" name="title" value="{{ isset($tag) ? $tag->title : '' }}" class="form-control">
                </div>
                    <div class="form-group">
                        <div style="float:right;">
                        <button class="btn btn-success">
                            {{ isset($tag) ? 'Update Category' : 'Create Category' }}
                        </button>
                    </div>

                    </div>


                </div>

            </form>

        </div>
    </div>



@stop
