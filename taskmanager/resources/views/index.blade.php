<h1>List of Tasks</h1>

<div>
    @forelse($tasks as $task)
    <div>
        <a href="{{ route('tasks.show',['id' =>$task->id])}}">{{ $task ->title}}</a>
    </div>
    @empty
    <div>There are tasks!</div>
    @endforelse


</div>