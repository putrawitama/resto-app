@extends('layouts.master')

@section('content')
    <div class="card mt-5">
        <div class="card-body">
            <h2>Add New Menu</h2>
            <hr>

            <form action="/admin/menu/save" method="post" enctype="multipart/form-data">
                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Menu</label>
                    <div class="col-sm-6">
                        <input name="name" type="text" class="form-control" placeholder="Menu" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Description</label>
                    <div class="col-sm-6">
                        <textarea name="deskripsi" class="form-control"></textarea>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-6">
                        <select name="category" class="form-control" required>
                            <option value="">pilih</option>
                            <option value="MKAN">Food</option>
                            <option value="MNUM">Drinks</option>
                            <option value="CMIL">Snack</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Price</label>
                    <div class="col-sm-6">
                        <input name="price" type="number" class="form-control" placeholder="Price" required>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-6">
                        <select name="status" class="form-control" required>
                            <option value="">Choose</option>
                            <option value="1">Available</option>
                            <option value="0">Not Available</option>
                        </select>
                    </div>
                </div>

                <div class="form-group row justify-content-center">
                    <label class="col-sm-2 col-form-label">Upload Photo</label>
                    <div class="col-sm-6">
                        <input name="photo" type="file" class="form-control-file" required>
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