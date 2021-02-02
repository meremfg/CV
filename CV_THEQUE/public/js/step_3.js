function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#user_img').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}
$("#exporter").click(function (e){
    var c = $(".colorpicker.active"),
        ci = $(c).data("id");

    e.preventDefault();
    window.location.href="exporter/"+ci;
});


$("#user_image").change(function(){
    readURL(this);
});

function setThumbnailWrapperHeight() {
    $(".which_cv_template").height($(".image-holder img").height()), $(".image-holder").height($(".image-holder img").height())
}

$(document).ready(function() {

    if ($(".which_cv_template.active").length > 0) {
        var e = $(".which_cv_template.active .colorpicker.active"),
            a = $(e).data("id"),
            t = ($(e).parents("li").find(".template").data("cv"), $(e).parents("li").find(".title").html()),
            l = ($(e).parents("li").find(".template img").attr("src"), $(e).parents("li").find(".template").data("price"), $(e).data("hex")),
            i = $(e).data("color");
        if ($("#selected_cv").val(a), $(e).addClass("active"),$(".image-holder img").attr('src',"/storage/CV/"+ $(".colorpicker.active").data("id").replace("_","/")+".jpg"), $(".input-selected-cv").val(a), $(".colorpicker").parents("li").find(".template").css("borderColor", "#ffffff"), $(e).parents("li").find(".template").css("borderColor", l), $("span.cv-color").text(i), $("span.cv-id").text(t), $(".ajax_loader").hide(), $("button#pay").prop("disabled", !1), $(".disabled-overlay").hide(), $(".payment-options").css("opacity", "1"), $(".form-footer").show(), $("html").css({
            height: "auto"
        }), 1 == scrollToPayment && $("html,body").animate({
            scrollTop: $(".form-footer").offset().top
        }, 1e3), 1 == executeTemplatePolling) setInterval(function() {
            !$(".template").hasClass("thumb-loaded").length > 0 && $(".selected-template").hasClass("selected-thumb-loaded") && pollPDFThumnails()
        }, 700)
    }
    setTimeout(function() {
        var e = new Image;
        e.src = $(".image-holder img").attr("src"), e.onload = function() {
            setThumbnailWrapperHeight(), setTimeout(function() {
                $("#form form#step_3 ul.select-cv .template:not(.thumb-loaded) .loader").each(function() {
                    $(this).fadeIn(350)
                })
            }, 200)
        }
    }, 100)
}), $(window).resize(function() {
    $(".which_cv_template").height($(".image-holder img").height()), $(".image-holder").height($(".image-holder img").height())
}), $("li.which_cv_template").mouseout(function() {
    $(this).find(".thumb-loaded").length && ($(this).find(".controller").css({
        "z-index": "9"
    }), $(this).find(".cv-color-picker").css({
        opacity: 0,
        top: "-10000px"
    }), $(this).find(".hover").css({
        opacity: 0
    }), $(this).find(".hover").removeClass("active"))
}).mouseover(function() {
    $(this).find(".thumb-loaded").length && ($(this).find(".controller").css({
        "z-index": "9999"
    }), $(this).find(".cv-color-picker").css({
        opacity: 1,
        top: "0px"
    }), $(this).find(".hover").css({
        opacity: "1"
    }), $(this).find(".hover").addClass("active")),
        $(".image-holder img").attr('src',"/storage/CV/"+ $(".colorpicker.active").data("id").replace("_","/")+".jpg")
}), $(document).ajaxStart(function() {
    $(".payment-options").css("opacity", "0.5")
}).ajaxStop(function() {});
var times = 0;



