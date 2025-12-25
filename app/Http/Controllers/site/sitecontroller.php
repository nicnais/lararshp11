<?php

namespace App\Http\Controllers\site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        return view('site.home');
    }
    public function dbconn()
    {
        dd(DB::table('pet')->get());
        try{
            
            DB::connection()->getPdo();
            echo "Connected successfully to the database: ";
        } catch (\Exception $e) {
            echo "Could not connect to the database. Please check your configuration. Error: " . $e->getMessage();
        }
    }

    public function login()
    {
        return view('site.login');
    }
}