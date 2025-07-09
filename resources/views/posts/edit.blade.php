@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit Post</div>

                    <div class="card-body">
                        <form action="{{ route('posts.update', $post->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="caption" class="form-label">Caption</label>
                                <textarea name="caption" id="caption" rows="3"
                                    class="form-control @error('caption') is-invalid
                                @enderror">{{ old('caption', $post->caption) }}</textarea>
                                @error('caption')
                                    <div class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">
                                    Update Post</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
