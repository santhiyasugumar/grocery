//javascript
window.onload = function () {
    showPreloader();
    axios.get("Home/getAllData")
        .then(response => {
            var r_bn = response.data.rows_breakingnews; // breaking news
            var r_cv = response.data.rows_coronavirus; // corona virus
            var r_e = response.data.rows_economic; // economic
            var r_w = response.data.rows_world; // world  
            var r_p = response.data.row_politics; // politics
            var r_india = response.data.row_india; // politics   
            var r_kalvi = response.data.row_kalvi; //education
            // breaking news statrt
            // for(var i=r_bn.length; i>0; i--) {
            for (var i = (r_bn.length - 1); i >= 0; i--) {
                var imgpath = 'uploads/' + r_bn[i].id + "/" + r_bn[i].cover_image_name;
                var cover_title = r_bn[i].cover_title;
                // date
                var created_date = r_bn[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                //Breaking News
                var href = 'Newsview/news/' + r_bn[i].id;
                $("#idBreakingNews_newsview" + i + "").attr("href", href);
                $("#idBreakingNews_img" + i + "").attr("src", imgpath);
                $("#breakingnews_title" + i + "").text(cover_title);
                $("#idBreakingNews_date" + i + "").text(date);
            }
            for (var i = 0; i < r_cv.length; i++) {
                //Corona Virus
                var imgpath = 'uploads/' + r_cv[i].id + "/" + r_cv[i].cover_image_name;
                var cover_title = r_cv[i].cover_title;
                // date
                var created_date = r_bn[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                // $("#idBreakingNews_newsview").attr("href", href);
                $("#idCoronaVirus_img" + i + "").attr("src", imgpath);
                $("#coronavirus_title" + i + "").text(cover_title);
                $("#coronavirus_date" + i + "").text(date);
            }
            for (var i = 0; i < r_e.length; i++) {
                //Corona Virus
                var imgpath = 'uploads/' + r_e[i].id + "/" + r_e[i].cover_image_name;
                var cover_title = r_e[i].cover_title;
                // date
                var created_date = r_bn[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                // $("#idBreakingNews_newsview").attr("href", href);
                $("#economic_img" + i + "").attr("src", imgpath);
                $("#economic_title" + i + "").text(cover_title);
                $("#economic_date" + i + "").text(date);
            }
            for (var i = 0; i < r_w.length; i++) {
                //Corona Virus
                var imgpath = 'uploads/' + r_w[i].id + "/" + r_w[i].cover_image_name;
                var cover_title = r_w[i].cover_title;
                // date
                var created_date = r_bn[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                // $("#idBreakingNews_newsview").attr("href", href);
                $("#world_img" + i + "").attr("src", imgpath);
                $("#world_title" + i + "").text(cover_title);
                $("#world_date" + i + "").text(date);
            }
            for (var i = 0; i < r_p.length; i++) {
                //Corona Virus
                var imgpath = 'uploads/' + r_p[i].id + "/" + r_p[i].cover_image_name;
                var cover_title = r_p[i].cover_title;
                // date
                var created_date = r_p[i].created_on;
                // $("#idBreakingNews_newsview").attr("href", href);
                $("#politics_img" + i + "").attr("src", imgpath);
                $("#politics_title" + i + "").text(cover_title);
            }
            for (var i = 0; i < r_india.length; i++) {
                //Corona Virus
                var imgpath = 'uploads/' + r_india[i].id + "/" + r_india[i].cover_image_name;
                var cover_title = r_india[i].cover_title;
                // date
                var created_date = r_india[i].created_on;
                // $("#idBreakingNews_newsview").attr("href", href);
                $("#india_img" + i + "").attr("src", imgpath);
                $("#india_title" + i + "").text(cover_title);
            }
            for (var i = 0; i < r_kalvi.length; i++) {
                //Corona Virus
                var imgpath = 'uploads/' + r_kalvi[i].id + "/" + r_kalvi[i].cover_image_name;
                var cover_title = r_kalvi[i].cover_title;
                // date
                var created_date = r_kalvi[i].created_on;
                // $("#idBreakingNews_newsview").attr("href", href);
                $("#kalvi_img" + i + "").attr("src", imgpath);
                $("#kalvi_title" + i + "").text(cover_title);
            }


            // tamilnadu_date4
            // tamilnadu_title4
            hidePreloader();
        })
        .catch(error => console.log(error));
}

function showPreloader() {
    $("#preloader").show();
}

function hidePreloader() {
    $("#preloader").hide();
}