@extends('layouts.app')

@section('title','Edit Task')
@section('styles')
<style>
.error-message {
    color: red;
    font-size: 0.8rem;
}
</style>
@endsection

@section('content')
<form method="POST" action="{{ route('tasks.update',['task'=> $task->id]) }}">
    <!-- cross site attacks protection below ,its a middleware   -->
    @csrf
    @method('PUT')
    <div>
        <label for="title">
            Title
        </label>
        <input type="text" name="title" id="title" value="{{old('title')}}" />
        @error('title')
        <p class="error-message">*{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="description">
            Description
        </label>
        <textarea type="text" name="description" id="description" rows="5">{{ old('description')}}</textarea>
        @error('description')
        <p class="error-message">*{{ $message }}</p>
        @enderror
    </div>
    <div>
        <label for="long_description">
            Long Description
        </label>
        <textarea type="text" name="long_description" id="long_description"
            rows="10">{{ old('long_description')}}</textarea>
        @error('long_description')
        <p class="error-message">*{{ $message }}</p>
        @enderror
    </div>
    <div>
        <button type="submit">Edit Task</button>
    </div>
</form>
@endsection