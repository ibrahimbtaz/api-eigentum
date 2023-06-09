<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Specification;
use Exception;
use Illuminate\Http\Request;
use Symfony\Component\CssSelector\Node\Specificity;

class SpecificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Specification::all();

        if ($data) {
            return ApiFormatter::createApi('200', 'Success', $data);
        } else {
            return ApiFormatter::createApi('404', 'Data Not Found', null);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.specification.create', []);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $request->validate([
                'bedroom' => 'required',
                'bathroom' => 'required',
                'surface_area'  => 'required',
                'building_area' => 'required',
                'floor' => 'required',
                'type_id'   => 'required',
            ]);

            $data = Specification::create([
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'surface_area'  => $request->surface_area,
                'building_area' => $request->building_area,
                'floor' => $request->floor,
                'type_id'   => $request->type_id,
            ]);

            if ($data) {
                return ApiFormatter::createApi('200', 'Success', $data);
            } else {
                return ApiFormatter::createApi('400', 'Failed', null);
            }
        } catch (Exception $e) {
            return ApiFormatter::createApi('400', 'Failed', null);
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(Specification $specification)
    {
        return view('admin.specification.show', [
            'data' => $specification
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Specification $specification)
    {
        return view('admin.specification.edit', [
            'data' => $specification
        ]);
    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request, Specification $specification, string $id)
    {
        try {
            $request->validate([
                'bedroom' => 'required',
                'bathroom' => 'required',
                'surface_area'  => 'required',
                'building_area' => 'required',
                'floor' => 'required',
                'type_id'   => 'required',
            ]);

            $specification = Specification::findOrfail($id);

            $data = Specification::where('id', $specification->id)->update([
                'bedroom' => $request->bedroom,
                'bathroom' => $request->bathroom,
                'surface_area'  => $request->surface_area,
                'building_area' => $request->building_area,
                'floor' => $request->floor,
                'type_id'   => $request->type_id,
            ]);

            $data = Specification::where('id', '=', $specification->id)->get();

            if ($data) {
                return ApiFormatter::createApi('200', 'Success', $data);
            } else {
                return ApiFormatter::createApi('400', 'Failed', null);
            }
        } catch (Exception $e) {
            return ApiFormatter::createApi('400', $e->getMessage(), null);
        }
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy(Specification $specification, string $id)
    {
        try {
            $specification = Specification::findOrfail($id);

            $data = $specification->delete();
            if ($data) {
                return ApiFormatter::createApi('200', 'Success', $data);
            } else {
                return ApiFormatter::createApi('400', 'Failed', null);
            }
        } catch (Exception $e) {
            return ApiFormatter::createApi('400', 'Failed', null);
        }
    }
}
