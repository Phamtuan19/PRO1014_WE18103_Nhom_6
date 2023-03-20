
const baseUrl = 'http://127.0.0.1:8000/api/';

const enpoint = {
    menu: 'submenu/',
}


const service = {
    getMenu() {
        return fetch(baseUrl + enpoint.menu)
    },
}


{/* <li class="menu-child">
<a href="#">Đại sứ thắp lửa</a>
<ul>
    <li><a href="#">Đại sứ thắp lửa Jimmii Nguyễn</a></li>
</ul>
</li> */}

const navBar = document.querySelector('.navbar-menu')
const renderSubMenu = (data) => {
    const menu = [];
    const render = data.map((e) => {
        let categories = []

        if (e.categories.length > 0) {
            e.categories.map((child) => {
                categories = [...categories, ` <li><a href="#">${child.name}</a></li> `]
            })
        } else {
            categories = '';
        }

        return `
            <li class="menu-child" data-id="${e.id}">
                <a href="#">${e.name}</a>
                <ul>
                ${categories}
                </ul>
            </li>
            `
    })

    // console.log(render);
    navBar.innerHTML = render.join('');
}

service.getMenu()
    .then(function (response) {
        return response.json();
    })
    .then(function (data) {
        renderSubMenu(data)
    })
    .catch(function (error) {
        console.log(error);
    })
