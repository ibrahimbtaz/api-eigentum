@extends('admin.layout.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-ad-12">
                <h3 class=" text-light">Tambah Data Unit</h3>
                <br>
                <div class="card bg-light">
                    <div class="card-body">
                        <form method="post" action="/admin/unit/add">
                            @csrf
                            <div class="form-group">
                                <label for="" class="form-label">title</label>
                                <input class="form-control noscroll" id="title" name="title"
                                    value="{{ old('title') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">description</label>
                                <input class="form-control noscroll" id="description" name="description"
                                    value="{{ old('description') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">price</label>
                                <input type="number" class="form-control noscroll" id="price" name="price"
                                    value="{{ old('price') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">rent</label>
                                <input type="number" class="form-control noscroll" id="rent" name="rent"
                                    value="{{ old('rent') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_1</label>
                                <input class="form-control noscroll" id="image_1" name="image_1"
                                    value="{{ old('image_1') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_2</label>
                                <input class="form-control noscroll" id="image_2" name="image_2"
                                    value="{{ old('image_2') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_3</label>
                                <input class="form-control noscroll" id="image_3" name="image_3"
                                    value="{{ old('image_3') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_4</label>
                                <input class="form-control noscroll" id="image_4" name="image_4"
                                    value="{{ old('image_4') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_plan</label>
                                <input class="form-control noscroll" id="image_plan" name="image_plan"
                                    value="{{ old('image_plan') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">bloc</label>
                                <input class="form-control noscroll" id="bloc" name="bloc"
                                    value="{{ old('bloc') }}">
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">certificate</label>
                                <input class="form-control noscroll" id="certificate" name="certificate"
                                    value="{{ old('certificate') }}">
                            </div>
                            <br>
                            {{-- <div class="form-group">
                                <label for="" class="form-label">Kode_Pasien</label>
                                <input class="form-control noscroll" id="kode_pasien" name="kode_pasien"
                                    value="{{ old('kode_pasien') }}">
                            </div> --}}
                            <br>
                            
                            <div class="float-end">
                                <a type="button" class="btn btn-warning" href="/admin/unit/data">Back</a>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
