import { service } from './service.js';
import { shoppintCart, quantityShoppingCartItem } from './render__Html.js';
import { hendleClickQuantity, cartTotals, showSuccessToast, showErrorToast } from './basie.js';

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

            $(this).attr('data-province', province[1])

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

            $(this).attr('data-district', district[1])

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
                $(this).attr("data-ward", $(this).val());
            }

            const ward = $(this).val();
        })

        $("#house_number").change(function () {
            console.log($(this).val());
            $(this).attr("data-houseNumber", $(this).val());
        })

    });
}

apiProvinces()

// ===================================


const localCart = localStorage.getItem('local-cart') ? JSON.parse(localStorage.getItem('local-cart')) : [];

let listProductCode = localCart.map(e => e.code).join(',');

if (localCart.length > 0) {

    service.getShoppingCart(listProductCode)
        .then(function (response) {
            return response.json();
        })
        .then(function (data) {
            // console.log(localCart);
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

        const name = document.querySelector('.order_name').value;
        const phone = document.querySelector('.order_phone').value;
        const email = document.querySelector('.order_email').value;
        const province = document.querySelector('#province').getAttribute("data-province");
        const district = document.querySelector('#district').getAttribute("data-district");
        const house_number = document.querySelector('#house_number').getAttribute("data-houseNumber");
        const ward = document.querySelector('#ward').getAttribute("data-ward");
        const orderNote = document.querySelector('#order_note').value;

        const delivery_form = document.querySelector('input[name="delivery_form"]:checked').value;

        let dataOrder = {
            user_id: $('.order_name').data('userid'),
            name: name,
            email: email,
            phone: phone,
            province_city: province,
            county_district: district,
            ward: ward,
            house_number_street_name: house_number,
            content_note: orderNote,
            products: localCart,
            total_product_quantity: localCart.length,
            payment_form: delivery_form,
            discount_code_id: null,
        }

        service.postOrder(dataOrder)
            .then(function (response) {
                if (response.status !== 200) {
                    showErrorToast("Đã có lỗi xảy ra. Vui lòng kiểm tra lại")
                    throw new Error(response.status);
                }
                showSuccessToast("Đặt hàng thành công");
                return response.json();
            })
            .then(function (data) {
                localStorage.clear();
            })
            .catch(function (error) {
                console.log(error);
            })
    }
}
