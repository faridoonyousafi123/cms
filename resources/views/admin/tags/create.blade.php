@extends('layouts.app')

@section('content')

@include('admin.partials.errors')

<div class="card">
        <div class="card-header">

            Create a new Tag

        </div>

        <div class="card-body">

            <form action="{{ isset($tag) ? route('tag.update', $tag->id ) : route('tag.store') }}" method="POST">

                @csrf

                <div class="form-group">

                    <label for="name">Name</label>
                <input type="text" name="name" value="{{ isset($tag) ? $tag->name : '' }}" class="form-control">
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
