@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-bold text-lg">Blog</span>
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
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <td scope="row">{{ $key + 1 }}</td>
                                                <td>{{ $blog->user->name }}</td>
                                                <td>{{ $blog->user->email }}</td>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->description }}</td>
                                                <td>
                                                    <img src="{{ asset($blog->image) }}" alt="" height="50px"
                                                        width="50px">
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
