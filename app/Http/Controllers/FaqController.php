<?php

namespace App\Http\Controllers;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::where('is_active', true)->get();

    return view('contact_us', compact('faqs'));
    }
}
