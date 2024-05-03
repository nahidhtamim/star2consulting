<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Faculty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FacultyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewFaculties(){
        $faculties = Faculty::all();
        return view('admin.image.view-faculties', compact('faculties'));
    }

    public function saveFaculty(Request $request)
    {
        $this->validate($request, array(
            'img' => 'required',
        ));
        
        $faculty = new Faculty();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/faculty/', $fileName);
            $faculty->img = $fileName; 
        }
        $faculty->save();
        return redirect()->back()->with('status', 'Your Faculty has been saved');
    }

    public function deleteFaculty($id){
        $faculty = Faculty::find($id);
        $faculty->delete();
        return redirect()->back()->with('status', 'Faculty Deleted');
    }
}
