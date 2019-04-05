document.onkeydown = checkKey;

function showLeftTick() {
    $("#m1overlay").animate({
        opacity: 0.7,
        borderBottomRightRadius: "0rem"
    }, 250);

    $("#m1wrapper .collapsed-content").animate({
        maxHeight: "999px",
        opacity: 1,
        borderBottomRightRadius: "7rem"
    }, 250);
}

function showRightTick() {
    $("#m2overlay").animate({
        opacity: 0.7,
        borderBottomRightRadius: "0rem"
    }, 250);

    $("#m2wrapper .collapsed-content").animate({
        maxHeight: "999px",
        opacity: 1,
        borderBottomRightRadius: "7rem"
    }, 250);
}

function checkKey(e) {

    e = e || window.event;

    if (e.keyCode == '37') {
        $.get(window.location.origin + "/api/update_score?m1_id=" + $("#m1").attr("name") + "&m2_id=" + $("#m2").attr("name") + "&win=m1");
        if (window.location.search !== "") {
            window.location = "/mash";
        } else {
            window.location.reload();
        }
        showLeftTick();
    }
    else if (e.keyCode == '39') {
        $.get(window.location.origin + "/api/update_score?m1_id=" + $("#m1").attr("name") + "&m2_id=" + $("#m2").attr("name") + "&win=m2");
        if (window.location.search !== "") {
            window.location = "/mash";
        } else {
            window.location.reload();
        }
        showRightTick();
    }

}