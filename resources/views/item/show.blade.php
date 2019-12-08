@extends('layouts.app')
@section('item-show')
@foreach($detail as $detail)
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<div class="container">
  <div class="row">
    <div class="col-lg-7 zero" >
        <div class="container-fluid">
            <div class="row">
                  <div class="show-image">
                    <img id="expandedImg" src="/images/{{$detail->item_image}}">
                  </div>
                  
            </div>
            <div class="row ">
            <div class="show-list">
              <ul>
                            <li class=""><img src="/images/{{$detail->item_image}}" alt="Nature" onclick="myFunction(this);"></li>
                            <li class=""><img src="/images/{{$detail->item_image}}" alt="Nature" onclick="myFunction(this);"></li>
                            <li class=""><img src="/images/{{$detail->item_image}}" alt="Nature" onclick="myFunction(this);"></li>
                            <li class=""><img src="/images/{{$detail->item_image}}" alt="Nature" onclick="myFunction(this);"></li>
              </ul>
            </div>
            </div>
        </div>  
    </div>
    <div class="col-lg-5 zero" >
      <div class="container zero" >
        <div class="show-details zero">       
            <div class="show-item-name">{{$detail->item_name}}</div>
            <div class="show-item-model">Model</div>
            <div class="show-item-description"><span id="bold">Description</span><br>{{$detail->item_description}}</div>
            <div class="cost">
                  <div class="item-cost">
                    <span>#</span>
                    <span>{{$detail->item_cost}}</span>
                  </div>    
                  <div class="item-new-cost">
                    <span>#</span>
                    <span>{{$detail->item_new_cost}}</span>
                  </div>
            </div>
            <div class="item-saved">
              <p class="">
                  <span class="">You saved #</span>
                  <span class="">{{$detail->item_saved}}</span>
                      with <span class="show-percentage">{{$detail->item_percentage}} %</span>
                  <span class="">off</span>
              </p>
               
            </div>
            <hr>
            <div class="item-stock"> 
                <span class=""> {{$detail->item_stock}}</span>
                <span class="">left</span> 
            </div>
        </div>
        <div class="show-seller">
          <p class="">
            Seller <span class="bold">Iyenogun G</span>
          </p>
          <p class="">
            Contact <span class="bold">07033270458</span>
          </p>
        </div>
      </div>

    </div>
  </div>
</div>




<script>
function myFunction(imgs) {
  var expandImg = document.getElementById("expandedImg");
  var imgText = document.getElementById("imgtext");
  expandImg.src = imgs.src;
  // imgText.innerHTML = imgs.alt;
}
let divs = document.querySelectorAll('.column img');
console.log(divs);
divs.forEach((a) => {
  a.addEventListener('mouseenter', function () {
    console.log(e);
        });
})
</script>

</body>
</html>

@endforeach
@endsection