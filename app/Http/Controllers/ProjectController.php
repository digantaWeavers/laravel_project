<?php

namespace App\Http\Controllers;

use App\Mail\ProjectCreatedMail;
use App\Models\OtherUser;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\CodeCoverage\Report\Xml\Project as XmlProject;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $managers = OtherUser::where('userrole', 'Manager')->get();
        $projectLists = Project::orderBy('id', 'desc')->get();
        return view('SuperAdmin/projects-add', compact('managers', 'projectLists'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'projectname' => 'required',
            'client_name' => 'required',
            'techonology' => 'required',
            'paymenttype' => 'required',
            'enddate' => 'required',
            'manager_name' => 'required'
        ],[
           'projectname.required' => 'Project Name Should Be Field',
           'client_name.required' => 'Client Name Should Be Field',
           'techonology.required' => 'Techonology Should Be Choosen',
           'paymenttype.required' => 'Payment Type Should Be Choosen',
           'enddate.required' => 'End Date Should Be Field',
           'manager_name.required' => 'Manager Should Be Choosen',
        ]);

        
        $projectId = 'PW' . random_int( 0001, 1000000 );

        $project = new Project();
        $project->projectId = $projectId;
        $project->project_name = $request->projectname;
        $project->client_name = $request->client_name;
        $project->techonology = $request->techonology;
        $project->payment_type = $request->paymenttype;
        $project->enddate = $request->enddate;
        $project->assign_to = $request->manager_name;
        $project->assign_by = $request->assigned_by;
        $project->save();

        // $managerdetails = Project::with('ManagerDetails')->find($project);
        // $details = $managerdetails;

        if($project){
            $details = $project->ManagerDetails;
            $adminDetails = $project->SuperAdminDetails;
            // return $details;
            $to = $details->emailaddress;
            $managerName = $details->fullname;
            $projectName = $request->projectname;
            $clientName = $request->client_name;
            $techonology = $request->techonology;
            $endDate = $request->enddate;
            $superAdminName = $adminDetails[0]['fullname'];
            Mail::to($to)->send(new ProjectCreatedMail($managerName, $projectName, $clientName, $techonology, $endDate, $superAdminName));
            return 1;
        }else{
            // return json_encode(array('status' => 500, 'message' => 'Project Add Unsuccessfull'));
            return 0;
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::with('ManagerDetails')->find($id);
        return $project;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projectEdit = Project::with('ManagerDetails')->find($id);
        return $projectEdit;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'pname' => 'required',
            'cupdatename' => 'required',
            'techupdate' => 'required',
            'paytype' => 'required',
            'finishdate' => 'required',
            'manager' => 'required'
        ],[
           'pname.required' => 'Project Name Should Be Field',
           'cupdatename.required' => 'Client Name Should Be Field',
           'techupdate.required' => 'Techonology Should Be Choosen',
           'paytype.required' => 'Payment Type Should Be Choosen',
           'finishdate.required' => 'End Date Should Be Field',
           'manager.required' => 'Manager Should Be Choosen',
        ]);

        $projectUpdate = Project::find($id);

        $projectUpdate->project_name = $request->pname;
        $projectUpdate->client_name = $request->cupdatename;
        $projectUpdate->techonology = $request->techupdate;
        $projectUpdate->payment_type = $request->paytype;
        $projectUpdate->enddate = $request->finishdate;
        $projectUpdate->assign_to = $request->manager;

        $projectUpdate->save();

        if($projectUpdate){
            return 1;
        }else{
            return 0;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projectDelete = Project::find($id)->delete();
        if($projectDelete){
            return 1;
        }else{
            return 0;
        }
    }
}
