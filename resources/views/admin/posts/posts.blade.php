@extends('layouts.app')


@section('content')


<div class="card">


        <h5 class="card-title">
                <a href="{{ route('posts.create') }}" style="float:right;"><button class="btn btn-success">Add Post</button></a>
        </h5>

        <div class="card-body">

        <table class="table table-hover">

      <thead class="text-center">

          <th>

               Image

          </th>

          <th>

                Title

            </th>

            <th>

                Description

            </th>

      </thead>

      <tbody class="text-center">
          @foreach($posts as $post)

              <tr>

                <td>
                     <img src="{{ asset('storage/' . $post->image) }}" alt="">
                </td>

                  <td>
                      {{ $post->title }}
                  </td>

                  <td>
                    {{ $post->description }}
                </td>

                  {{--  <td>
                    <a href="{{ route('posts.edit', ['id' => $post->id ]) }}" class="btn btn-xs btn-info">
                        <i class="far fa-edit" style="color:white;"></i>
                    </a>
                  </td>

                  <td>
                        <button class="btn btn-danger" onclick="handleDelete({{ $post->id }})">Delete</button>
                  </td>  --}}

              </tr>

          @endforeach

      </tbody>

      </table>

<!-- Modal -->
        <form action="" method="POST" id="deleteForm">
            @csrf
                <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure to delete this category?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                    </div>
                </div>
                </div>
        </form>

    </div>
</div>
@stop


@section('scripts')

<script>

    function handleDelete(id){


        var form = document.getElementById('deleteForm');
        form.action = "/posts/" + id
        $('#deleteModal').modal('show');
    }

</script>

@stop
