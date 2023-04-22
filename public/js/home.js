window.onload = function () {
    axios.get(`${baseURL}/home/getAllData`)  
        .then(response => {
            $(".cls_home").css({"background-color": "#cf1717", "border-radius": "5px","color": "white"});
            var r_bn = response.data.rows_breakingnews; // breaking news
            var r_cv = response.data.rows_science; // science
            var r_e = response.data.rows_soceity; // economic
            var r_w = response.data.rows_education; // education  
            var r_p = response.data.row_article; // article
            var r_interview = response.data.row_interview; // interview   
            var r_kalvi = response.data.row_kalvi; //education
            var r_tn = response.data.row_tamilnadu; // tamilnadu
            var r_tech = response.data.row_technology; // technology
            var r_sports = response.data.row_sports; // sports
            var r_thr = response.data.row_thr; // thr
            var r_gallery = response.data.row_gallery; // gallery
            var r_tw = response.data.row_trending_weekly; // tw

            // breaking news statrt
            // for(var i=r_bn.length; i>0; i--) {
            var marquee = "";
            for (var i = (r_bn.length - 1); i >= 0; i--) {
                marquee += r_bn[i].cover_title + ". ";
                $("#idmarquee").text(marquee);
                var imgpath = `${baseURL}/uploads/` + r_bn[i].grpid + "/" + r_bn[i].cover_image_name;
                var cover_title = r_bn[i].cover_title;
                // date
                var created_date = r_bn[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                //Breaking News
                var href = `${baseURL}/Newsview/news/` + r_bn[i].id;
                $("#idBreakingNews_newsview" + i + "").attr("href", href);
                $("#idBreakingNews_img" + i + "").attr("src", imgpath);
                // $("#breakingnews_title" + i + "").text(cover_title);
                $("#idBreakingNews_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var covertitle = cover_title;
                }
                $("#breakingnews_title" + i + "").html(covertitle);
            }
            for (var i = (r_cv.length - 1); i >= 0; i--) {
                //science
                var imgpath = `${baseURL}/uploads/` + r_cv[i].grpid + "/" + r_cv[i].cover_image_name;
                var cover_title = r_cv[i].cover_title;
                // date
                var created_date = r_cv[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_cv[i].id;
                $("#idScience_newsview" + i + "").attr("href", href);
                $("#idScience_img" + i + "").attr("src", imgpath);
                // $("#coronavirus_title" + i + "").text(cover_title);
                $("#idScience_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var covertitle = cover_title;
                }
                $("#science_title" + i + "").html(covertitle);
            }
            for (var i = (r_e.length - 1); i >= 0; i--) {
                //Society
                var imgpath = `${baseURL}/uploads/` + r_e[i].grpid + "/" + r_e[i].cover_image_name;
                var cover_title = r_e[i].cover_title;
                // date
                var created_date = r_e[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_e[i].id;
                $("#idSocial_newsview" + i + "").attr("href", href);
                $("#idSocial_img" + i + "").attr("src", imgpath);
                // $("#economic_title" + i + "").text(cover_title);
                $("#idSocial_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var covertitle = cover_title;
                }
                $("#social_title" + i + "").html(covertitle);
            }
            for (var i = (r_w.length - 1); i >= 0; i--) {
                //education
                var imgpath = `${baseURL}/uploads/` + r_w[i].grpid + "/" + r_w[i].cover_image_name;
                var cover_title = r_w[i].cover_title;
                // date
                var created_date = r_w[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_w[i].id;
                $("#kalvi_href" + i + "").attr("href", href);
                $("#kalvi_img" + i + "").attr("src", imgpath);
                // $("#world_title" + i + "").text(cover_title);
                $("#idedu_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var covertitle = cover_title;
                }
                $("#kalvi_title" + i + "").html(covertitle);
            }
            for (var i = (r_p.length - 1); i >= 0; i--) {
                //article
                var imgpath = `${baseURL}/uploads/` + r_p[i].grpid + "/" + r_p[i].cover_image_name;
                var cover_title = r_p[i].cover_title;
                // date
                var created_date = r_p[i].updated_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_p[i].id;
                $("#idArticles_href" + i + "").attr("href", href);
                $("#idArticles_img" + i + "").attr("src", imgpath);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#idarticles_title" + i + "").html(covertitle );
                $("#article_date" + i + "").text(date);
            }
            for (var i = (r_interview.length - 1); i >= 0; i--) {
                //interview
                var imgpath = `${baseURL}/uploads/` + r_interview[i].grpid + "/" + r_interview[i].cover_image_name;
                var cover_title = r_interview[i].cover_title;
                // date
                var created_date = r_interview[i].updated_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_interview[i].id;
                $("#idInterview_href" + i + "").attr("href", href);
                $("#idInterview_img" + i + "").attr("src", imgpath);
                // $("#india_title" + i + "").text(cover_title);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#interview_title" + i + "").html(covertitle);
                $("#interview_date" + i + "").text(date);
            }
            for (var i = (r_kalvi.length - 1); i >= 0; i--) {
                //Corona Virus
                var imgpath = `${baseURL}/uploads/` + r_kalvi[i].grpid + "/" + r_kalvi[i].cover_image_name;
                var cover_title = r_kalvi[i].cover_title;
                // date
                var created_date = r_kalvi[i].created_on;
                var href = `${baseURL}/Newsview/news/` + r_kalvi[i].id;
                $("#kalvi_href" + i + "").attr("href", href);
                $("#kalvi_img" + i + "").attr("src", imgpath);
                // $("#kalvi_title" + i + "").text(cover_title);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#kalvi_title" + i + "").html(covertitle );
            }
            for (var i = (r_tn.length - 1); i >= 0; i--) {
                //Corona Virus
                var imgpath = `${baseURL}/uploads/` + r_tn[i].grpid + "/" + r_tn[i].cover_image_name;
                var cover_title = r_tn[i].cover_title;
                // date
                var created_date = r_tn[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_tn[i].id;
                $("#tamilnadu_href" + i + "").attr("href", href);
                $("#tamilnadu_img" + i + "").attr("src", imgpath);
                // $("#tamilnadu_title" + i + "").text(cover_title);
                $("#tamilnadu_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#tamilnadu_title" + i + "").html(covertitle );
            }

            for (var i = (r_tech.length - 1); i >= 0; i--) {
                //techonolgy
                var imgpath = `${baseURL}/uploads/` + r_tech[i].grpid + "/" + r_tech[i].cover_image_name;
                var cover_title = r_tech[i].cover_title;
                // date
                var created_date = r_tech[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_tech[i].id;
                $("#technology_href" + i + "").attr("href", href);
                $("#tech_img" + i + "").attr("src", imgpath);
                // $("#tech_title" + i + "").text(cover_title);
                $("#tech_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#tech_title" + i + "").html(covertitle );
            }
            for (var i = (r_gallery.length - 1); i >= 0; i--) {
                //children
                var imgpath = `${baseURL}/uploads/` + r_gallery[i].grpid + "/" + r_gallery[i].cover_image_name;
                var cover_title = r_gallery[i].cover_title;
                // date
                var created_date = r_gallery[i].updated_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_gallery[i].id;
                $("#idchild_href" + i + "").attr("href", href);
                $("#idchild_img" + i + "").attr("src", imgpath);
                // $("#gallery_title" + i + "").text(cover_title);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#child_title" + i + "").html(covertitle );
                $("#child_date" + i + "").text(date);
            }


            for (var i = (r_sports.length - 1); i >= 0; i--) {
                //Corona Virus
                var imgpath = `${baseURL}/uploads/` + r_sports[i].grpid + "/" + r_sports[i].cover_image_name;
                var cover_title = r_sports[i].cover_title;
                // date
                var created_date = r_sports[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_sports[i].id;
                $("#sports_href" + i + "").attr("href", href);
                $("#sports_img" + i + "").attr("src", imgpath);
                // $("#sports_title" + i + "").text(cover_title);
                $("#sports_date" + i + "").text(date);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#sports_title" + i + "").html(covertitle );
            }

            for (var i = (r_thr.length - 1); i >= 0; i--) {
                //Corona Virus
                var imgpath = `${baseURL}/uploads/` + r_thr[i].grpid + "/" + r_thr[i].cover_image_name;
                var cover_title = r_thr[i].cover_title;
                // date
                var created_date = r_thr[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_thr[i].id;
                $("#thiraivimarsanam_href" + i + "").attr("href", href);
                $("#thr_img" + i + "").attr("src", imgpath);
                // $("#thr_title" + i + "").text(cover_title);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0,100) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#thr_title" + i + "").html(covertitle );
            }

            for (var i = (r_tw.length - 1); i >= 0; i--) {
                //Corona Virus
                var imgpath = `${baseURL}/uploads/` + r_tw[i].grpid + "/" + r_tw[i].cover_image_name;
                var cover_title = r_tw[i].cover_title;
                // date
                var created_date = r_tw[i].created_on;
                var date_field = created_date.split(" ");
                var d = date_field[0].split("-");
                var date = d[2] + '/' + d[1] + '/' + d[0];
                var href = `${baseURL}/Newsview/news/` + r_tw[i].id;
                $("#tw_href" + i + "").attr("href", href);
                $("#tw_img" + i + "").attr("src", imgpath);
                // $("#gallery_title" + i + "").text(cover_title);
                var length = cover_title.length;
                if (length > 100) {
                    var covertitle = cover_title.substring(0, 75) + "...";
                } else {
                    var sampletext = "NewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizensfNewTrumporderexcludingnoncitizensfromcensuscouldcostcitizens";
                    var restfill = 74 -  parseInt(length);
                    var restdata = sampletext.substring(0, restfill);
                    var covertitle = cover_title;
                }
                $("#tw_title" + i + "").html(covertitle + '<s   pan style="visibility: hidden;">' + restdata + '</s>');
            }
            $("#preloader").hide();
            $(".body_content").show();

        })
        .catch(error => console.log(error));
}