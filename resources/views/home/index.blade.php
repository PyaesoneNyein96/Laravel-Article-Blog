@extends('layouts.app')

@section('content')
    <div class="container">
        {{ $datas->links() }}

        @if (session('del-info'))
            <div class="mx-auto alert alert-info text-center">
                <b>{{ session('del-info') }}</b>
            </div>
        @endif
        <div class="row">
            @foreach ($datas as $hf)
                <div class="card col-md-6 mb-3">
                    <div class="card-body">
                        <div class="card-body">
                            <div class="card-title">
                                <h4>
                                    {{ $hf->name }}
                                </h4>
                            </div>
                            <div class="card-subtitle">
                                <div class="small text-muted">
                                    &#x02666; {{ $hf->created_at->diffForHumans() }},<br>
                                    ID: {{ $hf->id }}
                                </div>
                            </div>
                            <div class="card-category">
                                <div class="text-muted">
                                    Category: <b>{{ $hf->category->name }}</b>
                                </div>
                            </div>
                            <div class="card-text">
                                {{ $hf->content }},
                                <div>
                                    By: <b>{{ $hf->user->name }}</b>
                                </div>
                            </div>
                            <a type="button" class="btn btn-outline-primary mt-3 position-relative"
                                href="{{ url("/feed/detail/$hf->id") }}">
                                More Detail &#x027EB;
                                <span
                                    class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                                    {{ count($hf->comments) }}
                                </span>
                            </a>

                        </div>

                    </div>
                </div>
            @endforeach

        </div>



    </div>
@endsection
