
import { renderSubMenu } from './render__Html.js';
import { service } from './service.js';

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
