@extends('layouts.app')
@section('market')

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<div class="container">
  <!-- Trigger the modal with a button -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"><span>Update...</span><span class=" MyProduct_name"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
        <form action="" method="POST" class="modal_edit_form">
                @method('PUT')
                @csrf
                <input type="text" name="product_name" class="MyProduct_item" value="">
                <button type="submit"><i class="fa fa-upload" ></i></button>
        </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
      
    </div>
  </div>

<!-- delete modal-->
  <div class="modal fade" id="delete_modal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
        <h4 class="modal-title"><span>Delete...</span><span class=" MyProduct_name"></span></h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
         
        </div>
        <div class="modal-body">
        <form action="" method="POST" class="delete_form">
                @method('DELETE')
                @csrf
              <label>Are you sure you want to delete <span id="MyDelete_item">Product</span> ?<label>
                <button type="submit">Yes</button>
        </form>
            <button type="submit" data-dismiss="modal">No</button>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      <!--end of content modal-->
      <!--start of items view modal-->
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                <h4 class="modal-title"><span>Update...</span><span class=" MyProduct_name"></span></h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                
                </div>
                <div class="modal-body">
                <form action="" method="POST" class="modal_edit_form">
                        @method('PUT')
                        @csrf
                        <input type="text" name="product_name" class="MyProduct_item" value="">
                        <button type="submit"><i class="fa fa-upload" ></i></button>
                </form>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
              </div>
      
      
    </div>
  </div>

      <!--end of items view modal-->
      
    </div>
  </div>
</div>

<div class="search-wrapper">
    <div class="content-search">
    <form autocomplete="off" action="{{url('search')}}"  method="post">
    @csrf
    @method('post')
  <div class="autocomplete" style="width:300px;">
    <input id="myInput" type="text" name="myCountry" placeholder="Search Product">
  </div>
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
    </div>
    <script>
function autocomplete(inp, arr) {
  /*the autocomplete function takes two arguments,
  the text field element and an array of possible autocompleted values:*/
  var currentFocus;
  /*execute a function when someone writes in the text field:*/
  inp.addEventListener("input", function(e) {
      var a, b, i, val = this.value;
      /*close any already open lists of autocompleted values*/
      closeAllLists();
      if (!val) { return false;}
      currentFocus = -1;
      /*create a DIV element that will contain the items (values):*/
      a = document.createElement("DIV");
      a.setAttribute("id", this.id + "autocomplete-list");
      a.setAttribute("class", "autocomplete-items");
      /*append the DIV element as a child of the autocomplete container:*/
      this.parentNode.appendChild(a);
      /*for each item in the array...*/
      for (i = 0; i < arr.length; i++) {
        /*check if the item starts with the same letters as the text field value:*/
        if (arr[i].substr(0, val.length).toUpperCase() == val.toUpperCase()) {
          /*create a DIV element for each matching element:*/
          b = document.createElement("DIV");
          /*make the matching letters bold:*/
          b.innerHTML = "<strong>" + arr[i].substr(0, val.length) + "</strong>";
          b.innerHTML += arr[i].substr(val.length);
          /*insert a input field that will hold the current array item's value:*/
          b.innerHTML += "<input type='hidden' value='" + arr[i] + "'>";
          /*execute a function when someone clicks on the item value (DIV element):*/
          b.addEventListener("click", function(e) {
              /*insert the value for the autocomplete text field:*/
              inp.value = this.getElementsByTagName("input")[0].value;
              /*close the list of autocompleted values,
              (or any other open lists of autocompleted values:*/
              closeAllLists();
          });
          a.appendChild(b);
        }
      }
  });
  /*execute a function presses a key on the keyboard:*/
  inp.addEventListener("keydown", function(e) {
      var x = document.getElementById(this.id + "autocomplete-list");
      if (x) x = x.getElementsByTagName("div");
      if (e.keyCode == 40) {
        /*If the arrow DOWN key is pressed,
        increase the currentFocus variable:*/
        currentFocus++;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 38) { //up
        /*If the arrow UP key is pressed,
        decrease the currentFocus variable:*/
        currentFocus--;
        /*and and make the current item more visible:*/
        addActive(x);
      } else if (e.keyCode == 13) {
        /*If the ENTER key is pressed, prevent the form from being submitted,*/
        e.preventDefault();
        if (currentFocus > -1) {
          /*and simulate a click on the "active" item:*/
          if (x) x[currentFocus].click();
        }
      }
  });
  function addActive(x) {
    /*a function to classify an item as "active":*/
    if (!x) return false;
    /*start by removing the "active" class on all items:*/
    removeActive(x);
    if (currentFocus >= x.length) currentFocus = 0;
    if (currentFocus < 0) currentFocus = (x.length - 1);
    /*add class "autocomplete-active":*/
    x[currentFocus].classList.add("autocomplete-active");
  }
  function removeActive(x) {
    /*a function to remove the "active" class from all autocomplete items:*/
    for (var i = 0; i < x.length; i++) {
      x[i].classList.remove("autocomplete-active");
    }
  }
  function closeAllLists(elmnt) {
    /*close all autocomplete lists in the document,
    except the one passed as an argument:*/
    var x = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < x.length; i++) {
      if (elmnt != x[i] && elmnt != inp) {
        x[i].parentNode.removeChild(x[i]);
      }
    }
  }
  /*execute a function when someone clicks in the document:*/
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}
let newArray = {!! $item !!};
    var ray = [];

    newArray.forEach((a) => {
      ray.push(a.item_name);
    });

    
