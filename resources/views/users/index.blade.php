@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            LinkedIn OAuth
        </div>
        <div class="card-body">
            <h5 class="card-title">List of all users</h5>
            <hr>
            @if (count($users))
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            @else
            <p class="text-muted">* Users not found.</p>
            @endif

        </div>
    </div>
@endsection
