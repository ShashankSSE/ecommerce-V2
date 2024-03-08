<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faqs;
use Illuminate\Support\Facades\Auth;

class FaqController extends Controller
{
    public function index(Request $request)
    {
        $faqs = Faqs::latest()->paginate(10);
        return view('admin.faq.index', compact('faqs'));
    }
    public function create(Request $request)
    {
        return view('admin.faq.create');
    }
    public function store(Request $request)
    {
        
        try {
            Faqs::create([
                'question' => $request->question,
                'answere' => $request->answere,
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
        $faq = Faqs::findOrFail($id);
        return view('admin.faq.edit',compact('faq'));
    }
    public function update(Request $request){
        $faq = Faqs::findOrFail($request->faqId);                
        $faq->question = $request->question;
        $faq->answere = $request->answere;
    
        // Save the changes to the category
        $faq->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Faq Updated Successfully','status' => true]);
    }
    public function status(Request $request, $id)
    {
        // Find the category by ID
        $faq = Faqs::findOrFail($id);
        
        // Check if the current status is "active"
        if ($faq->is_active) {
            // Update the status to "inactive"
            $faq->is_active = 0;
        } else {
            // Update the status to "active"
            $faq->is_active = 1;
        }
    
        // Save the changes to the category
        $faq->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
    public function destroy($id){
        $faq = Faqs::findOrFail($id);
        $faq->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
