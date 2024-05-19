@extends('layouts.app')

@section('title','List of Tasks')

@section('content')
<div>
    <a href="{{route('tasks.create')}}">Add Task</a>
</div>
@forelse($tasks as $task)
<div>
    <a href="{{ route('tasks.show',['task' =>$task->id])}}">{{ $task ->title}}</a>
</div>
@empty
<div>There are tasks!</div>
@endforelse
@if ($tasks->count())

{{$tasks->links()}}

@endif
@endsection