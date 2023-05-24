let slideIndex = 1;
visShlide(slideIndex)

// flytt slide index med så mye
function bytt(x) {
    visShlide(slideIndex += x)
}

// viser bilde i karusselen
function visShlide(x) {
    let i;
    let bilder = document.getElementsByClassName("slide");
    if (x<1) {
        slideIndex = bilder.length
    }
    if (x> bilder.length) {
        slideIndex = 1;
    }
    for (i = 0; i < bilder.length; i++) {
        bilder[i].style.display = "none";
    }
    bilder[slideIndex-1].style.display = "flex";
}