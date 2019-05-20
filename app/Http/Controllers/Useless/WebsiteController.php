<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    public function home(){

        return view('website.index');
    }

    public function loginTest(){

        return view ('website.login.login');
    }

    public function testsList(){
        return view ('website.training.testLists');
    }

    public function testsListById($id){
        return view ('website.training.testById', array('id' => $id));
    }

    public function videoList(){
        return view ('website.training.videoLists');
    }
}
