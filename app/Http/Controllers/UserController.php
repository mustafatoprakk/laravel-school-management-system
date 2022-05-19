<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    // Profile
    public function profile()
    {
        $data["title"] = "Profile";
        $data["user"] = User::find(Auth::id());
        return view("profile", $data);
    }
    public function profileUpdate(UserStoreRequest $request)
    {
        User::find(Auth::id())->update([
            "name" => $request->name,
            "surname" => $request->surname,
            "email" => $request->email,
            "birth_date" => $request->birth_date,
            "password" => Hash::make($request->password),
        ]);

        $request->session()->regenerate();
        return back()->with("success", "Successfully updated.");
    }

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
    public function store(Request $request)
    {
        //
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



    // Login
    public function login()
    {
        $data["title"] = "Login";
        return view("login", $data);
    }
    public function login_action(Request $request)
    {

        $request->validate([
            "email" => "required",
            "password" => "required",
        ]);

        if (Auth::attempt(["email" => $request->email, "password" => $request->password])) {
            $request->session()->regenerate();
            return redirect()->intended("/");
        }

        return back()->withErrors("password", "Wrong email or password!");
    }

    // Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("login");
    }
}
