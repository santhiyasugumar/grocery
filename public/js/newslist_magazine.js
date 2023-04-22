var url_data = window.location.href.split("/");

function queryParams(params) {
    params.category_id = url_data[url_data.length - 1];
    return params
}

function btnAction(value, row, index) {
    var href = `${baseURL}/Newsview/news/` + row['id'] + "/" + row['cover_image_name'];
    var imgsrc = `${baseURL}/img/download.png`;
    var myContent = row['content'];
    var content = $(myContent).text().substring(0, 250) + " ...";
    var created_on = row['created_on'].split(" ");
    var created_on = created_on[0].split("-");
    var created_on = '<i class="fa fa-calendar"></i> '+created_on[2]+"-"+created_on[1]+"-"+created_on[0];
    var title = row['cover_title'];
    var data = "<div class='news-list-show'><div class='row'><div class='col-md-8'><h6 id='data_title" + row['id'] + "'>" + title + "</h6><p>"+created_on+"</p></div><div class='col-md-4 text-center'><button class='btn btn-sm btn-primary btnDownload mt-3'><i class='fa fa-download'></i> Download</button></div></div></div>";
    return [
        data
    ].join('')
}

window.btnActionEvent = {
    'click .btnDownload': function (e, value, row, index) {
        e.preventDefault();
        var url = `${baseURL}/Newsview/news/` + row['id'];
        var imagename = row['cover_image_name'];
        $("#txtdownloadid").val(row['id']);
     
        $('#myModal').modal({
            backdrop: 'static',
            keyboard: false
        }).on('click', '#closeDeleteConfirmModal, #deleteConfirmModalNo, #deleteConfirmModalYes', function(e) {
            e.preventDefault();
           
            if (this.id == 'deleteConfirmModalNo' || this.id == 'closeDeleteConfirmModal') {
                $('#myModal').modal('hide');
                return;
            }
            
            path = `${baseURL}/Newslist_Magazine/save`;
           
            if(!$('#emailid').val()) {
                alert("Enter Email Id.");
                return;
            }

            if(!$('#mobileno').val()) {
                alert("Enter Mobile No.");
                return;
            }
            
            var form = $('#form_save');
            var formData = new FormData(form[0]);
            $.ajax({
              type: "POST",
              url: path,
              data: formData,
              beforeSend: function() {
              //   $('#addModal').modal('hide');
              //   showPreloader();
              },
              contentType: false, // NEEDED, DON'T OMIT THIS (requires jQuery 1.6+)
              processData: false, // NEEDED, DON'T OMIT THIS
              success: function(data)
              { 
                if(data.messages.success == "Data Saved") {
                   $('#addModal').modal('hide');
                  //  hidePreloader();
                  download_file(url, imagename);
                  $('#myModal').modal('hide');
                  $('#myModal').off("click"); //contain two clicks means off 1st click
                  $("#form_save")[0].reset();
                } 
              },
              error: function (jqXHR, textStatus, errorMessage, exception) {
                console.log(errorMessage);
              }
            });
        });
      
      
    }
 }

 axios.post(`${baseURL}/Newslist/getPageData`, {
    category_id: url_data[url_data.length - 1]
})
.then((response) => {
    // $("#labelcategory").text(response.data.rows_category[0].category_name);
    // console.log(response);
    // console.log("-------");
    var category_id = url_data[url_data.length - 1];
 
    $(".cls_magazine").css({
        "background-color": "#cf1717",
        "border-radius": "5px",
        "color": "white"
    });
    
    var r_tv = response.data.row_thiraivimarsanam;
    var r_tn = response.data.rows_trending_news;
    var r_g = response.data.rows_gallery;
    for (var i = (response.data.row_thiraivimarsanam.length - 1); i >= 0; i--) {
        //console.log(response.data.row_thiraivimarsanam[i]);
        var imgpath = `${baseURL}/uploads/` + r_tv[i].grpid + "/" + r_tv[i].cover_image_name;
        var cover_title = r_tv[i].cover_title;

        //Breaking News
        var href = `${baseURL}/Newsview/news/` + r_tv[i].id;
        $("#top_href" + i + "").attr("href", href);
        $("#top_img" + i + "").attr("src", imgpath);
        // date
        var created_date = r_tv[i].created_on_date;
        $("#top_date" + i + "").text(created_date);

        var length = cover_title.length;
        if (length > 65) {
            var covertitle = cover_title.substring(0, 65) + "...Read More";
        } else {
            var sampletext = "New Trump order excluding non citizens from census could cost citizens from census could";
            var restfill = 64 - parseInt(length);
            var restdata = sampletext.substring(1, restfill);
            var covertitle = cover_title;
        }
        $("#top_title" + i + "").html(covertitle);
    }

    for (var i = (response.data.rows_gallery.length - 1); i >= 0; i--) {
        // console.log(response.data.rows_gallery[i]);
        var imgpath = `${baseURL}/uploads/` + r_g[i].grpid + "/" + r_g[i].cover_image_name;
        var cover_title = r_g[i].cover_title;
        // date
        var created_date = r_g[i].created_on;
        var date_field = created_date.split(" ");
        var d = date_field[0].split("-");
        var date = d[2] + '/' + d[1] + '/' + d[0];
        //Breaking News
        var href = `${baseURL}/Newsview/news/` + r_g[i].id;
        $("#top_href_g" + i + "").attr("href", href);
        $("#top_img_g" + i + "").attr("src", imgpath);

        var length = cover_title.length;
        if (length > 65) {
            var covertitle = cover_title.substring(0, 65) + "...Read More";
        } else {
            var sampletext = "New Trump order excluding non citizens from census could cost citizens from census could";
            var restfill = 64 - parseInt(length);
            var restdata = sampletext.substring(1, restfill);
            var covertitle = cover_title;
        }
        $("#top_title_g" + i + "").html(covertitle);

        // date
        var created_date = r_g[i].created_on_date;
        $("#top_g_date" + i + "").text(created_date);
    }


    for (var i = (response.data.rows_trending_news.length - 1); i >= 0; i--) {
        //console.log(response.data.rows_trending_news[i]);
        var imgpath = `${baseURL}/uploads/` + r_tn[i].grpid + "/" + r_tn[i].cover_image_name;
        var cover_title = r_tn[i].cover_title;
        // date
        var created_date = r_tn[i].created_on;
        var date_field = created_date.split(" ");
        var d = date_field[0].split("-");
        var date = d[2] + '/' + d[1] + '/' + d[0];
        //Breaking News
        var href = `${baseURL}/Newsview/news/` + r_tn[i].id;
        $("#top_href_tn" + i + "").attr("href", href);
        $("#top_img_tn" + i + "").attr("src", imgpath);

        var length = cover_title.length;
        if (length > 65) {
            var covertitle = cover_title.substring(0, 65) + "...Read More";
        } else {
            var sampletext = "New Trump order excluding non citizens from census could cost citizens from census could";
            var restfill = 64 - parseInt(length);
            var restdata = sampletext.substring(1, restfill);
            var covertitle = cover_title;
        }
        $("#top_title_tn" + i + "").html(covertitle);

        // date
        var created_date = r_tn[i].created_on_date;
        $("#top_tn_date" + i + "").text(created_date);
    }

    $("#preloader").hide();
    $(".body_content").show();
}, (error) => {
    //console.log(error);
});

