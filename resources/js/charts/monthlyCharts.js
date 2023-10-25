import {Chart, DoughnutController, ArcElement, Tooltip, Legend, LinearScale} from 'chart.js';

Chart.register(DoughnutController, ArcElement, Tooltip, Legend, LinearScale)

let ctxMonthly = document.getElementById('monthlyChart');
window.monthlyChart = new Chart(ctxMonthly, {
    type: 'doughnut',
    data: {
        datasets: [{
            data: balance.paid,
            fill: false,
            backgroundColor: balance.colors,
            borderColor: 'rgb(0,0,0)',
            borderWidth: 0
        }],
        labels: balance.types
    },
    options: {
        cutout: '80%',
        responsive: true,
        plugins: {
            legend:{
                display: true,
                position: 'right'
            }
        }

    }
});
