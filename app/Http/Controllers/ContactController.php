<?php

namespace App\Http\Controllers;

use App\Events\FeedbackNotification;
use App\Mail\Feedback;
use App\Rules\PhoneNumber;
use App\Sources\Page;
use Illuminate\Http\Request;
use Log;
use Mail;
use Validator;

class ContactController
{
    public function index(Request $request)
    {
        Page::setTitle('Contacts | Wealthman');
        Page::setDescription('Contacts');

        return view('contacts.index');
    }

    /**
     * Get User login form
     *
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws \Throwable
     */
    public function getFeedbackForm(Request $request)
    {
        if ($request->ajax()) {
            return view('contacts._form', [ 'ajax' => true ])->render();
        }

        return back();
    }


    public function feedbackSend(Request $request)
    {
        if(preg_match('/@/', $request->email_phone)) {
            $email_phone_rule = 'required|email';
        }else{
            $email_phone_rule = ['required', new PhoneNumber('The email/phone must be phone number or email.')];
        }

        $validation = Validator::make(
            [
                'email_phone' => $request->email_phone,
                'message' => $request->message,
                'name' => $request->name
            ],
            [
                'email_phone'   => $email_phone_rule,
                'message' => 'required|min:5',
                'name' => 'nullable|min:2'
            ],
            [
                'email' => 'The email/phone must be phone number or email.',
                'required' => 'The email/phone field is required.'
            ]
        );
        $errors = $validation->errors();
        $errors = json_decode($errors);
        if ($validation->passes()) {

            event(new FeedbackNotification($request->email_phone, $request->name, $request->message));

            return response()->json(['success' => true], 200);

        } else {

            return response()->json($errors, 422);
        }
    }
}