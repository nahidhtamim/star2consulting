<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FontSize;
use Illuminate\Http\Request;

class FontSizeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function saveFont(Request $request)
    {
        $this->validate($request, array(
            'name' => 'required',
            'used' => 'required',
            'font_size' => 'required',
            'font_weight' => 'required',
            'line_height' => 'required',
            'min_width_font_size' => 'required',
        ));
        
        $font = new FontSize();
        $font->name = $request->input('name');
        $font->used = $request->input('used');
        $font->font_size = $request->input('font_size');
        $font->font_weight = $request->input('font_weight');
        $font->line_height = $request->input('line_height');
        $font->min_width_font_size = $request->input('min_width_font_size');
        $font->save();
        return redirect()->back()->with('status', 'Your Font has been saved');
    }

    public function editFont($id){
        $font = FontSize::Find($id);
        return view('admin.font-size.edit-font', compact('font'));
    }

    public function updateFont(Request $request, $id)
    {
        $this->validate($request, array(
            'name' => 'required',
            'used' => 'required',
            'font_size' => 'required',
            'min_width_font_size' => 'required',
        ));
        $font = FontSize::Find($id);
        $font->name = $request->input('name');
        $font->used = $request->input('used');
        $font->font_size = $request->input('font_size');
        $font->min_width_font_size = $request->input('min_width_font_size');
        $font->update();
        return redirect('/admin/dashboard')->with('status', 'Your Font item has been updated');
    }
}
