function showHint(str) {
    if (str.length == 0) {
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        };
        xmlhttp.open("POST", "assets/phps/gethint.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("word="+str);
        xmlhttp.send();
    }
}

function showResult(str) {
	if (str.length==0) {
		document.getElementById("livesearch").innerHTML="";
		document.getElementById("livesearch").style.border="0px";
		return;
	}
	if (window.XMLHttpRequest) {
		// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp=new XMLHttpRequest();
	} else {
		// code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("livesearch").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "assets/phps/livesearch.php?q="+str,true);
	xmlhttp.send();
}

function getVote(int) {
	if (window.XMLHttpRequest) {
	// code for IE7+, Firefox, Chrome, Opera, Safari
	xmlhttp=new XMLHttpRequest();
	} else {  // code for IE6, IE5
		xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
	}
		xmlhttp.onreadystatechange=function() {
		if (xmlhttp.readyState==4 && xmlhttp.status==200) {
			document.getElementById("poll").innerHTML=xmlhttp.responseText;
		}
	}
	xmlhttp.open("GET", "assets/phps/poll_vote.php?vote="+int,true);
	xmlhttp.send();
}

function changeContent(value) {
	var xhttp = new XMLHttpRequest();

	xhttp.onreadystatechange = function() {
		if (xhttp.readyState == 4 && xhttp.status == 200) {
			document.getElementById(value).innerHTML = xhttp.responseText;
		}
	};

    xhttp.open("GET", "assets/phps/ajax_info.txt", true);
	xhttp.send();

}
