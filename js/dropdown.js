let dcon = document.querySelectorAll('.dropdown-content')
let dact = document.querySelectorAll('.dropdown-activate')
let index = 0;

dcon.forEach(element => {
    toggle(element)
})

// bytter mellom hidden og ikke hidden
function toggle(element) {
    if (element.classList.contains('hidden')) {
        element.classList.remove('hidden')
    } else {
        element.classList.add('hidden')
    }
}

// gjør droppdown greie
dact.forEach(element => {
    let item = index
    element.addEventListener('click', () => {
        let list = dcon[item].classList
        dcon.forEach(e => {
            if (! e.classList.contains('hidden')) {
                e.classList.add('hidden')
            }
        })
        dcon[item].classList = list
        toggle(dcon[item])
    })
    index += 1;
})