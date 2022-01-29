<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller{
    public function hello()
    {
        return "hello 1";
    }

    public function getOrder(Request $request, $id=10, $name) {
//        return $request->input();

//        $query = $request->query();
//        $post = $request->post();
//        return ['query'=>$query, 'post'=>$post];
        return [$id, $name];
    }

    public function getUser(Request $request) {
        return $request->input('id');
    }

}




