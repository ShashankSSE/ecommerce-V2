<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }
    public function create(Request $request)
    {
        return view('admin.users.create');
    }
    public function store(Request $request)
    {        
        // dd($request->is_admin? 1 : 0);
        try {
            User::create([
                'name' => $request->username,
                'email' => $request->email,
                'is_admin' => $request->is_admin ? 1 : 0,
                'password' => Hash::make($request->password),
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
        $user = User::findOrFail($id);
        return view('admin.users.edit',compact('user'));
    }
    public function update(Request $request){
        $user = User::findOrFail($request->userId);  
        $user->name = $request->username;
        $user->is_admin = $request->is_admin ? 1 : 0;
        $user->name = $request->username;
        $user->password = Hash::make($request->password);
        // Save the changes to the category
        $user->save();
    
        // Redirect back or return a response as needed
        // For example, redirect back to the previous page
        return response()->json(['message' => 'User Updated Successfully','status' => true]);
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
        $user = User::findOrFail($id);
        $user->delete();

        return response()->json(['message' => 'Form submitted successfully','status' => true]);
    }
}
