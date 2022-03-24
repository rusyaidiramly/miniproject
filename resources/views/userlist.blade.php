@extends('layout.master')
@section('title', 'User list')
@section('headDependencies')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/swal/sweetalert2.min.css">
    <script src="/js/swal/sweetalert2.all.min.js"></script>
@endsection
@section('bodyDependencies')
    <script src="/js/userAction.js"></script>
    <script src="/js/swal/sweetalert2.min.js"></script>
@endsection
@section('content')
    <div class="container mt-4">
        <div class="search-form">
            <form id="search-form" action="/userlist/search" method="GET" class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex w-100">
                {{-- @csrf --}}
                <input type="search" name="q" class="form-control form-control-light" placeholder="Name or Email" aria-label="Search">
                <button type="submit" class="btn btn-primary ms-2">Search</button>
            </form>
        </div>
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
                    @if (count($users) == 0)
                        <tr>
                            <td colspan=5 class="align-middle text-center">
                                No user
                            </td>
                        </tr>
                    @endif
                    @foreach ($users as $user)
                        <tr>
                            <td class="align-middle">{{ $loop->iteration }}</td>
                            <td class="align-middle">{{ $user->name }}</td>
                            <td class="align-middle">{{ $user->email }}</td>
                            <td class="align-middle">{{ date('D, d F Y', strtotime($user->created_at)) }}</td>
                            <td class="align-middle"><button class="action-edit btn btn-primary"
                                    data-id="{{ $user->id }}">Edit</button>
                                <button class="action-delete btn btn-danger" data-id="{{ $user->id }}"">Delete</button>
                                    </td>
                                 </tr>
     @endforeach
                </tbody>
            </table>
            {{ $users->links('vendor.pagination.bootstrap-4') }}
        </div>
    </div>
@endsection
