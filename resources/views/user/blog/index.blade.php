@extends('layouts.app')

@section('content')
    <div class="container-fluid pt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <span class="text-bold text-lg">Blog</span>
                        <a href="{{ route('user.blog.create') }}" class="btn btn-primary btn-sm ml-5" style="float:right">Add Blog</a>

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
                                            <th scope="col">Title</th>
                                            <th scope="col">Description</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($blogs as $key => $blog)
                                            <tr>
                                                <th scope="row">{{ $key + 1 }}</th>
                                                <td>{{ $blog->title }}</td>
                                                <td>{{ $blog->description }}</td>
                                                <td>
                                                    <img src="{{ asset($blog->image) }}" alt="" height="50px"
                                                        width="50px">
                                                </td>
                                                <td>
                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                        <a href="{{ route('user.blog.edit', [$blog->id]) }}"
                                                            class="btn btn-primary btn-sm user_btn"><i
                                                                class="fa fa-eye"></i></a>

                                                        <a href="{{ route('user.blog.delete', [$blog->id]) }}"
                                                            class="delete-confirm  btn btn-danger btn-sm ml-1"><i
                                                                class="fa fa-trash" aria-hidden="true"></i></a>
                                                    </div>
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
