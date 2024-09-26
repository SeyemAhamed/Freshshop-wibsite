@extends('backend.master')

@section('content')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                      <h3 class="card-title">Product Edit</h3>
                    </div>
                    <form action="{{url('/admin/product/update'.$product->id)}}" method="Post" enctype="multipart/form-data">
                        @csrf
                      <div class="card-body text-secondary">
                        <div class="form-group">
                          <label for="name">Product Name</label>
                          <input type="text" class="form-control" id="name" value="{{$product->name}}" name="name" placeholder="Enter Product Name" required>
                        </div>
                        <div class="form-group">
                            <label for="sku_code">SKQ Code</label>
                            <input type="text" class="form-control" id="sku_code" value="{{$product->skq_code}}" name="sku_code" placeholder="Enter SKQ Code" readonly>
                          </div>
                        <div class="form-group">
                            <label for="cat-id">Select Category</label>
                            <select name="cat-id" id="cat_id" class="form-control">
                                <option selected disabled>Select Category</option>
                                @foreach ($categories as $category)
                                <option value="{{$category->id}}"@if ($product->cat_id == $category->id)
                                    selected
                                @endif>{{$category->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="sub_cat-id">Select SubCategory(Optional)</label>
                            <select name="sub_cat-id" id="sub_cat_id" class="form-control">
                                <option selected disabled>Select Category</option>
                                @foreach ($subCategories as $subCategory)
                                <option value="{{$subCategory->id}}" @if ($product->sub_cat_id == $subCategory->id)
                                    selected
                                @endif>{{$subCategory->name}}</option>
                                @endforeach
                            </select>
                          </div>
                          <div class="form-group" id="color_fields">
                            <label for="color">Product Color(Optional)</label>
                           @foreach ($product->color as $name)
                           <input type="text" class="form-control mt-3 " id="color" value="{{$name->color_name}}" name="color[]" placeholder="Enter Color" >   
                           @endforeach
                          </div>
                          <button type="button" class="btn btn primary" id="add_color">Add More</button>
                          <div class="form-group" id="color_fields">
                            <label for="size">Product Size(Optional)</label>
                           @foreach ($product->size as $name)
                           <input type="text" class="form-control" id="size" value="{{$name->size_name}}" name="size[]" placeholder="Enter Size" >    
                           @endforeach
                          </div>
                          <button type="button" class="btn btn primary" id="add_size">Add More</button>
                          <div class="form-group">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" id="qty" value="{{$product->qty}}" name="qty" placeholder="Enter Quantity" required>
                          </div>
                          <div class="form-group">
                            <label for="buy_price">Buy Price</label>
                            <input type="text" class="form-control" id="buy_price" value="{{$product->buy_price}}" name="buy_price" placeholder="Enter Buy price" required>
                          </div>
                          <div class="form-group">
                            <label for="regular_price">Regular Price</label>
                            <input type="text" class="form-control" id="regular_price" value="{{$product->regular_price}}" name="regular_price" placeholder="Enter Regular Price" required>
                          </div>
                          <div class="form-group">
                            <label for="discount_price">Discount Price</label>
                            <input type="text" class="form-control" id="discount_price" value="{{$product->discount_price}}" name="discount_price" placeholder="Enter Discount Price" required>
                          </div>
                          <div class="form-group">
                            <label for="product_type">Product Type</label>
                            <select name="product_type" id="product_type" class="form-control">
                                <option value="hot" @if ($product->product_type =="hot")
                                    selected
                                @endif>Hot Product</option>
                                <option value="new" @if ($product->product_type =="new")
                                    selected
                                @endif>New Arrivel</option>.
                                <option value="regular" @if ($product->product_type =="regular")
                                    selected
                                @endif>Regular Product</option>
                                <option value="discount" @if ($product->product_type =="discount")
                                    selected
                                @endif>Discount Product</option>
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="short_desc">Short Details</label>
                            <textarea id="summernote" name="short_desc">{{$product->short_desc}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="long_desc">Lone Details</label>
                            <textarea id="summernote2" name="long_desc">{{$product->long_desc}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="product_policy">Product Policy</label>
                            <textarea id="summernote3" name="product_policy">{{$product->product_policy}}</textarea>
                          </div>
                        <div class="form-group">
                          <label for="image">Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="image" name="image" accept="image/*">
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>      
                          </div>
                          <img src="{{asset('backend/images/product'.$product->image)}}" height="100" width="100">
                        </div>
                        <div class="form-group">
                          <label for="galleryImage">Gallery Image</label>
                          <div class="input-group">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="galleryImage" name="galleryImage[]" multiple accept="image/*" required>
                              <label class="custom-file-label" for="image">Choose file</label>
                            </div>
                          </div>
                          @foreach ($product->galleryImage as $image)
                              <img src="{{asset('backend/images/galleryImage'.$image->image)}}" height="100" width="100">
                          @endforeach
                        </div>
                      </div>
                      <!-- /.card-body -->
      
                      <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
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