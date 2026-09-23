<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // ✅ Validation
        // Laravel automatically catches any validation failures here.
        // If it's an AJAX request, it automatically stops and sends the errors back as JSON.
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email',
            'subject' => 'required|max:255',
            'message' => 'required',
        ]);

        // ✅ Save
        Contact::create($request->all());

        // 🌟 CHANGED THIS LINE FOR AJAX:
        // We now send a lightweight JSON message that jQuery can read instantly.
        return response()->json([
            'status' => 'success',
            'message' => 'Message sent successfully!'
        ]);
    }
}
