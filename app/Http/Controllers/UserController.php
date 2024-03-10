<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $users = User::paginate(5);
        return view('users.index',['users' => $users]);
    }
    public function authLogin(){
        return view('login');
    }
    public function login(Request $request){
        $request->validate([
            'email'=>'required|email',
            // 'password'=>'required|min:3|max:12'
        ]);
        $user = User::where('email','=',$request->email)->first();
        if($user){
            if(Hash::check($request->password, $user->password)){
                $request->session()->put('user',$user);
                return redirect('/');


            }else{
                return back()->with('fail','Password not matches');
            }
        }else{
            return back()->with('fail','this email is not registered');
        }
    }
    public function authregister(){
        return view('register');
    }

    public function register(Request $request){
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|max:11',
            'avatar' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
        } else {
            $avatarPath = null;
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birth' => $request->birth,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
        ]);

        // Redirect user after successful registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|min:10|max:11',
            'password' => 'required|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars');
        } else {
            $avatarPath = null;
        }

        // Create new user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'birth' => $request->birth,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'avatar' => $avatarPath,
        ]);

        // Redirect user after successful registration
        return redirect()->route('login')->with('success', 'Registration successful. Please log in.');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
