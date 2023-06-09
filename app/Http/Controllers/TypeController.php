<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Type;
use Exception;
use Illuminate\Http\Request;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Type::all();

        if($data){
            return ApiFormatter::createApi('200', 'Success', $data);
        }else{
            return ApiFormatter::createApi('404', 'Data Not Found', null);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.type.create',[
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'housing'   => 'required',
                'apartement'    => 'required',
                'villa' => 'required',
            ]);

            $data = Type::create([
                'housing'   => $request->housing,
                'apartement'    => $request->apartement,
                'villa' => $request->villa,
            ]);

            if($data){
                return ApiFormatter::createApi('200', 'Success', $data);
            }else{
                return ApiFormatter::createApi('400', 'Failed', null);
            }
        }catch(Exception $e){
            return ApiFormatter::createApi('400', 'Failed', null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Type $type)
    {
        return view('admin.type.show',[
            'data' => $type
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Type $type)
    {
        return view('admin.type.edit',[
            'data' => $type
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Type $type)
    {
        try{
            $request->validate([
                'housing'   => 'required',
                'apartement'    => 'required',
                'villa' => 'required',
            ]);

            $data = Type::where('id',$type->id)->update([
                'housing'   => $request->housing,
                'apartement'    => $request->apartement,
                'villa' => $request->villa,
            ]);

            if($data){
                return ApiFormatter::createApi('200', 'Success', $data);
            }else{
                return ApiFormatter::createApi('400', 'Failed', null);
            }
        }catch(Exception $e){
            return ApiFormatter::createApi('400', 'Failed', null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Type $type)
    {
        try{
            $data = Type::where('id',$type->id)->delete();

            if($data){
                return ApiFormatter::createApi('200', 'Success', $data);
            }else{
                return ApiFormatter::createApi('400', 'Failed', null);
            }
        }catch(Exception $e){
            return ApiFormatter::createApi('400', 'Failed', null);
        }
    }
}
