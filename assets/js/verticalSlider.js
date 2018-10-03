function down() {
    const active = $(".vertical-wrapper .h-content.active .active");
    const next = $(active).next();

    if (next.length && !next.hasClass("project-title")) {
        $(active).toggleClass("active before");
        $(next).toggleClass("active after");
    }
}

function up() {
    const active = $(".vertical-wrapper .h-content.active .active");
    const prev = $(active).prev();

    if (prev.length) {
        $(active).toggleClass("active after");
        $(prev).toggleClass("active before");
    }
}

$(".bouboule.top").click(up);
$(".bouboule.bottom").click(down);