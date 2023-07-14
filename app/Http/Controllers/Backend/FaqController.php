<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        return view('backend.faq.index');
    }

    public function create() {}
    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        Faq::create([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('faqs.index')->with('success', 'Created successfully!');
    }
    public function edit(Faq $faq) { 
        return view('backend.faq.edit', compact('faq'));
    }
    public function update(Request $request, Faq $faq) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);
        $faq->update([
            'question' => $request->question,
            'answer' => $request->answer,
        ]);
        return redirect()->route('faqs.index')->with('success', 'Updated successfully!');
    }
    public function delete(Faq $faq) {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'Deleted successfully!');
    }
}
