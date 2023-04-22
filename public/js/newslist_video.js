var url_data = window.location.href.split("/");

function queryParams(params) {
    params.category_id = url_data[url_data.length - 1];
    return params
}

function btnAction(value, row, index) {
    var embedid = row['cover_title'];
    var myContent = row['content'];
    var content = $(myContent).text().substring(0, 250) + " ...";
    var title = row['cover_title'];
    var data = " <div class='news-list-show'><div class='row'><div class='col-md-12 text-center'><iframe width='100%' height='345' src='https://www.youtube.com/embed/" + embedid + "'></iframe><br><h5>" + myContent + "</h5></div></div></div>";
    return [
        data
    ].join('')
}

$(".cls_video").css({
    "background-color": "#cf1717",
    "border-radius": "5px",
    "color": "white"
});