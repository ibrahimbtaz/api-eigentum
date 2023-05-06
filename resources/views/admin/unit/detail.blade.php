@extends('admin.layout.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-ad-12">
                <h3 align="center" class=" text-light">Detail Data</h3>
                <br>
                <div class="card bg-light">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="" class="form-label">title</label>
                                <input class="form-control" value="{{ $unit->title }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">description</label>
                                <input class="form-control" value="{{ $unit->description }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">price</label>
                                <input class="form-control" value="{{ $unit->price }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">rent</label>
                                <input class="form-control" value="{{ $unit->rent }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_1</label>
                                <input class="form-control" value="{{ $unit->image_1 }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_2</label>
                                <input class="form-control" value="{{ $unit->image_2 }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_3</label>
                                <input class="form-control" value="{{ $unit->image_3 }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_4</label>
                                <input class="form-control" value="{{ $unit->image_4 }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_plan</label>
                                <input class="form-control" value="{{ $unit->image_plan }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">image_plan</label>
                                <input class="form-control" value="{{ $unit->image_plan }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="" class="form-label">certificate</label>
                                <input class="form-control" value="{{ $unit->certificate }}" readonly disabled>
                            </div>
                            <br>
                            <div class="form-group">
                                <a type="button" class="btn btn-warning" href="/admin/unit/data  ">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
