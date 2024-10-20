@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Employee Create</h3>
                    </div>
                    <form action="{{url('/admin/employee-store')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body text-secondary">
                        <div class="form-group">
                          <label for="name">Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone (Optional)</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Enter Phone">
                          </div>
                          <div class="form-group">
                            <label for="address">Address (Optional)</label>
                            <textarea name="address" class="form-control" id="address" placeholder="Enter Address"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                          </div>
                          <div class="form-group">
                            <label for="password">Password</label>
                            <input type="text" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                          </div>
                        <div class="form-group">
                          <label for="image">Image (Optional)</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
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