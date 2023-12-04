<?php

namespace App\Http\Controllers\Backend;

use Image;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Client;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ClientMail;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;


class ClientController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::latest()->get();
        return view('backend/client/index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.client.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // $random_password = Str::random(8);

        $request->validate([
            '*' => 'required',
        ],[
            'client_name.required' => 'Client name is required',
            'client_email.required' => 'Client email is required',
            'client_password.required' => 'Client Password is required',
            'client_phone.required' => 'Client phone is required',
            'client_status.required' => 'Client status is required',
        ]);

        $user_info = User::create([
            'name'       => $request->client_name,
            'email'      => $request->client_email,
            'password'   => Hash::make($request->client_password),
            'role'       => $request->client_status,
            'image' => 'backend/assets/images/default.jpg',
            'created_at' => Carbon::now(),
        ]);

        Client::insert([
            'user_id'        => $user_info->id,
            'phone' => $request->client_phone,
            'created_at'     => Carbon::now(),
        ]);

        Mail::to($request->client_email)->send(new ClientMail($request->client_password));

        return redirect()->route('client.index')->with("success", "A mail has sent to Client, Create success");

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('backend.client.edit', compact('client'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $client = Client::findOrFail($id);

        $request->validate([
            '*' => 'required',
        ]);

        $client->user->update([
            'name'       => $request->client_name,
            'email'      => $request->client_email,
        ]);

        $client->update([
            'phone'    => $request->client_phone
        ]);

        return redirect()->route('client.index')->with("success", "Client Update success");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
        return redirect()->route('client.index')->with('success', 'Client delete success');
    }

    public function all_trash_clients() {
        $trash_clients = Client::onlyTrashed()->get();
        return view('backend.client.trash', compact('trash_clients'));
    }

    public function client_restore($id){
        Client::withTrashed()->find($id)->restore();
        return redirect()->route('client.index')->with('success', 'Client restore success');
    }
    public function client_permanent_delete($id){
        $delete_id = Client::onlyTrashed()->find($id);
        if(file_exists($delete_id->client_photo)){
            unlink($delete_id->client_photo);
        }
        $delete_id->user->delete();
        $delete_id->forceDelete();
        return response()->json();
    }

}
