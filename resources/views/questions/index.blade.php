@extends('layouts.app')
@section('content')
<h1>My cool questions</h1>

<div class="container">
    @foreach($questions as  $question)
        <div class="card">
            <div class="card-body">
                <h3>{{$question->title}}</h3>
                {{str_limit($question->body, 250)}}
            </div>
        </div>
        <hr>
    @endforeach
    {{$questions->links()}}
</div>
@endsection

