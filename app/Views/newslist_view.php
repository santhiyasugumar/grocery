<?php 
   require("headernews.php");
?>
    <div class="news-section">
      <div class="container mt-2">
        <div class="row">
        <div class="col-md-8"><br>
              <table class="table table-sm table-borderless" 
              id="table"
              data-toggle="table"
              data-search="true"
              data-pagination="true"
              data-page-size="5"
              data-side-pagination="server"
              data-query-params="queryParams"
              data-method="post"
              data-url ="<?php echo base_url('/Newslist/getAllData')?>"
              >
              <thead>
                  <tr>
                    <th data-field="id" data-visible="false">ID</th>
                    <th data-field="category_id" data-visible="false">ID</th>
                    <th data-field="category_name" data-visible="false"></th>
                    <th data-field="cover_title" data-visible="false"></th>
                    <th data-field="content" data-visible="false"></th>
                    <th data-field="format" data-formatter="btnAction"></th>
                  </tr>
              </thead>
            </table>
          </div>
       <!-- //ds -->
       <div class="col-md-4">
            <h2>Related Article</h2>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href0">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img0" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title0" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_date0">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href1">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img1" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title1" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_date1">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href2">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img2" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title2" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_date2">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_g0">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_g0" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_g0" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_g_date0">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_g1">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_g1" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_g1" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_g_date1">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_g2">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_g2" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_g2"  style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_g_date2">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_tn0">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_tn0" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_tn0" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_tn_date0">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_tn1">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_tn1" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_tn1" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_tn_date1">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_tn2">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_tn2" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_tn2" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_tn_date2">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
            <div class="related-article">
              <div class="related-story-box">
                <a href="" id="top_href_tn3">
                  <div class="row">
                    <div class="col-5">
                      <img
                        src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>"
                        class="" id="top_img_tn3" width="125" height="90"
                        alt=""
                      />
                    </div>
                    <div class="col-7 align-self-center">
                      <h5 class="related-story-title" id="top_title_tn3" style="height:70px">
                        அச்சுத்துறையிலும் வரைகலைத் துறையிலும்,
                      </h5>
                      <small style="float:right" class="mx-1 text-muted"><i class="fa fa-calendar mx-1" aria-hidden="true"></i><span id="top_tn_date3">DATE</span></small>
                    </div>
                  </div>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="body_content" style="display:none">
      <?php require("footer.php");?>   
    </div>
    <?php 
      require("scriptnews.php");
    ?>    
    <script src="<?php echo base_url('js/newslist.js?v=1.3')?>"></script>
    </div>
    
  </body>
</html>
