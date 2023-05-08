<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use Symfony\Component\HttpFoundation\Response;

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
                                // .view('admin.unit.all',["units" => Unit::all()]);
        }else{
            return ApiFormatter::createApi('404', 'Data Not Found', null);
        }


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.unit.create',[
            // "dokter" => Dokter::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'rent' => 'required',
                'image_1' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_2' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_3' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_4' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_plan' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'bloc' => 'required',
                'certificate' =>  'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                // 'specification_id' => 'required',
                // 'properties_id' => 'required',
            ]);
            
            $image_path_1 = $request->file('image_1')->store('image', 'public');
            $image_path_2 = $request->file('image_2')->store('image', 'public');
            $image_path_3 = $request->file('image_3')->store('image', 'public');
            $image_path_4 = $request->file('image_4')->store('image', 'public');
            $image_path_5 = $request->file('image_plan')->store('image', 'public');
            $image_path_6 = $request->file('certificate')->store('image', 'public');

            $unit = Unit::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'rent' => $request->rent,
                'image_1' => $request->$image_path_1,
                'image_2' => $request->image_path_2,
                'image_3' => $request->image_path_3,
                'image_4' => $request->image_path_4,
                'image_plan' => $request->image_path_5,
                'bloc' => $request->bloc,
                'certificate' => $request->image_path_6,
                // 'specification_id' => $request->specification_id,
                // 'properties_id' => $request->properties_id,
            ]);

            // $unit = Unit::create($validateData);


            $data = Unit::where('id','=', $unit->id)->get();

            if ($data) {
                return ApiFormatter::createApi('200', 'Data Created', $data).redirect('/admin/unit/data',);
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
            return ApiFormatter::createApi('200', 'Data Created', $data).view('admin.unit.detail',["unit" => Unit::find($id)]);
        } else {
            return ApiFormatter::createApi('400', 'Bad Request', null);
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.unit.edit', [
            "unit" => Unit::find($id),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try{
            $request->validate([
                'title' => 'required',
                'description' => 'required',
                'price' => 'required',
                'rent' => 'required',
                'image_1' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_2' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_3' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_4' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'image_plan' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'bloc' => 'required',
                'certificate' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                // 'specification_id' => 'required',
                // 'properties_id' => 'required',
            ]);

            

            $unit = Unit::findOrfail($id);

            $unit->update([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'rent' => $request->rent,
                'image_1' => $request->image_1,
                'image_2' => $request->image_2,
                'image_3' => $request->image_3,
                'image_4' => $request->image_4,
                'image_plan' => $request->image_plan,
                'bloc' => $request->bloc,
                'certificate' => $request->certificate,
                // 'specification_id' => $request->specification_id,
                // 'properties_id' => $request->properties_id,
            ]);
            
            $data = Unit::where('id','=', $unit->id)->get();

            if ($data) {
                return ApiFormatter::createApi('200', 'Data Created', $data).redirect('/admin/unit/data',);
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
                return ApiFormatter::createApi('200', 'Data Deleted', null).redirect('/admin/unit/data',);
            } else {
                return ApiFormatter::createApi('400', 'Bad Request', null);
            }
        }catch(Exception $e){
                return ApiFormatter::createApi('400', 'Internal Server Error', null);
            }
    }

    public function imageStore(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);
        $image_path = $request->file('image')->store('image', 'public');

        $data = Unit::create([
            'image' => $image_path,
        ]);

        return response($data, Response::HTTP_CREATED);
    }
}
