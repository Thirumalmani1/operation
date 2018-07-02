<?php

namespace App\Http\Controllers;
use APP\crud;
use Illuminate\Http\Request;

class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cruds=\App\crud::all();
        return view('index',compact('cruds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $cruds= new \App\crud;
       $cruds->name=$request->get('name');
       $cruds->age=$request->get('age');
       $cruds->salary=$request->get('salary');
       $cruds->position=$request->get('position');
       $cruds->number=$request->get('number');
       $cruds->save();
       return redirect('crud')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {    
        // echo 1; exit();
         return view('index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    { 
         $cd= \App\crud::find($id);
        return view('update',compact('cd','id'));
    }

    /**
     * Update the specified resource in storage.
    id
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {   

         $cd= \App\crud::find($id);
         $cd->name = $request->name;
         $cd->age = $request->age;
         $cd->salary = $request->salary;
         $cd->position = $request->position;
         $cd->number = $request->number;
          $cd->save();
        return redirect('crud');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {    
        echo "hii";
         exit();
        // $cd=\App\crud::find($id);
        // $cruds='';
        // $cd->delete();
        //   return view('index',compact('cruds'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function test($id)
    {
        echo "esdfd";
    }
}
