<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Projects;
use App\Tasks;
use App\User;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('project.dashboard');
    }

    public function addProject(){
        return view('project.add-project')
                    ->with('teamleaders', User::all())
                    ->with('teammembers', User::where('role', 2)->pluck('name'));
    }

    public function allProjects(){
        $project = Projects::all();
        $active_projects = Projects::where('status', 'active')->get();
        $completed_projects = Projects::where('status', 'completed')->get();
        $terminated_projects = Projects::where('status', 'terminated')->get();
        return view('project.all-projects')
                                ->with('active_projects', $active_projects)
                                ->with('completed_projects', $completed_projects)
                                ->with('terminated_projects', $terminated_projects)
                                ->with('projects', Projects::all());
    }

    public function viewTasks(){
        $teammembers = Projects::where('id', 1)->pluck('teammembers');
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
        
        
        return view('project.project-tasks')
                    ->with('teammembers', $names)
                    ->with('tasks', Tasks::where('projecttitle', 'Data Centre Gate Management System')->get())
                    ->with('projects', Projects::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createTask(Request $request)
    {
        // dd($request->all());
        $access_request = Tasks::create([
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
        return redirect()->route('project-tasks');
    }

    public function markFlag(Request $request){
        switch ($request->flag) {
            case 'completed':
                $mark_flag = Projects::where('projecttitle', $request->projecttitle)->update(['status' => 'completed']);
                break;
            default:
                $mark_flag = Projects::where('projecttitle', $request->projecttitle)->update(['status' => 'terminated']);
                break;
        }

        return redirect()->route()->back();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $access_request = Projects::create([
            'projecttitle' => $request->projecttitle ,
            'startdate' => $request->startdate,
            'enddate' => $request->enddate,
            'teamleader' => $request->teamleader,
            'teammembers' =>  implode(", ", $request->teammembers),
            'description' => $request->description,
            'fullname' => $request->fullname,
            'phonenumber' => $request->phonenumber,
            'unit' => $request->unit,
            'subunit' => $request->subunit,
        ]);

        //upgrade the role of the team leader
        $leader = User::where('name', $request->teamleader)->update(['role' => 3]);

        return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
