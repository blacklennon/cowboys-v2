function closeSlider() {
    $(".slider-container").toggleClass("collapsed");
}

function closeLogo() {
    $(".img-container").toggleClass("closed");
}

function showContact() {
    $(".bg-container").toggleClass("collapsed top");
    $(".contact-container").toggleClass("show");
    $("#contact-link").toggleClass("italic");
}

function showManifest() {
    $(".bg-container").toggleClass("collapsed bottom");
    $(".manifest-container").toggleClass("show");
    $(".header").toggleClass("italic");
}

function openContact() {
    if ($(".contact-container.show").length) {
        showContact();
        $(".click-right, .click-left").toggleClass("none");
        if ($(".h-content.active").length) {
            setTimeout(closeLogo, 500);
            setTimeout(closeSlider, 1000);
        }
    } else if ($(".manifest-container.show").length) {
        showManifest();
        showContact();
    } else if ($(".h-content.active").length) {
        $(".click-right, .click-left").toggleClass("none");
        closeSlider()
        setTimeout(closeLogo, 100);
        setTimeout(showContact, 500);
    } else {
        $(".click-right, .click-left").toggleClass("none");
        showContact();
    }
}

function openManifest() {
    if ($(".manifest-container.show").length) {
        showManifest();
        $(".click-right, .click-left").toggleClass("none");
        if ($(".h-content.active").length) {
            setTimeout(closeLogo, 500);
            setTimeout(closeSlider, 1000);
        }
    } else if ($(".contact-container.show").length) {
        showContact();
        showManifest();
    } else if ($(".h-content.active").length) {
        $(".click-right, .click-left").toggleClass("none");
        closeSlider()
        setTimeout(closeLogo, 100);
        setTimeout(showManifest, 500);
    } else {
        $(".click-right, .click-left").toggleClass("none");
        showManifest();
    }
}

$(".header p").click(openManifest);
$("#contact-link").click(openContact);