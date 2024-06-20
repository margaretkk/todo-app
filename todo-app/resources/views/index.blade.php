@extends('layouts.app')
@section('title')
    My Todo App
@endsection
@section('content')

    <div class="row mt-3">
        <div class="col-12 align-self-center">
            <ul class="list-group">
                @foreach($todo as $singleTodo)
                    <li class="list-group-item"><a href="details/{{$singleTodo->id}}" style="color: cornflowerblue">{{$singleTodo->name}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>

@endsection