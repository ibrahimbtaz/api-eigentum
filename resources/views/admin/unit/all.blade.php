@extends('admin.layout.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-ad-12">
                <h1 class="text-light">Data unit</h1>
                @if (session()->has('Successfully'))
                    <div class="alert alert-success col-lg-12" role="alert">
                        {{ session('Successfully') }}
                    </div>
                @endif
                <br>
                <div class="">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-2">
                                <a type="button" class="btn btn-primary" href="create">Tambah Data Baru</a>
                            </div>
                            {{-- <div class="col-md-10">
                                <form action="/admin/unit/all" method="GET" role="search">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select name="dokter_id" id="dokter_id" class="form-select">
                                                <option name="dokter_id" value="0" selected="true">
                                                    Diagnosa</option>
                                                @foreach ($units as $unit)
                                                    @if (request('dokter_id') == $unit->id)
                                                        <option name="dokter_id" value="{{ $unit->id }}" selected>
                                                            {{ $unit->keahlian }}
                                                        </option>
                                                    @else
                                                        <option name="dokter_id" value="{{ $unit->id }}">
                                                            {{ $unit->keahlian }}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-8">
                                            <div class="input-group mb-3">
                                                <input type="text" name="search" class="form-control"
                                                    placeholder="Search name.." aria-label="Search username"
                                                    aria-describedby="basic-addon2" value="{{ request('search') }}">
                                                <button class="btn btn-outline-secondary" id="search"
                                                    type="submit">Search</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> --}}
                        </div>

                        <table class="table table-dark table-hover">
                            <thead>
                                <tr align="center" class="table-active">
                                    <th scope="col">Id</th>
                                    <th scope="col" class="text-start">title</th>
                                    <th scope="col" class="text-start">description</th>
                                    <th scope="col" class="text-start">price</th>
                                    <th scope="col" class="text-start">rent</th>
                                    <th scope="col" class="text-start">image_1</th>
                                    <th scope="col" class="text-start">image_3</th>
                                    <th scope="col" class="text-start">image_2</th>
                                    <th scope="col" class="text-start">image_4</th>
                                    <th scope="col" class="text-start">image_plan</th>
                                    <th scope="col" class="text-start">bloc</th>
                                    <th scope="col" class="text-start">certificate</th>
                                    {{-- <th scope="col" class="text-start">specification_id</th> --}}
                                    {{-- <th scope="col" class="text-start">property_id</th> --}}
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($units->count())
                                    @foreach ($units as $unit)
                                        <tr align="center">
                                            <td class="align-middle"><?= $loop->iteration ?></td>
                                            {{-- <td class="align-middle"><?= $unit->id ?></td> --}}
                                            <td class="text-start align-middle"><?=$unit->title ?></td>
                                            <td class="text-start align-middle"><?= $unit->description ?></td>
                                            <td class="text-start align-middle"><?= $unit->price ?></td>
                                            <td class="text-start align-middle"><?= $unit->rent?></td>
                                            <td class="text-start align-middle"><?= $unit->image_1 ?></td>
                                            <td class="text-start align-middle"><?= $unit->image_2 ?></td>
                                            <td class="text-start align-middle"><?= $unit->image_3 ?></td>
                                            <td class="text-start align-middle"><?= $unit->image_4 ?></td>
                                            <td class="text-start align-middle"><?= $unit->image_plan ?></td>
                                            <td class="text-start align-middle"><?= $unit->bloc ?></td>
                                            <td class="text-start align-middle"><?= $unit->certificate ?></td>
                                            {{-- <td class="text-start align-middle"><?= $unit->specification_id ?></td> --}}
                                            {{-- <td class="text-start align-middle"><?= $unit->property_id ?></td> --}}
                                            </td>
                                            <td class="text-start">
                                                <a type="button" class="btn btn-outline-warning"
                                                    href="show/{{ $unit->id }}">Detail
                                                    Data</a>
                                                <a type="button" class="btn btn-outline-primary"
                                                    href="edit/{{ $unit->id }}">Edit
                                                    Data</a>
                                                <form action="delete/{{ $unit->id }}" method="get" class="d-inline">
                                                    {{-- @method('delete') --}}
                                                    @csrf
                                                    <button class="btn btn-outline-danger"
                                                        onclick="return  confirm('Apakah Anda Yakin') ">Hapus</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                {{-- @elseif ($units->count())
                                    <div class="form-group">
                                        <a type="button" class="btn btn-warning" href="/admin/unit/all">Back</a>
                                    </div> --}}
                                @else
                                    <tr>
                                        <td colspan="8" align="center">Data Tidak Ditemukan</td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        {{-- <div class="">
                            {{ $units->links() }}
                        </div> --}}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
