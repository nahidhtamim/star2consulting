<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class TestimonialControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewTestimonials(){
        $testimonials = Testimonial::all();
        return view('admin.testimonial.view-testimonials', compact('testimonials'));
    }

    public function saveTestimonial(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        
        $testimonial = new Testimonial();
        $testimonial->name = $request->input('name');
        $testimonial->designation_company = $request->input('designation_company');
        $testimonial->description = $request->input('description');
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/review/', $fileName);
            $testimonial->img = $fileName; 
        }
        $testimonial->status = $request->input('status')==true ? '1':'0';
        $testimonial->save();
        return redirect()->back()->with('status', 'Your Testimonial has been saved');
    }

    public function editTestimonial($id){
        $testimonial = Testimonial::Find($id);
        return view('admin.testimonial.edit-testimonial', compact('testimonial'));
    }

    public function updateTestimonial(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'description' => 'required',
        ));
        $testimonial = Testimonial::Find($id);
        $testimonial->name = $request->input('name');
        $testimonial->designation_company = $request->input('designation_company');
        $testimonial->description = $request->input('description');
        if($request->hasfile('img'))
        {
            $destination = 'upload/review/'.$testimonial->img;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/review/', $fileName);
            $testimonial->img = $fileName; 
        }
        $testimonial->update();
        return redirect('/admin/view-testimonials')->with('status', 'Your Testimonial item has been updated');
    }

    public function deleteTestimonial($id){
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->back()->with('status', 'Testimonial Activated');
    }

    public function activeTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->status = '1';
        $testimonial->update();
        return redirect()->back()->with('status', 'Testimonial Activated');
    }

    public function deactiveTestimonial($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->status = '0';
        $testimonial->update();
        return redirect()->back()->with('warning', 'Testimonial De-activated');
    }
}
