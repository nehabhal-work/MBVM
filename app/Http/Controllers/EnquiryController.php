<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class EnquiryController extends Controller
{
    /** Public: save a message from the "संपर्क" form. */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => ['required', 'string', 'max:255'],
            'mobile'       => ['required', 'digits:10'],
            'email'        => ['nullable', 'email', 'max:255'],
            'organization' => ['nullable', 'string', 'max:255'],
            'subject'      => ['nullable', 'string', 'max:255'],
            'message'      => ['required', 'string', 'max:3000'],
        ], [
            'name.required'    => 'कृपया आपले नाव लिहा.',
            'mobile.required'  => 'कृपया मोबाईल क्रमांक लिहा.',
            'mobile.digits'    => 'मोबाईल क्रमांक १० अंकी असावा.',
            'email.email'      => 'कृपया योग्य ई-मेल लिहा.',
            'message.required' => 'कृपया आपला संदेश लिहा.',
        ]);

        Enquiry::create($validated + ['status' => 'new']);

        $message = 'आपला संदेश मिळाला. आम्ही लवकरच आपल्याशी संपर्क साधू.';

        if ($request->expectsJson()) {
            return response()->json(['message' => $message]);
        }

        return redirect()->to(route('home') . '#contact')->with('enquiry_success', $message);
    }

    /** ERP: change status (नवीन / प्रक्रियेत / पूर्ण). */
    public function updateStatus(Request $request, Enquiry $enquiry)
    {
        $validated = $request->validate([
            'status' => ['required', Rule::in(array_keys(Enquiry::STATUSES))],
        ]);

        $enquiry->update($validated);

        return back()->with('success', $enquiry->name . ' — चौकशीची स्थिती अद्ययावत केली.');
    }

    /** ERP: delete an enquiry. */
    public function destroy(Enquiry $enquiry)
    {
        $enquiry->delete();

        return back()->with('success', 'चौकशी हटवली.');
    }
}
