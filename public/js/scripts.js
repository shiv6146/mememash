document.onkeydown = checkKey;

function checkKey(e) {

    e = e || window.event;

    if (e.keyCode == '37') {
       window.location = "/post";
    }
    else if (e.keyCode == '39') {
       window.location = "/mash";
    }

}