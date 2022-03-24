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
            <form id="search-form" action="/userlist/search" method="GET"
                class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3 d-flex w-100">
                {{-- @csrf --}}
                <input type="search" name="q" class="form-control form-control-light" placeholder="Name or Email"
                    aria-label="Search">
                <button type="submit" class="btn btn-primary ms-2"><a class="text-muted" href="#"><svg class="bi" width="18"
                    height="18">
                    <use xlink:href="#search-icon"></use>
                </svg></a></button>
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
    <tr><td colspan=5 class="align-middle text-center">No user</td></tr>
@endif
@foreach ($users as $user)
    <tr>
        <td class="align-middle">{{ $loop->iteration }}</td>
        <td class="align-middle">{{ $user->name }}</td>
        <td class="align-middle">{{ $user->email }}</td>
        <td class="align-middle">{{ date('D, d F Y', strtotime($user->created_at)) }}</td>
        <td class="align-middle">
            <button class="action-edit btn btn-primary" data-id="{{ $user->id }}">
                <a class="text-muted" href="#"><svg class="bi" width="18"
                    height="18">
                    <use xlink:href="#edit-icon"></use>
                </svg></a>
            </button>
            <button class="action-delete btn btn-danger" data-id="{{ $user->id }}"">
                <a class="text-muted" href="#"><svg class="bi" width="18"
                    height="18">
                    <use xlink:href="#delete-icon"></use>
                </svg></a>
            </button>
        </td>
    </tr>
@endforeach
        </tbody>
        </table>
    </div>
    </div>
    <div class="container">
        {{ $users->links('vendor.pagination.bootstrap-4') }}
    </div>

    {{-- icons below --}}
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="search-icon" viewBox="0 0 32 32">
            <path  fill="white" d="M27.414,24.586l-5.077-5.077C23.386,17.928,24,16.035,24,14c0-5.514-4.486-10-10-10S4,8.486,4,14  s4.486,10,10,10c2.035,0,3.928-0.614,5.509-1.663l5.077,5.077c0.78,0.781,2.048,0.781,2.828,0  C28.195,26.633,28.195,25.367,27.414,24.586z M7,14c0-3.86,3.14-7,7-7s7,3.14,7,7s-3.14,7-7,7S7,17.86,7,14z"/>
        </symbol>
        <symbol id="edit-icon" viewBox="0 0 20 20">
            <path  fill="white" d="M11 9.27V0l6 11-4 6H7l-4-6L9 0v9.27a2 2 0 1 0 2 0zM6 18h8v2H6v-2z"/>
        </symbol>
        <symbol id="delete-icon" viewBox="0 0 32 32">
            <path fill="white" d="M27,6h-6V5c0-1.654-1.346-3-3-3h-4c-1.654,0-3,1.346-3,3v1H5C3.897,6,3,6.897,3,8v1c0,0.552,0.448,1,1,1h24  c0.552,0,1-0.448,1-1V8C29,6.897,28.103,6,27,6z M13,5c0-0.551,0.449-1,1-1h4c0.551,0,1,0.449,1,1v1h-6V5z" id="XMLID_246_"/>
            <path fill="white" d="M6,12v15c0,1.654,1.346,3,3,3h14c1.654,0,3-1.346,3-3V12H6z M19.707,22.293  c0.391,0.391,0.391,1.023,0,1.414s-1.023,0.391-1.414,0L16,21.414l-2.293,2.293c-0.391,0.391-1.023,0.391-1.414,0  s-0.391-1.023,0-1.414L14.586,20l-2.293-2.293c-0.391-0.391-0.391-1.023,0-1.414s1.023-0.391,1.414,0L16,18.586l2.293-2.293  c0.391-0.391,1.023-0.391,1.414,0s0.391,1.023,0,1.414L17.414,20L19.707,22.293z"/>
        </symbol>
    </svg>
@endsection
