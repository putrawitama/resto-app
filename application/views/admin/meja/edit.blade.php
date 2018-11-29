@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h2>Edit Meja</h2>
            <hr>

            <form action="/admin/meja/update/{{$meja->id}}" method="post">
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">No Meja</label>
                    <div class="col-sm-6">
                        <input name="no_meja" type="number" class="form-control" placeholder="No Meja" value="{{$meja->no_meja}}" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Kuota</label>
                    <div class="col-sm-6">
                        <input name="jumlah" type="number" class="form-control" placeholder="Jumlah Tamu" value="{{$meja->kuota}}" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Deskripsi</label>
                    <div class="col-sm-6">
                        <textarea name="deskripsi" class="form-control" rows="3">{{$meja->deskripsi}}</textarea>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <select name="status" class="form-control" required>
                            <option value="">pilih</option>
                            <option value="1" {{$meja->status == 1 ? 'selected' : ''}}>Tersedia</option>
                            <option value="0" {{$meja->status == 0 ? 'selected' : ''}}>Tidak Tersedia</option>
                        </select>
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