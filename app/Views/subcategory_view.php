
<?php 
   session_start();
   if(isset($_SESSION['role']) && $_SESSION['role'] == "admin") {require("header.php");
      require("leftmenu.php");
      require("topmenu.php");
      // user is an admin, do something here
    } else {
      // user is not an admin, redirect to login page
      header("Location: login");
      exit();
    }
   
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
                        <h4>Sub Category Details</h4>
                     </div>
                     <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">Add Category</button>
                     </div>
                  </div>
               </div>
               <div class="card-body">  
                  <table class="table table-sm"
                     id="table"
                     data-toggle="table"
                     data-height="460"
                     data-search="true"
                     data-pagination="true"
                     data-side-pagination="server"
                     data-query-params="queryParams"
                     data-method="post"
                     data-url ="<?php echo base_url('/subcategory/getAllData')?>">
                     <thead>
                        <tr>
                           <th data-field="id" data-visible="false">ID</th>
                           <th data-field="category_name">Category Name</th>
                           <th data-field="category_id"  data-visible="false">Category id</th>
                           <th data-field="subcategoryname">Sub Category Name</th>
                           <th class="action-table" data-field="action" data-align="center" data-formatter="btnAction" data-events="btnActionEvent">Action</th>
                        </tr>
                     </thead>
                  </table>
               </div>
               <!-- Modal Add Exam-->
               <form action="#" method="post" id="form_save" name="form_save" enctype="multipart/form-data" class="form-validate">
                  <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Add New Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <select name="drpCategory[]" class="form-control drpCategory" multiple>
                                       <option></option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Sub Category Name</label>
                                 <input type="text" class="form-control" name="subcategoryname" placeholder="Sub Category Name" required data-msg="Please enter a valid name">
                                 </div>
                              </div>
                           <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Save</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
                <!-- Modal Edit Exam-->

                <form action="#" method="post" id="form_update" name="form_update" enctype="multipart/form-data" class="form-validate">
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <select name="drpCategory[]" class="form-control drpCategory" multiple>
                                       <option></option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Category Name</label>
                                 <input type="text" class="form-control subcategoryname" name="subcategoryname" placeholder="Sub Category Name" required>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <input type="hidden" name="sub_category_id" class="sub_category_id">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              <button type="submit" class="btn btn-primary">Update</button>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
               <!-- End Modal Edit Exam-->
                <!-- Modal Delete Exam-->

                <form action="#" method="post" id="form_delete" name="form_delete">
                  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Delete Category</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <h4>Are you sure want to delete this Category?</h4>
                           </div>
                           <div class="modal-footer">
                              <input type="hidden" name="sub_category_id" class="sub_category_id">
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
<script>

   $(document).ready(function() {
      hidePreloader();
      loadData();
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
            console.log(drp_data);
            $(".drpCategory").select2({
               data: drp_data['DATA_CATEGORY'],
               placeholder: "Select Category",
               width: '100%',
               maximumSelectionLength: 1,
            });  
   
            hidePreloader();
            $("#menuConfigClassSubject").attr("class","active");
            $("#cofigdropdownDropdownid").trigger('click');  
         }
      });
   } 

  $("#menuSubCategory").attr("class","active");
  function queryParams(params) {
    return params
  }

  function btnAction(value, row, index) {
      return [
         '<button class="btn btn-sm btn-info btnedit mr-2" type="button"><i class="fa fa-edit"></i> Edit</button>',
         // '<button class="btn btn-sm btn-danger btnDelete" type="button"><i class="fa fa-trash"></i> Delete</button>',
      ].join('')
   }

   window.btnActionEvent = {
      'click .btnedit': function (e, value, row, index) {
         $('.sub_category_id').val(row['id']);
         $('.subcategoryname').val(row['subcategoryname']);
         $('.drpCategory').val(row['category_id']).trigger('change.select2');
         $('#editModal').modal('show'); // call edit modal
      },
      'click .btnDelete': function (e, value, row, index) {
         $('.sub_category_id').val(row['id']);
         $('#deleteModal').modal('show');  // Call delete modal 
      }
   }

   $('#addModal').on('shown.bs.modal', function (e) {
      $('#form_save')[0].reset();
      // $("#form_save").validate().resetForm();
   })

  $("#form_save").on('submit',function(e)
  {
    e.preventDefault(); // avoid to execute the actual submit of the form.
   //  if($("#form_save").validate().form()){
        path = '<?php echo base_url('/subcategory/save')?>'; 
        var form = $('#form_save');
        var formData = new FormData(form[0]);
        $.ajax({
          type: "POST",
          url: path,
          data: formData,
          beforeSend: function() {
            $('#addModal').modal('hide');
            showPreloader();
          },
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data)
          { 
            if(data.messages.success == "Data Saved") {
               refreshTable();
               alert("Data Inserted Successfully");
               hidePreloader();
            } else {
               alert(data.messages.success);
               hidePreloader();
            }
          },
          error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
          }
        });
      // }
  });

  $("#form_update").on('submit',function(e)
  {
    e.preventDefault(); // avoid to execute the actual submit of the form.
   //  if($("#form_update").validate().form()){
        path = '<?php echo base_url('/subcategory/update')?>'; 
        var form = $('#form_update');
        var formData = new FormData(form[0]);
        $.ajax({
          type: "POST",
          url: path,
          data: formData,
          beforeSend: function() {
            $('#editModal').modal('hide');
            showPreloader();
          },
          contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
          processData: false, // NEEDED, DON'T OMIT THIS
          success: function(data)
          {
            if(data.messages.success == "Data Updated") {
               alert("Data Updated Successfully");
               refreshTable();
               $('#form_update')[0].reset();
               // $("#form_update").validate().resetForm();
               hidePreloader();
            } else if(data.messages.success == "Already Configured for this Category") {
               alert(data.messages.success);
               hidePreloader();
            }
            else {
               $('#editModal').modal('show');
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
   //  if($("#form_delete").validate().form()){
        path = '<?php echo base_url('/subcategory/delete')?>'; 
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
               refreshTable();
               hidePreloader();
            } else {
               $('#deleteModal').modal('show');
            }
          },
          error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
          }
        });
      // }
  });

  function refreshTable() {
   $('#table').bootstrapTable('refreshOptions', {
      pageNumber: 1
   });
  }

</script>
</body>
</html>