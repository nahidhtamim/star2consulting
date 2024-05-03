<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SliderControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewSliders(){
        $sliders = Slider::all();
        return view('admin.slider.view-sliders', compact('sliders'));
    }

    public function saveSlider(Request $request)
    {
        $this->validate($request, array(
            'key_point' => 'required',
            'title' => 'required',
            'description' => 'required',
            'image' => 'required',
        ));
        
        $slider = new Slider();
        $slider->key_point = $request->input('key_point');
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/slider/', $fileName);
            $slider->image = $fileName; 
        }
        $slider->status = $request->input('status')==true ? '1':'0';
        $slider->save();
        return redirect()->back()->with('status', 'Your slider has been saved');
    }

    public function editSlider($id){
        $slider = Slider::Find($id);
        return view('admin.slider.edit-slider', compact('slider'));
    }

    public function updateSlider(Request $request, $id)
    {
        $this->validate($request, array(
            'key_point' => 'required',
            'title' => 'required',
            'description' => 'required',
        ));
        $slider = Slider::Find($id);
        $slider->key_point = $request->input('key_point');
        $slider->title = $request->input('title');
        $slider->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $destination = 'upload/slider/'.$slider->image;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/slider/', $fileName);
            $slider->image = $fileName; 
        }
        $slider->update();
        return redirect('/admin/view-sliders')->with('status', 'Your slider item has been updated');
    }

    public function deleteSlider($id){
        $slider = Slider::Find($id);
        $slider->delete();
        return redirect('/admin/view-sliders')->with('status', 'Your slider item has been deleted');
    }

    public function activeSlider($id)
    {
        $slider = Slider::find($id);
        $slider->status = '1';
        $slider->update();
        return redirect()->back()->with('status', 'Slider Item Activated');
    }

    public function deactiveSlider($id)
    {
        $slider = Slider::find($id);
        $slider->status = '0';
        $slider->update();
        return redirect()->back()->with('warning', 'Slider Item De-activated');
    }
}
