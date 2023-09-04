<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Task::whereDate('deadline',today())->get();
        $upcoming = Task::whereDate('deadline','>',today())->get();
        $older = Task::whereDate('deadline','<',today())->get();
        return view('dashboard.task.index',compact('today','upcoming','older'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $input = $request->validate([
            'title' => 'required',
            'details'   => 'required',
            'deadline'  => 'nullable',
            'alert'     => 'nullable',
            'type'      => 'nullable'
        ]);
        $input['deadline'] = Carbon::parse($request->deadline);
        $input['alert'] = Carbon::parse($request->alert);
      $task =  Task::create($input);
      if($request->employee_id){
      foreach($request->employee_id as $emp)
      {
        $task->employees()->create([
            'employee_id'   => $emp,
            'due_date'  =>  $input['deadline']
        ]);
      }
      }
        return redirect()->route('task.show',$task->id)->with('success', 'Task Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        return view('dashboard.task.view',compact('task'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        return view('dashboard.task.edit', compact('task'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        $input = $request->validate([
            'title' => 'nullable',
            'details'   => 'nullable',
            'deadline'  => 'nullable',
            'alert'     => 'nullable',
            'status'    => 'nullable',
            'type'      => 'nullable'
        ]);
        $task->update($input);
        if ($request->employee_id) {
        foreach ($request->employee_id as $emp) {
            if($task->employees->where('employee_id', $emp)->first())
            {

            }
            else{
                 $task->employees()->create([
                'employee_id'   => $emp,
                'due_date'  =>  $input['deadline']
            ]);
            }

        }
        }
        return redirect()->back()->with('success', 'Task Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {
       $task->delete();
        return redirect()->route('task.index')->with('success', 'Task Deleted Successfully');
    }
}
