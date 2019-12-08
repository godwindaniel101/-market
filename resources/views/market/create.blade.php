@extends('layouts.app')
@section('market_create')          
<div class="container">
  <h2>Create New Product field</h2>
  <form class="form-horizontal" action="/action_page.php">
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_name">Product_Name:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_name"  name="product_name">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_image">Product_Image:</label>
      <div class="col-sm-10">
        <input type="file" id="product_image"  name="product_image">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_name">Product_Detials:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_details"  name="product_details">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_price">Product_Price:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_price"  name="product_price">
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="product_name">Product_Price_New:</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_price_new"  name="product_price_new">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

@endsection