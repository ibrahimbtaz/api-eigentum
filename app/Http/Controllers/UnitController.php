<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Unit::all();

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
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $validateData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'rent' => 'required',
                'image-1' => 'required',
                'image-2' => 'required',
                'image-3' => 'required',
                'image-4' => 'required',
                'image-plan' => 'required',
                'bloc' => 'required',
                'certificate' => 'required',
                'specification_id' => 'required',
                'properties_id' => 'required',
            ]);

            $unit = Unit::create($validateData);

            $data = Unit::where('id','=', $unit->id)->get();

            if ($data) {
                return ApiFormatter::createApi('200', 'Data Created', $data);
            } else {
                return ApiFormatter::createApi('400', 'Bad Request', null);
            }


        }catch(Exception $e){
            return ApiFormatter::createApi('400', 'Internal Server Error', null);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Unit::where('id','=', $id)->get();

        if ($data) {
            return ApiFormatter::createApi('200', 'Data Created', $data);
        } else {
            return ApiFormatter::createApi('400', 'Bad Request', null);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $validateData = $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'rent' => 'required',
                'image-1' => 'required',
                'image-2' => 'required',
                'image-3' => 'required',
                'image-4' => 'required',
                'image-plan' => 'required',
                'certificate' => 'required',
                'specification_id' => 'required',
                'properties_id' => 'required',
            ]);

            $unit = Unit::findOrfail($id);

            $unit->update($validateData);

            $data = Unit::where('id','=', $unit->id)->get();

            if ($data) {
                return ApiFormatter::createApi('200', 'Data Created', $data);
            } else {
                return ApiFormatter::createApi('400', 'Bad Request', null);
            }


        }catch(Exception $e){
            return ApiFormatter::createApi('400', 'Internal Server Error', null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try{
            $unit = Unit::findOrfail($id);

            $data = $unit->delete();

            if ($data) {
                return ApiFormatter::createApi('200', 'Data Deleted', null);
            } else {
                return ApiFormatter::createApi('400', 'Bad Request', null);
            }
        }catch(Exception $e){
                return ApiFormatter::createApi('400', 'Internal Server Error', null);
            }
    }
}
