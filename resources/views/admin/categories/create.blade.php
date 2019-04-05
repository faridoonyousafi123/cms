@extends('layouts.app')

@section('content')

@include('admin.partials.errors')

<div class="card">
        <div class="card-header">

            Create a new Category

        </div>

        <div class="card-body">

            <form action="{{ isset($category) ? route('category.update', $category->id ) : route('category.store') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">

                    <label for="name">Name</label>
                <input type="text" name="name" value="{{ isset($category) ? $category->name : '' }}" class="form-control">
                </div>

                    <div class="form-group">
                        <div style="float:right;">
                        <button class="btn btn-success">
                            {{ isset($category) ? 'Update Category' : 'Create Category' }}
                        </button>
                    </div>

                    </div>


                </div>

            </form>

        </div>
    </div>



@stop
