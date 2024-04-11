<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\ContactFormMail;
use App\Mail\BookDemoMail;
use App\Mail\ThankYouMail;
use Illuminate\Support\Facades\Mail;

class ContactFormController extends Controller
{
    public function submitForm(Request $request)
    { 

        $name = $request->name ? $request->name : $request->contact_name;
        $email = $request->email ? $request->email : $request->contact_email;
        $subject = $request->subject ? $request->subject : $request->contact_subject;
        $message = $request->message ? $request->message : $request->contact_message;
        $currentDateTime = now();
        $modifiedDateTime = $currentDateTime->addHours(5)->addMinutes(30);

        // Format the modified date and time
        $formattedDateTime = $modifiedDateTime->format('d-m-Y h:i:s A');
        $data = array(
            'Name' => $name,
            'Email' => $email,
            'Subject' => $subject,
            'Message' => $message,
            'Date' => $formattedDateTime,
        );
        try {
            Mail::to('business@Patakha.com')->send(new ContactFormMail($data));

            return response()->json(['message' => 'Form submitted successfully. Thank you for connecting with us, we will get in touch with you sortly.','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error sending contact form mail: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'An error occurred while sending the mail. Please try again.','status' => false], 500);
        }
    }

    public function bookDemo(Request $request)
    { 
        $name = $request->book_name;
        $email = $request->book_email;
        $mobile = $request->book_mobile;
        $orgName = $request->book_orgName ? $request->book_orgName : "-";
        $requirement = $request->book_requirement; 
        $currentDateTime = now();
        $modifiedDateTime = $currentDateTime->addHours(5)->addMinutes(30);

        // Format the modified date and time
        $formattedDateTime = $modifiedDateTime->format('d-m-Y h:i:s A');
        $data = array(
            'Name' => $name,
            'Email' => $email,
            'Mobile' => $mobile,
            'orgName' => $orgName,
            'Requirement' => $requirement,
            'Date' => $formattedDateTime,
        );
        try {
            Mail::to('business@Patakha.com')->send(new BookDemoMail($data));
            Mail::to($email)->send(new ThankYouMail($data));

            return response()->json(['message' => 'Form submitted successfully','status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error sending contact form mail: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'An error occurred while sending the mail. Please try again.','status' => false], 500);
        }
    }
    public function getBroucher(Request $request)
    { 
        $name = $request->broucher_name;
        $email = $request->broucher_email;
        $mobile = $request->broucher_mobile;
        $orgName = $request->broucher_orgName ? $request->broucher_orgName : "-";
        $requirement = $request->broucher_requirement; 
        $currentDateTime = now();
        $modifiedDateTime = $currentDateTime->addHours(5)->addMinutes(30);
        $broucher_url = asset('assets/img/broucher-Patakha.pdf'); 
        // Format the modified date and time
        $formattedDateTime = $modifiedDateTime->format('d-m-Y h:i:s A');
        $data = array(
            'Name' => $name,
            'Email' => $email,
            'Mobile' => $mobile,
            'orgName' => $orgName,
            'Requirement' => $requirement,
            'Date' => $formattedDateTime,
        );
        try {
            Mail::to('business@Patakha.com')->send(new BookDemoMail($data));
            Mail::to($email)->send(new ThankYouMail($data));

            return response()->json(['message' => 'Form submitted successfully','broucher_url' => $broucher_url ,'status' => true]);

        }catch (\Exception $e) {
            // An exception occurred while sending the mail
            // Log the exception or handle it as needed
            // For example, you might log the error and show a user-friendly message
        
            \Log::error('Error sending contact form mail: ' . $e->getMessage());
        
            // You can customize the response based on your requirements
            return response()->json(['error' => 'An error occurred while sending the mail. Please try again.','status' => false], 500);
        }
    }
}
