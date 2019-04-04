@extends('layouts.app')

@section('content')


<div class="card">
        <div class="card-header">

            Create a new Category

        </div>

        <div class="card-body">

            <form action="{{ route('category.store') }}" method="post">

                {{ csrf_field() }}

                <div class="form-group">

                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                    <div class="form-group">
                        <div style="float:right;">
                        <button class="btn btn-success">Create</button>
                    </div>

                    </div>


                </div>

            </form>

        </div>
    </div>



@stop
