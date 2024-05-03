<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class BlogControlController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewBlogs(){
        $blogs = Blog::all();
        return view('admin.blog.view-blogs', compact('blogs'));
    }

    public function saveBlog(Request $request)
    {
        $this->validate($request, array(
            'title' => 'required',
            'description' => 'required',
        ));
        
        $blog = new Blog();
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        if($request->hasfile('media'))
        {
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/blog/', $fileName);
            $blog->media = $fileName; 
        }
        $blog->slug = Str::slug($request->input('title'));
        $blog->status = $request->input('status')==true ? '1':'0';
        $blog->save();
        return redirect()->back()->with('status', 'Your blog has been saved');
    }

    public function editBlog($id){
        $blog = Blog::Find($id);
        return view('admin.blog.edit-blog', compact('blog'));
    }

    public function updateBlog(Request $request, $id)
    {
        $this->validate($request, array(
            'title' => 'required',
            'description' => 'required',
        ));
        $blog = Blog::Find($id);
        $blog->title = $request->input('title');
        $blog->description = $request->input('description');
        if($request->hasfile('media'))
        {
            $destination = 'upload/blog/'.$blog->media;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('media');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/blog/', $fileName);
            $blog->media = $fileName; 
        }
        $blog->slug = Str::slug($request->input('title'));
        $blog->update();
        return redirect('/admin/view-blogs')->with('status', 'Your blog item has been updated');
    }

    public function deleteBlog($id){
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('status', 'Blog Activated');
    }

    public function activeBlog($id)
    {
        $blog = Blog::find($id);
        $blog->status = '1';
        $blog->update();
        return redirect()->back()->with('status', 'Blog Activated');
    }

    public function deactiveBlog($id)
    {
        $blog = Blog::find($id);
        $blog->status = '0';
        $blog->update();
        return redirect()->back()->with('warning', 'Blog De-activated');
    }
}
