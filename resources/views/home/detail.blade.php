@extends('layouts.app')

@section('content')
    <div class="container">

        <div class="card">


            <div class="card-body">
                <div class="card-title">
                    <h4>
                        {{ $feedDetail->name }}
                    </h4>
                </div>
                <div class="card-subtitle">
                    <div class="small text-muted">
                        {{ $feedDetail->created_at->diffForHumans() }}
                    </div>
                </div>
                <div class="card-category">
                    Category: <b>{{ $feedDetail->category->name }}</b>
                </div>
                <div class="card-text mb-3">
                    {{ $feedDetail->content }},
                    <div>
                        By: <b>{{ $feedDetail->user->name }}</b>
                    </div>

                </div>
                <a href="{{ url("/feed/delete/$feedDetail->id") }}" class="btn btn-warning">
                    Delete
                </a>
            </div>
        </div>

        <ul class="my-2 list-group">
            <li class="list-group-item">
                <b>Comment: {{ count($feedDetail->comments) }}</b>
            </li>
            @foreach ($feedDetail->comments as $cmt)
                <li class="list-group-item mt-2">
                    @if (Gate::allows('article-del',$cmt))
                    <a href="{{ url("detail/delete/$cmt->id") }}" class="btn-close float-end mt-auto"></a>
                    @endif


                    {{ $cmt->content }},
                    <div> By: <b>{{$cmt->user->name}}</b></div>

                </li>
            @endforeach
        </ul>
        @auth

            <form method="post" action="{{ url('detail/cmtadd') }}">
                @csrf
                <input type="hidden" value="{{ $feedDetail->id }}" name="homefeed_id">
                <input type="text" name="content" class="form-control" placeholder="New Comment">
                <input type="submit" class="btn btn-primary my-2" value="Add Comment">
            </form>
        @endauth




    </div>
@endsection
