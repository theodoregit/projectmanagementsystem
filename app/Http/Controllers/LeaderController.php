<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Tasks;
use App\User;
use App\UpdateTaskStatus;
use Auth;

class LeaderController extends Controller
{
    public function index(){
        $projects = Projects::where('teamleader', Auth::user()->name)->get();
        return view('leader.dashboard')->with('projects', $projects);
    }

    public function myProjects(){
        // $projects = Projects::where('teammembers', 'LIKE', '%'.Auth::user()->name.'%')->where('status', 'active')->get();
        $projects = Projects::where('teamleader', Auth::user()->name)->where('status', 'active')->get();

        return view('leader.my-projects')->with('projects', $projects);
    }

    public function openProject($id){
        $project = Projects::where('projecttitle', $id)->get();
        $teammembers = $project->pluck('teammembers');
        $teammembers = str_replace(',', '', $teammembers);
        $teammembers = str_replace('"', '', $teammembers);
        $teammembers = str_replace('[', '', $teammembers);
        $teammembers = str_replace(']', '', $teammembers);
        // echo $teammembers . '<br>';
        $names = array();
        for ($i=1; $i <= User::all()->count(); $i++) {
            $name = User::where('id', $i)->pluck('name');
            $name = str_replace('"', '', $name);
            $name = str_replace('[', '', $name);
            $name = str_replace(']', '', $name);
            // echo $name . '<br>';
            if(str_contains($teammembers, $name)){
               array_push($names, $name);
            }
            else{
                // echo 'none';
            }
        }      
        return view('leader.project')
                        ->with('teammembers', $names)
                        ->with('tasks', Tasks::where('projecttitle', $id)->get())
                        ->with('project', $project)
                        ->with('projects', $project);
    }

    public function createTask(Request $request)
    {
        // dd($request->all());
        $task = Tasks::create([
            'projecttitle' => $request->projecttitle,
            'taskname' => $request->taskname,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'personincharge' => $request->personincharge,
            'weight' => $request->weight,
            'description' => $request->description,
        ]);

        $project_weight = Projects::where('projecttitle', $request->projecttitle)->pluck('totalweight');
        $project_weight = $project_weight[0] + $request->weight;
        $project = Projects::where('projecttitle', $request->projecttitle)->update(['totalweight' => $project_weight]);
        return redirect()->back();
    }

    public function editTask($id){
        $task = Tasks::where('taskname', $id)->first();
        $person_in_charge = $task->personincharge;
        $updates = UpdateTaskStatus::where('taskname', $id)->where('personincharge', 'LIKE', '%'.$person_in_charge.'%')->get();
        // dd($updates->all());

        $project = Projects::where('projecttitle', $task->projecttitle)->get();
        $teammembers = $project->pluck('teammembers');
        $teammembers = str_replace(',', '', $teammembers);
        $teammembers = str_replace('"', '', $teammembers);
        $teammembers = str_replace('[', '', $teammembers);
        $teammembers = str_replace(']', '', $teammembers);
        // echo $teammembers . '<br>';
        $names = array();
        for ($i=1; $i <= User::all()->count(); $i++) {
            $name = User::where('id', $i)->pluck('name');
            $name = str_replace('"', '', $name);
            $name = str_replace('[', '', $name);
            $name = str_replace(']', '', $name);
            // echo $name . '<br>';
            if(str_contains($teammembers, $name)){
               array_push($names, $name);
            }
            else{
                // echo 'none';
            }
        }

        return view('leader.edit-task')
                            ->with('teammembers', $names)
                            ->with('updates', $updates)
                            ->with('task', $task);
    }

    public function updateTask(Request $request){
        $update = Tasks::where('taskname', $request->taskname)->update([
            'taskname' => $request->taskname,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'personincharge' => $request->personincharge,
            'weight' => $request->weight,
            'description' => $request->description,
        ]);

        return redirect()->back();
    }

    public function markTask(Request $request){
        $mark = Tasks::where('taskname', $request->taskname)->update([
            'status' => 'completed'
        ]);
        return redirect()->back();
    }
}
