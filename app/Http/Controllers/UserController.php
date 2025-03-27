<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserController extends Controller
{
    // constructor
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            // generate the response by passing the request to the next middleware or controller
            $response = $next($request);
            // add caching headers to the response
            $response->headers->set('Cache-Control', 'no-cache, no-store, must-revalidate');
            $response->headers->set('Pragma', 'no-cache');
            $response->headers->set('Expires', '0');
            // return the modified response
            return $response;
        });
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * NB: Existing Email and Phone Number not catched.
     */
    public function store(Request $request)
    {
        // get user input
        $firstname = $request->firstname;
        $lastname = $request->lastname;
        $email = $request->email;
        $phonenumber = $request->phonenumber;
        $username = $request->username;
        $password = Hash::make($request->password);
        // store in array
        $user = array(
            'firstname' => $firstname,
            'lastname' => $lastname,
            'email' => $email,
            'phonenumber' => $phonenumber,
            'username' => $username,
            'password' => $password
        );
        // store in DB
        User::create($user);
        // return response
        return response()->json(['success' => true, 'message' => 'Registration Successful']);
    }

    /**
     * Perform user authentication.
     */
    public function authenticate(Request $request)
    {
        // set user to empty
        $user = "";
        // get user input
        $identity = $request->identity;
        $password = $request->password;
        /**
         * BRANCHING OR NESTED IF implemented
         * to handle user authentication
         */
        // cond
        if((User::where('email', $identity)->first())) {
            // fetch user
            $user = User::where('email', $identity)->first();
            // cond (verify password)
            if(Hash::check($password, $user->password)) {
                // login user
                Auth::login($user);
                return response()->json(['redirect' => '/user/dashboard']);
            } else {
                return response()->json(['message' => 'Password Not Correct']);
            }
        } else {
            // cond
            if((User::where('username', $identity)->first())) {
                // fetch user
                $user = User::where('username', $identity)->first();
                // cond (verify password)
                if(Hash::check($password, $user->password)) {
                    // login user
                    Auth::login($user);
                    return response()->json(['redirect' => '/user/dashboard']);
                } else {
                    return response()->json(['message' => 'Password Not Correct']);
                }
            } else {
                return response()->json(['message' => 'User Not Found']);
            }
        }
    }

    /**
     * Logout user.
     */
    public function logout(Request $request)
    {
        Auth::logout(); // logout the user
        $request->session()->invalidate(); // invalidates the session
        $request->session()->regenerateToken(); // regenerates CSRF token
        return response()->json(['message' => 'Logout Successful', 'redirect' => '/user/login']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for changing user password
     */
    public function changePassword()
    {
        $page = "Change Password ";
        $user = Auth::user();
        $data = array('page' => $page, 'user' => $user);
        return view('user.changepassword')->with('data', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // get new password, hash
        $newPassword = Hash::make($request->newPassword);
        // find user
        $user = User::find($id);
        // set new password, save, return response
        $user->password = $newPassword;
        $user->save();
        return response()->json(['success' => true, 'message' => 'Password Changed Successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
