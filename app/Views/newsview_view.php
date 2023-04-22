<?php 
   require("headernews.php");
?>
<style>
.news-details img {
  width: 100%;
  height: 445px;
}
</style>
 <script type="text/javascript">var newsdata = <?php echo json_encode($pid_data); ?>;</script>
 <script> 
    console.log("---------------------");
    console.log('<?php echo ($descr); ?>')
  </script>
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:site" content="@nytimes">
  <meta name="twitter:creator" content="@SarahMaslinNir">
  <meta name="twitter:title" content='<?php echo ($pid_data_title); ?>'>
  <meta name="twitter:description" content='newswoods'>
  <meta name="twitter:image" content='<?php echo $imgsrc; ?>'>
  
  <meta property="og:url" content='<?php echo ($dataurl); ?>' />
  <meta property="og:title" content='<?php echo ($pid_data_title); ?>'/>
  <!--<meta name="description" property="og:description" content='newswoods'>-->
  <meta property="og:image" content='<?php echo $imgsrc; ?>'>
  <meta property="og:type" content="article" />


    <!-- ------------- News Details -------------- -->

    <div class="news-section">
      <div class="container mb-3">
        <div class="row">
          <div class="col-md-8">
            <div class="news-details">
              <h6 id="txtTitle0">
                அச்சுத்துறையிலும் வரைகலைத் துறையிலும், lorem ipsum (லோரம்
                இப்சம்)[p][1] என்பது இடத்தை நிரப்பும்.
              </h6>
              <img src="<?php echo base_url('vaanavil/images/sampleimg.jpg')?>" class="" alt=""  id="img0" width="100%" height="445"/>
              <br><br>
              <p id="news_content">
                அச்சுத்துறையிலும் வரைகலைத் துறையிலும், lorem ipsum (லோரம்
                இப்சம்)[p][1] என்பது இடத்தை நிரப்பும் ஒரு வெற்று உரை ஆகும்.
                பொதுவாக, ஒரு ஆவணம் அல்லது வடிவமைப்பின் எழுத்துரு, படிமங்கள்,
                பக்க வடிவமைப்பு முதலிய தோற்றக்கூறுகளின் மேல் கவனத்தைக்
                குவிப்பதற்காக இவ்வுரை பயன்படுகிறது. சீசர் எழுதிய இலத்தீன
                ஆக்கங்களில் இருந்து சொற்களை மாற்றியும், நீக்கியும், கூட்டியும்
                எழுதி இந்த லோரம் இப்சம் உரை பெறப்படுகிறது. இதனால், அது பொருள்
                மிக்கதாகவோ முறையான இலத்தீர உரையாகவோ இருப்பதில்லை.[1] "லோரம்
              </p>
              <hr>
              <div class="social-links">
                <b>Share On</b> 
                <div class="container">
                  <div class="row mt-4 text-center">
                    <div class="col-md-6">
                      <div class="facebook">
                        <a href="https://www.facebook.com/sharer/sharer.php?u=https://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" target="_blank">
                          <button class="btn btn-primary" style="width:100%"> 
                            <i class="fa fa-facebook" aria-hidden="true"></i> FaceBook
                          </button>
                        </a>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="twitter">
                        <a href="https://twitter.com/intent/tweet?url=https://<?php echo $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];?>" target="_blank">
                          <button class="btn btn-primary"  style="width:100%"> 
                          <i class="fa fa-twitter" aria-hidden="true"></i> Twitter
                          </button>  
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
      </div>
    </div>
    <div class="body_content" style="display:none">
    <?php require("footer.php");?>   
    </div>
    <?php 
      require("scriptnews.php");
    ?> 
    <script type="text/javascript">var newsdata = <?php echo json_encode($pid_data); ?>;</script>
   <script src="<?php echo base_url('js/newsview.js?v=1.4')?>"></script>
  </body>
</html>
