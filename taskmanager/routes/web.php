<?php
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use     App\Models\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',function (){
    return redirect()->route('tasks.index');
});

Route::get('/tasks', function (){
    return view('index', [
        'tasks' =>Task::latest()->get()
    ]);
})->name('tasks.index');

Route::view('tasks/create','create')
->name('tasks.create');

Route::get('/tasks/{id}', function ($id)  {
return view('show',[
    'task'=>Task::findOrFail($id)
]);

})->name('tasks.show');

Route::post('/tasks',function(Request $request){
    $data = $request->validate([
        'title' => 'required|max:255',
        'description' => 'required',
        'long_description' => 'required',
    ]);

    $task = new Task;
    $task->title = $data['title'];
    $task->description = $data['description'];
    $task->long_description = $data['long_description'];
    $task->save();
    return redirect()->route('tasks.show',['id'=>$task->id])
    // add a flash message of success ,which only appears once
    ->with('success','Task created successfully!');
})->name('tasks.store');