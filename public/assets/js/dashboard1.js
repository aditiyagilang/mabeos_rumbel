$(function () {
    "use strict";

    // Data untuk Grafik Nilai berdasarkan kuis
    const nilaiData = {
        'Kuis 1': [85, 78, 90, 88, 92],
        'Kuis 2': [70, 80, 75, 85, 90],
        'Kuis 3': [88, 85, 95, 80, 87]
    };

    // Fungsi untuk membuat chart dengan data tertentu
    function createChart(data) {
        return new Chartist.Bar('.amp-pxl', {
            labels: ['Siswa A', 'Siswa B', 'Siswa C', 'Siswa D', 'Siswa E'],
            series: [data]
        }, {
            axisX: {
                position: 'end',
                showGrid: false
            },
            axisY: {
                position: 'start'
            },
            high: 100,
            low: 0,
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });
    }

    // Inisialisasi chart dengan data default (misal Kuis 1)
    let currentChart = createChart(nilaiData['Kuis 1']);

    // Tambahkan event listener untuk filter kuis
    $('#quiz-filter').on('change', function () {
        const selectedQuiz = $(this).val();

        // Perbarui data chart berdasarkan kuis yang dipilih
        currentChart.update({
            labels: ['Siswa A', 'Siswa B', 'Siswa C', 'Siswa D', 'Siswa E'],
            series: [nilaiData[selectedQuiz]]
        });
    });

    // Animasi pada grafik
    currentChart.on('draw', function (data) {
        if (data.type === 'bar') {
            data.element.animate({
                y2: {
                    dur: 500,
                    from: data.y1,
                    to: data.y2,
                    easing: Chartist.Svg.Easing.easeInOutElastic
                },
                opacity: {
                    dur: 500,
                    from: 0,
                    to: 1,
                    easing: Chartist.Svg.Easing.easeInOutElastic
                }
            });
        }
    });
});
