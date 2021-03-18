function getCourses() {
    var ajax = new XMLHttpRequest();
    var method = "GET";
    var url = "scripts/query.php"
    var asynchronous = true;
    ajax.open(method, url, asynchronous);
    ajax.send();

    ajax.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            var data = JSON.parse(this.responseText);
            console.log(data);

            var html = "";
            for(var i = 0; i < data.length; i++) {
                var courseID = data[i].courseID;
                var courseName = data[i].courseName;

                if(i % 3 === 0) {
                    html+= "<div class=\"container\">";
                    html+= "<div class=\"row\">";
                }
                html += "<div class=\"col-sm\">";
                    html += "<div><a href=\"https://johnnormanross.com/spw/class_hub.php?id="+courseID +"\" class=\"btn btn-primary\">" + courseName +"<br>Course ID: "+ courseID+"</a></div>";
                html += "</div>";
            }
            document.getElementById("courses").innerHTML = html;
        }
    }
}