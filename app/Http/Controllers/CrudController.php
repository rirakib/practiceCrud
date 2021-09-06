<?php

namespace App\Http\Controllers;

use App\Models\Crud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Http\Requests\CrudRequest;


class CrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $indexVar = Crud::all();

        return view('index')->with(['indexData'=>$indexVar]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CrudRequest $request)
    {
        //


        $data  = $request->all(['name','img','email']);

        if ($request->file('img')) {
            $image = $request->file('img');
            $image_name = time().'.'.$image->extension();
            $img=Image::make($image->getRealPath())
                ->save(storage_path().'/app/public/'.$image_name);
            $data['img']='/storage/'.$image_name;
        }

        Crud::create($data);
        return redirect()->route('index.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        
        $data = Crud::find($id);
        
        return view('show')->with(['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $crud = Crud::find($id);
        return view('edit')->with(['editVar'=>$crud]);

        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function update(CrudRequest $request, $id)
    {
        $data  = $request->all(['name','img','email']);

        if ($request->file('img')) {
            $image = $request->file('img');
            $image_name = time().'.'.$image->extension();
            $img=Image::make($image->getRealPath())
                ->save(storage_path().'/app/public/'.$image_name);
            $data['img']='/storage/'.$image_name;
        }

        $crud = Crud::find($id);

        $crud->update($data);
        return redirect()->route('index.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Crud  $crud
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $crud = Crud::find($id);
        $crud->delete();
        return redirect()->route('index.index');
    }
}
