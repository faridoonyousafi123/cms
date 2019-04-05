@extends('layouts.app')


@section('content')


<div class="card">
        <div class="card-body">

        <table class="table table-hover">

                <h5 class="card-title">
                        <a href="{{ route('category.create') }}" style="float:right;"><button class="btn btn-success">Create Categries</button></a>
                </h5>

      <thead class="text-center">

          <th>

               Name

          </th>

          <th>

                Edit

            </th>

            <th>

                Delete

            </th>

      </thead>

      <tbody class="text-center">
          @foreach($categories as $category)

              <tr>
                  <td>
                      {{ $category->name }}
                  </td>

                  <td>
                    <a href="{{ route('category.edit', ['id' => $category->id ]) }}" class="btn btn-xs btn-info">
                        <i class="far fa-edit" style="color:white;"></i>
                    </a>
                  </td>

                  <td>
                        <a href="{{ route('category.delete', ['id' => $category->id ]) }}" class="btn btn-xs btn-danger">
                                <i class="far fa-trash" style="color:white;"></i>
                        </a>
                  </td>

              </tr>

          @endforeach

      </tbody>

      </table>
        </div>
      </div>




@stop
