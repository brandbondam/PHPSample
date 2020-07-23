<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>

	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}
	</style>
</head>
<body>

<div id="container">
	<h1>PHP7 + Codeigniter3</h1>

	<div id="body">
        <lebel for="getDental">gis server 치과 검색 api</lebel>
		<button id="getDental" name="getDental" onclick="getDental()">
            호출
        </button>
        <div id="getDentalResult" style="height: 100px; overflow-y:scroll;">

        </div>

        <lebel for="postSample">gis server data insert api</lebel>
        <button id="postSample" name="postSample" onclick="postSampledata()">
            호출
        </button>
        <div id="postInsertResult">
        </div>

	</div>

	<p class="footer">Page rendered in <strong>{elapsed_time}</strong> seconds.<?php echo  (ENVIRONMENT === 'development') ?  'CodeIgniter Version <strong>' . CI_VERSION . '</strong>' : '' ?></p>
</div>
<script>
    function getDental(){
        document.getElementById('getDentalResult').innerHTML = "";
        var url = "http://localhost:8000/test2";
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("GET", url, true) //ascync
        xmlHttp.setRequestHeader("Content-Type", "text/json;charset=UTF-8;");
        xmlHttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == this.DONE) {
                var response = JSON.parse(xmlHttp.responseText);
                var html = "<ul>";
                for(let i = 0; i < response.length; i++){
                    html += "<li>" + response[i].name + "</li>";
                }
                html += "</ul>";
                document.getElementById('getDentalResult').innerHTML = html;
            } else {
                document.getElementById('getDentalResult').innerHTML = "...";
            }
        }
        xmlHttp.send();
    }

    function postSampledata(){
        document.getElementById('postInsertResult').innerHTML = "";
        var url = "http://localhost:8000/insertTest";
        var xmlHttp = new XMLHttpRequest();
        xmlHttp.open("POST", url, true) //ascync
        xmlHttp.setRequestHeader("Content-Type", "text/json;charset=UTF-8;");
        xmlHttp.onreadystatechange = function() {
            if (this.status == 200 && this.readyState == this.DONE) {
                document.getElementById('postInsertResult').innerHTML = "데이터 insert 완료";
            } else {
                document.getElementById('postInsertResult').innerHTML = "...";
            }
        }
        xmlHttp.send();
    }



/*    var url = "http://localhost:8000/insertTest";
    var xmlHttp = new XMLHttpRequest();
    xmlHttp.open("POST", url, true) //ascync
    xmlHttp.setRequestHeader("Content-Type", "text/json;charset=UTF-8;");
    xmlHttp.onreadystatechange = function() {
        if (this.status == 200 && this.readyState == this.DONE) {
            console.log(xmlHttp.responseText);
            alert('"'+ url + '" post success');
        }
    }
    xmlHttp.send();*/
</script>
</body>
</html>