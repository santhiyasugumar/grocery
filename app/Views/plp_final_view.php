
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
  <title>Grocery</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
    .imgmenu {
        float:right;
        bottom: 15%;
        right: 20%;
        position: fixed;
    }
    #lblCartCount {
    font-size: 12px;
    background: #ff0000;
    color: #fff;
    padding: 0 5px;
    vertical-align: top;
    margin-left: -10px;
    }
    .badge {
    padding-left: 9px;
    padding-right: 9px;
    -webkit-border-radius: 9px;
    -moz-border-radius: 9px;
    border-radius: 9px;
    }

    .label-warning[href],
    .badge-warning[href] {
    background-color: #c67605;
    }

    .facart {
    color: white;
    }

@media only screen and (max-width: 767px) {
  .card-img-top {
    width: 50px;
    height: 50px;
  }

  .imgmenu {
        float:right;
        bottom: 15%;
        right: 5%;
        position: fixed;
    }
}

  </style>
</head>
<body>
    <div class="container">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
                <div class="input-group border-bottom shadow-bottom-sm p-3 sticky-top bg-white">
                    <input class="form-control border-end-0 border shadow-sm txtsearch" type="search" value="" placeholder="search" id="example-search-input txtsearch">
                    <span class="input-group-append">
                        <button class="btn btn-outline-secondary bg-white border-start-0 border ms-n5" type="button">
                            <i class="fa fa-search"></i>
                        </button>
                    </span>
                </div>
                <br>
                <div class="container productplp"> 
              
                </div>
                <div class="row mt-3 mb-5">
                    <div class="col-md-12 text-center">
                        <button type='button' class='btn btn-secondary btnmore' id='btnmore'>More Item</button>
                    </div>
                </div>
                <br><br><br><br><br>
                <div class="imgmenu text-center" data-bs-toggle="offcanvas" data-bs-target="#demo">
                    <img src="<?php echo base_url();?>/img/menu.png" width="50px" height="50px" class="rounded">
                    <!-- <p><b><small>Menu</small></b></p> -->
                </div>
                <div class="container-fluid">
                    <nav class="navbar fixed-bottom navbar-dark bg-dark">
                        <div class="container-fluid">
                            <!-- <a class="navbar-brand fs-6" href="#"></a> -->
                            <div>
                                <i class="fa facart" style="font-size:24px">&#xf07a;</i>
                                <span class='badge badge-warning' id='lblCartCount'> 0 </span>
                            </div>
                            <a class="navbar-brand fs-6" href="#">View Cart &nbsp;&nbsp;<i class="fa fa-long-arrow-right" aria-hidden="true"></i></a>
                        </div>
                    </nav>
                </div>
          </div>
          <div class="col-md-2"></div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" id="demo">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title">Menu</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas"></button>
        </div>
        <div class="offcanvas-body">
            <div class="accordion" id="accordionExample">
                
              <div class="menu"></div>
            </div>
        </div>
    </div>
    <script>
        path = '<?php echo base_url('/menu/getAllMenu')?>';
        $.ajax({
            type: "GET",
            url: path,
            beforeSend: function() {
            
            },
            contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
            processData: false, // NEEDED, DON'T OMIT THIS
            success: function(data)
            { 
                var data = JSON.parse(data);
                $(".menu").html(data['menu']);
            },
            error: function (jqXHR, textStatus, errorMessage, exception) {
                console.log(errorMessage);
            }
        });        
    </script>
    <script>
   var pathname = window.location.pathname;
   var str = pathname.split("/");
   var category_id = str[str.length - 1];
   var category_type = str[str.length - 2];
   var offset = 1;
   sessionStorage.setItem("offset", offset);
      
   callPLPData(category_id, category_type, offset);
   $(".txtsearch").keyup(function() {
      if($(".txtsearch").val().length >= 2) {
         sessionStorage.setItem("offset", 1);
         $(".productplp").children().remove();
         callPLPData(category_id, category_type, offset);
      } 
   })

   function myFunctionMinus(val) {
      if($(".prd"+val).val() && $(".prd"+val).val() > 1) {
         $(".prd"+val).val((((parseInt)($(".prd"+val).val()))-1));
        //  $("#lblCartCount").text(((parseInt)($("#lblCartCount").text())) - 1);
         reduceToMyArray(val, 1);
      }
   }

   function myFunctionPlus(val) {
      if($(".prd"+val).val() && $(".prd"+val).val() > 0) {
         $(".prd"+val).val((((parseInt)($(".prd"+val).val()))+1));
        //  $("#lblCartCount").text(((parseInt)($("#lblCartCount").text())) + 1);
        addToMyArray(val, 1);
      }
   }

   function showquantity(val) {
        $(".clsqty"+val).show();
        $(".thisAddCart"+val).hide();
        // $("#lblCartCount").text(((parseInt)($("#lblCartCount").text())) + 1);
        addToMyArray(val, 1);
   }

   function onchangeQunatity(val) {
    if($(".prd"+val).val() && $(".prd"+val).val() > 0) {
        // $("#lblCartCount").text(((parseInt)($("#lblCartCount").text())) + ((parseInt)($(".prd"+val).val())));\
        addorreduceToMyArray(val, (parseInt)($(".prd"+val).val()));
    }
   }

   function myFunctionCart(val) {
      if($(".prd"+val).val() && $(".prd"+val).val() > 0) {
        //  $("#lblCartCount").text(((parseInt)($("#lblCartCount").text())) + ((parseInt)($(".prd"+val).val())));
        addToMyArray(val, (parseInt)($(".prd"+val).val()));
      }
   }

   myArray = [];
   function addToMyArray(id, quantityToAdd) {
        const index = myArray.findIndex(obj => obj.id === id); // Find the index of the object with the same id
        if (index !== -1) {
            // If the object with the same id exists in the array, increase its quantity
            myArray[index].quantity += quantityToAdd;
        } else {
            // Otherwise, add a new object to the array
            myArray.push({ id, quantity: quantityToAdd });
        }
        const sumOfQuantity = myArray.reduce((total, obj) => {
            return total + obj.quantity;
        }, 0);
        $("#lblCartCount").text(sumOfQuantity);
        console.log(myArray);
    }

    function reduceToMyArray(id, quantityToAdd) {
        const index = myArray.findIndex(obj => obj.id === id); // Find the index of the object with the same id
        if (index !== -1) {
            // If the object with the same id exists in the array, increase its quantity
            myArray[index].quantity -= quantityToAdd;
        } else {
            // Otherwise, add a new object to the array
            myArray.push({ id, quantity: quantityToAdd });
        }
        const sumOfQuantity = myArray.reduce((total, obj) => {
            return total + obj.quantity;
        }, 0);
        $("#lblCartCount").text(sumOfQuantity);
        console.log(myArray);
    }

    function addorreduceToMyArray(id, quantityToAdd) {
        const index = myArray.findIndex(obj => obj.id === id); // Find the index of the object with the same id
        if (index !== -1) {
            // If the object with the same id exists in the array, increase its quantity
            myArray[index].quantity = quantityToAdd;
        } else {
            // Otherwise, add a new object to the array
            myArray.push({ id, quantity: quantityToAdd });
        }
        const sumOfQuantity = myArray.reduce((total, obj) => {
            return total + obj.quantity;
        }, 0);
        $("#lblCartCount").text(sumOfQuantity);
        console.log(myArray);
    }

    const sumOfQuantity = myArray.reduce((total, obj) => {
        return total + obj.quantity;
    }, 0);


   function callPLPData(category_id, category_type, offset) {
      var fd = new FormData();
      fd.append("txtsearch", $(".txtsearch").val().trim());
      fd.append("category_id", category_id);
      fd.append("category_type", category_type);
      fd.append("offset", offset);
      path = "<?php echo base_url('/getProductBasedonCategoryId')?>";
      $.ajax({
         type: "POST",
         url: path,
         data : fd,
         beforeSend: function() {
            
         },
         contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
         processData: false, // NEEDED, DON'T OMIT THIS
         success: function(data)
         { 
            var data = JSON.parse(data);
            if(data['rows'].length == 0) {
               $("#btnmore").hide();
            }
            console.log(data['rows']);
            var html = "";
            for(var i=0;i<data['rows'].length;i++) {
                
                function numberWithCommas(x) {
                   return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                }
                html = html + `  <div class="row">
                            <div class="col-2">
                            <img class="card-img-top" width="75px" height="75px" src="<?php echo base_url()?>/uploads/`+ data['rows'][i]['id'] +"/"+data['rows'][i]['product_image_name']  +`" alt="Card image">
                            </div>
                            <div class="col">
                                <span class="card-text">`+data['rows'][i]['product_name']+`</span>
                                <div class="row">
                                    <div class="col-6"></div>
                                    <div class="col-6 text-right">
                                        <div class="input-group mb-3 clsqty`+data['rows'][i]['id']+`" style="display:none">
                                            <span class="input-group-text" onclick=myFunctionMinus(`+data['rows'][i]['id']+`)>-</span>
                                            <input type="text" class="form-control  input-sm text-center prd`+data['rows'][i]['id']+`" onchange=onchangeQunatity(`+data['rows'][i]['id']+`) aria-label="Quantity" value ="1">
                                            <span class="input-group-text" onclick=myFunctionPlus(`+data['rows'][i]['id']+`)>+</span>
                                        </div>
                                        <span class="float-end">
                                            <button type="button" class="btn btn-outline-secondary btn-sm thisAddCart`+data['rows'][i]['id']+`" onclick=showquantity(`+data['rows'][i]['id']+`)>Add</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <hr>`;
            }
            $(".productplp").append(html);
            if($(".txtsearch").val().length > 1) {
                $("#btnmore").hide();
            }
         },
         error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
         }
      });
   }

   $("#btnmore").click(function(e) {
        if($(".txtsearch").val().length == 0) {
            e.preventDefault();
            var offset = sessionStorage.getItem("offset") + 10;
            sessionStorage.setItem("offset", offset);
            callPLPData(category_id, category_type, offset);
        }
   })

   
</script>
</body>
</html>
