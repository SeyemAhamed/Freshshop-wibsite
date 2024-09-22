@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Sub-Category Create</h3>
                    </div>
                    <form action="{{url('/admin/sub-category/Store')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body text-secondary">
                        <div class="form-group">
                            <label for="name">Select Category</label>
                            <select name="cat_id"  class="form-control" id="cat_id">
                                <option selected disabled>Setect Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->nam}}</option>
                                @endforeach
                            </select>
                          </div>
                        <div class="form-group">
                          <label for="name">Sub-Category Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name">
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
                  </div>
            </div>
        </div>
    </div>
<section>

@endsection