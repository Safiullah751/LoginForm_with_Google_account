<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        session(['from_register'=>true]);
        //validate
       $fill = $request->validate([
          'username'=>['required' ,'max:25'],
          'email' =>['email', 'required','unique:users'],
          'password'=> ['required' , 'confirmed' , 'min:6' , 'max:25']

        ]);
          //Store user
         $user =User::create($request->all());
          //redirect user
        return redirect()->route('login')->with('success' ,'You Successfully create a account');
    }

    public function login(Request $request){
        session()->forget('from_register');

         //validate
          $request->validate([
            'email' =>['email', 'required','exists:users,email'],
            'password'=>['required']

          ]);
         // try to login
            $user=\App\Models\User::where('email',$request->email)->first();
      if($user && $request->password === $user->password){
        Auth::login($user);
          return redirect()->route('home');
      }
      else{
        return back()->withErrors([
        'error'=>'The credentisls do not match our records',
        ]);
      }

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
