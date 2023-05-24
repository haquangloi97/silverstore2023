@extends('dashboard.master')
@section('body')
    <div class="container">
        <p class="text-uppercase p-2 fs-5 text-center shadow-sm text-white bg-indigo bg-gradient fw-bolder">List of Users</p>
        <table id="example" class="cell-border stripe py-2">
            <thead class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Joined</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td><button type="button" class="btn btn-sm btn-close" title="Delete" data-bs-toggle="modal" data-bs-target="#staticDelete" onclick="TransferId({{ $user->id }})"></button></td>
                    <td><span class="fw-semibold text-success">{{ $user->name }}</span></td>
                    <td><span class="text-primary fw-semibold">{{ $user->email }}</span></td>
                    <td><span class="fw-semibold">@if ($user->role == 1) Admin @else User @endif</span></td>
                    <td><span class="text-dark">{{ $user->created_at->format('M d, Y') }}</span></td>
                </tr>
            @endforeach
            </tbody>
            <tfoot class="text-bg-secondary">
            <tr>
                <th></th>
                <th>Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Joined</th>
            </tr>
            </tfoot>
        </table>
    </div>
@endsection
