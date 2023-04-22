
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