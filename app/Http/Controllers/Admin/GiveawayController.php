<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Giveaway;
use Illuminate\Http\Request;

class GiveawayController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function viewGiveaways(){
        $giveaways = Giveaway::all();
        return view('admin.image.view-giveaways', compact('giveaways'));
    }

    public function saveGiveaway(Request $request)
    {
        $this->validate($request, array(
            'img' => 'required',
        ));
        
        $giveaway = new Giveaway();
        if($request->hasfile('img'))
        {
            $file = $request->file('img');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('upload/giveaway/', $fileName);
            $giveaway->img = $fileName; 
        }
        $giveaway->save();
        return redirect()->back()->with('status', 'Your Giveaway has been saved');
    }

    public function deleteGiveaway($id){
        $giveaway = Giveaway::find($id);
        $giveaway->delete();
        return redirect()->back()->with('status', 'Giveaway Deleted');
    }
}
