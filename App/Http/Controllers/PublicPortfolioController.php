<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PublicPortfolioController extends Controller
{
    //
    public function show($username)
{
    $user = User::where('username',$username)
        ->with([
            'projects',
            'skills',
            'experiences',
            'certificates'
        ])
        ->firstOrFail();


    return view(
        'portfolio.show',
        compact('user')
    );
}
}