function pollPDFThumnails() {
    setTimeout(function() {
        var e = "";
        $(".which_cv_template").each(function() {
            var a = $(this).find(".template").data("layout-id");
            $("#layout_id_" + a).hasClass("thumb-loaded") || "" == a || (e = e + "," + a)
        }), "" != e ? $.ajax({
            url: "/inc/ajax/getGeneratedPDFThumbnail.php",
            data: {
                layout_ids: e,
                color_id: select_color
            },
            type: "POST",
            dataType: "json",
            success: function(e) {
                setTimeout(function() {
                    $.each(e, function(a, t) {
                        layout_id = e[a].layout_id, 0 == e[a].small || ($(".payment-options").css("opacity", "1"), $(".template_" + layout_id + " .image-holder").html('<img style="display:none;" src="' + e[a].small + '" /><i class="hover"></i>'), $(".template_" + layout_id + " .image-holder img").fadeIn(300), $(".template_" + layout_id).css("opacity", "1"), $(".loader_" + layout_id).hide(), $("#layout_id_" + layout_id).addClass("thumb-loaded"), $("#layout_id_" + layout_id).parents("li").find(".colorpicker").first().data("thumb", e[a].small), $(".controller").show(), console.log("select color " + select_color + "color" + e[a].color), selected_template > 0 && e[a].template == selected_template && e[a].color == select_color && ($("img.chosen-cv").attr("src", e[a].small), $(".selected-template img.chosen-cv").remove(), $(".selected-template").addClass("selected-thumb-loaded"), $(".selected-template").append('<img style="display:none;" src="' + e[a].small + '" alt="Layout" class="chosen-cv imagezoom" />'), $(".selected-template img.chosen-cv").fadeIn(300), $(".ajax_template_loader").hide()))
                    })
                }, 150)
            }
        }) : $(document.body).addClass("step-3-thumbs-loaded")
    }, 400)
}

function loadSelectedTemplate(e, a) {
    var t = e,
        l = ($('[data-cv="' + t + '"]'), $('[data-cv="' + t + '"] img'));
    e = a;
    window.onload = function() {
        var e = $(".colorpicker.active").data("color");
        $(".selected-template img.chosen-cv").remove(), l.attr("src", "/assets/images/cvs_png/" + t + "/" + t + "-" + e + "-md.png"), $(".selected-template").append('<img src="/assets/images/cvs_png/' + t + "/" + t + "-" + e + '-md.png" alt="Layout" class="chosen-cv imagezoom"></a>'), $(".ajax_loader").hide(), $("button#pay").prop("disabled", !1), $(".disabled-overlay").hide(), $(".selected-template").css("opacity", "1"), $(".payment-options").css("opacity", "1")
    }
}

function selectTemplate(e, a) {
    var t = e,
        l = $('[data-cv="' + t + '"] img');
    e = a;
    $(".select-cv li").removeClass("active"), $(".select-cv .controller ul").hide(), $(".colorpicker").removeClass("active"), $(".select-cv li").find(".template").css("borderColor", "#ffffff"), $(l).parents("li").addClass("active"), $(l).parents("li").find(".controller ul").fadeIn(450), $(l).parents("li").find(".template").css("borderColor", "#e1e1e1"), $(".colorpicker").removeClass("active");
    var i = $('[data-id="' + e + '"]'),
        o = e,
        r = $(i).parents("li").find(".title").html(),
        s = $(i).parents("li").find(".template img").attr("src"),
        d = ($(i).parents("li").find(".template").data("price"), $(i).data("hex")),
        c = $(i).data("color");
    $("#selected_cv").val(o), $(i).addClass("active"), $(".input-selected-cv").val(o), $(i).parents("li").find(".template").css("borderColor", d), $("span.cv-color").text(c), $("span.cv-id").text(r), $("img.chosen-cv").attr("src", s)
}

