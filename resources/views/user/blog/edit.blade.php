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
                        <div>
                            @if ($errors->any())
                                <div class="alert alert-danger message">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <form action="{{ route('user.blog.update', [$blog->id]) }}" method="POST" id="blogForm"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-sm-12">
                                    <label>{{ __('Title') }}</label>
                                    <input type="text" class="form-control" placeholder="{{ __('Enter Title') }}"
                                        name="title" value="{{ $blog->title }}">
                                </div>

                                <div class="col-sm-12">
                                    <label for="banner_image">{{ __('Banner') }}</label>
                                    <input type="file" name="banner_image", accept="image/*" id="banner_image"
                                        class="form-control">
                                    <img src="{{ asset($blog->image) }}" alt="" height="50px" width="50px">
                                </div>

                                <div class="col-sm-12">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea maxlength="200" name="description" id="description" class="form-control">{{ $blog->description }}</textarea>
                                </div>

                                <div class="col-sm-12">
                                    <button class="btn btn-primary mt-2">{{ __('Update') }}</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
