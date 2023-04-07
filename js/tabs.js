let tabs = document.querySelectorAll(".tab")
let div = document.querySelectorAll(".tab-con")
let index2 = 0;

fjern()

tabs.forEach(element => {
    let tall = index2;
    element.addEventListener("click", () => {
        fjern()
        div[tall].style.display = "flex"
        element.classList.add("underline")
    })
    index2++;
})

div[0].style.display = "flex"
function fjern() {
    div.forEach(element => {
        element.style.display = "none";
        tabs.forEach(tab => {
            tab.classList.remove("underline")
        })
    })
}

tabs[0].classList.add("underline");