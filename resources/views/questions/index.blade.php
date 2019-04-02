@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class = "d-flex align-items-center">
                <h2>My cool questions</h2>
                <div class = "ml-auto">
                    <a href = "{{route('questions.create')}}" class = "btn btn-outline-secondary">Ask Question</a>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            @include('layouts._messages')
            @foreach($questions as $question)
            <div class="media">
                <div class="d-flex flex-column counters">
                    <div class="votes">
                        <strong>{{ $question->votes }}</strong> {{str_plural('vote', $question->votes)}}
                    </div>
                    <div class="status {{$question->status}}">
                        <strong>{{$question->answers}}</strong> {{str_plural('answer', $question->votes)}}
                    </div>
                    <div class="view">
                        <strong>{{$question->views . " " . str_plural('view', $question->views)}}</strong>
                    </div>
                </div>
                <div class="media-body">
                    <h3><a href="{{$question->url}}">{{$question->title}}</a></h3>
                    <p class="lead">
                        Asked by
                        <a href="{{$question->user->url}}">{{$question->user->name}}</a>
                        <small class="text-muted">{{$question->created_date}}</small>
                    </p>
                    {{str_limit($question->body, 250)}}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <hr>
    {{$questions->links()}}
</div>
@endsection 