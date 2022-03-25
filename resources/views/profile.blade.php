@extends('layout.master')
@section('headDependencies')
    <link rel="stylesheet" href="/css/dashboard.css">
    <link rel="stylesheet" href="/css/login.css">
    <link rel="stylesheet" href="/css/swal/sweetalert2.min.css">
    <script src="/js/swal/sweetalert2.all.min.js"></script>
@endsection
@section('bodyDependencies')
    <script src="/js/userAction.js"></script>
    <script src="/js/swal/sweetalert2.min.js"></script>
@endsection
@section('title', 'Dashboard')
@section('content')
<div class="container-login">
    <div class="card me-auto ms-auto px-5 py-2" style="min-width: 40%">
            <div class="form-element">
                <p class="form-title">EDIT PROFILE</p>
            </div>
            <div class="form-element">
                <label for="email">Email</label>
                <input type="email" name="email" placeholder="Email" value="{{$user->email}}">
            </div>
            <div class="form-element">
                <label for="Name">Name</label>
                <input type="text" name="name" placeholder="Name" value="{{$user->name}}">
            </div>
            <div class="form-element">
                <label for="password">New Password</label>
                <input type="password" name="password" placeholder="Password" value="{{$user->password}}">
            </div>
            <div class="form-element">
                <label for="password2">Confirm Password</label>
                <input type="password" name="password2" placeholder="Password" value="{{$user->password}}">
            </div>
            <div class="form-element checkbox">
                <input type="checkbox" name="show-password" id="show-password">Show password
            </div>
            <div class="form-element action">
                <input id="updateProfile" data-id="{{$user->id}}" type="submit" name="submit" value="Update" onclick="updateProfile">
            </div>
    </div>
</div>
@endsection
