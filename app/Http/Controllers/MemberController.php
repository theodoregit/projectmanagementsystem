<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Tasks;
use App\UpdateTaskStatus;
use Auth;

class MemberController extends Controller
{
    protected $projecttitle;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.dashboard');
    }

    public function myProjects(){
        $projects = Projects::where('teammembers', 'LIKE', '%'.Auth::user()->name.'%')->get();
        // echo $projects->count();

        return view('member.my-projects')->with('projects', $projects);
    }

    public function myTasks($id){
        $project = Projects::find($id);
        $projecttitle = $project->pluck('projecttitle');
        $username = Auth::user()->name;
        $my_task = Tasks::where('projecttitle', $project->projecttitle)->where('personincharge', $username)->get();
        $weights = Tasks::where('projecttitle', $project->projecttitle)->where('personincharge', $username)->value('weight');

        return view('member.my-tasks')
                            ->with('projecttitle', $project->projecttitle)
                            ->with('weights', $weights)
                            ->with('tasks', $my_task);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $projecttitle)
    {
        $task = Tasks::where('taskname', $id)->first();
        return view('member.update-status')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateTask(Request $request, $id, $projecttitle)
    {        
        $isUpdated = UpdateTaskStatus::where('taskname', $id)->update(['is_last_update' => 0]);
        $updatestatus = UpdateTaskStatus::create([
            'taskname' => $id,
            'personincharge' => Auth::user()->name,
            'accomplishment' => $request->accomplishment ,
            'challenge' => $request->challenge,
            'accomplishedweight' => $request->accomplishedweight,
            'is_last_update' => 1
        ]);
        $updateTask = Tasks::where('taskname', $id)->update(['accomplishedweight' => $request->accomplishedweight]);
        // update accomplished weight
        $accomplishment = Projects::where('projecttitle', $projecttitle)->pluck('accomplishment');
        // echo $accomplishment[0];
        $updateAccomplishment = Projects::where('projecttitle', $projecttitle)->update(['accomplishment' => $accomplishment[0] + $request->accomplishedweight]);

        return redirect()->route('member.my-projects');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
