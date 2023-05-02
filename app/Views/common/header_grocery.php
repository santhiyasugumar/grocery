
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
    .header{background:rgb(0, 178, 255);color:#fff;}
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

.fa {
  color: white;
}

  </style>
</head>
<body>
    <div class="container ">
      <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <!-- Example Code -->
            <nav class="navbar sticky-top navbar-dark bg-dark fixed-top" style="position: fixed">
              <div class="container-fluid">
                <a class="navbar-brand" href="#">Grocery</a>
                <div>
                <i class="fa" style="font-size:24px">&#xf07a;</i>
                  <span class='badge badge-warning' id='lblCartCount'> 0 </span>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar">
                  <span class="navbar-toggler-icon"></span>
                </button>
                </div>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                  <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">Menu</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                  </div>
                  
                  <div class="menu"></div>
                </div>
              </div>
            </nav>
            <!-- End Example Code -->

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