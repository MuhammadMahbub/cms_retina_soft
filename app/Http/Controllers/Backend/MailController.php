<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MailSettings;

class MailController extends Controller
{
    public function index(){
        $totalMail = MailSettings::all()->count();
        $data = MailSettings::take(1)->first();
        return view('backend.settings.mail-body', compact('totalMail', 'data'));
    }

    public function store(Request $request){

        $request->validate([
            'mail_text' => 'required',
        ]);

        $data = new MailSettings;
        $data->mail_text = $request->mail_text;
        $data->save();
        return redirect()->route('mail.index')->with('success', 'Mail Content saved !');

    }

    public function update_mail(Request $request, $id){

        $request->validate([
            'mail_text' => 'required',
        ]);

        $data = MailSettings::findOrFail($id);
        $data->mail_text = $request->mail_text;
        $data->save();
        return redirect()->route('mail.index')->with('success', 'Mail Update saved !');

    }
}
