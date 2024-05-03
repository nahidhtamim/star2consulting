<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Text;
use Illuminate\Http\Request;

class TextControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewTexts(){
        $texts = Text::all();
        return view('admin.text.view-texts', compact('texts'));
    }

    public function saveText(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'description' => 'required',
        ));
        
        $text = new Text();
        $text->title = $request->input('title');
        $text->description = $request->input('description');
        $text->status = $request->input('status')==true ? '1':'0';
        $text->save();
        return redirect()->back()->with('status', 'Your text has been saved');
    }

    public function editText($id){
        $text = Text::Find($id);
        return view('admin.text.edit-text', compact('text'));
    }

    public function updateText(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'description' => 'required',
        ));
        $text = Text::Find($id);
        $text->title = $request->input('title');
        $text->description = $request->input('description');
        $text->update();
        return redirect('/admin/view-texts')->with('status', 'Your text item has been updated');
    }

    public function deleteText($id){
        $text = Text::Find($id);
        $text->delete();
        return redirect('/admin/view-texts')->with('status', 'Your text item has been deleted');
    }

    public function activeText($id)
    {
        $text = Text::find($id);
        $text->status = '1';
        $text->update();
        return redirect()->back()->with('status', 'Text Activated');
    }

    public function deactiveText($id)
    {
        $text = Text::find($id);
        $text->status = '0';
        $text->update();
        return redirect()->back()->with('warning', 'Text De-activated');
    }
}
