@extends('layouts.app')

@section('content')
    @foreach ($discussions as $discussion)
        <div class="card">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}"
                            alt="">
                        <strong class="ml-2">{{ $discussion->user->name }}</strong>
                    </div>
                    <div class="">
                        <a href="{{ route('discussion.show', $discussion->slug) }}"
                            class="btn btn-success btn-very-small">View</a>
                    </div>
                </div>
            </div>

            <div class="card-body">
                <strong>{{ $discussion->title }} </strong>
            </div>
        </div>
    @endforeach

    </div>

    {{ $discussions->links() }}
@endsection
