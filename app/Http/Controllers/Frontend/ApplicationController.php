<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Union;
use App\Models\UpaZila;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function index (Request $request) {
        $upozilas = UpaZila::all();
        $unions = Union::all();
        return view('frontend.application.index', compact('upozilas','unions'));
    }

    public function show (Request $request) {

        $this->validate($request, [
            'upozila' => 'required|numeric|exists:upa_zilas,id',
            'main_union' => 'required|numeric|exists:unions,id',
        ]);

        $upa_zila_id = $request->upozila;
        $union_id = $request->main_union;


        return redirect()->route('application.index',['upa_zila_id' => $upa_zila_id, 'union_id' => $union_id]);
    }
}