function validate(e, a) {
    if ($("form").addClass("validated"), $(".price-holder-free").length) return !0;
    if ($("li.paypal.active").length) return !0;
    if ($("li.ideal.active").length) return $("select#ideal_issuer").val() ? ($("select#ideal_issuer").removeClass("error"), !0) : ($("select#ideal_issuer").addClass("error"), e.preventDefault(), !1);
    if ($("li.creditcard.active").length) {
        var t = !0,
            l = 0;
        return $("#creditcard input.raw, #creditcard select.raw").each(function() {
            $(this).val() ? ($(this).removeClass("error"), $(this).parent().find(".error-container").hide()) : ($(this).addClass("error"), 0 != l || $("form").hasClass("error-container-showed") || ($("form").addClass("error-container-showed"), $(this).parent().find(".error-container").fadeIn(200)), l++, t = !1)
        }), !!t || (e.preventDefault(), !1)
    }
}
$(document).on("click", ".layout_link", function(e) {
    e.preventDefault()
}), $(document).on("click touchstart", ".colorpicker", function(e) {
    var a = $(this),
        t = $(a).data("id"),
        l = $(a).data("layout-id"),
        i = $(a).data("thumb");
    "" !== $(a).data("thumb") ? ($(".template_" + l + " .image-holder").html('<img src="' + i + '" /><i class="hover"></i>'), $("img.chosen-cv").attr("src", i), $(".ajax_template_loader").hide(), $(".selected-template img.chosen-cv").remove(), $(".selected-template").addClass("selected-thumb-loaded"), $(".selected-template").append('<img src="' + i + '" alt="Layout" class="chosen-cv imagezoom" />')) : (setTimeout(function() {
        $(".loader_" + l).fadeIn(350)
    }, 400), $(".ajax_template_loader").show(), setTimeout(function() {
        $.ajax({
            url: "/inc/ajax/getThumbnailForPDF.php",
            data: {
                color_id: t
            },
            type: "post",
            dataType: "json",
            success: function(e) {
               // i = e.small, $(".payment-options").css("opacity", "1"), $(".template_" + l + " .image-holder").html('<img style="display:none;" src="' + e.small + '" /><i class="hover"></i>'), $(".template_" + l).css("opacity", "1"), $(".loader_" + l).hide(), $(".ajax_template_loader").hide(), $("#layout_id_" + l).addClass("thumb-loaded"), $(a).data("thumb", e.small), $("img.chosen-cv").attr("src", e.small), $(".selected-template img.chosen-cv").remove(), $(".selected-template").addClass("selected-thumb-loaded"), $(".template_" + l + " .image-holder img").fadeIn(300), $(".selected-template").append('<img style="display:none;" src="' + e.small + '" alt="Layout" class="chosen-cv imagezoom" />'), $(".selected-template img.chosen-cv").fadeIn(300), $(a).parents("li").find(".disable").hide()
            }
        })
    }, 100)), $(".colorpicker").removeClass("active"), $(".select-cv li").removeClass("active"), $(this).parent().parent().parent().parent().addClass("active");
    var o = $(a).data("id"),
        r = ($(a).parents("li").find(".template").data("cv"), $(a).parents("li").find(".title").html()),
        s = ($(a).parents("li").find(".template img").attr("src"), $(a).parents("li").find(".template").data("price"), $(a).data("hex")),
        d = $(a).data("color");
    $("#selected_cv").val(o), $(a).addClass("active"), $(".input-selected-cv").val(o), $(".colorpicker").parents("li").find(".template").css("borderColor", "#ffffff"), $(".colorpicker").parents("li").find(".cv-color-picker").css("opacity", 0), $(a).parents("li").find(".template").css("borderColor", s), $("span.cv-color").text(d), $("span.cv-id").text(r), $(".ajax_loader").hide(), $(".form-footer").show(), $("html").css({
        height: "auto"
    }), $("html, body").animate({
        scrollTop: $(".form-footer").offset().top
    }, 450), $(".controller").css({
        zIndex: 9
    }), $(".controller .cv-color-picker").css({
        top: "-10000px",
        opacity: 0
    }), $(".chosen-cv").focus()
}), $(document).on("click change", function(e) {
    $(".hover").is(":visible") || ($("li.which_cv_template").find(".controller").css({
        "z-index": "9"
    }), $("li.which_cv_template").find(".cv-color-picker").css({
        opacity: "0",
        top: "-10000px"
    }), $("li.which_cv_template").find(".hover").css({
        opacity: "0"
    }))
});

