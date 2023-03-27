import { service } from './service.js';
import { shoppintCart, quantityShoppingCartItem } from './render__Html.js';
import { hendleClickQuantity, cartTotals, showSuccessToast } from './basie.js';

function apiProvinces() {

    // API các tỉnh thành việt nam
    $(document).ready(function () {
        $.ajax({
            url: 'https://provinces.open-api.vn/api/p/',
            type: 'GET',
            dataType: 'json',
            success: function (data) {
                $.each(data, function (index, value) {
                    $("#province").append(
                        $("<option></option>")
                            .val(value.code + '-' + value.name)
                            .text(value.name)
                    );
                });
            }
        });

        $("#province").change(function () {

            const province = $(this).val().split("-");

            $("#specific_address").val(province[1])

            $("#district").empty();

            if ($(this).val() != null) {
                $("#district").prop("disabled", false);
            }

            if ($(this).val() == '') {
                $("#district").prop("disabled", true);
            }

            $.ajax({
                url: 'https://provinces.open-api.vn/api/p/' + province[0] + '?depth=2',
                type: 'GET',
                success: function (data) {
                    // console.table(data.districts);
                    $.each(data.districts, function (index, value) {
                        $("#district").append(
                            $("<option></option>")
                                .val(value.code + '-' + value.name)
                                .text(value.name)
                        );
                    });
                }
            });
        });


        $("#district").change(function () {

            const district = $(this).val().split("-");

            const province = $("#province").val().split("-");

            $("#specific_address").val(province[1] + ' - ' + district[1])

            console.log($("#specific_address").val());

            $("#ward").empty();

            if ($(this).val() != null) {
                $("#ward").prop("disabled", false);
            } else {
                $("#ward").prop("disabled", true);
            }

            $.ajax({
                url: 'https://provinces.open-api.vn/api/d/' + district[0] + '?depth=2',
                type: 'GET',
                success: function (data) {
                    console.log(data.wards);
                    $.each(data.wards, function (index, value) {
                        $("#ward").append(
                            $("<option></option>")
                                .val(value.name)
                                .text(value.name)
                        );
                    });
                }
            });

        });

        $("#ward").change(function () {
            if ($(this).val() != null) {
                $("#house_number").prop("disabled", false)
            }
            const province = $("#province").val().split("-");

            const district = $("#district").val().split("-");

            const ward = $(this).val();

            $("#specific_address").val(province[1] + '-' + district[1] + '-' + ward)
        })

        $("#house_number").keyup(function () {
            const province = $("#province").val().split("-");

            const district = $("#district").val().split("-");

            const ward = $("#ward").val();

            const house_number = $(this).val()

            $("#specific_address").val(province[1] + ' - ' + district[1] + ' - ' + ward + ' - ' + house_number)
        })

    });
}

apiProvinces()

// ===================================

const orderNote = document.querySelector('.order_note');

const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

const dataOrder = {
    user_id: $('.order_name').data('userid'),
    name: $('.order_name').val(),
    email: $(".order_email").val(),
    phone: $(".order_phone").val(),
    province_city: 'đâsdasas',
    county_district: 'adasdsada',
    house_number_street_name: 'ádasdsad',
    content_note: 'coment',
    products: localCart,
    total_product_quantity: localCart.length,
    payment_form: "COD",
    discount_code_id: '',
}
let listProductCode = localCart.map(e => e.code).join(',');

if (localCart.length > 0) {

    service.getShoppingCart(listProductCode)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            shoppintCart(data);
            quantityShoppingCartItem(localCart);
            cartTotals()
            hendleClickQuantity()
        })
        .catch(function (error) {
            console.log(error);
        })



    const btnOrder = document.querySelector('#order');
    btnOrder.onclick = () => {
        console.log(orderNote.value);

        console.log(dataOrder);
        service.postOrder(dataOrder)
            .then(function (response) {
                return response.json();
            })
            .then(function (data) {
                if(data.status_code === 200) {
                    localStorage.clear();
                    
                }
            })
    }
}
