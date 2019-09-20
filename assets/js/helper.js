// reaction on scrol event

var scroll = $(window).scrollTop();
$(window).on("scroll", function() {
    if ($(window).scrollTop() >= 80) {

    } else {
        $(".navbar").removeClass("compressed");
        setTimeout(function() {
            $(".navbar").addClass("compressed");
            $("#naslov").css("display", "none");
            $("#hero").css("margin-top", "168px");
        }, 400);
    }
});


//za radno vreme
var newDate = new Date();
var hours = new Date().getHours();
if (hours >= 11 && hours <= 19) {
    console.log("proslopodne");
    $("#r-vreme").html('otvoreno');
} else {
    console.log("prijepodne");
    $("#r-vreme").html('zatvoreno');
    $("#r-vreme").css('background-color', 'red');
}