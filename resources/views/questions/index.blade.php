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
                        <strong>{{$question->answers_count}}</strong> {{str_plural('answer', $question->answers_count)}}
                    </div>
                    <div class="view">
                        <strong>{{$question->views . " " . str_plural('view', $question->views)}}</strong>
                    </div>
                </div>
                <div class="media-body">
                    <div class = "d-flex align-items-center">
                        <h3><a href="{{$question->url}}">{{$question->title}}</a></h3>
                        <div class = "ml-auto d-flex">
                            <!--policy validation with new syntax-->
                            @can('update', $question)
                                <a href = "{{route('questions.edit', $question->id)}}" class = "btn btn-sm btn-outline-info">Edit</a>
                            @endcan
                            <!--gate validation-->
                            @can('delete-question', $question))
                                <form class = "delete-question-form" method = "post" action = "{{route('questions.destroy', $question->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <button class = "btn btn-sm btn-outline-danger" onclick = "return confirm('Are you sure?')">Delete</button>
                                </form>
                            @endcan
                        </div>
                    </div>
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