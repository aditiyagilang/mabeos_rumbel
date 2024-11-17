$(function () {
    "use strict";

    // Data untuk Grafik Nilai berdasarkan kuis
    const nilaiData = {
        'Kuis 1': [85, 78, 90, 88, 92],

    };

    // Fungsi untuk membuat chart untuk Grafik Nilai Berdasarkan Kuis
    function createBarChart(data) {
        return new Chartist.Bar('.amp-pxl-bar', {
            labels: ['Sisw A', 'Siswa B', 'Siswa C', 'Siswa D', 'Siswa E'],
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

    // Inisialisasi chart dengan data default (misal Kuis 1) untuk grafik bar
    let currentBarChart = createBarChart(nilaiData['Kuis 1']);

    // Tambahkan event listener untuk filter kuis
    $('#quiz-filter').on('change', function () {
        const selectedQuiz = $(this).val();

        // Perbarui data chart berdasarkan kuis yang dipilih
        currentBarChart.update({
            labels: ['Siswa A', 'Siswa B', 'Siswa C', 'Siswa D', 'Siswa E'],
            series: [nilaiData[selectedQuiz]]
        });
    });

    // Animasi pada grafik bar
    currentBarChart.on('draw', function (data) {
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

$(function () {
    "use strict";

    // Data untuk Grafik Nilai berdasarkan kuis
    const nilaiData = {
        'Kuis 1': [85, 78, 90, 88, 92],

    };

    // Data untuk grafik perbandingan nilai tiap kuis
    const labels = ['Kuis A', 'Kuis B', 'Kuis C', 'Kuis D', 'Kuis E'];

    // Fungsi untuk membuat chart untuk Grafik Perbandingan Nilai
    function createLineChart() {
        console.log('Membuat grafik perbandingan...'); // Debug log
        return new Chartist.Line('.amp-pxl-line', {
            labels: labels,
            series: [
                nilaiData['Kuis 1'],
                nilaiData['Kuis 2'],
                nilaiData['Kuis 3']
            ]
        }, {
            fullWidth: true,
            showArea: true,
            axisX: {
                position: 'end',
                showGrid: false
            },
            axisY: {
                position: 'start',
                labelInterpolationFnc: function (value) {
                    return value + '%';
                }
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });
    }

    // Inisialisasi chart dengan data perbandingan nilai tiap kuis untuk grafik garis
    let currentLineChart = createLineChart();

    // Animasi pada grafik garis
    currentLineChart.on('draw', function (data) {
        if (data.type === 'line') {
            data.element.animate({
                d: {
                    dur: 500,
                    from: data.path.clone().scale(0).translate(0, 0).stringify(),
                    to: data.path.stringify(),
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

$(function () {
    "use strict";

    // Data untuk Grafik Baru
    const sesiData = {
        labels: ['Sesi 1', 'Sesi 2', 'Sesi 3', 'Sesi 4', 'Sesi 5'],
        series: [[30, 50, 70, 90, 60]] // Nilai untuk tiap sesi
    };

    // Fungsi untuk membuat grafik batang baru
    function createNewBarChart(data) {
        return new Chartist.Bar('.amp-pxl-bar-new', {
            labels: data.labels,
            series: data.series
        }, {
            axisX: {
                position: 'end',
                showGrid: false
            },
            axisY: {
                position: 'start',
                low: 0,
                high: 100,
                onlyInteger: true, // Menampilkan angka bulat
                ticks: [0, 10, 20, 30, 40, 50, 60, 70, 80, 90, 100] // Kelipatan 10
            },
            plugins: [
                Chartist.plugins.tooltip()
            ]
        });
    }

    // Inisialisasi grafik baru
    const newBarChart = createNewBarChart(sesiData);

    // Animasi pada grafik batang baru
    newBarChart.on('draw', function (data) {
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
    





