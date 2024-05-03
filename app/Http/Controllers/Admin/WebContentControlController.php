<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class WebContentControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewWebContents(){
        $web_contents = WebContent::all();
        return view('admin.web-content.view-web-contents', compact('web_contents'));
    }

    public function saveWebContent(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'description' => 'required',
        ));
        
        $web_content = new WebContent();
        $web_content->title = $request->input('title');
        $web_content->description = $request->input('description');
        if($request->hasfile('media'))
        {
            $file = $request->file('media');
            $extension = $file->getClientOriginalName();
            $fileName = time().'.'.$extension;
            $file->move('upload/web_content/', $fileName);
            $web_content->media = $fileName; 
        }
        if($request->hasfile('media_two'))
        {
            $file = $request->file('media_two');
            $extension = $file->getClientOriginalName();
            $fileName = time().'.'.$extension;
            $file->move('upload/web_content/', $fileName);
            $web_content->media_two = $fileName; 
        }
        $web_content->status = '1';
        $web_content->save();
        return redirect()->back()->with('status', 'Your web content has been saved');
    }

    public function editWebContent($id){
        $web_content = WebContent::Find($id);
        return view('admin.web-content.edit-web-content', compact('web_content'));
    }

    public function updateWebContent(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'description' => 'required',
        ));
        $web_content = WebContent::Find($id);
        $web_content->title = $request->input('title');
        $web_content->description = $request->input('description');
        if($request->hasfile('media'))
        {
            $destination = 'upload/web_content/'.$web_content->media;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('media');
            $extension = $file->getClientOriginalName();
            $fileName = time().'.'.$extension;
            $file->move('upload/web_content/', $fileName);
            $web_content->media = $fileName; 
        }
        if($request->hasfile('media_two'))
        {
            $destination = 'upload/web_content/'.$web_content->media_two;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('media_two');
            $extension = $file->getClientOriginalName();
            $fileName = time().'.'.$extension;
            $file->move('upload/web_content/', $fileName);
            $web_content->media_two = $fileName; 
        }
        $web_content->update();
        return redirect('/admin/view-web-contents')->with('status', 'Your web content item has been updated');
    }

    public function activeWebContent($id)
    {
        $web_content = WebContent::find($id);
        $web_content->status = '1';
        $web_content->update();
        return redirect()->back()->with('status', 'Web Content Activated');
    }

    public function deactiveWebContent($id)
    {
        $web_content = WebContent::find($id);
        $web_content->status = '0';
        $web_content->update();
        return redirect()->back()->with('warning', 'Web Content De-activated');
    }
}
