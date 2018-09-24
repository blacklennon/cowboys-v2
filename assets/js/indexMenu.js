function fillIndex() {
    let titles = [];
    let str = '';
    let contentId = 0;

    $(".h-content .project-infos li:first-of-type em:first-of-type").each(function() {
        titles.push($(this).text());
    });
    
    titles.forEach(function(title) {
        contentId++;
        str += `<li onclick="goToPage(${contentId})">${title}</li>`;
    });

    $(".index ul").html(str);
}

function goToPage(id) {
    let to = $(`#content-${id}`);

    removeIndex();

    if (to.hasClass("active")) {
        return;
    }
    if (id == 0) {
        $(".h-content").removeClass("active left");
        $(".h-content").addClass("right none");
        $(".bouboule").addClass("none");
        $(".bg-black").removeClass("left");
    }
    to.removeClass("left right none");
    to.addClass("active");
    if (to.next().length) {
        to.next().removeClass("active left right none");
        to.next().addClass("right");
        to = to.next();
    }
    while (to.next().length) {
        to.next().removeClass("active left right none");
        to.next().addClass("right none");
        to = to.next();
    }
    to = $(`#content-${id}`);
    if (to.prev().length) {
        to.prev().removeClass("active left right none");
        to.prev().addClass("left");
        to = to.prev();
    }
    while (to.prev().length) {
        to.prev().removeClass("active left right none");
        to.prev().addClass("left none");
        to = to.prev();
    }
    updateInfos();
}

$(document).ready(fillIndex);