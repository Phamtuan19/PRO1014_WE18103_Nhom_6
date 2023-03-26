const form = document.getElementById('form');
const username = document.getElementById('username');
const email = document.getElementById('email');
const mobile = document.getElementById('mobile');
const adress = document.getElementById('adress');
const password_old=document.getElementById('password_old');
const password_new=document.getElementById('password_new');
const cpassword=document.getElementById('cpassword');


form.addEventListener('submit', (event) =>{
    event.preventDefault();

    Validate();
})

const sendData = (usernameVal, sRate, Count) => {
    if(sRate === Count){
        swal("Hello " + usernameVal , "You are Registered", "success");
    }
}

const SuccessMsg = (usernameVal) => {
    let formContr = document.getElementsByClassName('form-control');
    var Count = formContr.length - 1;
    for(var i = 0; i < formContr.length; i++){
        if(formContr[i].className === "form-control success"){
            var sRate = 0 + i;
            console.log(sRate);
            sendData(usernameVal, sRate, Count);
        }
        else{
            return false;
        }
    }
}


const isEmail = (emailVal) =>{
    var atSymbol = emailVal.indexOf('@');
    if(atSymbol < 1) return false;
    var dot = emailVal.lastIndexOf('.');
    if(dot <= atSymbol + 2) return false;
    if(dot === emailVal.length -1) return false;
    return true;
}

function Validate(){
    const usernameVal = username.value.trim();
    // const lastnameVal = lastname.value.trim();
    const emailVal = email.value.trim();
    const mobileVal = mobile.value.trim();
    const adressVal = adress.value.trim();
    const password_newVal = password_new.value.trim();
    const password_oldVal = password_old.value.trim();
    const cpasswordVal = cpassword.value.trim();

    //username
    if(usernameVal === ""){
        setErrorMsg(username, 'Không được để trống');
    }
    else if(usernameVal.length <=2){
        setErrorMsg(username, 'tên quá ngắn');
    }
    else{
        setSuccessMsg(username);
    }

    //email
    if(emailVal === ""){
        setErrorMsg(email, 'Không được để trống');
    }
    else if(!isEmail(emailVal)){
        setErrorMsg(email, 'Chưa hợp lệ');
    }
    else{
        setSuccessMsg(email);
    }
    //mobile
    if(mobileVal === ""){
        setErrorMsg(mobile, 'Không được để trống');
    }
    else if(mobileVal.length != 10){
        setErrorMsg(mobile, 'Số điệnn thoại phải là 10 số');
    }
    else{
        setSuccessMsg(mobile);
    }

    //confirm password
    if(adressVal === ""){
        setErrorMsg(adress, 'Không được để trống');
    }
    else if(adressVal.length <=5){
        setErrorMsg(adress, 'Quá ngắn');
    }
    else{
        setSuccessMsg(adress);
    }
    SuccessMsg(usernameVal);

    if(password_newVal === ""){
        setErrorMsg(password_new, 'Không được để trống');
    }
    else{
        setSuccessMsg(password_new);
    }
    if(password_oldVal === ""){
        setErrorMsg(password_old, 'Không được để trống');
    }
    else{
        setSuccessMsg(password_old);
    }
    if(cpasswordVal === ""){
        setErrorMsg(cpassword, 'Không được để trống');
    }
    else if(cpasswordVal != password_newVal){
        setErrorMsg(cpassword, 'Chưa trùng');                
    }
    else{
        setSuccessMsg(cpassword);
    }
    

}

function setErrorMsg(input, errormsgs){
    const formControl = input.parentElement;
    const small = formControl.querySelector('small');
    formControl.className = "form-control error";
    small.innerText = errormsgs;
}

function setSuccessMsg(input){
    const formControl = input.parentElement;
    formControl.className = "form-control success";
}

