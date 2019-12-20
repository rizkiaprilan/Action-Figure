<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Category;
use App\Feedback;
use App\Figure;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdminConstroller extends Controller
{
    public function figure()
    {
        $data = Figure::paginate(6);

        return view('admin/figure', compact('data'));
    }

    public function insertfigure()
    {
        $data = Category::all();
        return view('admin/insertFigure', compact('data'));
    }

    public function storefigure(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
            'category' => ['required'],
            'price' => ['required', 'numeric', 'min:100000'],
            'description' => ['required', 'string', 'min:10'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],

        ]);
        $request = request();
        $profileImage = $request->file('photo');
        $new_name = $profileImage->getClientOriginalName();
        $dest = storage_path('app/public/figure');
        $profileImage->move($dest,$new_name);

        DB::table('figures')->insert([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'photo' => $new_name,
        ]);

        return redirect('/');
    }

    public function updatefigure($id){
        $data = Figure::where('id','=',$id)->first();
        $category = Category::get();


        return view('admin/updateFigure',compact('data','category'));

    }

    public function setfigure(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
            'category' => ['required'],
            'price' => ['required', 'numeric', 'min:100000'],
            'description' => ['required', 'string', 'min:10'],
            'quantity' => ['required', 'numeric', 'min:1'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],

        ]);
        $request = request();
        $profileImage = $request->file('photo');
        $new_name = $profileImage->getClientOriginalName();
        $dest = storage_path('app/public/figure');
        $profileImage->move($dest,$new_name);

        DB::table('figures')->where('id','=',$request->id)->update([
            'name' => $request->name,
            'category' => $request->category,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'photo' => $new_name,
        ]);

        return redirect('/');
    }

    public function deletefigure($id){
        $data = Figure::find($id);
        $data->delete();
        return redirect(route('figure'));

    }

    public function user()
    {
        $data = User::paginate(6);

        return view('admin/user', compact('data'));
    }

    public function insertuser()
    {
//        $data = Category::all();
        return view('admin/insertuser');
    }

    public function storeuser(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email', 'unique:users'],
            'password' => ['required', 'string','min:5', 'confirmed','alpha_num'],
            'phone' => ['required', 'string', 'min:11'],
            'gender' => ['required','string'],
            'address' => ['required','min:10'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],
            'terms' => ['required'],

        ]);
        $request = request();
        $profileImage = $request->file('photo');
        $new_name = $profileImage->getClientOriginalName();
        $dest = storage_path('app/public/figure');
        $profileImage->move($dest,$new_name);

        DB::table('users')->insert([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'address' => $request->address,
            'gender' => $request->gender,
            'photo' => $new_name,
        ]);

        return redirect('/');
    }

    public function updateuser($id){
        $data = User::where('id','=',$id)->first();

        return view('admin/updateuser',compact('data'));

    }

    public function setuser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'min:5'],
            'email' => ['required', 'string', 'email'],
            'phone' => ['required', 'string', 'min:11'],
            'gender' => ['required','string'],
            'role' => ['required'],
            'address' => ['required','min:10'],
            'photo' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg'],

        ]);
        $request = request();
        $profileImage = $request->file('photo');
        $new_name = $profileImage->getClientOriginalName();
        $dest = storage_path('app/public/figure');
        $profileImage->move($dest,$new_name);

        DB::table('users')->where('id','=',$request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->address,
            'role' => $request->role,
            'gender' => $request->gender,
            'photo' => $new_name,
        ]);

        return redirect('/');
    }

    public function deleteuser($id){
        $data = User::find($id);
        $data->delete();
        return redirect(route('user'));

    }

    public function category()
    {
        $data = Category::all();

        return view('admin/category', compact('data'));
    }

    public function insertcategory()
    {
        return view('admin/insertcategory', compact('data'));
    }

    public function storecategory(Request $request)
    {
        $request->validate([
            'category' => ['required'],

        ]);

        DB::table('categories')->insert([
            'category' => $request->category,
        ]);

        return redirect('/');
    }

    public function updatecategory($id){
        $data = Category::where('id','=',$id)->first();

        return view('admin/updatecategory',compact('data'));

    }

    public function setcategory(Request $request){
        $request->validate([
            'category' => ['required'],

        ]);

        DB::table('categories')->where('id','=',$request->id)->update([
            'category' => $request->category,
        ]);

        return redirect('/');
    }

    public function deletecategory($id){
        $data = Category::find($id);
        $data->delete();
        return redirect(route('category'));

    }

    public function feedback()
    {
        $data = DB::table('feedbacks')->get();

        return view('admin/feedback', compact('data'));
    }

    public function approvefeedback($id){

        DB::table('feedbacks')->where('id','=',$id)->update([
            'status' => 'approved',
        ]);

        return redirect(route('feedback'));

    }

    public function removefeedback($id){

        DB::table('feedbacks')->where('id','=',$id)->update([
            'status' => 'rejected',
        ]);
        return redirect(route('feedback'));

    }

    public function transaction()
    {


        $data = Cart::where('status', '=', 'yes')->where('quantity', '!=', '0')->get();

        return view('member/transaction', [
            'data' => $data
        ]);

//        dd($data);
    }

}
