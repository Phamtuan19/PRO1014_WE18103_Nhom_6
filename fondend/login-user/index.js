import { validationEmail, validationPassword, validationPasswordAgain, validationName, validationNumber } from './base.js';

const userEmail = document.querySelector('#email');
const userError = document.querySelector('#email__error');
const error = {};
userEmail.onblur = () => {
    let valueItem = userEmail.value.trim();
    validationEmail(valueItem, userError);
};

const passwordName = document.querySelector('#password');
const passwordError = document.querySelector('.password__error');
passwordName.onblur = () => {
    let valueItem = passwordName.value.trim();
    validationPassword(valueItem, passwordError);
};

const passwordAgain = document.querySelector('#password-again');
const passwordAgainError = document.querySelector('.error__passwordAgain');
passwordAgain.onblur = () => {
    let valueItem = passwordAgain.value.trim();
    validationPasswordAgain(valueItem, passwordAgainError, passwordName.value);
};
const userName = document.querySelector('#name');
const nameError = document.querySelector('.name__error');

userName.onblur = () => {
    let valueItem = userName.value.trim();
    validationName(valueItem, nameError);
};
const number = document.querySelector('#number');
const numberError = document.querySelector('.number__error');
number.onblur = () => {
    let valueItem = number.value.trim();
    validationName(valueItem, numberError);
};
