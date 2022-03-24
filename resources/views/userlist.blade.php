@extends('layout.master')
@section('title', 'User list')
@section('headDependencies')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/swal/sweetalert2.min.css">
    <script src="/js/swal/sweetalert2.all.min.js"></script>
@endsection
@section('bodyDependencies')
    <script src="js/userAction.js"></script>
    <script src="/js/swal/sweetalert2.min.js"></script>
@endsection
@section('content')
    <div class="container mt-4">
        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Full Name</th>
                        <th scope="col">Email Address</th>
                        <th scope="col">Created Date</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ date('D, d F Y', strtotime($user->created_at)) }}</td>
                            <td><button class="action-edit" data-id="{{ $user->id }}">Edit</button>
                                <button class="action-delete" data-id="{{ $user->id }}"">Delete</button>
                                </td>
                             </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
