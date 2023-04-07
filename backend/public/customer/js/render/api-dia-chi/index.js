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


export default apiProvinces;
