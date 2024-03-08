<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SubCategory;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SubCategoryController extends Controller
{
    public function index(Request $request)
    {
        $subCategories = SubCategory::latest()->paginate(10);
        return view('admin.sub-category.index', compact('subCategories'));
    }
    public function create(Request $request)
    {
        $categories = Category::all();
        return view('admin.sub-category.create', compact('categories'));
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subCategoryName' => 'required|string|max:255',
        ]);
    
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        try {
            SubCategory::create([
                'title' => $request->subCategoryName,
                'category_id' => $request->categoryId,
                'created_by' => Auth::user()->name,
            ]);

            return response()->json(['message' => 'Form submitted successfully','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error while saving the sub-category: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'Error while saving the sub-category.','status' => false], 500);
        }
    }
    public function edit($id){
        $subCategory = SubCategory::findOrFail($id);
        $categories = Category::all();
        return view('admin.sub-category.edit',compact('subCategory','categories'));
    }
    public function update(Request $request){
        $subCategory = SubCategory::findOrFail($request->subCategoryId);                
        $subCategory->title = $request->subCategoryName;
        $subCategory->category_id = $request->categoryId;
        // Save the changes to the sub-category
        $subCategory->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'SubCategory Updated Successfully','status' => true]);
    }
    public function status(Request $request, $id)
    {
        // Find the sub-category by ID
        $subCategory = SubCategory::findOrFail($id);
        
        // Check if the current status is "active"
        if ($subCategory->is_active) {
            // Update the status to "inactive"
            $subCategory->is_active = 0;
        } else {
            // Update the status to "active"
            $subCategory->is_active = 1;
        }
    
        // Save the changes to the sub-category
        $subCategory->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $subCategory = SubCategory::findOrFail($id);
        $subCategory->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
