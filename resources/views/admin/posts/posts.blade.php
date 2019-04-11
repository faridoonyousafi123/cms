@extends('layouts.app')
@section('content')

<div class="d-flex justify-content-end p-2">
    <a href="{{ route('posts.create') }}" style="float:right;"><button class="btn btn-success">Create a Post</button></a>
</div>
<div class="card">
    <div class="card-body">
        @if ($posts->count() > 0)
        <table class="table table-hover">
            <thead class="text-center">
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Published At
                </th>
                <th>
                    Edit
                </th>
                <th>
                    Trash
                </th>
            </thead>
            <tbody class="text-center">
                @foreach($posts as $post)
                <tr>
                    <td>
                        <img height="50px" width="60px" src="{{ asset('storage/' . $post->image) }}" alt="">
                    </td>
                    <td>
                        {{ $post->title }}
                    </td>
                    <td>
                        {{ $post->published_at }}
                    </td>
                    <td>
                        @if (!$post->trashed())
                            <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-xs btn-info">Edit</a>
                        @endif
                    </td>
                    <td>
                        <button class="btn btn-xs btn-danger" onclick="handleDelete({{ $post->id }})">
                                  {{ $post->trashed() ? 'Delete' : 'Trash' }}
                        </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h3>No posts found !</h3>
        @endif
        <!-- Modal -->
        <form action="" method="POST" id="deleteForm">
            @csrf @method('DELETE')
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
                            <p>Are you sure to delete the post @isset($post) "{{ $post->title }}" @endisset ?</p>
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
