function callAPILoading() {
    const loading = document.querySelector(".loading_2");
    const content = document.querySelector(".content");

    loading.classList.remove('d-none')
    console.log(loading);
    console.log('call api loading');

    loading.innerHTML = `
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    `
}

export default callAPILoading;
