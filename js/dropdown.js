let dcon = document.querySelectorAll('.dropdown-content')
let dact = document.querySelectorAll('.dropdown-activate')
let index = 0;
dcon.forEach(element => {
    toggle(element)
})

function toggle(element) {
    if(element.classList.contains('hidden')) {
        element.classList.remove('hidden')
    } else {
        element.classList.add('hidden')
    }
}

dact.forEach(element => {
    element.addEventListener('click', () => {
        toggle(dcon[index])
    })
    index++;
})