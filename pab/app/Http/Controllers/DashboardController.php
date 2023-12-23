<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(){
        if(Auth::user()){
        if(Auth::user()->roles=='ADMIN'){$transactions = Transaction::paginate();
        return view('dashboard.adminindex', ['transaction' => $transactions]);
        }else if(Auth::user()->roles=='USER'){
        $onCart = Transaction::whereRaw("user_id=? AND status='CART'", 
        [Auth::user()->id])->first();
        $onOrder = Transaction::whereRaw("user_id=? AND status='ORDER'", 
        [Auth::user()->id])->first();
        $transactions = Transaction::whereRaw("user_id=?", 
        [Auth::user()->id])->orderBy('created_at', 'desc')->get();
        return view('dashboard.userindex', ['onOrder' => $onOrder, 'onCart' => $onCart, 'transactions' => $transactions]);
        }
        }
       }
}
