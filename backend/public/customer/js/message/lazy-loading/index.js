
function windowLoading () {
    const loading_1 = document.querySelector(".loading_1");
    const content = document.querySelector(".content");

    loading_1.innerHTML = `
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    `

    setTimeout(() => {
        loading_1.classList.add("d-none")
        content.classList.remove("d-none")
    }, 2000);

}

export default windowLoading;
