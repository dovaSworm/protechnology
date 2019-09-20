$(function() {

    var date = new Date();
    var year = date.getFullYear();
    console.log(year);
    document.getElementById('prava').innerHTML = "<small>Copyright &copy; RDdesign " + year + ". All Rights Reserved</small>";

    var shrinkNavbar = function() {
        setTimeout(function() {
            $(".navbar").addClass("compressed");
            $("#naslov").css({ "transition": "all 1.9s", "margin-bottom": "0px", "margin-top": "-280px" });
            setTimeout(function() {
                $(".navbar").addClass("compressed");
                $("#naslov").css("display", "none");
                $(".navbar h6").css({ "display": "block", "margin-top": "10px", "margin-right": "71px", "color": "rgb(47, 187, 230)" });
            }, 1200);
        }, 3400);
    }

    function loadCounter() {
        if (typeof(Storage) !== "undefined") {
            if (sessionStorage.loadCounter) {
                sessionStorage.loadCounter = Number(sessionStorage.loadCounter) + 1;
            } else {
                sessionStorage.loadCounter = 1;
            }
        } else {
            return;
        }
    }
    loadCounter();
    console.log(sessionStorage.loadCounter);
    if (sessionStorage.loadCounter > 1) {
        $("#naslov").remove();
        $(".navbar").addClass("compressed");
        $(".navbar h6").css({ "display": "block", "margin-top": "10px", "margin-right": "71px", "color": "rgb(47, 187, 230)" });

    } else {
        var naslov = '<div class="container" id="naslov"><h1 class="text-center w-100">PRO-TECHNOLOGY Electronics</h1><p class="text-center">Vam nudi opremu, sisteme, ESD odeću i podove za elektronsku proizvodnju i servis elektronike</p></div>';
        $("#zaNaslov").append(naslov);
        shrinkNavbar();

    }

    // DEVICE > 767px --------------------------------------------------------------------
    if ($(window).width() > 767 && $(window).width() < 1023) {
        $("div.product-card").addClass("col-md-5");
        $("#carouselExampleIndicators").css("height", "45vh!importatnt");
    }
    var marginaPartner = 10;
    var brPartnera = 4;

    //  767px > DEVICE > 321px -----------------------------------------------------------
    if ($(window).width() <= 768 && $(window).width() >= 320) {
        marginaPartner = 3;
        brPartnera = 2;
        $(".col-sm-12#img-sm-center").addClass("text-center");
    }
    if ($(window).width() <= 1200) {
        $(".navbar h6").css({ "display": "block", "margin-top": "10px", "margin-right": "0px", "color": "rgb(47, 187, 230)", "font-size": "1rem" });
    }

    if ($(window).width() >= 892) {
        $("#menu-ul li").mouseover(function() {
            $("span", $(this)).css("visibility", "visible");
        });
        $("#menu-ul li").mouseleave(function() {
            $("span", $(this)).css("visibility", "hidden");
        });
    }

    $('div.navbar-collapse ul li a').click(function() {
        $('div.navbar-collapse').removeClass("show");
    });


    //  toggler
    var clickCount = 0;
    $("button#triangle-up").click(function() {

        $(this).attr("id", "triangle-down");
        clickCount++;
        console.log(clickCount);
        $("span.navbar-toggler-icon").css("margin-top", "-80px");
        if (clickCount % 2 == 0) {
            $("button#triangle-down").attr("id", "triangle-up");
            console.log("usao");
            $("span.navbar-toggler-icon").css("margin-top", "12px");
        }
    });


    console.log(document.title);

    // EFFECTS navbar    --------------------------------------------------------------------
    if (document.title === "Protechnology Electronics") {
        $(".nav-link:contains('Početna')").addClass('aktivna');
    }
    if (document.title === "Products") {
        $(".nav-link:contains('Proizvodi')").addClass('aktivna');
    }

    // EFFECTS menu    --------------------------------------------------------------------
    $('.product-card').mouseover(function() {
        $("img", $(this)).css({ "transition": "0.6s", "padding": "0", "opacity": "1", "transform": "rotate(5deg)", "-ms-transform": "rotate(5deg)", "-webkit-transform": "rotate(5deg)" });
        $(this).addClass("myshadowsmall");

    });
    $('.product-card').mouseleave(function() {
        $("img", $(this)).css({ "padding": "6px", "opacity": "0.67", "transform": "none", "-ms-transform": "none", "-webkit-transform": "none" });
        $(this).removeClass("myshadowsmall");
    });

    // carousel partners
    var owl = $('.owl-carousel');
    owl.owlCarousel({
        items: brPartnera,
        loop: true,
        margin: marginaPartner,
        autoplay: true,
        autoplayTimeout: 1900,
        autoplayHoverPause: true
    });
    $('.play').on('click', function() {
        owl.trigger('play.owl.autoplay', [1000])
    });
    $('.stop').on('click', function() {
        owl.trigger('stop.owl.autoplay')
    });
    if ($('#adminovo').val() != 3) {
        $('#testovni').css("display", "none");
    } else {
        $(".navbar h6").css("display", "none");
    }

});