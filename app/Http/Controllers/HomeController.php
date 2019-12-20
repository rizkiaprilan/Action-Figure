<?php

namespace App\Http\Controllers;

use App\Figure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = Figure::paginate(6);
//        dd($data);
        return view('home/index', [
            'data' => $data,
        ]);
    }

    public function search(Request $request)
    {
        $search = $request->get('search');
        $data = Figure::where('name', 'like', '%' . $search . '%')->orWhere('category', 'like', '%' . $search . '%')->paginate(3);

        return view('home/index', [
            'data' => $data,
        ]);
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
