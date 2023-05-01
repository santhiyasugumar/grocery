
<?php 
   require("common/header_grocery.php");
?>
<br>
<div class="container mt-5">
   <input type="search" class="txtsearch form-control" placeholder="Search..." aria-label="Search">
   <div class="row productplp mt-2"></div>
   <button type='button' class='btn btn-primary btnmore' id='btnmore'>more item</button>
</div>
<script>
   var pathname = window.location.pathname;
   var str = pathname.split("/");
   var category_id = str[str.length - 1];
   var category_type = str[str.length - 2];
   var limit = str[str.length - 3];
      
   callPLPData(category_id, category_type, limit);
   $(".txtsearch").keyup(function() {
      if($(".txtsearch").val().length >= 2) {
        callPLPData(category_id, category_type, limit);
      }
   })

   function callPLPData(category_id, category_type, limit) {
      var fd = new FormData();
      fd.append("txtsearch", $(".txtsearch").val().trim());
      fd.append("category_id", category_id);
      fd.append("category_type", category_type);
      fd.append("limit", limit);
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
            console.log(data['rows']);
            var html = "";
            for(var i=0;i<data['rows'].length;i++) {
               console.log(data['rows'][i]['product_image_name']);
               html = html + `<div class="col-6 mt-1  text-center">
                              <div class="card">
                                 <div class="card-body">
                                    <img class="card-img-top" src="<?php echo base_url()?>/uploads/`+ data['rows'][i]['id'] +"/"+data['rows'][i]['product_image_name']  +`" alt="Card image">
                                    <p class="card-text">`+data['rows'][i]['product_name']+`</p>
                                    <a href="#" class="btn btn-primary">Add to Cart</a>
                                 </div>
                              </div>
                           </div>`;
               // if(i==9) {
               //    html = html + "";
               // }
            }
            $(".productplp").html(html);
         },
         error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
         }
      });
   }

   $("#btnmore").click(function(e) {
      e.preventDefault();
      callPLPData(category_id, category_type, 20);
   })


</script>