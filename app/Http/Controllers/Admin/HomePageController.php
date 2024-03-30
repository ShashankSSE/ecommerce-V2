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
        $banner->status = $request->bannerStatus == "true" ? 1 : 0; 

        $banner->save();

        return response()->json(['status' => true, 'message' => 'Banner added successfully.']);
    }

    function bannerEdit($id){
        $banner = Banner::findOrFail($id)->toArray();
        return response()->json(['status' => true, 'banner' => $banner]);
        
    }
    function bannerUpdate(Request $request){
        $banner = Banner::findOrFail($request->id);

        $banner->title = $request->title;
        $banner->text = $request->text;
        $banner->url = $request->url;
        $banner->sequence = $request->sequence;
        if($request->file('imageFile')){
            $file = $request->file('imageFile'); 
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/banner'), $fileName);                     
            $banner->image = asset('images/banner') .'/'. $fileName;
        }
        $banner->status = $request->bannerStatus == "true" ? 1 : 0; 

        $banner->save();

        return response()->json(['status' => true, 'message' => 'Banner Updated successfully.']);
    }
    public function status(Request $request, $id)
    {
        // Find the category by ID
        $banner = Banner::findOrFail($id);
        
        // Check if the current status is "active"
        if ($banner->status) {
            // Update the status to "inactive"
            $banner->status = 0;
        } else {
            // Update the status to "active"
            $banner->status = 1;
        }
    
        // Save the changes to the category
        $banner->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $banner = Banner::findOrFail($id);
        $banner->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
