<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    static public $genres = [
        'homme',
        'femme',
        'autre'
    ];

    public function get(Request $request)
    {
        return view('views.contact')->with([
            'genres' => self::$genres
        ]);
    }

    public function post(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject' => 'required|min:2',
            'email' => 'required|email',
            'genre' => 'required|size:5',
            'message' => 'nullable|min:3|max:1000',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $contact = Contact::create([
            'subject' => $request->get('subject'),
            'email' => $request->get('email'),
            'genre' => $request->get('genre'),
            'message' => $request->get('message')
        ]);

        if (Auth::check()) {
            $contact->user_id = Auth::user()->id;
        }

        $contact->save();

        Mail::to(env('MAIN_EMAIL'))->send(new \App\Mail\Contact($contact));

        return view('views.thanks');
    }

    public function myContacts(Request $request)
    {
        $contacts = \DB::table('contacts')->where('user_id', '=', Auth::user()->id)->get();

        return view('views.my_contacts')->with([
            'contacts' => $contacts
        ]);
    }
}
