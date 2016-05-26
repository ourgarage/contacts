<?php

namespace Ourgarage\StaticPages\Http\Controllers;

use App\Http\Controllers\Controller;

class StaticPagesController extends Controller
{

    public function index()
    {
        if (view()->exists('packages.contacts.test')) {
            return view('packages.contacts.test');
        } else {
            return view('contacts::test');
        }​
    }

}