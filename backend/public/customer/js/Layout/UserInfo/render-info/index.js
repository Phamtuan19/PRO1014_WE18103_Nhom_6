

function renderInfo(user) {
    const input_name = document.querySelector(".user_name");
    const user__name = document.querySelector(".user__full__name");
    const input_phone = document.querySelector(".user_phone");
    const input_email = document.querySelector(".user_email");
    const input_province = document.querySelector("#province");
    const input_district = document.querySelector("#district");
    const input_ward = document.querySelector("#ward");

    input_name.value = user.name
    user__name.innerText = user.name
    input_phone.value = user.phone
    input_email.value = user.email

    const option_province = document.createElement("option");
    option_province.text = (user.province.split('-'))[1];
    option_province.value = user.province;
    option_province.setAttribute('selected', 'selected');
    input_province.add(option_province);

    const option_district = document.createElement("option");
    option_district.setAttribute('selected', 'selected');
    option_district.text = (user.district.split('-'))[1];
    option_district.value = user.district;
    input_district.add(option_district);

    const option_ward = document.createElement("option");
    option_ward.setAttribute('selected', 'selected');
    option_ward.text = user.ward;
    option_ward.value = user.ward;
    input_ward.add(option_ward);
}

export default renderInfo;
