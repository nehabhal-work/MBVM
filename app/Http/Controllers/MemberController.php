<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    // Show the form
    public function create()
    {
        return view('members.create');
    }

    // Validate and store
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'         => ['required', 'string', 'max:100', 'regex:/^[\pL\s.]+$/u'],
            'mobile'       => ['required', 'digits:10', 'numeric'],
            'email'        => ['required', 'email', 'max:150'],
            'jilha'        => ['required', 'string', 'max:100'],
            'taluka'       => ['required', 'string', 'max:100'],
            'city'         => ['required', 'string', 'max:100'],
            'company_name' => ['required', 'string', 'max:150'],
        ], [
            'mobile.digits' => 'मोबाईल नंबर बरोबर १० अंकी असावा.',
            'mobile.numeric' => 'मोबाईल नंबरमध्ये फक्त आकडे असावेत.',
            'required' => 'ही माहिती भरणे आवश्यक आहे.',
            'email.email' => 'कृपया योग्य ई-मेल टाका.',
        ]);

        Member::create($validated);

        return redirect()
            ->route('members.create')
            ->with('success', 'तुमची नोंदणी यशस्वीरित्या झाली आहे!');
    }

    // Listing page
    public function index()
    {
        $members = Member::latest()->paginate(20);
        return view('members.index', compact('members'));
    }
}