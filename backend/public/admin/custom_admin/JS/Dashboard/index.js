



// // callApiDashboard()

var ctx = document.querySelector('#acquisitions');

const dataApi = {
    'name': 'Doanh số',
    'label': ['tháng 1', 'tháng 2', 'tháng 3'],
    'data': [100, 200, 300],
}

function thongke() {

    let dataCharJs;

    fetch('http://127.0.0.1:8000/api/admin/dashboard')
        .then(function (response) {
            return response.json('');
        })
        .then(function (data) {
            console.log(data);
            dataCharJs = data;
        })
        .catch (function (error) {
            console.log(error);
        })

    var data_x = {
        labels: dataApi.label,
        datasets: [{
            label: dataApi.name,
            data: dataApi.data,
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
    // mixedChart.destroy()
    mixedChart = new Chart(ctx,
        config_x
    )
}
thongke()


// var data_x = {
//     labels: [],
//     datasets: [{
//         label: [],
//         data: [],
//         backgroundColor: 'rgba(255, 99, 132, 0.2)',
//         borderColor: 'rgb(255, 99, 132)',
//         borderWidth: 1
//     }]
// };

// var config_x = {
//     type: 'bar',
//     data: data_x,
//     options: {
//         scales: {
//             y: {
//                 beginAtZero: true
//             }
//         }
//     },
// };
// mixedChart = new Chart(ctx,
//             config_x
//         )
