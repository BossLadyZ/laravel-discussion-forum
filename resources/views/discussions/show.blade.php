@extends('layouts.app')

@section('content')
    <div class="card">
        @include('partials.discussion-header')
        <div class="card-body">
            <strong class="">{{ $discussion->title }}</strong>
            <hr>

            {!! $discussion->content !!}
            @if ($discussion->bestReply)
                <div class="card card-success">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        {{ $discussion->bestReply->content }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    @foreach ($discussion->replies()->paginate(3) as $reply)
        <div class="card my-5">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div class="">
                        <img width="40px" height="40px" style="border-radius: 50%" src="{{ asset('images/user.png') }}"
                            alt="">
                        <strong class="ml-2">{{ $reply->owner->name }}</strong>
                    </div>
                    <div class="">
                        @if (auth()->user()->id === $discussion->user_id)
                            <form
                                action="{{ route('discussion.best-reply', ['discussion' => $discussion->slug, 'reply' => $reply->id]) }}"
                                method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-primary">Mark as Best</button>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
            <div class="card-body">
                {!! $reply->content !!}

            </div>
        </div>

        {{ $discussion->replies()->paginate(3)->links() }}
    @endforeach
    <div class="card my-5">
        <div class="card-header">
            Add a reply
        </div>
        @auth()
            <div class="card-body">
                <form action="{{ route('replies.store', $discussion->slug) }}" method="POST">
                    @csrf
                    <input type="hidden" name="content" id="content">
                    <trix-editor input="content"></trix-editor>
                    <button class="btn btn-success btn-sm my-2" type="submit"> Add Reply</button>
                </form>
            </div>
        @else
            <div class="card-body">
                <a href="{{ route('login') }}" class="btn btn-info">Sign In to Add a Reply</a>
            </div>
        </div>
    @endauth
@endsection

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.css"
        integrity="sha512-CWdvnJD7uGtuypLLe5rLU3eUAkbzBR3Bm1SFPEaRfvXXI2v2H5Y0057EMTzNuGGRIznt8+128QIDQ8RqmHbAdg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection

@section('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.3.1/trix.js"
        integrity="sha512-/1nVu72YEESEbcmhE/EvjH/RxTg62EKvYWLG3NdeZibTCuEtW5M4z3aypcvsoZw03FAopi94y04GhuqRU9p+CQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endsection
