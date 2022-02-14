<?php

namespace App\Http\Controllers;

//use Illuminate\Support\Facades\DB;
use App\Http\Middleware\Benchmark;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller{

    public function __construct()
    {
//        $this->middleware(Benchmark::class);
//        或者
        $this->middleware('benchmark:test1,test2', ['only' => ['hello']]);
        // 方便做管理
        // 指定函数排除 ['except' => ['hello']])
        // 指定生效 ['only' => ['hello']])
//        做鉴权
//        $this->middleware('auth:admin,general', ['only' => ['hello']]);
    }

    public function hello()
    {
        return "hello 1";
    }

    public function hello2()
    {
        return "hello 2";
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

    /**
     * 1
     */
    public function dbTest()
    {
        return DB::select('select * from user');
//        return 111;
    }
}




