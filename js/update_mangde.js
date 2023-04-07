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

function addEvent(element, type) {
    element.addEventListener(type, () => {
        update();
    })
}

function update() {
    let data = {
        string: ""
    }
    let value = []
    field.forEach(element => {
        value.push(element.value)
    })
    data.string = value.join()

    fetch("../js/update_mengde.php", {
        method: "POST", body: JSON.stringify(data), headers: {
            "Content-Type": "application/json; charset=UTF-8"
        }
    })

    let index = 0;
    field.forEach(element => {
        totalPris[index].textContent = element.value * parseInt(priser[index].textContent)
    })
}