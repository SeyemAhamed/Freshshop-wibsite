@extends('backend.master')

@section('content')
@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Setting Update</h3>
                    </div>
                    <form action="{{url('/admin/general-setting/update')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body text-secondary">
                        <div class="form-group">
                          <label for="phone">Phone</label>
                          <input type="text" class="form-control" value="{{$settings->phone}}" id="phone" name="phone" placeholder="Enter Phone Number" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" value="{{$settings->email}}" id="email" name="email" placeholder="Enter Email" required>
                          </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <textarea name="address" id="summernote"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="fackbook">Fackbook Link (Optional)</label>
                            <input type="text" class="form-control" value="{{$settings->fackbook}}" id="fackbook" name="fackbook" placeholder="Enter  Fackbook" >
                          </div>
                          <div class="form-group">
                            <label for="twitter">Twitter Link (Optional)</label>
                            <input type="text" class="form-control" value="{{$settings->twitter}}" id="twitter" name="twitter" placeholder="Enter Twitter" >
                          </div>
                          <div class="form-group">
                            <label for="linkedin">Linkedin Link (Optional)</label>
                            <input type="text" class="form-control" value="{{$settings->linkedin}}" id="linkedin" name="linkedin" placeholder="Enter Linkedin" >
                          </div>
                        <div class="form-group">
                          <label for="logo">Logo</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input"  id="logo" name="logo" accept="image/*">
                              <label class="custom-file-label" for="logo">Choose file</label>
                            </div>
                            
                          </div>
                          <img src="{{asset('backend/images/settings'.$settings->logo)}}" alt="">
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
@push('script')
<script>
    $(function () {
      // Summernote
      $('#summernote').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
@endpush
@endsection