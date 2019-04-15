@extends('layouts.app')
@section('content')

<div class="card">
    <div class="card-body">
        @if ($users->count() > 0)
        <table class="table table-hover">
            <thead class="text-center">
                <th>
                    Avatar
                </th>
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Role
                </th>
            </thead>
            <tbody class="text-center">
                @foreach($users as $user)
                <tr>
                    <td>
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ Gravatar::src($user->email) }}">
                    </td>
                    <td>
                        {{ $user->name }}
                    </td>
                    <td>
                        {{ $user->email }}
                    </td>
                    <td>
                        @if (!$user->isAdmin())
                            <form action="{{ route('users.make-admin', $user->id) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-success">Make admin</button>
                            </form>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @else
            <h3>No posts found !</h3>
        @endif
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
