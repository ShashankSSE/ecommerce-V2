<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Banner;
class HomePageController extends Controller
{
    public function index(){
        $banner = Banner::all();
        return view('admin.settings.home-page',compact('banner'));
    }

    public function bannerStore(Request $request){

        $banner = new Banner;
        $banner->title = $request->title;
        $banner->text = $request->text;
        $banner->url = $request->url;
        $banner->sequence = $request->sequence;

        $file = $request->file('imageFile'); 
        $fileName = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images/banner'), $fileName); 
                
        $banner->image = asset('images/banner') .'/'. $fileName;
        $banner->status = $request->bannerStatus ? 1 : 0;

        $banner->save();

        return response()->json(['status' => true, 'message' => 'Banner added successfully.']);
    }

    function bannerEdit($id){
        $banner = Banner::findOrFail($id)->toArray();
        return response()->json(['status' => true, 'banner' => $banner]);
        
    }
}
