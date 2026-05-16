<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MainController extends Controller
{
    public function index()
    {
        return redirect()->route('eqips');
    }
    public function api(Request $request)
    {
        $data = [
            'equp_token' => $request->input('equp_token'),
            'x' => $request->input('x'),
            'y' => $request->input('y'),
            'datetime' => $request->input('datetime')
        ];
        $response =  Http::post('http://go-api:8331', $data);

        if ($response->successful()) {
            return $response->json();
        }

        return response()->json(['error' => 'Failed to reach Go API'], 500);
    }
}
