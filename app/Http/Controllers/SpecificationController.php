<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Specification;
use Illuminate\Http\Request;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Specification::all();

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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Specification $specification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specification $specification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Specification $specification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Specification $specification)
    {
        //
    }
}
