<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEnquiryRequest;
use App\Mail\EnquiryReceivedMail;
use App\Models\Enquiry;
use App\Notifications\EnquiryReceived;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Notification;

class EnquiryController extends Controller
{
    /**
     * Store a newly created enquiry in storage.
     */
    public function store(StoreEnquiryRequest $request)
    {
        // Create the enquiry record
        $enquiry = Enquiry::create($request->validated());

        // Get admin email from config
        $adminEmail = config('mail.admin_email', 'admin@example.com');

        // Check if we should use PHP mail() or SMTP based on configuration
        if (config('mail.use_php_mail', false)) {
            // Use Laravel Mail with PHP mail() transport
            Mail::to($adminEmail)->send(new EnquiryReceivedMail($enquiry));
        } else {
            // Use Laravel Notification (works with SMTP and other drivers)
            Notification::route('mail', $adminEmail)
                ->notify(new EnquiryReceived($enquiry));
        }

        // Return JSON response for AJAX requests
        if ($request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Thank you for your enquiry! We will get back to you soon.',
            ]);
        }

        // Redirect back with success message for regular requests
        return redirect()->back()->with('success', 'Thank you for your enquiry! We will get back to you soon.');
    }
}
