<?php

namespace App\Controllers;

class Users extends BaseController
{
  public function index(): string
    {

        return view('user/landing');
    }
 
    public function roadmap(): string
    {

        return view('user/roadmap');
    }
    
    public function moodboard(): string
    {

        return view('user/moodboard');
    }   

}




   // public function headers(): string
    // {
    //     return view('components/header/header');
    // }

    // public function textchange(): string
    // {
    //     return view('user/textchange');
    // }