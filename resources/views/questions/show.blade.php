@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class = "card-body">
            <div class="card-title">
                <div class = "d-flex align-items-center">
                    <h1>{{$question->title}}</h1>
                    <div class = "ml-auto">
                        <a href = "{{route('questions.index')}}" class = "btn btn-outline-secondary">Back to all Questions</a>
                    </div>
                </div>
            </div>

            <hr>

            <div class="media">
                <div class = "d-flex flex-column vote-controles">
                    <a title = "This question is useful" class = "vote-up">
                        <!--fontawesome not working-->
                        Vote Up
                    </a>
                    <span class = "votes-count">123</span>
                    <a title = "This question is not useful" class = "vote-down off">
                        <!--fontawesome-->
                        Vote Down
                    </a>
                    <a title = "Click to mark as favorite question (click again to undo)" class = "favorite">
                        <!--fontawesome-->
                        Favorite
                        <span class = "favorite-count">4</span>
                    </a>
                </div>
                <div class = "media-body">
                {!! $question->body_html !!}
                    <div class = "float-right">
                        <span class = "text-muted">Asked {{$question->created_date}}</span>
                        <div class = "media mt-2">
                            <a href = "{{$question->user->url}}" class = "pr-2">
                                <img src = "{{$question->user->avatar}}" style = "width: 32px;border-radius: 5px;">
                            </a>
                            <div class = "media-body mt-1">
                                <a href = "{{$question->user->url}}">{{$question->user->name}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>

    <div class = "row mt-4">
        <div class = "col-md-12">
            <div class = "card">
                <div class = "card-body">
                    <div class = "card-title">
                        <h2>{{$question->answers_count . " " . str_plural('Answer', $question->answer_count)}}</h2>
                    </div>
                    <hr>
                    @foreach($question->answers as $answer)
                        <div class = "media">
                            <div class = "media-body">
                                {!! $answer->body_html !!}
                                <div class = "float-right">
                                    <span class = "text-muted">Answered {{$answer->created_date}}</span>
                                    <div class = "media mt-2">
                                        <a href = "{{$answer->user->url}}" class = "pr-2">
                                            <img src = "{{$answer->user->avatar}}" style = "width: 32px;border-radius: 5px;">
                                        </a>
                                        <div class = "media-body mt-1">
                                            <a href = "{{$answer->user->url}}">{{$answer->user->name}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection 