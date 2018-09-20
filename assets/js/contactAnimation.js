function closeSlider() {
    $(".slider-container").toggleClass("collapsed");
}

function closeLogo() {
    $(".img-container").toggleClass("closed");
}

function showContact() {
    $(".bg-container").toggleClass("collapsed top");
    $(".contact-container").toggleClass("show");
}

function showManifest() {
    $(".bg-container").toggleClass("collapsed bottom");
    $(".manifest-container").toggleClass("show");
}

function openContact() {
    if ($(".contact-container.show").length) {
        showContact();
        if ($(".h-content.active").length) {
            setTimeout(closeLogo, 500);
            setTimeout(closeSlider, 1000);
        }
    } else if ($(".manifest-container.show").length) {
        showManifest();
        showContact();
    } else if ($(".h-content.active").length) {
        closeSlider()
        setTimeout(closeLogo, 100);
        setTimeout(showContact, 500);
    } else {
        showContact();
    }
}

function openManifest() {
    if ($(".manifest-container.show").length) {
        showManifest();
        if ($(".h-content.active").length) {
            setTimeout(closeLogo, 500);
            setTimeout(closeSlider, 1000);
        }
    } else if ($(".contact-container.show").length) {
        showContact();
        showManifest();
    } else if ($(".h-content.active").length) {
        closeSlider()
        setTimeout(closeLogo, 100);
        setTimeout(showManifest, 500);
    } else {
        showManifest();
    }
}

$(".header p").click(openManifest);
$("#contact-link").click(openContact);