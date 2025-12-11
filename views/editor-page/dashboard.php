<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Editor - Lab Jarkom</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>/public/assets-admin/images/favicon.svg" type="image/x-icon">
    
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/toastify/toastify.css">

    <style>
        body { background-color: #f2f7ff; }
        
        .card-modern {
            background: #ffffff;
            border: none;
            border-radius: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.03);
            transition: all 0.3s ease;
            overflow: hidden;
            display: flex;
            flex-direction: column; 
        }
        
        .card-modern:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
        }

        .stats-icon {
            width: 50px;
            height: 50px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #fff;
            flex-shrink: 0;
        }
        .stats-icon.purple { background: linear-gradient(135deg, #9694ff 0%, #7572ff 100%); box-shadow: 0 5px 15px rgba(117, 114, 255, 0.3); }
        .stats-icon.red { background: linear-gradient(135deg, #ff8f96 0%, #ff5b5c 100%); box-shadow: 0 5px 15px rgba(255, 91, 92, 0.3); }

        .font-extrabold { font-weight: 800; color: #25396f; }
        .text-muted { color: #8898aa !important; font-weight: 600; font-size: 0.9rem; }

        .card-header-modern {
            background: transparent;
            padding: 20px 25px;
            border-bottom: 1px solid #f0f2f5;
            flex-shrink: 0;
        }
        .card-header-modern h4 {
            font-weight: 700;
            color: #344767;
            font-size: 1.1rem;
            margin: 0;
        }

        .user-card {
            background: linear-gradient(135deg, #435ebe 0%, #25396f 100%);
            color: white;
            border-radius: 20px;
        }
        .user-card .text-muted { color: rgba(255,255,255,0.7) !important; }
        .user-card h5 { color: white; }

        .avatar-xl {
            width: 70px !important;
            height: 70px !important;
            flex-shrink: 0;
            border-radius: 50%;
        }
        
        .avatar-content-wrapper {
            width: 100%; 
            height: 100%; 
            border-radius: 50%; 
            background: #eef2f7; 
            display: flex; 
            align-items: center; 
            justify-content: center; 
            font-weight: bold; 
            font-size: 1.8rem; 
            color: #25396f;
        }

        .chart-container {
            flex-grow: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 250px;
        }
    </style>
</head>

<body>
    <div id="app">
        <?php include 'sidebar.php'; ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading mb-4">
                <h3 style="font-weight: 800; color: #25396f;">Dashboard Overview</h3>
                <p class="text-muted font-normal">Ringkasan statistik kontribusi Anda hari ini.</p>
            </div>

            <div class="page-content">
                <section class="row align-items-stretch match-height">
                    
                    <div class="col-12 col-lg-9 d-flex flex-column">
                        
                        <div class="row">
                            <div class="col-6 col-lg-6 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-4 py-4">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="text-muted font-semibold">Total Berita</h6>
                                                <h6 class="font-extrabold mb-0" style="font-size: 1.5rem;"><?= isset($totalBerita) ? $totalBerita : 0 ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-6 col-lg-6 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-4 py-4">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col">
                                                <h6 class="text-muted font-semibold">Total Publikasi</h6>
                                                <h6 class="font-extrabold mb-0" style="font-size: 1.5rem;"><?= isset($totalPublikasi) ? $totalPublikasi : 0 ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-2 flex-grow-1">
                            <div class="col-12 h-100">
                                <div class="card card-modern h-100">
                                    <div class="card-header-modern">
                                        <h4>Tren Berita & Publikasi Disetujui (<?= date('Y') ?>)</h4>
                                    </div>
                                    <div class="card-body">
                                        <div id="chart-trend"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-12 col-lg-3 d-flex flex-column">
                        
                        <div class="card card-modern user-card mb-4" style="flex-shrink: 0;">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl bg-white p-1">
                                        <div class="avatar-content-wrapper">
                                            <?= strtoupper(substr($_SESSION['username'] ?? 'E', 0, 1)) ?>
                                        </div>
                                    </div>
                                    <div class="ms-3 name" style="overflow: hidden;">
                                        <h5 class="font-bold mb-0 text-truncate">
                                            <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Editor' ?>
                                        </h5>
                                        <small class="text-muted d-block">
                                            <?= isset($_SESSION['user_role']) ? strtoupper($_SESSION['user_role']) : 'EDITOR' ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-modern flex-grow-1">
                            <div class="card-header-modern">
                                <h4>Status Upload Saya</h4>
                            </div>
                            <div class="card-body d-flex flex-column justify-content-center align-items-center">
                                <div id="chart-status-composition" class="w-100 d-flex justify-content-center"></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
            <?php include 'footer.php'; ?>
        </div>
    </div>
    
    <script src="<?= BASE_URL ?>/public/assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/js/bootstrap.bundle.min.js"></script>
    <script src="<?= BASE_URL ?>/public/assets-admin/vendors/apexcharts/apexcharts.js"></script>
    
    <script>
        var optionsTrend = {
            series: <?php echo json_encode($chartTrend['series'] ?? []); ?>,
            chart: {
                type: 'bar',
                height: 320,
                toolbar: { show: false },
                fontFamily: 'Nunito, sans-serif'
            },
            colors: ['#9694ff', '#ff5b5c'], 
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '45%',
                    borderRadius: 5,
                },
            },
            dataLabels: { enabled: false },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?php echo json_encode($chartTrend['categories'] ?? []); ?>,
                axisBorder: { show: false },
                axisTicks: { show: false },
                labels: {
                    style: { colors: '#9aa0ac', fontSize: '12px' }
                }
            },
            yaxis: {
                title: { 
                    text: 'Jumlah Data',
                    style: { fontWeight: 600 }
                }
            },
            grid: {
                borderColor: '#f1f1f1',
            },
            fill: { opacity: 1 },
            tooltip: {
                y: {
                    formatter: function (val) { return val + " Data" }
                }
            }
        };
        
        if(document.querySelector("#chart-trend")) {
            var chartTrend = new ApexCharts(document.querySelector("#chart-trend"), optionsTrend);
            chartTrend.render();
        }

        var optionsStatus = {
            series: <?php echo json_encode($chartStatusComposition['series'] ?? []); ?>,
            labels: <?php echo json_encode($chartStatusComposition['labels'] ?? []); ?>,
            colors: ['#5ddb98', '#f1b44c', '#ff5b5c'], 
            chart: {
                type: 'donut',
                width: '100%',
                height: 280,
                fontFamily: 'Nunito, sans-serif'
            },
            legend: {
                position: 'bottom',
                horizontalAlign: 'center',
                markers: { radius: 12 },
                itemMargin: { horizontal: 5, vertical: 0 }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '70%',
                        labels: {
                            show: true,
                            name: { fontSize: '14px', color: '#6c757d' },
                            value: { fontSize: '20px', fontWeight: 'bold', color: '#25396f' },
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total',
                                fontSize: '14px',
                                fontWeight: 600,
                                color: '#6c757d',
                            }
                        }
                    }
                }
            },
            dataLabels: { enabled: false },
            stroke: { show: false }
        };

        if(document.querySelector("#chart-status-composition")) {
            var chartStatus = new ApexCharts(document.querySelector("#chart-status-composition"), optionsStatus);
            chartStatus.render();
        }
    </script>

    <script src="<?= BASE_URL ?>/public/assets-admin/js/main.js"></script>
</body>

</html>