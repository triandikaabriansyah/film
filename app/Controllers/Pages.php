<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function index()
	{   
        $data = [
            'title' => 'Home| Triandika'
        ];
		return view('pages/home', $data);
	}
    public function about(){
        $data = [
            'title' => 'About| Triandika'
        ];
        return view('pages/about', $data);
    }
}
