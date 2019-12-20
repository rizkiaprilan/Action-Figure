<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Feedback;
use App\Figure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MemberController extends Controller
{
    public function view($id)
    {
        $data = Figure::where('id', '=', $id)->first();

        return view('member/view', [
            'data' => $data]);
    }

    public function cart($id)
    {
        $data = Figure::where('id', '=', $id)->first();

        if ($data->quantity != 0) {
            Cart::create([
                'figure_id' => $data->id,
                'user_id' => Auth::user()->id,
                'figure_price' => $data->price,
            ]);
        }
        return redirect('/');

    }

    public function cartshow()
    {
        $data = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'no')->get();
        $balance = DB::table('carts')->where('user_id', '=', Auth::user()->id)->where('status', '=', 'no')->sum('figure_price');

        return view('member/cart', [
            'data' => $data,
            'balance' => $balance,
        ]);

    }

    public function cartdelete($id)
    {
        $data = Cart::find($id);
        $data->Delete();
//        dd($id);

        return redirect(route('cartshow'));
    }

    public function checkout(Request $request)
    {
        $cek = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'yes')->get()->last();
        $cek2 = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'no')->get();
        $quantity = Figure::all();


        if ($cek != null) {
            Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'no')
                ->update([
                    'transaction' => (int)$cek->transaction + 1,
                ]);
        }


        foreach ($cek2 as $index => $value) {
//            dd((int)$request->qty[$index]);
            if ((int)$request->qty[$index] != 0) {
                Figure::where('id', '=', $cek2[$index]->figure_id)->update([
                    'quantity' => Figure::where('id', '=', $cek2[$index]->figure_id)->value('quantity') - (int)$request->qty[$index],
                ]);

                $test = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'no')->first();
                $test->status = 'yes';
                $test->quantity = (int)$request->qty[$index];
                $test->save();
            } else {
//                dd($cek2[$index]);
                $cek2[$index]->delete();
            }


            if ($index + 1 == $cek2->count()) {
                break;
            }
        }

        $data = Cart::all();
        $figure = Figure::all();
        foreach ($data as $index => $value) {                                          //calculate price

            Cart::where('id', '=', $data[$index]->id)->update([
                'price' => $data[$index]->figure_price * $data[$index]->quantity,
            ]);

            if ($index + 1 == $data->count()) {
                break;
            }

        }
        return redirect('/');
    }

    public function transaction()
    {


        $data = Cart::where('user_id', '=', Auth::user()->id)->where('status', '=', 'yes')->where('quantity', '!=', '0')->get();
        return view('member/transaction', [
            'data' => $data]);

//        dd($data);
    }

    public
    function profile($id)
    {
        $data = User::where('id', '=', $id)->first();

        if (Auth::user()->role != null) {
            return view('member/profile', [
                'data' => $data,
            ]);
        }
    }

    public
    function profileupdate(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string', 'min:11'],
            'gender' => ['required'],
            'address' => ['required', 'string'],
        ]);

        User::where('id', '=', $request->id)
            ->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'gender' => $request->gender,
                'address' => $request->address,
            ]);
        return redirect('/');
    }

    public
    function feedback($id)
    {
//        $data = Feedback::where('id','=',$id)->first();

        if (Auth::user()->role != null) {
            return view('member/feedback');
        }
    }

    public
    function storefeedback(Request $request)
    {
        $request->validate([
            'feedback' => ['required', 'string', 'min:10'],
        ]);

//        Feedback::create([
//            'user_id' => Auth::user()->id,
//            'feedback' => $request->feedback,
//        ]);

        DB::table('feedbacks')->insert([
            'user_id' => Auth::user()->id,
            'feedback' => $request->feedback,
        ]);

        return redirect('/');
    }
}
