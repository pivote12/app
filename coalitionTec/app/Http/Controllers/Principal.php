<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\File;
use Symfony\Component\HttpFoundation\Session\Storage;

class Principal extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {


        $json = \File::get('app.json');

        $arrayJson = json_decode($json);
        $result = array();

        foreach($arrayJson as $arr)
        {
                array_push($result,$arr);
        }

        return view('front-end.index',compact('result'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $json = \File::get('app.json');
        $id = uniqid();
        $arrayJson = json_decode($json);
        $request['date'] = date('m/d/Y h:i:s a', time());
        $request['id'] = $id;


        array_push($arrayJson, $request->all());


        \File::put('app.json',json_encode($arrayJson));


        return redirect()->action('Principal@index');
        //return view('front-end.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    function date_compare($a, $b)
    {
        $t1 = strtotime($a['datetime']);
        $t2 = strtotime($b['datetime']);
        return $t1 - $t2;
    }
}
