<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Illuminate\Http\Request;

class InquiryController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        Inquiry::create($request->only(['name', 'phone', 'email', 'subject', 'message']));

        $successMsg = 'شكرا لك<br>لقد تم ارسال طلبك بنجاح، سيتواصل معك احد موظفينا قريبا';
        if ($request->ajax()) {
            return response()->json(['success' => $successMsg]);
        }
        return back()->with('success', $successMsg);
    }
} 