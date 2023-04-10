function validation(array = [], element, attribute = '') {
    if (!Array.isArray(array) || array.length === 0 || array === undefined) {
        console.error("Đối số truyền vào không hợp lệ! Đối số phải là Array và có giữ liệu");
    }

    let isValidation = true;
    for (let i = 0; i < array.length && isValidation === true; i++) {
        const ruleName = array[i];
        if (ruleName.includes("|")) {
            if ((ruleName.split("|").length - 1) === 1) {
                const ruleNameArr = ruleName.split("|")
                if (rules[ruleNameArr[0]](element, Number(ruleNameArr[1]), attribute) === true) {
                    isValidation = true
                } else {
                    isValidation = false
                }
            } else {
                console.error(`Phương thức: ${ruleName} không tồn tại`);
            }
        } else {
            if (!rules[ruleName]) {
                console.error("Phương thức không tồn tại");
            } else {
                if (rules[ruleName](element, attribute) === true) {
                    isValidation = true
                } else {
                    isValidation = false
                }
            }
        }
    }

    return isValidation;
}

const rules = {
    required(element, attribute = '') {
        const value = element.value.trim();
        if(element.type === "radio"){
            if (element.checked) {
                return true;
            }else {
                return false;
            }
        }else {
            if (value === '') {
                element.nextElementSibling.innerText = `${attribute} Không được để trống`;
                return false;
            } else {
                element.nextElementSibling.innerText = '';
                return true;
            }
        }
    },
    email(element, attribute = '') {
        const value = element.value.trim();
        const regex = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|.(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/

        if (value.match(regex)) {
            element.nextElementSibling.innerText = '';
            return true;
        } else {
            element.nextElementSibling.innerText = `${attribute} Không đúng định dạng`;
            return false;
        }
    },
    phone(element, attribute = '') {
        console.log(element.value);
        const value = element.value.trim();
        const regex = /(((\+|)84)|0)(3|5|7|8|9)+([0-9]{8})\b/

        if (value.match(regex)) {
            element.nextElementSibling.innerText = '';
            return true;
        } else {
            element.nextElementSibling.innerText = `${attribute} Không đúng định dạng`;
            return false;
        }
    },
    min(element, min, attribute = '') {
        const value = element.value.trim();

        if (value.length < min) {
            element.nextElementSibling.innerText = `${attribute} phải lớn hơn ${min} ký tự`;
            return false;
        } else {
            element.nextElementSibling.innerText = '';
            return true;
        }
    },
    max(element, min, attribute = '') {
        const value = element.value.trim();

        if (value.length > min) {
            element.nextElementSibling.innerText = `${attribute} phải nhỏ hơn ${min} ký tự`;
            return false;
        } else {
            element.nextElementSibling.innerText = '';
            return true;
        }
    }
}

export default validation;
