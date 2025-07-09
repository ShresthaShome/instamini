@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <img src="{{ asset('storage/' . $post->image_path) }}" class="w-100" />
            </div>
            <div class="col-md-4">
                <div class="d-flex align-items-center mb-3">
                    @if ($post->user)
                        <img src="{{ $post->user->profile_image ? asset('storage/' . $post->user->profile_image) : 'https://via.placeholder.com/40' }}"
                            alt="" class="rounded-circle me-3" style="width: 40px; height: 40px;">

                        <a href="{{ route('profile.show', $post->user->id) }}" class="text-dark text-decoration-none">
                            <strong>{{ $post->user->username }}</strong>
                        </a>

                        @if (auth()->id() === $post->user_id)
                            <div class="dropdown ms-auto">
                                <button class="btn btn-link text-dark" type="button" id="postOptions"
                                    data-bs-toggle="dropdown">
                                    <i class="fas fa-ellipsis-v"></i>
                                </button>

                                <ul class="dropdown-menu" aria-labelledby="postOptions">
                                    <li><a href="{{ route('posts.edit', $post->id) }}" class="dropdown-item">Edit</a></li>

                                    <li>
                                        <form action="{{ route('posts.destroy') }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">Delete</button>
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        @endif
                    @else
                        <img src="https://via.placeholder.com/40" alt=""
                            class="rounded-circle me-3 w-[40px] h-[40px]">

                        <span class="text-muted">Deleted User</span>
                    @endif
                </div>

                @if ($post->user)
                    <p><strong>{{ $post->user->username }}</strong> {{ $post->caption }}</strong></p>
                @else
                    <p>{{ $post->caption }}</p>
                @endif
            </div>
        </div>
    </div>
@endsection
