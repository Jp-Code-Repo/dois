
    /*
     * ============================================================
     * SIDEBAR TOGGLE
     * ============================================================
     */

    function toggleSidebar() {

        const sidebar = document.getElementById('sidebar');

        const overlay = document.getElementById('sidebarOverlay');

        sidebar.classList.toggle('show');

        overlay.classList.toggle('show');

    }


    /*
     * ============================================================
     * CASES CHART
     * ============================================================
     */

    const chartCanvas = document.getElementById('casesChart');

    const casesChart = new Chart(chartCanvas, {

        type: 'line',

        data: {

            labels: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug'
            ],

            datasets: [

                {

                    label: 'Reported',

                    data: [
                        18,
                        24,
                        21,
                        29,
                        34,
                        27,
                        36,
                        31
                    ],

                    borderColor: '#2563eb',

                    backgroundColor: 'rgba(37, 99, 235, 0.08)',

                    borderWidth: 2,

                    fill: true,

                    tension: 0.35,

                    pointRadius: 3,

                    pointHoverRadius: 5

                },

                {

                    label: 'Resolved',

                    data: [
                        14,
                        19,
                        18,
                        22,
                        27,
                        25,
                        29,
                        24
                    ],

                    borderColor: '#16a34a',

                    backgroundColor: 'rgba(22, 163, 74, 0.05)',

                    borderWidth: 2,

                    fill: true,

                    tension: 0.35,

                    pointRadius: 3,

                    pointHoverRadius: 5

                }

            ]

        },

        options: {

            responsive: true,

            maintainAspectRatio: false,

            interaction: {

                intersect: false,

                mode: 'index'

            },

            plugins: {

                legend: {

                    position: 'bottom',

                    labels: {

                        usePointStyle: true,

                        pointStyle: 'circle',

                        padding: 20,

                        font: {

                            size: 11

                        }

                    }

                }

            },

            scales: {

                y: {

                    beginAtZero: true,

                    border: {

                        display: false

                    },

                    grid: {

                        color: '#f1f1f1'

                    },

                    ticks: {

                        font: {

                            size: 10

                        },

                        color: '#9ca3af'

                    }

                },

                x: {

                    border: {

                        display: false

                    },

                    grid: {

                        display: false

                    },

                    ticks: {

                        font: {

                            size: 10

                        },

                        color: '#9ca3af'

                    }

                }

            }

        }

    });
