@extends('layouts.master')

@section('content')

    <div class="card mt-5">
        <div class="card-body">
            <h2>Edit Menu</h2>
            <hr>

            <form action="/admin/menu/update/{{$menu->id}}" method="post" enctype="multipart/form-data">
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Menu</label>
                    <div class="col-sm-6">
                        <input name="name" type="text" class="form-control" placeholder="Menu" value="{{$menu->nama_menu}}" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <textarea name="deskripsi" class="form-control">{{$menu->deskripsi}}</textarea>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category" class="form-control" required>
                            <option>pilih</option>
                            <option value="MKAN" {{$menu->kategori == 'MKAN' ? 'selected' : ''}}>Foods</option>
                            <option value="MNUM" {{$menu->kategori == 'MNUM' ? 'selected' : ''}}>Drinks</option>
                            <option value="CMIL" {{$menu->kategori == 'CMIL' ? 'selected' : ''}}>Snacks</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-6">
                        <input name="price" type="number" class="form-control" placeholder="Price" value="{{$menu->harga}}" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <select name="status" class="form-control" required>
                            <option>pilih</option>
                            <option value="1" {{$menu->status == '1' ? 'selected' : ''}}>Available</option>
                            <option value="0" {{$menu->status == '0' ? 'selected' : ''}}>Not Available</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Change Photo Menu</label>
                    <div class="col-sm-6">
                        <img src="{{$menu->foto}}" alt="Foto Menu" class="img-thumbnail mb-3" width="200">
                        <input name="photo" type="file" class="form-control-file">
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-sm-8 text-right">
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection