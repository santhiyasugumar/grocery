<?php 
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
                        <h4>Exam Details</h4>
                     </div>
                     <div class="col-md-6 text-right">
                        <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#addModal">Add Exam</button>
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
                  data-url="Exam/getAllData">
                  <thead>
                     <tr>
                        <th data-field="exam_id" data-visible="false">ID</th>
                        <th data-field="exam_name">Exam Name</th>
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
                              <h5 class="modal-title" id="exampleModalLabel">Add New Exam</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <label>Exam Name</label>
                                 <input type="text" class="form-control" name="exam_name" placeholder="Exam Name" required data-msg="Please enter a valid name">
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
               <!-- End Modal Add Exam-->
               <!-- Modal Edit Exam-->

               <form action="#" method="post" id="form_update" name="form_update" enctype="multipart/form-data" class="form-validate">
                  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                     <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                           <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">Edit Exam</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <div class="form-group">
                                 <label>Exam Name</label>
                                 <input type="text" class="form-control exam_name" name="exam_name" placeholder="Exam Name" required>
                              </div>
                           </div>
                           <div class="modal-footer">
                              <input type="hidden" name="exam_id" class="exam_id">
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
                              <h5 class="modal-title" id="exampleModalLabel">Delete Exam</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                              </button>
                           </div>
                           <div class="modal-body">
                              <h4>Are you sure want to delete this Exam?</h4>
                           </div>
                           <div class="modal-footer">
                              <input type="hidden" name="exam_id" class="exam_id">
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

  $("#menuExam").attr("class","active");
  function queryParams(params) {
    return params
  }

  function btnAction(value, row, index) {
      return [
         '<button class="btn btn-sm btn-info btnedit mr-2" type="button"><i class="fa fa-edit"></i> Edit</button>',
         '<button class="btn btn-sm btn-danger btnDelete" type="button"><i class="fa fa-trash"></i> Delete</button>',
      ].join('')
   }

   window.btnActionEvent = {
      'click .btnedit': function (e, value, row, index) {
         $('.exam_id').val(row['exam_id']);
         $('.exam_name').val(row['exam_name']);
         $('#editModal').modal('show'); // call edit modal
      },
      'click .btnDelete': function (e, value, row, index) {
         $('.exam_id').val(row['exam_id']);
         $('#deleteModal').modal('show');  // Call delete modal 
      }
   }

   $('#addModal').on('shown.bs.modal', function (e) {
      $('#form_save')[0].reset();
      $("#form_save").validate().resetForm();
   })

  $("#form_save").on('submit',function(e)
  {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    if($("#form_save").validate().form()){
        path = '/Exam/save';
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
            } 
          },
          error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
          }
        });
      }
  });

  $("#form_update").on('submit',function(e)
  {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    if($("#form_update").validate().form()){
        path = '/Exam/update';
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
               $("#form_update").validate().resetForm();
               hidePreloader();
            } else {
               $('#editModal').modal('show');
            }
          },
          error: function (jqXHR, textStatus, errorMessage, exception) {
            console.log(errorMessage);
          }
        });
      }
  });

  $("#form_delete").on('submit',function(e)
  {
    e.preventDefault(); // avoid to execute the actual submit of the form.
    if($("#form_delete").validate().form()){
        path = '/Exam/delete';
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
      }
  });

  function refreshTable() {
   $('#table').bootstrapTable('refreshOptions', {
      pageNumber: 1
   });
  }

</script>
</body>
</html>