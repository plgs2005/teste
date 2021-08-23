<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
    public function index(Request $request)
    {

        $chartDatas = User::select([
            DB::raw('DATE(created_at) AS date'),
            DB::raw('COUNT(id) AS count'),
         ])
         ->whereBetween('created_at', [Carbon::now()->subDays(30), Carbon::now()])
         ->groupBy('date')
         ->orderBy('date', 'ASC')
         ->get();

        

        
        $users = User::all();
        return view('home', compact('users', 'chartDatas'));
    }
}
