<!-- JavaScript files-->
<!-- <script src="<?php echo base_url('editor/src/ckeditor.js')?>"></script> -->
<script>window.baseURL = `<?= base_url();?>`</script>
<script src="<?php echo base_url('vendor/bootstrap/js/datepickerjquery.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/tether.min.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/moment.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/boostrap_timepicker.js')?>"></script>
<script>
    var date = new Date();
    var today = new Date(date.getFullYear(), date.getMonth(), date.getDate());
    $('#txtDateOfSample').datetimepicker({
        format: 'DD/MM/YYYY LT',
        minDate: new Date(today),
    });
</script>
<script src="<?php echo base_url('vendor/jquery/jquery.min.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap.bundle.min.js')?>"></script>
<script src="<?php echo base_url('js/grasp_mobile_progress_circle-1.0.0.min.js')?>"></script>
<script src="<?php echo base_url('vendor/jquery.cookie/jquery.cookie.js')?>"> </script>
<script src="<?php echo base_url('vendor/chart.js/Chart.min.js')?>"></script>
<!-- <script src="<?php echo base_url('vendor/jquery-validation/jquery.validate.min.js')?>"></script> -->
<script src="<?php echo base_url('vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js')?>"></script>
<!-- Main File-->
<script src="<?php echo base_url('js/front.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/bootstrap-table.js')?>"></script>
<script src="<?php echo base_url('vendor/bootstrap/js/select2.js')?>"></script>
 <!-- Bootstrap DatePicker-->
 <script src="<?php echo base_url('https://d19m59y37dris4.cloudfront.net/dashboard-premium/1-4-8/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')?>"></script>
 
<!-- select2 -->
<!-- <script src="<?php echo base_url('https://unpkg.com/multiple-select@1.5.2/dist/multiple-select.min.js')?>"></script> -->
<script>
    function showPreloader() {
        $("#preloader").show();
        $(".menu").hide();
    }

    function hidePreloader() {
        $("#preloader").hide();
        $(".menu").show();
    }
</script>
<script src="<?php echo base_url('node_modules/axios/dist/axios.js')?>"></script>