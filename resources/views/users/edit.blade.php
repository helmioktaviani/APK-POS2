@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<h4>Edit User</h4>

<from action="{{ route('admin.users.update', $user) }}" method="post">
@include('users._form')
</from>
@endsection