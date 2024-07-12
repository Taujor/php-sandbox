
const counterEL = document.querySelector("#counter")
counterEL.addEventListener("mousedown", e => {
    let count = parseInt(e.target.getAttribute("data-count"))

    e.target.setAttribute("data-count", count + 1)

    e.target.innerText = `count is ${count + 1}`
})