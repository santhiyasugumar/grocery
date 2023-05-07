
<?php 
   require("common/header_grocery.php");
?>
<br>
<div class="container mt-5">
   
   <input type="search" class="txtsearch form-control" placeholder="Search..." aria-label="Search">
   <div class="row productplp mt-2"></div>
   <div class="row mt-3">
      <div class="col-md-12 text-center">
         <button type='button' class='btn btn-secondary btnmore' id='btnmore'>More item</button>
      </div>
   </div>
</div>

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
         $(".productplp").children().remove();
         callPLPData(category_id, category_type, offset);
      } 
      // if($(".txtsearch").val().length == 0) {
      //    window.location.reload();
      // }
   })

   function myFunctionMinus(val) {
      if($(".prd"+val).val() && $(".prd"+val).val() > 1) {
         $(".prd"+val).val((((parseInt)($(".prd"+val).val()))+1));
      }
   }

   function myFunctionPlus(val) {
      if($(".prd"+val).val() && $(".prd"+val).val() > 0) {
         $(".prd"+val).val((((parseInt)($(".prd"+val).val()))+1));
      }
   }

   function myFunctionCart(val) {
      if($(".prd"+val).val() && $(".prd"+val).val() > 0) {
         $("#lblCartCount").text(((parseInt)($("#lblCartCount").text())) + ((parseInt)($(".prd"+val).val())));
         $(".prd"+val).val('1');
      }
   }

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
               console.log(data['rows'][i]['product_image_name']);
               html = html + `<div class="col-6 mt-1  text-center">
                              <div class="card">
                                 <div class="card-body">
                                    <img class="card-img-top" width="100px" height="100px" src="<?php echo base_url()?>/uploads/`+ data['rows'][i]['id'] +"/"+data['rows'][i]['product_image_name']  +`" alt="Card image">
                                    <p class="card-text">`+data['rows'][i]['product_name']+`</p>
                                    <div class="input-group mb-3">
                                       <span class="input-group-text" onclick=myFunctionMinus(`+data['rows'][i]['id']+`)>-</span>
                                       <input type="text" class="form-control text-center prd`+data['rows'][i]['id']+`" aria-label="Quantity" value ="1">
                                       <span class="input-group-text" onclick=myFunctionPlus(`+data['rows'][i]['id']+`)>+</span>
                                    </div>
                                    <a href="#" class="btn btn-primary" onclick=myFunctionCart(`+data['rows'][i]['id']+`)>Add to Cart</a>
                                 </div>
                              </div>
                           </div>`;
            }
            $(".productplp").append(html);

          

         },
         error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
         }
      });
   }

   $("#btnmore").click(function(e) {
      e.preventDefault();
      var offset = sessionStorage.getItem("offset") + 1;
      sessionStorage.setItem("offset", offset);
      callPLPData(category_id, category_type, offset);
   })

   
</script>