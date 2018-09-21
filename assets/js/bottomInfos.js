function updateInfos() {
    let text;

    text = $(".h-content.active .project-infos li:first-of-type em:first-of-type").text();
    if (text) {
        $("#project-link").addClass("italic");
        $("#project-title").html(' - <b>'+text+'</b> - index');
    } else {
        $("#project-link").removeClass("italic");
        $("#project-title").html('');
    }
}