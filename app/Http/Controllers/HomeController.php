<?php

namespace App\Http\Controllers;


use App\Models\Dailyreport;
use App\Models\User;
use function GuzzleHttp\Promise\all;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $data = [
            'title' => 'صفحه اصلی',
            'users' => User::all(),
            'report' => new Dailyreport(),
        ];
        return view('home', $data);
    }
}
