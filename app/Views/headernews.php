<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>The Unite</title>
      <link
         rel="stylesheet"
         href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
         integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
         crossorigin="anonymous"
         />
      <link
         rel="stylesheet"
         href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
         integrity="sha256-eZrrJcwDc/3uDhsdt61sL2oOBY362qM3lon1gyExkL0="
         crossorigin="anonymous"
         />
      <script>window.baseURL = `<?= base_url();?>`</script>
      <link href="<?php echo base_url('vaanavil/style.css')?>" rel="stylesheet">
      <link href="<?php echo base_url('vendor/font-awesome/css/font-awesome.min.css')?>" rel="stylesheet">
      <link  href="<?php echo base_url('vendor/bootstrap/css/boostrap-table.css')?>" rel="stylesheet">
      <style>
         .bootstrap-table .fixed-table-container .fixed-table-body {
         overflow-x: hidden;
         }
         .related-article {
         height: 100px;
         }
         .act {
         background-color: red;
         color: #fff !important;
         border-radius: 5px;
         transition: 0.5s;
         }
         #preload {
         border: 16px solid #f3f3f3;
         border-radius: 50%;
         border-top: 16px solid #cf1717;
         width: 120px;
         height: 120px;
         -webkit-animation: spin 2s linear infinite; /* Safari */
         animation: spin 2s linear infinite;
         }
         /* Safari */
         @-webkit-keyframes spin {
         0% { -webkit-transform: rotate(0deg); }
         100% { -webkit-transform: rotate(360deg); }
         }
         @keyframes spin {
         0% { transform: rotate(0deg); }
         100% { transform: rotate(360deg); }
         }
         .sametitle {
         display: flex;
         }
         .technology .technology-bottom-section
         {
         height: 130px;
         }
         .top-story-box {
         height: 100;
         }
      </style>
   </head>
   <div class="text-center" style="margin-top:20%" id="preloader">
      <center>
         <div id="preload"></div>
         <h2>Loading..</h2>
      </center>
   </div>
   <body style="word-wrap: break-word;">
      <div class="body_content" style="display:none">
      <div class="top-nav">
         <div class="container-fluid">
            <div class="row">
               <div class="col-12 text-center">
                  <img
                      src="<?php echo base_url('vaanavil/images/logo.jpg')?>"
                      class="img"
                      alt=""
                    />
               </div>
            </div>
         </div>
      </div>
      <nav class="navbar navbar-expand-lg navbar-light">
         <a class="navbar-brand" href="#"></a>
         <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent"
            aria-expanded="false"
            aria-label="Toggle navigation"
            >
         <span class="navbar-toggler-icon"></span>
         </button>
         <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mx-auto">
               <li class="nav-item">
                  <a class="nav-link cls_home" href="<?php echo base_url('Home')?>">முகப்பு</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_science" href="<?php echo base_url('Newslist/list/2')?>"> அறிவியல்</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_social" href="<?php echo base_url('Newslist/list/3')?>"> சமூகம்</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_education" href="<?php echo base_url('Newslist/list/4')?>"> கல்வி </a>
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_tech" href="<?php echo base_url('Newslist/list/9')?>"> தொழில்நுட்பம்</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_child" href="<?php echo base_url('Newslist/list/10')?>"> குழந்தைகள்</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_magazine" href="<?php echo base_url('Newslist_Magazine/list/4')?>"> கட்டுரைகள் </a> 
               </li>
               <li class="nav-item">
                  <a class="nav-link cls_video"  href="<?php echo base_url('Newslist_Video')?>"> காணொளி </a>
               </li>
            </ul>
         </div>
      </nav>
      <!-- ------------- News Details -------------- -->