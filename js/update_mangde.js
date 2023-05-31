let field = document.querySelectorAll(".numberDisplay")
let plussMinus = document.querySelectorAll(".pluss, .minus")
let priser = document.querySelectorAll(".pris")
let totalPris = document.querySelectorAll(".totPris")
field.forEach(element => {
    addEvent(element, "change")
})

plussMinus.forEach(element => {
    addEvent(element, "click")
})
// legger til eventlistner til element
function addEvent(element, type) {
    element.addEventListener(type, () => {
        update();
        pris();
    })
}



// når mengden i handlekurven endre seg
function update() {
    // datan som skal sender begynner tom
    let data = {
        string: ""
    }
    let value = []
    // dytter alle verdier inn i value
    field.forEach(element => {
        value.push(element.value)
    })
    // gjør value til string og legger det i data objektet.
    data.string = value.join()
    console.log(data.string);

    // bruker fetch for å sende det til php (api style)
    fetch("../js/update_mengde.php", {
        method: "POST", body: JSON.stringify(data), headers: {
            "Content-Type": "application/json; charset=UTF-8"
        }
    })

    let index = 0;
    field.forEach(element => {
        totalPris[index].textContent = element.value * parseInt(priser[index].textContent)
        index++;
    })
}

 let sumPris = 0;
function pris() {
    totalPris.forEach(element => {
        sumPris += parseInt(element.textContent)

    })
    document.getElementById("totalpris").textContent = sumPris;
    sumPris = 0;
}

update();
pris();