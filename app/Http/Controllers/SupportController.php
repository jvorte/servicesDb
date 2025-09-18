<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\SupportMessage;
class SupportController extends Controller
{
    /**
     * Handle the support form submission.
     */
public function submit(Request $request)
{
    $data = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'message' => 'required|string|max:2000',
    ]);

    // Αποθήκευση στο DB
    SupportMessage::create($data);

    // Στείλε email στην υποστήριξη (προαιρετικά)
    Mail::raw($data['message'], function ($message) use ($data) {
        $message->to('support@servicesdb.com')
                ->subject('Support Request from ' . $data['name'])
                ->replyTo($data['email']);
    });

    return back()->with('success', 'Your message has been sent.');
}
}
