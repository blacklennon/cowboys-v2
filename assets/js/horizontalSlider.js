function toggleBouboule() {
    $(".bouboule").toggleClass("none");
}

function right() {
    let active = $(".h-content.active");
    let right = $(active).next();
    const left = $(active).prev();

    if (!active.length) {
        active = $(".h-content:nth-child(1)");
        right = $(active).next();
        $(".bg-black").toggleClass("left");
        $(active).toggleClass("right none active");
        $(right).toggleClass("none");
        setTimeout(toggleBouboule, 500);
        updateInfos();
    } else {
        if (right.length) {
            const rightHidden = $(right).next();

            toggleBouboule();

            $(right).toggleClass("right active");
            if (rightHidden.length) {
                $(rightHidden).toggleClass("none");
            }
            if (left.length) {
                $(left).toggleClass("none");
            }
            $(active).toggleClass("active left");
            setTimeout(toggleBouboule, 500);
            updateInfos();
        }
    }
}

function left() {
    let active = $(".h-content.active");
    let right = $(active).next();
    const left = $(active).prev();

    if (!active.length) {
        return;
    } else {
        if (left.length) {
            const leftHidden = $(left).prev();

            toggleBouboule();

            $(left).toggleClass("left active");
            if (leftHidden.length) {
                $(leftHidden).toggleClass("none");
            }
            if (right.length) {
                $(right).toggleClass("none");
            }
            $(active).toggleClass("active right");
            setTimeout(toggleBouboule, 500);
            updateInfos();
        } else {
            $(active).toggleClass("right none active");
            $(right).toggleClass("none");
            $(".bg-black").toggleClass("left");
            toggleBouboule();
            updateInfos();
        }
    }
}

$(".click-right").click(right);
$(".click-left").click(left);

$(document).keydown(function (e) {
    e.preventDefault();
    if ($(".contact-container.show").length || $(".manifest-container.show").length) {
        return;
    }
    if (e.key == "ArrowLeft") {
        left();
    } else if (e.key == "ArrowRight") {
        right();
    } else if (e.key == "ArrowUp") {
        up();
    } else if (e.key == "ArrowDown") {
        down();
    }
});