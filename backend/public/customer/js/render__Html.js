export const renderSubMenu = (data) => {
    const navBar = document.querySelector('.navbar-menu')
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

export function productsItem(data, element) {

    const html = data.map(e => {
        // console.log();
        return `
        <div class="item-child">
            <div class="item-img">
                <img src="${e.image_url}"
                    alt="" width="100%" height="280px"/>
            </div>
            <div class="item-name">
                <h4>${e.name}</h4>
            </div>
            <div class="item-author">
                <a href="#">${e.author_name}</a>
            </div>
            <div class="item-price">
                <div class="discount">
                    <span>${e.price}</span>
                    <p>${e.promotion_price}</p>
                </div>
            </div>
        </div>
        `
    })

    element.innerHTML = html.join('')
}
