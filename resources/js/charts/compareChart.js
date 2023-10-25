import {Chart, BarController, Tooltip, CategoryScale, LinearScale, BarElement, Legend} from 'chart.js';
Chart.register(BarController, Tooltip, CategoryScale, LinearScale, BarElement, Legend)
let compareCtx = document.getElementById('compareChart');
window.compareChart = new Chart(compareCtx, {
    type: 'bar',
    data: {
        datasets: [
        {
            data: balance.pastSixMonthsData.income,
            backgroundColor: ['rgba(63,110,192,0.63)'],
            label: 'הכנסות',
            borderWidth: 0,
            borderRadius: 5
        },
            {
            data: balance.pastSixMonthsData.expenses,
            backgroundColor: ['rgba(192,11,11,0.63)'],
            label: 'הוצאות',
            borderWidth: 0,
            borderRadius: 5
        },
        ],

        labels: balance.pastSixMonthsData.months
    },
    options: {
        responsive: true,
        title: {
            display: true,
            text: `${balance.nameOfChart}`,
            fontSize: 15
        }
    }
});
