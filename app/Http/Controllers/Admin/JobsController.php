<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class JobsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewJobs(){
        $jobs = job::all();
        return view('admin.job.view-jobs', compact('jobs'));
    }

    public function saveJob(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        
        $job = new job();
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->keywords = $request->input('keywords');
        $job->slug = Str::slug($request->input('name'));
        $job->status = $request->input('status')==true ? '1':'0';
        $job->save();
        return redirect()->back()->with('status', 'Your job has been saved');
    }

    public function editJob($id){
        $job = job::Find($id);
        return view('admin.job.edit-job', compact('job'));
    }

    public function updateJob(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        $job = job::Find($id);
        $job->name = $request->input('name');
        $job->description = $request->input('description');
        $job->keywords = $request->input('keywords');
        $job->slug = Str::slug($request->input('name'));
        $job->update();
        return redirect('/admin/view-jobs')->with('status', 'Your job item has been updated');
    }

    public function deleteJob($id){
        $job = Job::Find($id);
        $job->delete();
        return redirect('/view-jobs')->with('status', 'Your job item has been deleted');
    }

    public function activeJob($id)
    {
        $job = Job::find($id);
        $job->status = '1';
        $job->update();
        return redirect()->back()->with('status', 'Job Activated');
    }

    public function deactiveJob($id)
    {
        $job = Job::find($id);
        $job->status = '0';
        $job->update();
        return redirect()->back()->with('warning', 'Job De-activated');
    }
}
