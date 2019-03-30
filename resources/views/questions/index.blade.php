@extends('layouts.app')
@section('content')
<h1>My cool questions</h1>

<div class="container">
    @foreach($questions as  $question)
        <div class="card">
            <div class="card-body">
                <h3><a href = "{{$question->url}}">{{$question->title}}</a></h3>
                <p class = "lead">
                    Asked by
                    <a href = "{{$question->user->url}}">{{$question->user->name}}</a>
                    <small class = "text-muted">{{$question->created_date}}</small>
                </p>
                {{str_limit($question->body, 250)}}
            </div>
        </div>
        <hr>
    @endforeach
    {{$questions->links()}}
</div>
@endsection

