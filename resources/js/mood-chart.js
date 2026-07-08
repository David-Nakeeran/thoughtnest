import Chart from "chart.js/auto";

console.log(moodReport.data);

const labels = moodReport.data.map((item) => {
    if (item["created_at"]) {
        return new Date(item.created_at).toLocaleDateString("en-GB");
    }
});

const chartContainer = document.getElementById("chart");
new Chart(chartContainer, {
    type: "line",
    data: {
        labels: labels,
        datasets: [
            {
                label: "Anxiety",
                data: moodReport.data.map((item) => {
                    return item.anxiety;
                }),
                fill: false,
                borderColor: "rgb(255, 159, 64)",
                tension: 0.1,
            },
            {
                label: "Mood",
                data: moodReport.data.map((item) => {
                    return item.mood;
                }),
                fill: false,
                borderColor: "rgb(91, 108, 255)",
                tension: 0.1,
            },
            {
                label: "Stress",
                data: moodReport.data.map((item) => {
                    return item.stress;
                }),
                fill: false,
                borderColor: "rgb(255, 99, 132)",
                tension: 0.1,
            },
        ],
    },
    options: {
        scales: {
            y: {
                min: 1,
                max: 10,
            },
        },
    },
});
