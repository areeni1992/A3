<?php

namespace App\Http\Controllers;

use App\Models\UserSub;
use Illuminate\Http\Request;
use Newsletter;

class NewsLatterController extends Controller
{
    public function store(Request $request)
    {
        if (!is_null($request->user_email))
        {
            if (!Newsletter::isSubscribed($request->user_email)) {
                Newsletter::subscribe($request->user_email);
                $userSub = new UserSub();
                $userSub->user_email = $request->user_email;
                $userSub->status = 'subscriber';
                $userSub->save();

                return redirect()->back();
            }

        }

        return redirect()->back();
    }

    public function subscribers()
    {
        $subscribers = UserSub::where('status' , 'subscriber')->get();

        return view('backend.user.subscriber', compact('subscribers'));
    }

    public function messages()
    {
        $msgs = UserSub::where('status', 'sender')->get();
        return view('backend.user.messages', compact('msgs'));

    }
}
