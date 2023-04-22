<?php 
   session_start();
   if($_SESSION['role'] != "admin") {
      require("login.php");
   }
   require("header.php");
   require("leftmenu.php");
   require("topmenu.php");
   ?>
<!-- Breadcrumb-->
<section class="forms">
   <div class="m-3">
      <div class="row">
         <div class="col-lg-12">
            <div class="card">
               <div class="card-header">
                  <div class="row">
                     <div class="col-md-6">
                        <h4>Product Details</h4>
                     </div>
                     <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-sm" id="btnaddnews">Add Products</button>
                        <button type="button" style="display:none;" class="btn btn-success btn-sm" id="btnback" data-toggle="modal" data-target="#addModal" ><i class="fa fa-arrow-left" aria-hidden="true"></i> Back to Staff Details</button>
                     </div>
                  </div>
               </div>
               <div class="card-body">
                  <div class="tableContainer">
                     <table class="table table-sm"
                        id="table"
                        data-toggle="table"
                        data-height="460"
                        data-search="true"
                        data-pagination="true"
                        data-side-pagination="server"
                        data-query-params="queryParams" 
                        data-method="post"
                        data-url = "<?php echo base_url('/News/getAllData')?>"
                        >
                        <thead>
                           <tr>
                              <th data-field="id" data-visible="false">ID</th>
                              <th data-field="grpid" data-visible="false">grpID</th>
                              <th data-field="created_on" data-sortable="true">Created on</th>
                              <th data-field="category_name" data-sortable="true"  data-width="100px">Category Name</th>
                              <th data-field="cover_title" data-sortable="true" data-width="400px">Cover Title</th>
                              <th data-field="status" data-visible="false">status</th>
                              <th class="action-table" data-field="action" data-align="center" data-formatter="btnAction" data-events="btnActionEvent">Action</th>
                           </tr>
                        </thead>
                     </table>
                  </div>
                  <form action="#" method="post" id="form_save" name="form_save" enctype="multipart/form-data" >
                     <div class="newsEnrollContainer" style="display:none">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="row">
                                 <div class="col-md-6">
                                    <div class="form-group">
                                       <label>Enter Category</label>
                                       <input id="txtid" type="hidden" name="txtid">
                                       <select name="drpCategory[]" class="form-control drpCategory" multiple>
                                          <option></option>
                                       </select>
                                    </div>
                                 </div>
                                 <div class="col-md-6 cls_coverimg_pdf">
                                    <div class="form-group">
                                       <label>Cover Image/PDF</label>
                                       <input type="file" name="file" id="file" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label id="lblcovertitle">Enter Cover Title</label>
                                       <textarea class="form-control" id="covertitle" name="covertitle" placeholder="Enter Cover Title/Video Link" ></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label>Enter Content</label>
                                       <textarea class="form-control" placeholder="Enter Content" id="content" name="content"></textarea>
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-md-3">
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="public" checked>
                                       <label class="form-check-label" for="inlineRadio1">Public</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                       <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="private">
                                       <label class="form-check-label" for="inlineRadio2">Private</label>
                                    </div>
                                 </div>
                                 <div class="col-md-3">
                                    <div class="form-group">
                                       <label for="exampleInputEmail1">Establish Date</label>
                                       <input type="text" class="form-control form-control-sm  datetimepicker-input" id="txtDateOfSample" data-toggle="datetimepicker" data-target="#txtDateOfSample" placeholder="DD/MM/YYYY HH:MM" tabindex="3" name="txtDateOfSample" /> 
                                       <small id="emailHelp" class="form-text text-muted">Date Format: DD/MM/YYYY HH:MM</small>
                                    </div>
                                 </div>
                                 <div class="col-md-6 text-right">
                                    <button type="button" class="btn btn-secondary"  id="reset" data-dismiss="modal">Reset</button>
                                    <button type="submit" class="btn btn-primary" id="btnsave">Save</button>
                                    <button type="submit" class="btn btn-primary" id="btnupdate">Update</button>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
               </div>
               </form>
               <!-- Modal Delete Exam-->
               <form action="#" method="post" id="form_delete" name="form_delete">
                  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete News</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <h4>Are you sure want to delete this News?</h4>
                           </div>
                           <div class="modal-footer">
                              <input type="hidden" name="txtid_delete" class="txtid_delete">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                              <button type="submit" class="btn btn-primary">Yes</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <!-- End Modal Delete Subject-->
            </div>
         </div>
      </div>
   </div>
   </div>
