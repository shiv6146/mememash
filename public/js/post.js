// The "callback" argument is called with either true or false
// depending on whether the image at "url" exists or not.
function imageExists(url, callback) {
    var img = new Image();
    img.onload = function() { callback(true); };
    img.onerror = function() { callback(false); };
    img.src = url;
}

$("#url").bind("input", function(e){
    var $this = $(this);
    imageExists($this.val(), function(exists) {
        if (exists === true) {
            // window.location = "/mash?q=" + encodeURIComponent(imageUrl);
            return true;
        } else {
            alert("Please enter proper image url!!");
            return false;
        }
    });
})


$("#postform").submit(function() {
    // Sample usage
    
});
