<?php

namespace App\Http\Controllers;

use App\Models\Using_eqip;

class UseController extends Controller
{
    public function info(Using_eqip $use,)
    {
        $data['use'] =  $use;
        return view('user.use.info', $data);
    }
    public function card(Using_eqip $use,)
    {
        $data['use'] =  $use;
        return view('user.use.card', $data);
    }
}
