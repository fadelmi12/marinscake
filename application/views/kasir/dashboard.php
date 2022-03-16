<div class="main-content">
    <section class="section">
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-header justify-content-between" style="background-color: #f0f3ff;">
                        <h4>Transaksi Langsung <i class="fas fa-info-circle fa-1x" style="color: #6778f0;"></i></h4>
                    </div>
                    <div class="card-body">
                        <h7>Total Pendapatan:</h7>
                        <h4><strong>Rp. 250.000</strong></h4>
                        <h7>Total Transaksi:</h7>
                        <h4><strong>25</strong></h4>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header justify-content-between" style="background-color: #f0f3ff;">
                        <h4>Transaksi Preorder <i class="fas fa-info-circle fa-1x" style="color: #6778f0;"></i></h4>
                    </div>
                    <div class="card-body">
                        <h7>Total Pendapatan:</h7>
                        <h4><strong>Rp. 500.000</strong></h4>
                        <h7>Total Transaksi:</h7>
                        <h4><strong>50</strong></h4>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">
                    <div class="card-header justify-content-between" style="background-color: #f0f3ff;">
                        <h4>Grafik Penjualan</h4>
                    </div>
                    <div class="card-body">
                        <canvas id="linechart" width="100" height="50" class="mb-4"></canvas>
                    <div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="<?= base_url('assets/js/grafik.js')?>"></script>
<script  type="text/javascript">
    var ctx = document.getElementById("linechart").getContext("2d");
    var data = {
        labels: ["Senin","Selasa","Rabu","Kamis","Jumat","Sabtu","Minggu"],
        datasets: [
            {
                label: "Transaksi Langsung",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#29B0D0",
                borderColor: "#29B0D0",
                pointHoverBackgroundColor: "#29B0D0",
                pointHoverBorderColor: "#29B0D0",
                data: [<?= 
                    '"' . 15 . '","' . 50 . '","' . 15 . '",
                    "' . 45 . '","' . 25 . '","' . 40 . '",
                    "' . 30 . '",';
                ?>]
            },
            {
                label: "Transaksi Preorder",
                fill: false,
                lineTension: 0.1,
                backgroundColor: "#FFD700",
                borderColor: "#FFD700",
                pointHoverBackgroundColor: "#FFD700",
                pointHoverBorderColor: "#FFD700",
                data: [<?= 
                    '"' . 30 . '","' . 15 . '","' . 30 . '",
                    "' . 25 . '","' . 50 . '","' . 20 . '",
                    "' . 15 . '",';
                ?>]
            },
        ],
    };

    var myBarChart = new Chart(ctx, {
        type: 'line',
        data: data,
        options: {
            legend: {
            display: true
            },
            barValueSpacing: 20,
            scales: {
                yAxes: [{
                    ticks: {
                        min: 0,
                    }
                }],
                xAxes: [{
                    gridLines: {
                        color: "rgba(0, 0, 0, 0)",
                    }
                }]
            }
        }
    });
</script>