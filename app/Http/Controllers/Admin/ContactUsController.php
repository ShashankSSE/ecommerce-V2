<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactUs;

class ContactUsController extends Controller
{
    public function index(){
        $contactUs = ContactUs::latest()->get();
        return view('admin.contact-us.index',compact('contactUs'));
    }
    public function submitContactUs(Request $request){
        $contactUs = new ContactUs;
        $contactUs->name = $request->name;
        $contactUs->email = $request->email;
        $contactUs->message = $request->message;
        $contactUs->save();
        return response()->json(['message' => 'Thank you for connecting with us. Our team will get in touch with you sortly.','status' => true]); 
    }

    public function show($id){
        $contactUs = ContactUs::findOrFail($id);
        return view('admin.contact-us.show',compact('contactUs'));
    }
}
