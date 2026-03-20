<?php

namespace App\Http\Controllers\MainSite;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FranchiseInfoController extends Controller
{
    // public function index()
    // {
    //     return view('main_site.pages.franchise.info');
    // }
    public function store(Request $request)
    {
        // validation ya data save

        return redirect()->route('main.franchise.info')
                        ->with('success', 'Application submitted successfully!');
    }
}
