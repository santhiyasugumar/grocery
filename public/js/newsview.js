var url_data = window.location.href.split("/");

//javascript
window.onload = function () {
    for(var i=0; i<newsdata.length; i++) {
        //console.log(newsdata[i].content);

        // Month Start
        var created_date = newsdata[i].created_on;
        var date_field = created_date.split(" ");
        var d = date_field[0].split("-");
        var month = new Array();
        month[00] = "January";
        month[01] = "February";
        month[02] = "March";
        month[03] = "April";
        month[04] = "May";
        month[05] = "June";
        month[06] = "July";
        month[7] = "August";
        month[8] = "September";
        month[9] = "October";
        month[10] = "November";
        month[11] = "December";
        var dat = new Date();
        var month = month[parseInt(d[1]-1)];
        var date = month+' '+d[2]+' '+d[0];
         // Month End

        $("#txtTitle0").text(newsdata[i].cover_title);
        $("#txtDate0").text(date);
        var imgpath = `${baseURL}/uploads/`+newsdata[i].grpid+"/"+newsdata[i].cover_image_name;
        $("#img"+i+"").attr("src", imgpath);
        $("#news_content").html(newsdata[i].content);

        // $("#preload").hide();
        // $(".body_content").show();
        // var d = '<meta property="og:url" content="https://newswoods24.com/newspaper/public/Newsview/news/133" /><meta property="og:title" content="'+newsdata[i].cover_title+'" /><meta property="og:description" content="Testing In the early days, Twitter grew so quickly that it was almost impossible to add new features because engineers spent their time trying to keep the rocket ship from stalling." /><meta property="og:image" content="https://newswoods24.com/newspaper/public/uploads/59/capernaum.jpg" />';
        // $("head").append(d);
        // <meta property="og:url" content="https://newswoods24.com/newspaper/public/Newsview/news/133" />
        // <meta property="og:title" content="" />
        // <meta property="og:description" content="Testing In the early days, Twitter grew so quickly that it was almost impossible to add new features because engineers spent their time trying to keep the rocket ship from stalling." />
        // <meta property="og:image" content="https://newswoods24.com/newspaper/public/uploads/59/capernaum.jpg" />
    }

}

axios.post(`${baseURL}/Newslist/getPageData`, {
    category_id: url_data[url_data.length - 1]
})
.then((response) => {
    // $("#labelcategory").text(response.data.rows_category[0].category_name);
    // console.log(response);
    // console.log("-------");
 
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
