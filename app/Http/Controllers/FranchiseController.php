<?php

namespace App\Http\Controllers;

use App\Models\FranchiseApplication;
use App\Services\SeoService;
use Illuminate\Http\Request;

class FranchiseController extends Controller
{
    public function apply()
    {
        $seo = SeoService::get('apply', [
            'title'       => 'Apply for Franchise - 7x Basket',
            'description' => 'Apply now to become a 7x Basket franchise partner. Fill the form and our team will contact you.',
        ]);
        return view('frontend.apply', compact('seo'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'              => 'required|string|max:100',
            'email'             => 'required|email|max:150',
            'phone'             => 'required|string|max:20',
            'city'              => 'required|string|max:100',
            'investment_budget' => 'required|string|max:100',
            'message'           => 'nullable|string|max:1000',
        ]);

        FranchiseApplication::create([
            'name'              => $request->name,
            'email'             => $request->email,
            'phone'             => $request->phone,
            'city'              => $request->city,
            'investment_budget' => $request->investment_budget,
            'message'           => $request->message,
            'ip_address'        => $request->ip(),
        ]);

        return redirect()->route('apply')->with('success', 'Your application has been submitted! We will contact you soon.');
    }
}
