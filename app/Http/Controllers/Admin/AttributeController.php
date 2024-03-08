<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Attribute;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class AttributeController extends Controller
{
    public function index(Request $request)
    {
        $attributes = Attribute::latest()->paginate(10);
        return view('admin.attribute.index', compact('attributes'));
    }
    public function create(Request $request)
    {
        return view('admin.attribute.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'attributeName' => 'required|string|max:255',
        ]);
    
        // Check if the validation fails
        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }
        
        try {
            Attribute::create([
                'label' => $request->attributeName,
                'name' => $request->attributeUnit,
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
        $attribute = Attribute::findOrFail($id);
        return view('admin.attribute.edit',compact('attribute'));
    }
    public function update(Request $request){
        $category = Attribute::findOrFail($request->attributeId);                
        $category->label = $request->attributeName;
        $category->name = $request->attributeUnit;
    
        // Save the changes to the category
        $category->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Attribute Updated Successfully','status' => true]);
    }
    public function status(Request $request, $id)
    {
        // Find the category by ID
        $attribute = Attribute::findOrFail($id);
        
        // Check if the current status is "active"
        if ($attribute->status == "active") {
            // Update the status to "inactive"
            $attribute->status = "inactive";
        } else {
            // Update the status to "active"
            $attribute->status = "active";
        }
    
        // Save the changes to the attribute
        $attribute->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