function download_file(fileURL, fileName) {
    //Set the File URL.
    var url = fileURL + "/" + fileName;

    $.ajax({
        url: url,
        cache: false,
        xhr: function () {
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 2) {
                    if (xhr.status == 200) {
                        xhr.responseType = "blob";
                    } else {
                        xhr.responseType = "text";
                    }
                }
            };
            return xhr;
        },
        success: function (data) {
            //Convert the Byte Data to BLOB object.
            var blob = new Blob([data], { type: "application/octetstream" });

            //Check the Browser type and download the File.
            var isIE = false || !!document.documentMode;
            if (isIE) {
                window.navigator.msSaveBlob(blob, fileName);
            } else {
                var url = window.URL || window.webkitURL;
                link = url.createObjectURL(blob);
                var a = $("<a />");
                a.attr("download", fileName);
                a.attr("href", link);
                $("body").append(a);
                a[0].click();
                $("body").remove(a);
            }
        }
    });
};



/* Helper function */
// function download_file(fileURL, fileName) {
//     // for non-IE
//     if (!window.ActiveXObject) {
//         var save = document.createElement('a');
//         save.href = fileURL;
//         save.target = '_blank';
//         var filename = fileURL.substring(fileURL.lastIndexOf('/')+1);
//         save.download = fileName || filename;
// 	       if ( navigator.userAgent.toLowerCase().match(/(ipad|iphone|safari)/) && navigator.userAgent.search("Chrome") < 0) {
// 				document.location = save.href; 
// // window event not working here
// 			}else{
// 		        var evt = new MouseEvent('click', {
// 		            'view': window,
// 		            'bubbles': true,
// 		            'cancelable': false
// 		        });
// 		        save.dispatchEvent(evt);
// 		        (window.URL || window.webkitURL).revokeObjectURL(save.href);
// 			}	
//     }

//     // for IE < 11
//     else if ( !! window.ActiveXObject && document.execCommand)     {
//         var _window = window.open(fileURL, '_blank');
//         _window.document.close();
//         _window.document.execCommand('SaveAs', true, fileName || fileURL)
//         _window.close();
//     }
// }