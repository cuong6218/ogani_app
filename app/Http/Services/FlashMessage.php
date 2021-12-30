<?php
namespace App\Http\Services;

use Illuminate\Http\Request;

class FlashMessage{
    public function _notifyMsg(Request $request, $message = "", $error = "success") {
        return $request->session()->flash($error, $message);
    }
}