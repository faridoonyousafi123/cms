@extends('layouts.app')


@section('content')
<div class="d-flex justify-content-end p-2">
        <a href="{{ route('tags.create') }}" style="float:right;"><button class="btn btn-success">Create a Tag</button></a>
</div>

<div class="card">

        <div class="card-body">

        <table class="table table-hover">

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
          @foreach($tags as $tag)

              <tr>
                  <td>
                      {{ $tag->title }}
                  </td>

                  <td>
                    <a href="{{ route('tags.edit', ['id' => $tag->id ]) }}" class="btn btn-xs btn-info">
                        Edit
                    </a>
                  </td>

                  <td>
                        <button class="btn btn-danger" onclick="handleDelete({{ $tag->id }})">Delete</button>
                  </td>

              </tr>

          @endforeach

      </tbody>

      </table>

<!-- Modal -->
        <form action="" method="POST" id="deleteForm">
            @csrf
            @method('DELETE')
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
        form.action = "/tags/" + id
        $('#deleteModal').modal('show');
    }

</script>

@stop
