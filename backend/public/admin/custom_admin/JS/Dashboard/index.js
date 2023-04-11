

import callApiDashboard from './Api/index.js';
// import chartJS from './Chart/index.js';

// function chartJS() {
// (async function () {
//     const data = [
//         { month: 'January', count: 10 },
//         { month: 'February', count: 20 },
//         { month: 'March', count: 15 },
//         { month: 'April', count: 25 },
//         { month: 'May', count: 22 },
//         { month: 'June', count: 20 },
//         { month: 'July', count: 28 },
//         { month: 'August', count: 28 },
//         { month: 'September', count: 28 },
//         { month: 'October', count: 28 },
//         { month: 'November', count: 28 },
//         { month: 'December', count: 28 },
//     ];

//     new Chart(
//         document.getElementById('acquisitions'),
//         {
//             type: 'bar',
//             data: {
//                 labels: data.map(row => row.month),
//                 datasets: [
//                     {
//                         label: 'Doanh số mua hàng',
//                         data: data.map(row => row.count),
//                     }
//                 ]
//             },
//             options: {
//                 animation: true,
//                 plugins: {
//                     legend: {
//                         display: true
//                     },
//                     tooltip: {
//                         enabled: true
//                     },
//                 }
//             },
//         }
//     );
// })();


// }


callApiDashboard()



