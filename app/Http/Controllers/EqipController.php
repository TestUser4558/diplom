<?php

namespace App\Http\Controllers;

use App\Models\Eqip;
use App\Models\User;
use App\Models\Using_eqip;
use Illuminate\Http\Request;

class EqipController extends Controller
{
    public function index()
    {
        $data['eqips'] = Eqip::all();
        return view('user.eqip.index', $data);
    }
    public function indexUsing()
    {
        $data['usings'] = Using_eqip::all()->where('active', 1);
        return view('user.eqip.indexUsing', $data);
    }
    public function info(Eqip $eqip)
    {
        $data['eqip'] =  $eqip;
        return view('user.eqip.info', $data);
    }
    public function useinfo(Using_eqip $use)
    {
        $data['use'] =  $use;
        return view('user.eqip.useinfo', $data);
    }
    public function create()
    {
        return view('user.eqip.create');
    }
    public function store(Request $r)
    {
        $eqip = new Eqip();
        $eqip['name'] = $r->name;
        $eqip['description'] = $r->description;
        $eqip['token'] = str()->random(16);
        $eqip['last_chek_date'] = date('Y-m-d');
        $eqip->save();
        return redirect()->route('eqips');
    }
    public function edit(Eqip $eqip)
    {
        $data['eqip'] =  $eqip;
        return view('user.eqip.edit', $data);
    }
    public function update(Eqip $eqip, Request $r)
    {
        $eqip['name'] = $r->name;
        $eqip['description'] = $r->description;
        $eqip->save();
        return redirect()->route('eqips');
    }
    public function delete(Eqip $eqip)
    {
        $eqip->delete();
        return redirect()->route('eqips');
    }
    public function check(Eqip $eqip)
    {
        $data['eqip'] =  $eqip;
        return view('user.eqip.check', $data);
    }
    public function checkHandle(Eqip $eqip, Request $r)
    {
        $date = $r->date;
        $certificate= $r->certificate;
        $eqip['last_chek_date'] = $date;
        $eqip['certificate'] = $certificate;
        $eqip->save();
        return redirect()->route('eqips');
    }
    public function setAcess(Eqip $eqip)
    {
        $data['users'] = User::where('role_id', '!=', 1)->get();
        $data['eqip'] = $eqip;
        return view('user.eqip.acess', $data);
    }
    public function endAcess(Using_eqip $eqip)
    {
        $eqip['date_end'] = date('Y-m-d');
        $eqip['active'] = false;
        $eqip->save();
        return redirect()->route('eqipsUsing');
    }
    public function setAcessHandle(Eqip $eqip, Request $r)
    {
        $use = new Using_eqip();
        $use['user_id'] = $r->user_id;
        $use['eqip_id'] = $eqip->id;
        $use['date_start'] = date('Y-m-d');
        $use->save();
        return redirect()->route('eqipsUsing');
    }
}
