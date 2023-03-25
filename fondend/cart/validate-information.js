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
        setErrorMsg(username, 'first name cannot be blank');
    }
    else if(usernameVal.length <=2){
        setErrorMsg(username, 'min 3 char');
    }
    else{
        setSuccessMsg(username);
    }

    //email
    if(emailVal === ""){
        setErrorMsg(email, 'email cannot be blank');
    }
    else if(!isEmail(emailVal)){
        setErrorMsg(email, 'email is not valid');
    }
    else{
        setSuccessMsg(email);
    }
    //mobile
    if(mobileVal === ""){
        setErrorMsg(mobile, 'mobile cannot be blank');
    }
    else if(mobileVal.length != 10){
        setErrorMsg(mobile, 'min 10 and max 10 char');
    }
    else{
        setSuccessMsg(mobile);
    }

    //confirm password
    if(adressVal === ""){
        setErrorMsg(adress, 'confirm password cannot be blank');
    }
    else{
        setSuccessMsg(adress);
    }
    SuccessMsg(usernameVal);

    if(password_newVal === ""){
        setErrorMsg(password_new, 'vui lòng không để trống');
    }
    else{
        setSuccessMsg(password_new);
    }
    if(password_oldVal === ""){
        setErrorMsg(password_old, 'vui lòng không để trống');
    }
    else{
        setSuccessMsg(password_old);
    }
    if(cpasswordVal === ""){
        setErrorMsg(cpassword, 'vui lòng không để trống');
    }
    else if(cpasswordVal != password_newVal){
        setErrorMsg(cpassword, 'chua trung');                
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

