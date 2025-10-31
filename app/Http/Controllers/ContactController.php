<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreContactEnquiryRequest;
use App\Models\ContactEnquiry;
use App\Notifications\ContactEnquiryReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class ContactController extends Controller
{
    /**
     * Display the contact page.
     */
    public function index()
    {
        return view('pages.contact');
    }

    /**
     * Store a newly created contact enquiry in storage.
     */
    public function submit(StoreContactEnquiryRequest $request)
    {
        // Create the contact enquiry record
        $enquiry = ContactEnquiry::create($request->validated());

        // Get admin email from config
        $adminEmail = config('mail.admin_email', 'admin@example.com');

        // Check if we should use PHP mail() or SMTP based on configuration
        if (config('mail.use_php_mail', false)) {
            // Use Laravel Mail with PHP mail() transport
            Mail::to($adminEmail)->send(new \App\Mail\EnquiryReceivedMail($enquiry));
        } else {
            // Use Laravel Notification (works with SMTP and other drivers)
            Notification::route('mail', $adminEmail)
                ->notify(new ContactEnquiryReceived($enquiry));
        }

        // Return JSON response for AJAX requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for contacting us! We will get back to you soon.',
            ]);
        }

        // Redirect back with success message for regular requests
        return redirect()->back()->with('success', 'Thank you for contacting us! We will get back to you soon.');
    }
}
