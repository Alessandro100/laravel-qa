@extends('layouts.app')
@section('content')

<div class="container">
    <div class="card">
        <div class="card-header">
            <div class = "d-flex align-items-center">
                <h2>Edit Question</h2>
                <div class = "ml-auto">
                    <a href = "{{route('questions.index')}}" class = "btn btn-outline-secondary">Back to all Questions</a>
                </div>
            </div>
            
        </div>
        <div class="card-body">
            <!--forms are linked through name-->
            <form action = "{{route('questions.update', $question->id)}}" method ="post">
                {{method_field("PUT")}}
                @include("questions._form", ['buttonText' => "Update Question"])
            </form>
        </div>
    </div>

</div>
@endsection 