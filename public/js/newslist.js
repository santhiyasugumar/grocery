var url_data = window.location.href.split("/");

function queryParams(params) {
    params.category_id = url_data[url_data.length - 1];
    return params
}

function btnAction(value, row, index) {
    var href = `${baseURL}/Newsview/news/` + row['id'];
    var imgsrc = `${baseURL}/uploads/` + row['grpid'] + "/" + row['cover_image_name'];
    var myContent = row['content'];

    if (row['content'].length > 250) {
        var content = $(myContent).text().substring(0, 250) + "(..Read More)";
    } else {
        var content = $(myContent).text().substring(0, 250);
    }
    var title = row['cover_title'];

    var data = " <div class='news-list-show'><a style='text-decoration:none;color:black' href='" + href + "' id='data_href" + row['id'] + "'><div class='row'><div class='col-md-5'><img src='" + imgsrc + "' class='' alt='' width='300' height='250' id='data_img" + row['id'] + "'></div><div class='col-md-7'><h6 id='data_title" + row['id'] + "'>" + title + "</h6><p id='data_content" + row['id'] + "'>" + content + "</p></div></div></a></div>";
    return [
        data
    ].join('')
}

var category_id = url_data[url_data.length - 1];
if (category_id == 2) {
    $(".cls_science").css({
        "background-color": "#cf1717",
        "border-radius": "5px",
        "color": "white"
    });
}
if (category_id == 3) {
    $(".cls_social").css({
        "background-color": "#cf1717",
        "border-radius": "5px",
        "color": "white"
    });
}
if (category_id == 4) {
    $(".cls_education").css({
        "background-color": "#cf1717",
        "border-radius": "5px",
        "color": "white"
    });
}
if (category_id == 9) {
    $(".cls_tech").css({
        "background-color": "#cf1717",
        "border-radius": "5px",
        "color": "white"
    });
}
if (category_id == 10) {
    $(".cls_child").css({
        "background-color": "#cf1717",
        "border-radius": "5px",
        "color": "white"
    });
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