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
                        <h4>Magazine Download Details</h4>
                     </div>
                     <div class="col-md-6 text-right">
                        
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
                  data-url="Magazine/getAllData">
                  <thead>
                     <tr>
                        <th data-field="emailid">Email Id</th>
                        <th data-field="mobileno">Mobile No</th>
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
                                 <input type="text" class="form-control" name="category_name" placeholder="Category Name" required data-msg="Please enter a valid name">
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
                                 <input type="text" class="form-control category_name" name="category_name" placeholder="Category Name" required>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <input type="hidden" name="category_id" class="category_id">
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
                              <input type="hidden" name="category_id" class="category_id">
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
   })

  $("#menuMagazine").attr("class","active");
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
         $('.category_id').val(row['category_id']);
         $('.category_name').val(row['category_name']);
         $('#editModal').modal('show'); // call edit modal
      },
      'click .btnDelete': function (e, value, row, index) {
         $('.category_id').val(row['category_id']);
         $('#deleteModal').modal('show');  // Call delete modal 
      }
   }

   $('#addModal').on('shown.bs.modal', function (e) {
      $('#form_save')[0].reset();
      $("#form_save").validate().resetForm();
   })

  $("#form_save").on('submit',function(e) {
  });

  $("#form_update").on('submit',function(e)  {
  });

  $("#form_delete").on('submit',function(e)
  {
    e.preventDefault(); // avoid to execute the actual submit of the form.
  });

  function refreshTable() {
   $('#table').bootstrapTable('refreshOptions', {
      pageNumber: 1
   });
  }

</script>
</body>
</html>