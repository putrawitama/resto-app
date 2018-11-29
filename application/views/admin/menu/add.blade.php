@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h2>Tambah Menu Baru</h2>
            <hr>

            <form action="/admin/menu/save" method="post" enctype="multipart/form-data">
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Nama Menu</label>
                    <div class="col-sm-6">
                        <input name="name" type="text" class="form-control" placeholder="Nama Menu" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-6">
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Kategori</label>
                    <div class="col-sm-6">
                        <select name="category" class="form-control" required>
                            <option value="">pilih</option>
                            <option value="MKAN">Makanan</option>
                            <option value="MNUM">Minuman</option>
                            <option value="CMIL">Cemilan</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Harga</label>
                    <div class="col-sm-6">
                        <input name="price" type="number" class="form-control" placeholder="Harga Menu" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <select name="status" class="form-control" required>
                            <option value="">pilih</option>
                            <option value="1">Tersedia</option>
                            <option value="0">Tidak Tersedia</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Upload Foto Menu</label>
                    <div class="col-sm-6">
                        <input name="photo" type="file" class="form-control-file" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <div class="col-sm-8 text-right">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection