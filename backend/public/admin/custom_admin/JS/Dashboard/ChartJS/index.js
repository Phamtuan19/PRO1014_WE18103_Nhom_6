{/* <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> */ }

{/* <script> */ }
var ctx = document.querySelector('#acquisitions');

const dataApi = {
    'name': 'name_1',
    'lable': ['tháng 1', 'tháng 2', 'tháng 3'],
    'data': [100, 200, 300],
}

function thongke() {
    // var form_data = new FormData();
    // $.ajax({
    //     url: "../api/main.php?act=thongke", //Server api to receive the file
    //     type: "GET",
    //     cache: false,
    //     contentType: false,
    //     processData: false,
    //     success: function (res) {
    //         var chart_x = JSON.parse(res)
    var data_x = {
        labels: dataApi['label'],
        datasets: [{
            label: dataApi['name'],
            data: dataApi['data'],
            backgroundColor: 'rgba(255, 99, 132, 0.2)',
            borderColor: 'rgb(255, 99, 132)',
            borderWidth: 1
        }]
    };

    var config_x = {
        type: 'bar',
        data: data_x,
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        },
    };
    mixedChart.destroy()
    mixedChart = new Chart(ctx,
        config_x
    )
    //     }
    // });
}

var data = {
    labels: ['?'],
    datasets: [{
        label: 'My First Dataset',
        data: [1],
    }]
};

const config = {
    type: 'bar',
    data: data,
    options: {
        scales: {
            y: {
                beginAtZero: true
            }
        }
    },
};
var mixedChart = new Chart(ctx,
    config
)
thongke()

// </script>
