<?php

namespace App\Http\Controllers;

use App\Models\Surat\ArahanSurat;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use App\Models\User;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    // public function Registers()

    // {

    //     $items = ArahanSurat::pluck('arahan_surat', 'id');

    //     $selectedID = 2;

    //     // return dd($items);
    //     return view('auth.register', compact('items', 'selectedID'));
    // }
}