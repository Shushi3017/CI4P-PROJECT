<?php

namespace App\Controllers;

class Admin extends BaseController
{
    public function index(){

 return view('admin/admin-dboard');
                     }
    public function gameManager(){
 return view('admin/gameManager') ; 
    
       
    }
    public function userManager(){
 return view('admin/userManage');
      
    
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