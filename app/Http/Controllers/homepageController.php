<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class homepageController extends Controller
{
    public function homeView(){
        $data=[
            'totalProducts'=>310,
            'salesToday'=>100,
            'totalRevenue'=>'Rp 75.000.000',
            'registeredUsers'=>350
        ];
        return view('component.home', $data);
    }
}
