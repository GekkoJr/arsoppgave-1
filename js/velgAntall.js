let number = document.querySelectorAll('.numberDisplay');
let pluss = document.querySelectorAll('.pluss');
let minus = document.querySelectorAll('.minus');
let index = 0;
number.forEach( element => {
    pluss[index].addEventListener("click",() =>{
        element.value = parseInt(element.value) + 1;
    })
    minus[index].addEventListener("click",() =>{
        element.value = element.value - 1;
        if (element.value < 1) {
            element.value = 1;
        }
    })
    element.addEventListener("change", () =>{
        if(parseInt(element.value) < 1 || element.value === ""){
            element.value = 1;
        }
    })
})