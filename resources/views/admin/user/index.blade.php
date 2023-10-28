@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-bold text-lg">User</span>
                    </div>
                    <div class="card-body">
                        @if (session()->has('success'))
                            <h5 class="alert alert-success message">{{ session('success') }}</h5>
                        @endif
                        <div class="tab-content rounded-bottom">
                            <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $key => $user)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->status == 1)
                                                        <a href="{{ route('admin.users.changeStatus', [$user->id]) }}"
                                                            class="btn btn-primary" rel="noopener noreferrer">Active</a>
                                                    @else
                                                        <a href="{{ route('admin.users.changeStatus', [$user->id]) }}"
                                                            class="btn btn-danger" rel="noopener noreferrer">Inactive</a>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
