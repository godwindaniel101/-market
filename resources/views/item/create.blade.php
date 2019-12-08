@extends('layouts.app')
@section('content_item')

<div class="container">
<div class="form_controller">

  <form class="form-horizontal" action="{{route('item.store')}}" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
        <label class="control-label col-sm-10" for="sel1">Product Category</label>
        <div class="col-sm-10">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <label class="input-group-text" for="inputGroupSelect01">Options</label>
                    </div>
                    <select class="custom-select" name="product_id">
                        <option selected>Choose...</option>
                        @foreach($market as $market)
                                <option value="{{$market->id}}">{{$market->product_name}}</option>
                            
                        @endforeach
                    </select>
                </div>
               
        </div>
    </div>
    
    <div class="form-group">
      <label class="control-label col-sm-10" for="item_name">
            Item Name
      </label>
      <div class="col-sm-10">
        <input 
            type="text" 
            class="form-control"
            value="{{old('item_name')}}" 
            id="item_name" 
            placeholder="Name.." 
            name="item_name"
        />
        @if($errors->first('item_name'))
            <p class="error_box"><span>*</span>{{ $errors->first('item_name')}}</p>
            @endif
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-10" for="item_description">
            Item Description
      </label>
      <div class="col-sm-10">
        <input 
            type="text" 
            class="form-control"
            value="{{old('item_description')}}" 
            id="item_description " 
            placeholder="Name.." 
            name="item_description"
        />
        @if($errors->first('item_description'))
            <p class="error_box"><span>*</span>{{ $errors->first('item_description')}}</p>
            @endif
      </div>
    </div>



    <div class="form-group">
      <label class="control-label col-sm-10" for="item_image">Item Image</label>
      <div class="col-sm-10">
            <div class="custom-file">
                    <input type="file" id="item_image" name="item_image">
                    <label class="custom-file-label" for="item_image">Choose file</label>
            </div>
           
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-10" for="item_cost">
          Item Cost
      </label>
      <div class="col-sm-10">
        <input type="text" 
            class="form-control"  
            value="{{old('item_cost')}}"
            id="item_cost" 
            placeholder="Cost.." 
            name="item_cost"
        />
        @if($errors->first('item_cost'))
        <p class="error_box"><span>*</span> {{ $errors->first('item_cost')}}</p>
        @endif
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-10" for="item_new_cost">
            Item New Cost(if any)
      </label>
      <div class="col-sm-10">
        <input 
        type="text" 
        class="form-control" 
        id="item_new_cost" 
        value="{{old('item_new_cost')}}"
        placeholder="Reduced Price.." 
        name="item_new_cost">
        @if($errors->first('item_new_cost'))
        <p class="error_box"><span>*</span> {{ $errors->first('item_new_cost')}}</p>
        @endif
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-sm-10" for="item_stock">
          Item No Of Stock
      </label>
      <div class="col-sm-10">
        <input 
            type="text" 
            class="form-control" 
            id="item_stock" 
            value="{{old('item_stock')}}"
            placeholder="No of Stock.." 
            name="item_stock"
            />
            @if($errors->first('item_stock'))
            <p class="error_box"><span>*</span> {{ $errors->first('item_stock')}}</p>
            @endif
      </div>
    </div>


    
    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>
</div>


<script>
            // Add the following code if you want the name of the file appear on select
            function car() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            }

            $(".custom-file-input").on("change", function() {
            var fileName = $(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            } );
            </script>


@endsection
