<?php

namespace App\Http\Controllers;

use App\Helper\ApiFormatter;
use App\Models\Unit;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
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
            // return view('admin.unit.all',['units' => $data]);
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
                'image_1' =>  'required',
                'image_2' =>  'required',
                'image_3' =>  'required',
                'image_4' =>  'required',
                'image_plan' =>  'required',
                'bloc' => 'required',
                'certificate' =>  'required',
                // 'specification_id' => 'required',
                // 'properties_id' => 'required',
            ]);
            
            $imageName1 = Str::random(32).".".$request->image_1->getClientOriginalExtension();
            $imageName2 = Str::random(32).".".$request->image_2->getClientOriginalExtension();
            $imageName3 = Str::random(32).".".$request->image_3->getClientOriginalExtension();
            $imageName4 = Str::random(32).".".$request->image_4->getClientOriginalExtension();
            $imageName5 = Str::random(32).".".$request->image_plan->getClientOriginalExtension();
            $imageName6 = Str::random(32).".".$request->certificate->getClientOriginalExtension();

            // $image_1 = $request->file('image_1')->store('image', 'public');
            // $image_2 = $request->file('image_2')->store('image', 'public');
            // $image_3 = $request->file('image_3')->store('image', 'public');
            // $image_4 = $request->file('image_4')->store('image', 'public');
            // $image_plan = $request->file('image_plan')->store('image', 'public');
            // $image_6 = $request->file('certificate')->store('image', 'public');

            $unit = Unit::create([
                'title' => $request->title,
                'description' => $request->description,
                'price' => $request->price,
                'rent' => $request->rent,
                'image_1' => $imageName1,
                'image_2' => $imageName2,
                'image_3' => $imageName3,
                'image_4' => $imageName4,
                'image_plan' => $imageName5,
                'bloc' => $request->bloc,
                'certificate' => $imageName6,
                // 'specification_id' => $request->specification_id,
                // 'properties_id' => $request->properties_id,
            ]);

            Storage::disk('public/storage/image/image-1')->put($imageName1, file_get_contents($request->image_1));
            Storage::disk('public/storage/image/image-2')->put($imageName2, file_get_contents($request->image_2));
            Storage::disk('public/storage/image/image-3')->put($imageName3, file_get_contents($request->image_3));
            Storage::disk('public/storage/image/image-4')->put($imageName4, file_get_contents($request->image_4));
            Storage::disk('public/storage/image/image-plan')->put($imageName5, file_get_contents($request->image_plan));
            Storage::disk('public/storage/image/certificate')->put($imageName6, file_get_contents($request->certificate));


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
                'image_1' => 'required',
                'image_2' => 'required',
                'image_3' => 'required',
                'image_4' => 'required',
                'image_plan' => 'required',
                'bloc' => 'required',
                'certificate' => 'required',
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
            'image' => 'required',
        ]);
        $image = $request->file('image')->store('image', 'public');

        $data = Unit::create([
            'image' => $image,
        ]);

        return response($data, Response::HTTP_CREATED);
    }
}
