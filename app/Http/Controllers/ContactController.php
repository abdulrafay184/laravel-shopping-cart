<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactReplyMail;

class ContactController extends Controller
{
    // ================= USER =================

    // Show contact page
    public function index()
    {
        return view('User.contact');
    }

    // Submit contact form
    public function submit(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Contact::create([
            'user_id' => Auth::id(),
            'name'    => $request->name,
            'email'   => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ]);

        return redirect()->route('contact')
            ->with('success', 'Message sent successfully!');
    }

    // Logged-in user messages list
    public function myMessages()
    {
        $messages = Contact::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('User.messages', compact('messages'));
    }

    // View single message (remove is_read handling)
    public function showUserMessage($id)
    {
        $message = Contact::where('user_id', Auth::id())
            ->where('id', $id)
            ->firstOrFail();

        return view('User.view-message', compact('message'));
    }

    // ================= ADMIN =================

    // All contact messages (admin)
    public function adminMessages()
    {
        $contacts = Contact::latest()->paginate(10);
        return view('Admin.contacts', compact('contacts'));
    }

    // Reply form
    public function replyForm($id)
    {
        $contact = Contact::findOrFail($id);
        return view('Admin.contact.reply', compact('contact'));
    }

    // Send reply + email to user (remove is_read handling)
    public function sendReply(Request $request, $id)
    {
        $request->validate([
            'reply' => 'required|string|max:2000'
        ]);

        $contact = Contact::findOrFail($id);
        $contact->reply = $request->reply;
        $contact->replied_at = now();
        $contact->save();

        // Send email
        Mail::to($contact->email)->send(new ContactReplyMail($contact));

        return redirect()->route('admin.contacts')
            ->with('success', 'Reply sent and email delivered successfully!');
    }

    // Delete message
    public function deleteMessage($id)
    {
        Contact::findOrFail($id)->delete();

        return redirect()->route('admin.contacts')
            ->with('success', 'Message deleted successfully!');
    }
}
