<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
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
    // methods
    public function home()
    {
        $page = "Home";
        $data = array('page' => $page);
        return view('home')->with('data', $data);
    }
    public function register()
    {
        $page = "Register";
        $data = array('page' => $page);
        return view('user.register')->with('data', $data);
    }
    public function login()
    {
        $page = "Login";
        $data = array('page' => $page);
        return view('user.login')->with('data', $data);
    }
    public function dashboard()
    {
        $page = "Dashboard";
        $user = Auth::user();
        $data = array('page' => $page, 'user' => $user);
        return view('user.dashboard')->with('data', $data);
    }
}
