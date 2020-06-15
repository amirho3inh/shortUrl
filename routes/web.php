<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

$router->get('/', function () use ($router) {
    //return $router->app->version();
//    return view('index');
    return view('index2');
});

$router->get('/404', function () use ($router) {
    return view('404');
});

$router->get('/{code}', function ($code) use ($router) {
    $results = app('db')->select("SELECT * FROM urls where code = '$code' LIMIT 1");
    if($results){
        $newVisited = (int)$results[0]->visited+1;
        $id = (int)$results[0]->id;
        $visited = app('db')->update("update urls set visited = '$newVisited' where id = $id");
        $data = ['url'=>$results[0]->url, 'visit'=>$results[0]->visited, 'date'=>$results[0]->created_at];
        return view('redirect', ['data' => $data]);
        //return response()->json(['error' => false, 'data' => $data, 'message' => '']);

    }else{
        return view('404');
        //return response()->json(['error' => true, 'data' => '', 'message' => 'DOMAIN_NOT_FOUND']);
    }
});

$router->get('/api/{code}', function ($code) use ($router) {
    $results = app('db')->select("SELECT * FROM urls where code = '$code' LIMIT 1");
    if($results){
        $newVisited = (int)$results[0]->visited+1;
        $id = (int)$results[0]->id;
        $visited = app('db')->update("update urls set visited = '$newVisited' where id = $id");
        $data = ['url'=>$results[0]->url, 'visit'=>$results[0]->visited, 'date'=>$results[0]->created_at];
        return response()->json(['error' => false, 'data' => $data, 'message' => '']);
    }else{
        return response()->json(['error' => true, 'data' => '', 'message' => 'DOMAIN_NOT_FOUND']);
    }
});

$router->post('/api/newUrl', function (Request $request) use ($router) {
    $domain = $request->post('domain');
    $ip = $_SERVER['REMOTE_ADDR'];
    $visited = 0;

    $length = 3;
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $strRand = '';
    $lastId = app('db')->select("SELECT IFNULL(max(id), 0) as id FROM urls");
    for ($p = 0; $p < $length; $p++) {
        $strRand .= $characters[mt_rand(0, strlen($characters))];
        if($p == 1){
            $strRand .= ((int)$lastId[0]->id+1);
        }
    }
//    $code = base64_encode(((int)$lastId[0]->id+1).$strRand);

    $results = app('db')->insert("INSERT INTO urls (url,code,ip,visited,created_at) VALUES ('$domain','$strRand','$ip','$visited',now())");
    if($results){
        return response()->json(['error' => false, 'data' => ['code'=>$strRand], 'message' => 'INSERTED']);
    }else{
        return response()->json(['error' => true, 'data' => '', 'message' => 'NOT_INSERTED']);
    }
});