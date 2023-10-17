<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //for security
    public function index(){
        return 'Yes';
    }

    //stripe web hooks needs this
    public function success(){
        return View('success');
    }

    //stripe web hooks needs this

    public function cancel(){
        return 'cancel';
    }

    // //for security
    // public function checkoutpay(){
    //     return 'Yes';
    // }
}
