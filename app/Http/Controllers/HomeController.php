<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Balance;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $balance_query = Balance::where('client_id', Auth::id());
        $personal_balance = $balance_query->get();
        $personal_income = $balance_query->sum('income');
        $personal_expense = $balance_query->sum('expense');

        $total_users = User::where('id', '!=',  Auth::id())->count();
        $total_income = Balance::sum('income');
        $total_expense = Balance::sum('expense');
        $balance_diff = $total_income - $total_expense;

        $ttl_inc   = [];
        $ttl_exp  = [];
        $ttl_blnc  = [];

        for ($i=1; $i <=12 ; $i++) {

            $blnc_qry = Balance::whereYear('created_at',date('Y'))->whereMonth('created_at',$i);
            $ttl_inc[]  = $blnc_qry->sum('income');
            $ttl_exp[]  = $blnc_qry->sum('expense');
            $ttl_blnc[] = $blnc_qry->sum('income') - $blnc_qry->sum('expense');
        }


        return view('home', compact('total_users','total_income','total_expense','balance_diff','personal_balance','personal_income','personal_expense','ttl_inc','ttl_exp','ttl_blnc'));
    }
}
