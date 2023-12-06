<?php

namespace App\Http\Controllers;

use App\Http\Requests\FeedbackStoreRequest;
use App\Models\Feedback;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function contactUs(){
        return view('contact');
    }
    public function storeFeedback(FeedbackStoreRequest $request){
         
            Feedback::create($request->validated());
            session()->flash('success', 'Thank you for your feedback!');

            return to_route('contactUs')->with('success','Thank you for your feedback !');
    }
}
