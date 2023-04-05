export const validationEmail = (valueItem, erroElement) => {
    const regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (valueItem === '') {
        erroElement.innerText = 'không được để trống email  ';
    } else if (!regex.test(valueItem)) {
        erroElement.innerText = 'Email không đúng định dạng';
    } else {
        erroElement.innerText = '';
    }
};

export const validationPassword = (valueItem, erroElement) => {
    if (valueItem === '') {
        erroElement.innerText = 'không được để trống';
    } else if (valueItem.length < 6) {
        console.log(typeof valueItem);
        erroElement.innerText = 'Mật khẩu phải lớn hơn 6 ký tự';
    } else {
        erroElement.innerText = '';
    }
};

export const validationPasswordAgain = (valueItem, erroElement, valuePassword) => {
    if (valueItem === '') {
        erroElement.innerText = 'không được để trống';
    } else if (valueItem != valuePassword) {
        erroElement.innerText = 'Nhập lại mật khẩu chưa đúng';
    } else {
        erroElement.innerText = '';
    }
};
export const validationName = (valueItem, erroElement) => {
    if (valueItem === '') {
        erroElement.innerText = 'không được để trống name';
    } else {
        erroElement.innerText = '';
    }
};

export const validationNumber = (valueItem, erroElement) => {
    if (valueItem.length === '') {
        erroElement.innerText = 'không được để trống';
    } else {
        erroElement.innerText = '';
    }
};
