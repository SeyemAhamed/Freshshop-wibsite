@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Product Create</h3>
                    </div>
                    <form action="{{url('/admin/product/Store')}}" method="Post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body text-secondary">
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="sku_code">SKQ Code</label>
                            <input type="text" class="form-control" id="sku_code" name="sku_code" placeholder="Enter SKQ Code" required>
                          </div>
                        <div class="form-group">
                            <label for="cat-id">Select Category</label>
                            <select name="cat-id" id="cat_id" class="form-control">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="sub_cat-id">Select SubCategory(Optional)</label>
                            <select name="sub_cat-id" id="sub_cat_id" class="form-control">
                                <option selected disabled>Select Category</option>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group" id="color_fields">
                            <label for="color">Product Color(Optional)</label>
                            <input type="text" class="form-control" id="color" name="color[]" placeholder="Enter Color" >   
                          </div>
                          <button type="button" class="btn btn primary" id="add_color">Add More</button>
                          <div class="form-group" id="color_fields">
                            <label for="size">Product Size(Optional)</label>
                            <input type="text" class="form-control" id="size" name="size[]" placeholder="Enter Size" >    
                          </div>
                          <button type="button" class="btn btn primary" id="add_size">Add More</button>
                          <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" id="qty" name="qty" placeholder="Enter Quantity" required>
                          </div>
                          <div class="form-group">
                            <label for="buy_price">Buy Price</label>
                            <input type="text" class="form-control" id="buy_price" name="buy_price" placeholder="Enter Buy price" required>
                          </div>
                          <div class="form-group">
                            <label for="regular_price">Regular Price</label>
                            <input type="text" class="form-control" id="regular_price" name="regular_price" placeholder="Enter Regular Price" required>
                          </div>
                          <div class="form-group">
                            <label for="discount_price">Discount Price</label>
                            <input type="text" class="form-control" id="discount_price" name="discount_price" placeholder="Enter Discount Price" required>
                          </div>
                          <div class="form-group">
                            <label for="product_type">Product Type</label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="hot">Hot Product</option>
                                <option value="new">New Arrivel</option>.
                                <option value="regular">Regular Product</option>
                                <option value="discount">Discount Product</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="short_desc">Short Details</label>
                            <textarea id="summernote" name="short_desc"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="long_desc">Lone Details</label>
                            <textarea id="summernote2" name="long_desc"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="product_policy">Product Policy</label>
                            <textarea id="summernote3" name="product_policy"></textarea>
                          </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image" accept="image/*" required>
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="galleryImage">Gallery Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="galleryImage" name="galleryImage[]" multiple accept="image/*" required>
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

  <script>
    $(function () {
      // Summernote
      $('#summernote2').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>

<script>
    $(function () {
      // Summernote
      $('#summernote3').summernote()
  
      // CodeMirror
      CodeMirror.fromTextArea(document.getElementById("codeMirrorDemo"), {
        mode: "htmlmixed",
        theme: "monokai"
      });
    })
  </script>
{{-- Addmore Color --}}
  <script>
    $(document).ready(function(){
      $("#add_color").click(function(){
        $("#color_fields").append('<input type="text" class="form-control" mt-3 id="color" name="color[]" placeholder="Enter Color" >')
      })
    })
  </script>

<script>
  $(document).ready(function(){
    $("#add_size").click(function(){
      $("#color_fields").append('<input type="text" class="form-control" mt-3 id="size" name="size[]" placeholder="Enter Size" >')
    })
  })
</script>
@endpush