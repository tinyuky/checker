<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function gettablelist($mysql){
        return DB::connection('mysql'.$mysql)->getDoctrineSchemaManager()->listTableNames();
    }
    
    public function getcolumnlist($mysql,$table){
        $rs = [];
        $columns =  DB::connection('mysql'.$mysql)->getDoctrineSchemaManager()->listTableColumns($table);
        foreach ($columns as $key => $value) {
            $rs[] = $key;
        }
        return $rs;
    }

    public function connectdata($mysql,$table){
        $row = DB::connection('mysql'.$mysql)->table($table)->get();
        return count($row);
    }

    public function connectlist(){
        $rs = [];
        $connect = Config::get('database');
        foreach ($connect['connections'] as $key => $value) {
            if( strpos($key,'mysql')>-1){
                $rs[] = str_replace('mysql','',$key);
            }
        }
        return $rs;
    }
}