</section>
</div>
<?php 
   require("script.php");
   ?>
<script>window.baseURL = `<?= base_url();?>`</script>
<script>
   $(document).ready(function() {
      hidePreloader();
      loadData(); 
      $(".search-input").attr("Placeholder", "Search Category/Title");
   })
   
   function loadData() {
      $.ajax({
         type: "GET",
         url:  "<?php echo base_url('/product/getData_drp')?>",
         contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
         processData: false, // NEEDED, DON'T OMIT THIS
         success: function(data,status)
         {
            var drp_data = JSON.parse(data);  
            $(".drpCategory").select2({
               data: drp_data['DATA_CATEGORY'],
               placeholder: "Select Category",
               width: '100%',
               maximumSelectionLength: 20,
            });  
   
            hidePreloader();
            $("#menuConfigClassSubject").attr("class","active");
            $("#cofigdropdownDropdownid").trigger('click');  
         }
      });
   } 
   
   $("#menuNews").attr("class","active");
   function queryParams(params) {
    return params
   }
   
   $('#btnaddnews').click(function(){
      $('.tableContainer').hide();
      $('.newsEnrollContainer').show();
      $('#btnback').show();
      $('#btnaddnews').hide();
      $('#btnsave').show();
      $('#btnupdate').hide();
      clearData();
   });
   
   $('#btnback').click(function(){
      $('.tableContainer').show();
      $('.newsEnrollContainer').hide();
      $('#btnback').hide();
      $('#btnaddnews').show();
   });
   
   $('#reset').click(function(){
      clearData();
   });
   
   function clearData() {
      $(".drpCategory").select2("val","0");
      $("#covertitle").val('');
      newscontent.setData('');
      $('#file').val('');
      $('#txtDateOfSample').val('');
   }
   
   $("#btnsave").click(function(e)  
   {
   e.preventDefault(); // avoid to execute the actual submit of the form.
   if($(".drpCategory").val().length == 0){
      alert("Kindly Choose the Category");
      return;
   }
   
   if($('#file').val().length > 0) {
      var file_size = $('#file')[0].files[0].size;
      if(file_size == 0) {
         alert("Kindly select the file(image)");
         return;
      }

      var ext = $('#file').val().split('.').pop().toLowerCase();
      // 7 - magazine, 8 - video
      if(!$(".drpCategory").val().includes('8') && !$(".drpCategory").val().includes('7')) { 
         if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
            alert('Kindly Browse the Cover Image(.png, .jpg)');
            return;
         }
         var file_size = $('#file')[0].files[0].size;
         if(file_size>4194304) { //4mb
            alert("Kindly choose the file below 4MB");
            return;
         }
      }
      
      if($(".drpCategory").val().includes('7')) { // 7 - magazine(pdf)
         if($.inArray(ext, ['pdf']) == -1) {
            alert('Kindly select the pdf');
            return;
         }
         var file_size = $('#file')[0].files[0].size;
         if(file_size>4194304) { //4mb
            alert("Kindly choose the file below 4MB");
            return;
         }
      }
   } else {
      if(!$(".drpCategory").val().includes('8')) {
         alert("Kindly fill the image");
         return;
      }
   }
   
   if(!$("#covertitle").val()){
      alert("Kindly fill the Title/Video Link");
      return;
   }
   if(newscontent.getData().length==0){
      alert("Kindly fill the Content");
      return;
   }

   if(!$("#txtDateOfSample").val()){
      alert("Kindly fill the Establish Date");
      return;
   }

     
   path = '<?php echo base_url('/News/save')?>';
   var form = $('#form_save');
   var formData = new FormData(form[0]);
   
   var date_time = $("#txtDateOfSample").val().split(" ");
   var time = date_time[1]+" "+date_time[2];
   var time = moment(time, ["h:mm A"]).format("HH:mm");
   
   var date = date_time[0].split("/");
   var date = date[2]+"-"+date[1]+"-"+date[0];
   
   formData.append("established_date", (date+" "+time+":00"));
   formData.append("content", newscontent.getData());
   $.ajax({
      type: "POST",
      url: path,
      data: formData,
      contentType: false,
      processData: false,
      beforeSend: function() {
        showPreloader();
      },
     
      success: function(data)
      { 
      if(data.messages.success == "Data Saved") {
         alert("Data Inserted Successfully");
         location.reload();
         hidePreloader();
      } 
      },
      error: function (jqXHR, textStatus, errorMessage, exception) {
      console.log(errorMessage);
      }
   });
   });
   
   $("#btnupdate").click(function(e) {
      e.preventDefault(); // avoid to execute the actual submit of the form.
      var form = $('#form_save');
      var formData = new FormData(form[0]);
      if($(".drpCategory").val().length == 0){
         alert("Kindly Choose the Category");
         return;
      }
   
      if($('#file').val().length > 0) {
         var ext = $('#file').val().split('.').pop().toLowerCase();
         // 7 - magazine, 8 - video
         if(!$(".drpCategory").val().includes('8') && !$(".drpCategory").val().includes('7')) { 
            if($.inArray(ext, ['png','jpg','jpeg']) == -1) {
               alert('Kindly Browse the Cover Image(.png, .jpg)');
               return;
            }
            var file_size = $('#file')[0].files[0].size;
            if(file_size>4194304) { //4mb
               alert("Kindly choose the file below 4MB");
               return;
            }
         }
      
         if($(".drpCategory").val().includes('7')) { // 7 - magazine(pdf)
            if($.inArray(ext, ['pdf']) == -1) {
               alert('Kindly select the pdf');
               return;
            }
            var file_size = $('#file')[0].files[0].size;
            if(file_size>4194304) { //4mb
               alert("Kindly choose the file below 4MB");
               return;
            }
         }
         formData.append("is_img", 1);
      } else {
         // if(!$(".drpCategory").val().includes('8')) {
         //    alert("Kindly fill the image");
         //    return;
         // }
         formData.append("is_img", 0);
      }
   
      if(!$("#covertitle").val()){
         alert("Kindly fill the Title");
         return;
      }
     
      if(newscontent.getData().length==0){
         alert("Kindly fill the Content");
         return;
      }
    
      if(!$("#txtDateOfSample").val()){
         alert("Kindly fill the Establish Date");
         return;
      }

        path = '<?php echo base_url('/News/update')?>';  
       
        
         var date_time = $("#txtDateOfSample").val().split(" ");
         var time = date_time[1]+" "+date_time[2];
         var time = moment(time, ["h:mm A"]).format("HH:mm");
   
         var date = date_time[0].split("/");
         var date = date[2]+"-"+date[1]+"-"+date[0];
         formData.append("established_date", (date+" "+time+":00"));
         formData.append("content", newscontent.getData());
        $.ajax({
          type: "POST",
          url: path,
          data: formData,
          beforeSend: function() {
            showPreloader();
          },
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data)
          {
            if(data.messages.success == "Data Updated") {
               alert("Data Inserted Successfully");
               location.reload();
            } else {
               
            }
          },
          error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
          }
        });
      // }
   });
   
   
   $("#form_delete").on('submit',function(e)
   {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    
        path = '<?php echo base_url('/News/delete')?>'; 
        var form = $('#form_delete');
        var formData = new FormData(form[0]);
        $.ajax({
          type: "POST",
          url: path,
          data: formData,
          beforeSend: function() {
            showPreloader();
            $('#deleteModal').modal('hide');
          },
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data)
          {
            if(data.messages.success == "Data Deleted") {
               alert("Data Deleted Successfully");
               location.reload();
            } else {
               $('#deleteModal').modal('show');
            }
          },
          error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
          }
        });
      
   });
   
   function refreshTable() {
   $('#table').bootstrapTable('refreshOptions', {
      pageNumber: 1
   });
   }
   
   window.ckeditor_head = {
            toolbar: {
               items: [
                     'heading',
                     '|',
                     'bold',
                     'italic',
                     'link',
                     'bulletedList',
                     'numberedList',
                     '|',
                     'alignment',
                     'outdent',
                     'indent',
                     '|',
                     'imageUpload',
                     'blockQuote',
                     'insertTable',
                     'undo',
                     'redo'
               ]
            },
            language: 'en',
            image: {
               toolbar: [
                     'imageTextAlternative',
                     'imageStyle:full',
                     'imageStyle:side'
               ]
            },
            table: {
               contentToolbar: [
                     'tableColumn',
                     'tableRow',
                     'mergeTableCells'
               ]
            },
            licenseKey: '',
            
         } ;
      let newscontent;
      ClassicEditor.create( document.querySelector( '#content' ),ckeditor_head).then( newEditor => {
         newscontent = newEditor;
      })
   
   
   function btnAction(value, row, index) {
      return [
         '<button class="btn btn-sm btn-info btnedit mr-2" type="button"><i class="fa fa-edit"></i> Edit</button>',
         '<button class="btn btn-sm btn-danger btnDelete" type="button"><i class="fa fa-trash"></i> Delete</button>',
      ].join('')
   }
   
   window.btnActionEvent = {
      'click .btnedit': function (e, value, row, index) {
        
         clearData();
         var category_arr = row['category_id_group'].split(",");
         $('.tableContainer').hide();   
         $('.newsEnrollContainer').show();   
         $('#covertitle').val(row['cover_title']);
         $('.drpCategory').val(category_arr).trigger('change.select2');
         newscontent.setData(row['content']);
         var dt_details = row['established_date'].split(" ");
         var date = dt_details[0].split("-");
         var date = date[2]+"/"+date[1]+"/"+date[0];
         var time = moment(dt_details[1], ["HH.mm"]).format("hh:mm a");
         $("#txtDateOfSample").val((date+" "+time).toUpperCase());
         $("#txtid").val(row['grpid']);
         $('.tableContainer').hide();
         $('.newsEnrollContainer').show();
         $('#btnback').show();
         $('#btnaddnews').hide();
         $('#btnsave').hide();
         $('#btnupdate').show();
         if(row['status'] == "true") {
            $("#inlineRadio1").prop("checked", true);
         } else if(row['status'] == "false") {
            $("#inlineRadio2").prop("checked", true);
         } 
         
      },
      'click .btnDelete': function (e, value, row, index) {
          $(".txtid_delete").val(row['grpid']);
          $('#deleteModal').modal('show');  // Call delete modal 
      }
   }
   
   $('input[type=radio][name=inlineRadioNews]').change(function() {
      if (this.value == 'news') {
         alert("Allot Thai Gayo Bhai");
      }
      else if (this.value == 'transfer') {
         alert("Transfer Thai Gayo");
      }
   });
   
   $(".drpCategory").change(function() {
      if($(".drpCategory").val() != []) {
         if($(".drpCategory").val().includes("8")) {
            if($(".drpCategory").val().length > 1) {
               alert("Choose only one category when you select video/magazine");
               $(".drpCategory").select2("val","0");
               $(".cls_coverimg_pdf").show();
               $("#lblcovertitle").text("Enter Cover Title");
            }  else {
               $(".cls_coverimg_pdf").hide();
               $("#lblcovertitle").text("Video Link");
               $("#covertitle").attr('placeholder', 'Enter Video Link');
            }
         } else {
            $(".cls_coverimg_pdf").show();
            $("#lblcovertitle").text("Enter Cover Title");
         }
      }
   });
</script>
</body>
</html>