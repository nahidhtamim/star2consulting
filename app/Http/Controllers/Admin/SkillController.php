<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewSkills(){
        $skills = Skill::all();
        return view('admin.skill.view-skills', compact('skills'));
    }

    public function saveSkill(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ));
        
        $skill = new Skill();
        $skill->title = $request->input('title');
        $skill->icon = $request->input('icon');
        $skill->description = $request->input('description');
        $skill->type = $request->input('type');
        $skill->status = $request->input('status')==true ? '1':'0';
        $skill->save();
        return redirect()->back()->with('status', 'Your skill has been saved');
    }

    public function editSkill($id){
        $skill = Skill::Find($id);
        return view('admin.skill.edit-skill', compact('skill'));
    }

    public function updateSkill(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'icon' => 'required',
            'description' => 'required',
        ));
        $skill = Skill::Find($id);
        $skill->title = $request->input('title');
        $skill->icon = $request->input('icon');
        $skill->description = $request->input('description');
        $skill->type = $request->input('type');
        $skill->update();
        return redirect('/admin/view-skills')->with('status', 'Your skill item has been updated');
    }

    public function deleteSkill($id){
        $skill = Skill::Find($id);
        $skill->delete();
        return redirect('/admin/view-skills')->with('status', 'Your skill item has been deleted');
    }

    public function activeSkill($id)
    {
        $skill = Skill::find($id);
        $skill->status = '1';
        $skill->update();
        return redirect()->back()->with('status', 'Skill Activated');
    }

    public function deactiveSkill($id)
    {
        $skill = Skill::find($id);
        $skill->status = '0';
        $skill->update();
        return redirect()->back()->with('warning', 'Skill De-activated');
    }
}
