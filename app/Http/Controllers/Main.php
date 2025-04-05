<?php

namespace App\Http\Controllers;

use App\Mail\email_confirm_message;
use App\Mail\email_read_message;
use App\Mail\email_readed_message;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class Main extends Controller
{
    //==========================================================
    public function index()
    {
        return view('message_form');
    }

    //==========================================================
    public function init(Request $request)
    {
        // verify if there was a post
        if (!$request->isMethod('post')) {
            return redirect()->route('index');
        }

        // validation
        $request->validate(
            [
                'text-from' => [
                    'required',
                    'email',
                    'max:50',
                ],
                'text-to' => [
                    'required',
                    'email',
                    'max:50',
                ],
                'text-message' => [
                    'required',
                    'max:250',
                ],

            ],
            [
                'text-from.required' => 'From email is required.',
                'text-from.email' => 'From most be a valid email.',
                'text-from.max' => 'From email must be less tan :max characters.',
                'text-to.required' => 'To email is required.',
                'text-to.email' => 'To most be a valid email.',
                'text-to.max' => 'To email must be less tan :max characters.',
                'text-message.required' => 'Message filed is required.',
                'text-message.max' => 'Message must be less tan :max characters.',
            ]
        );

        // create purl
        $purl = Str::random(32);
        $message = new Message();

        $message->send_from = $request->input('text-from');
        $message->send_to = $request->input('text-to');
        $message->message = $request->input('text-message');
        $message->purl_confirmation = $purl;
        $message->save();

        // send email to confirm message
        Mail::to($request->input('text-from'))->send(new email_confirm_message($purl));

        // update db eith date and time when confirmation email was sent
        $message = Message::where('purl_confirmation', $purl)->first();
        $message->purl_confirmation_sent = now();
        $message->save();

        $data = [
            'email' => $request->input('text-from')
        ];

        // show view with information about email confrimation was sent
        return view('email_confirmation_sent', $data);
    }

    //==========================================================
    public function confirm($purl)
    {

        // check if purl exists
        if (empty($purl)) {
            return redirect()->route('index');
        }

        // check if purl exists in dbase

        $message = Message::where('purl_confirmation', $purl)->first();

        // check if there is a message
        if ($message == null) {

            // show view with error message
            return view('error');
        }

        // remove purl confirmation and create purl read
        $purl_read = Str::random(32);
        $message->purl_confirmation = null;
        $message->purl_read = $purl_read;
        $message->purl_read_sent = now();
        $message->save();

        // send email to receiver

        Mail::to($message->send_to)->send(new email_read_message($purl_read));


        $data = [
            'email' => $message->send_to,
        ];

        // show view with information about message send successfully
        return view('message_sent', $data);
    }

    //==========================================================
    public function read($purl)
    {

        // verify if purl exists
        if (empty($purl)) {
            return redirect()->route('index');
        }

        // check id purl exists in dbase
        $message = Message::where('purl_read', $purl)->first();

        // check if there is a message
        if ($message == null) {
            // show view with error message
            return view('error');
        }

        // remove purl read and store message readed
        $message_readed = now();
        $email_receiver = $message->send_to;
        $message->purl_read = null;
        $message->message_readed = $message_readed;
        $message->save();

        // send email to sender
        Mail::to($message->send_from)->send(new email_readed_message($message_readed, $email_receiver));

        // display the one time message
        $data = [
            'email' => $message->send_from,
            'message' => $message->message,
        ];

        // show view with information about message read successfully
        return view('message_read', $data);
    }
}
