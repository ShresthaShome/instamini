@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-cintent-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create New Post</div>

                    <div class="card-body">
                        <form action="{{ route('posts.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <textarea name="caption" class="form-control @error('caption') is-invalid @enderror" id="caption">{{ old('caption') }}</textarea>
                                @error('caption')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="image" class="form-label">Image</label>
                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror" id="image" />
                                @error('image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                @enderror
                            </div>

                            <div class="mb-3"><button class="btn btn-primary" type="submit">Post</button></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
