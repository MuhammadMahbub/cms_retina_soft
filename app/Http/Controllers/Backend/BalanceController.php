<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Balance;

class BalanceController extends Controller
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
        $balances = Balance::with('client')->latest()->get();
        return view('backend/balance/index', compact('balances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clients = Client::all();
        return view('backend.balance.create', compact('clients'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required',
            'income' => 'integer|min:0',
            'expense' => 'integer|min:0',
        ],[
            'client_id.required' => 'Client is required',
        ]);


        $balance = new Balance;

        $balance->client_id = $request->client_id;
        $balance->income = $request->income ?? 0;
        $balance->expense = $request->expense ?? 0;
        $balance->save();

        $blance_query = Balance::where('client_id',$request->client_id);
        $total_income = $blance_query->sum('balances.income');
        $total_expense = $blance_query->sum('balances.expense');


        $client = Client::where('user_id', $request->client_id);

        $client->update([
            'client_income' => $total_income,
            'client_expense' => $total_expense,
            'balance_diff' => $total_income - $total_expense,
        ]);

        return redirect()->route('balance.index')->with("success", "Balance Added success");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clients = Client::all();
        $balance = Balance::findOrFail($id);
        return view('backend.balance.edit', compact('clients', 'balance'));
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
        $request->validate([
            'client_id' => 'required',
            'income' => 'integer|min:0',
        ],[
            'client_id.required' => 'Client is required',
        ]);

        $balance = Balance::findOrFail($id);

        $balance->client_id = $request->client_id;
        $balance->income = $request->income ?? 0;
        $balance->expense = $request->expense ?? 0;
        $balance->save();

        $blance_query = Balance::where('client_id',$request->client_id);
        $total_income = $blance_query->sum('balances.income');
        $total_expense = $blance_query->sum('balances.expense');

        $client = Client::where('user_id', $request->client_id);

        $client->update([
            'client_income' => $total_income,
            'client_expense' => $total_expense,
            'balance_diff' => $total_income - $total_expense,
        ]);

        return redirect()->route('balance.index')->with("success", "Balance Updated success");
    }

    public function delete($id)
    {
        $balance = Balance::findOrFail($id)->delete();
        return response()->json();
    }
}
