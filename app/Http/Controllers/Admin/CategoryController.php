<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::latest()->paginate(10);
        return view('admin.category.index', compact('categories'));
    }
    public function create(Request $request)
    {
        return view('admin.category.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoryname' => 'required|string|max:255',
        ]);
    
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        try {
            Category::create([
                'name' => $request->categoryname,
                'created_by' => Auth::user()->name,
            ]);

            return response()->json(['message' => 'Form submitted successfully','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error while saving the category: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'Error while saving the category.','status' => false], 500);
        }
    }
    public function edit($id){
        $category = Category::findOrFail($id);
        return view('admin.category.edit',compact('category'));
    }
    public function update(Request $request){
        $category = Category::findOrFail($request->categoryId);                
        $category->name = $request->categoryname;
    
        // Save the changes to the category
        $category->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Category Updated Successfully','status' => true]);
    }
    public function status(Request $request, $id)
    {
        // Find the category by ID
        $category = Category::findOrFail($id);
        
        // Check if the current status is "active"
        if ($category->status == "active") {
            // Update the status to "inactive"
            $category->status = "inactive";
        } else {
            // Update the status to "active"
            $category->status = "active";
        }
    
        // Save the changes to the category
        $category->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
