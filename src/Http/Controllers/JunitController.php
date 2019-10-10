<?php

namespace Wengdada\JunitLaravel\Http\Controllers;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class JunitController extends BaseController
{
    public function index()
    {
        return view('junit::index');
    }

    public function store(Request $request)
    {
        $namespace = $request->input('namespace');
        $className = $request->input('className');
        $action= $request->input('action', 'index');
        $param = $request->input('param');

        $class = ($className == "") ? $namespace : $namespace.'\\'.$className;
        $object = new $class;
        $param = ($param == "") ? [] : explode('|', $param);
        $data = call_user_func_array($object, $action, $param);
        return is_array($data) ? json_encode($data) : dd($data);
    }
}