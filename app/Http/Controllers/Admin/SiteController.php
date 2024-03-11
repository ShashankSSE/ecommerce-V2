<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pages;
use App\Models\Settings;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class SiteController extends Controller
{
    public function index(Request $request)
    {
        $pages = Pages::latest()->paginate(10);
        return view('admin.pages.index', compact('pages'));
    }
    public function create(Request $request)
    {
        return view('admin.pages.create');
    }
    public function store(Request $request)
    {
        try {
            $proposedSlug = Str::slug($request->pageTitle);
            if (Pages::where('slug', $proposedSlug)->exists()) {
                $count = 1;
                while (Pages::where('slug', $proposedSlug . '-' . $count)->exists()) {
                    $count++;
                }
                $slug = $proposedSlug . '-' . $count;
            } else {
                $slug = $proposedSlug;
            }
            Pages::create([
                'title' => $request->pageTitle,
                'slug' => $slug,
                'desc' => $request->desc,
                'created_by' => Auth::user()->name,
            ]);

            return response()->json(['message' => 'Form submitted successfully','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error while saving the category: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => $e->getMessage(),'status' => false], 500);
        }
    }
    public function edit($id){

        $page = Pages::findOrFail($id);
        return view('admin.pages.edit',compact('page'));
    }
    public function update(Request $request){
        $page = Pages::findOrFail($request->pageId);                
        $page->title = $request->pageTitle;
        $page->slug = $request->pageSlug;
        $page->desc = $request->desc;
    
        // Save the changes to the category
        $page->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Page Updated Successfully','status' => true]);
    }
    public function status(Request $request, $id)
    {
        // Find the category by ID
        $page = Pages::findOrFail($id);
        
        // Check if the current status is "active"
        if ($page->is_active) {
            // Update the is_active to "inactive"
            $page->is_active = 0;
        } else {
            // Update the is_active to "active"
            $page->is_active = 1;
        }
    
        // Save the changes to the page
        $page->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $page = Pages::findOrFail($id);
        $page->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }

    public function settings(Request $request){
        $settings = Settings::where('id','=',1)->first();
        // dd($settings);
        return view('admin.settings.index',compact('settings'));
    }
    public function settingsUpdate(Request $request){
        $settingsCheck = Settings::where('id','=',1)->first();
        try {
            // Set attributes 
            if($settingsCheck){
                $settings = Settings::findOrFail(1); 
                $settings->social_media = $request->input('socialArray');
                $settings->mobile = $request->input('mobile');
                $settings->email = $request->input('email');
                $settings->address = $request->input('address');
                $settings->meta_title = $request->input('metaTitle');
                $settings->meta_keyword = $request->input('metaKey');
                $settings->meta_description = $request->input('metaDesc');
                $settings->short_description = $request->input('desc');
                $settings->credits = $request->input('creadits'); 
                if ($request->hasFile('headerLogo')) {
                    $file = $request->file('headerLogo');
                    $extension = $request->file('headerLogo')->extension();
                    $fileName = 'header_logo'.'.'.$extension;
                    $file->move(public_path('images/site'), $fileName);
                    $settings->header_logo = $fileName;
                }
                if ($request->hasFile('footerLogo')) {
                    $file = $request->file('footerLogo');
                    $extension = $request->file('footerLogo')->extension();
                    $fileName = 'footer_logo'.'.'.$extension;
                    $file->move(public_path('images/site'), $fileName);
                    $settings->footer_logo = $fileName;
                }
                if ($request->hasFile('favicon')) {
                    $file = $request->file('favicon');
                    $extension = $request->file('favicon')->extension();
                    $fileName = 'favicon'.'.'.$extension;
                    $file->move(public_path('images/site'), $fileName);
                    $settings->favicon = $fileName;
                }
                // dd($product);
                // Save the product
                $settings->save();

                return response()->json(['message' => 'Form submitted successfully','status' => true]);
            }else{
                $settings = new Settings; 
                $settings->social_media = $request->input('socialArray');
                $settings->mobile = $request->input('mobile');
                $settings->email = $request->input('email');
                $settings->address = $request->input('address');
                $settings->meta_title = $request->input('metaTitle');
                $settings->meta_keyword = $request->input('metaKey');
                $settings->meta_description = $request->input('metaDesc');
                $settings->short_description = $request->input('desc');
                $settings->credits = $request->input('creadits'); 
                if ($request->hasFile('headerLogo')) {
                    $file = $request->file('headerLogo');
                    $extension = $request->file('headerLogo')->extension();
                    $fileName = 'header_logo'.'.'.$extension;
                    $file->move(public_path('images/site'), $fileName);
                    $settings->header_logo = $fileName;
                }
                if ($request->hasFile('footerLogo')) {
                    $file = $request->file('footerLogo');
                    $extension = $request->file('footerLogo')->extension();
                    $fileName = 'footer_logo'.'.'.$extension;
                    $file->move(public_path('images/site'), $fileName);
                    $settings->footer_logo = $fileName;
                }
                if ($request->hasFile('favicon')) {
                    $file = $request->file('favicon');
                    $extension = $request->file('favicon')->extension();
                    $fileName = 'favicon'.'.'.$extension;
                    $file->move(public_path('images/site'), $fileName);
                    $settings->favicon = $fileName;
                }
                // dd($product);
                // Save the product
                $settings->save();

                return response()->json(['message' => 'Form submitted successfully','status' => true]);
            }

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error while saving the category: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'Error while saving the category.','status' => false,'message' => $e->getMessage()], 500);
        }
    }
}