/*An array containing all the country names in the world:*/
var countries = ray;
/*initiate the autocomplete function on the "myInput" element, and pass along the countries array as possible autocomplete values:*/
autocomplete(document.getElementById("myInput"), countries);
</script>

 <div class="content-add">
        
    <form action="{{route('market.store')}}" method="POST" style="float:left;">
        @csrf
        <input type="text" placeholder="Add Product" name="product_name">
        <!-- <button type="submit"><i class="fa fa-plus"></i></button> -->
    </form>
    <a href="{{route('item.create')}}"><button style="float:right;"><i class="fa fa-plus"></i></button></a>
    </div>
   
</div>
<div class="wrapper">

    <div class="main-menu">
        <div class="mydiv" style="display:fixed;">
        <div class="user-menu">
            <div class="user-control"> 


            @foreach($market as $market)
            <div class="user-control-fw">
                    <div class="product-control"><a href="/market/{{$market->id}}" class="product-link">{{$market->product_name}}</a></div>
                    <div class="product-edit">
                        <form class="myProduct_{{$market->id}}">
                            <input type="hidden" value="{{$market->id}}" class="product_{{$market->id}}">
                            <input type="hidden" value="{{$market->product_name}}" class="product_{{$market->product_name}}">
                            <button type="submit"  data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-edit" ></i>
                            </button>
                        </form>
                    </div>
                    <div class="product-delete">
                          <form class="myDelete_{{$market->id}}">
                            <input type="hidden" value="{{$market->id}}" class="delete_{{$market->id}}">
                            <input type="hidden" value="{{$market->product_name}}" class="delete_{{$market->product_name}}">
                            <button type="submit"  data-toggle="modal" data-target="#delete_modal">
                                 <i class="fa fa-trash" ></i>
                            </button>
                        </form>
                    </div>
            </div>
                        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                         <script>
                                 $(function() {$('.myProduct_{{$market->id}}').submit(function(event) {
                                    event.preventDefault();
                                    let id = $('.product_{{$market->id}}').val();
                                    let form_action = "/market/{{$market->id}}"
                                    let name = $('.product_{{$market->product_name}}').val();
                                    $('.MyProduct_item').val(name);
                                    $('.modal_edit_form').attr('action', form_action);
                                  
                                });
                                  }
                                );
                         </script>
                           <script>
                                 $(function() {$('.myDelete_{{$market->id}}').submit(function(event) {
                                    event.preventDefault();
                                    let id = $('.delete_{{$market->id}}').val();
                                    let delete_action = "/market/{{$market->id}}"
                                    let name = $('.delete_{{$market->product_name}}').val();
                                    $('#MyDelete_item').text(name);
                                    $('.delete_form').attr('action', delete_action);
                                  
                                });
                                  }
                                );
                         </script>
            @endforeach
          
         
            </div>
        </div>
        </div>
        <div class="admin-menu">
               
        </div>
    </div>
    <div class="main-content">
       
            <div class="content-view">
                                @foreach($item as $item)
                                <div class="item-wrapper">
                                  @if($item->item_percentage)
                                  <div class="item_percentage">{{$item->item_percentage}}<span class="">%</span></div>
                                  @endif
                                  <div class="image-guide">
                                  <a href="/item/{{$item->id}}" >
                                        <img src="/images/{{$item->item_image}}"
                                            alt="image_{{$item->product_id}}" 
                                            class="img-responsive "/>
                                  </a>
                                  </div>
                                        
                                  <div class="item-name"> 
                                    {{$item->item_name}}
                                  </div>
                                  <hr>
                                  <div class="cost">
                                      <div class="item-cost">
                                        <span>#</span>
                                        <span>{{$item->item_cost}}</span>
                                      </div>    
                                      <div class="item-new-cost">
                                        <span>#</span>
                                        <span>{{$item->item_new_cost}}</span>
                                      </div>
                                      </div>
                                      <div class="item-saved">
                                          <span class="">You saved #</span>
                                          <span class="">{{$item->item_saved}}</span>
                                      </div>
                                  <hr>
                                      <div class="item-stock"> 
                                          <span class=""> {{$item->item_stock}}</span>
                                          <span class="">left</span> 
                                      </div>

                                      <div class="add-to-cart">
                                          <a href="add" class="cart">
                                          Add to cart
                                          </a>
                                      </div>
                                  </div>
                                  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
                                  <script>
                                          $(function() {$('.myProduct_{{$market->id}}').submit(function(event) {
                                              event.preventDefault();
                                              let id = $('.product_{{$market->id}}').val();
                                              let form_action = "/market/{{$market->id}}"
                                              let name = $('.product_{{$market->product_name}}').val();
                                              $('.MyProduct_item').val(name);
                                              $('.modal_edit_form').attr('action', form_action);
                                            
                                          });
                                            }
                                          );
                                  </script>
                                  @endforeach
                
                

            
                <div class="item-delete"></div>
        </div>
    </div>
    <div class="footer"></div>
</div>
@endsection