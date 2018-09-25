function updateInfos() {
    let text;

    text = $(".h-content.active .project-infos li:first-of-type em:first-of-type").text();
    if (text) {
        $("#project-link").addClass("italic");
        $("#project-title").html(' - <b>'+text+'</b> - <a onclick="openIndex()">index</a>');
    } else {
        $("#project-link").removeClass("italic");
        $("#project-title").html('');
    }
}

function openIndex() {
    $(".index").addClass("show");
}

function removeIndex() {
    $(".index").removeClass("show");
}

function openProjects() {
    if (!$(".h-content.active").length) {
        if ($(".contact-container.show").length) {
            showContact();
            setTimeout(right, 500);
        } else if ($(".manifest-container.show").length) {
            showManifest();
            setTimeout(right, 500);
        } else {
            right();
        }
    } else {
        goToPage(0);
        updateInfos();
    }
}

$("#close-index").click(removeIndex);
$("#project-link").click(openProjects);