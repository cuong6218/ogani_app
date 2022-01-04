<?php
namespace App\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;

class AdminController extends BaseController
{
    public function index() {
        $sth = "test rebase";
        return view('admin.home.dashboard');
    }
}