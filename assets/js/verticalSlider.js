function down() {
    const active = $(".vertical-wrapper .active");
    const next = $(active).next();

    if (next.length) {
        $(active).toggleClass("active before");
        $(next).toggleClass("active after");
    }
}

function up() {
    const active = $(".vertical-wrapper .active");
    const prev = $(active).prev();

    if (prev.length) {
        $(active).toggleClass("active after");
        $(prev).toggleClass("active before");
    }
}

$(".bouboule.top").click(up);
$(".bouboule.bottom").click(down);