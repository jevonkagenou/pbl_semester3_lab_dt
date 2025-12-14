<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Mazer Admin</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/iconly/bold.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/perfect-scrollbar/perfect-scrollbar.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets-admin/css/app.css">
    <link rel="shortcut icon" href="<?= BASE_URL ?>/public/assets-admin/images/favicon.svg" type="image/x-icon">
    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">
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
        }
        .stats-icon.purple { background: linear-gradient(135deg, #9694ff 0%, #7572ff 100%); box-shadow: 0 5px 15px rgba(117, 114, 255, 0.3); }
        .stats-icon.blue { background: linear-gradient(135deg, #57caeb 0%, #5c8ef3 100%); box-shadow: 0 5px 15px rgba(92, 142, 243, 0.3); }
        .stats-icon.green { background: linear-gradient(135deg, #5ddb98 0%, #2ac974 100%); box-shadow: 0 5px 15px rgba(42, 201, 116, 0.3); }
        .stats-icon.red { background: linear-gradient(135deg, #ff8f96 0%, #ff5b5c 100%); box-shadow: 0 5px 15px rgba(255, 91, 92, 0.3); }

        .font-extrabold { font-weight: 800; color: #25396f; }
        .text-muted { color: #8898aa !important; font-weight: 600; font-size: 0.9rem; }

        .card-header-modern {
            background: transparent;
            padding: 20px 25px;
            border-bottom: 1px solid #f0f2f5;
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
        }
        .user-card .text-muted { color: rgba(255,255,255,0.7) !important; }
        .user-card h5 { color: white; }
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
                <p class="text-muted font-normal">Ringkasan statistik aplikasi Anda hari ini.</p>
            </div>

            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon purple mb-2">
                                                    <i class="iconly-boldShow"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Berita</h6>
                                                <h6 class="font-extrabold mb-0"><?= isset($totalBerita) ? $totalBerita : 0 ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon blue mb-2">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Member</h6>
                                                <h6 class="font-extrabold mb-0"><?= isset($totalMember) ? $totalMember : 0 ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon green mb-2">
                                                    <i class="iconly-boldAdd-User"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Editor</h6>
                                                <h6 class="font-extrabold mb-0"><?= isset($chartVisitorsProfile['series'][1]) ? $chartVisitorsProfile['series'][1] : 0 ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card card-modern">
                                    <div class="card-body px-3 py-4">
                                        <div class="row">
                                            <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start">
                                                <div class="stats-icon red mb-2">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                                <h6 class="text-muted font-semibold">Publikasi</h6>
                                                <h6 class="font-extrabold mb-0"><?= isset($totalPublikasi) ? $totalPublikasi : 0 ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="row mt-2">
                            <div class="col-12">
                                <div class="card card-modern">
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
                    
                    <div class="col-12 col-lg-3">
                        <div class="card card-modern user-card">
                            <div class="card-body py-4 px-4">
                                <div class="d-flex align-items-center">
                                    <div class="avatar avatar-xl bg-white p-1">
                                        <img src="<?= BASE_URL ?>/public/assets-admin/images/faces/1.jpg" alt="Face 1" style="border-radius: 50%;">
                                    </div>
                                    <div class="ms-3 name">
                                        <h5 class="font-bold mb-0">
                                            <?= isset($_SESSION['username']) ? htmlspecialchars($_SESSION['username']) : 'Pengguna' ?>
                                        </h5>
                                        <small class="text-muted">
                                            <?= isset($_SESSION['user_role']) ? strtoupper($_SESSION['user_role']) : 'GUEST' ?>
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card card-modern mt-4">
                            <div class="card-header-modern">
                                <h4>Komposisi Pengguna</h4>
                            </div>
                            <div class="card-body">
                                <div id="chart-visitors-profile"></div>
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
                height: 300,
                toolbar: { show: false }
            },
            colors: ['#9694ff', '#ff5b5c'], 
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '55%',
                    borderRadius: 4,
                },
            },
            dataLabels: {
                enabled: false
            },
            stroke: {
                show: true,
                width: 2,
                colors: ['transparent']
            },
            xaxis: {
                categories: <?php echo json_encode($chartTrend['categories'] ?? []); ?>,
            },
            yaxis: {
                title: { text: 'Jumlah Disetujui' }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val + " Data"
                    }
                }
            }
        };
        
        if(document.querySelector("#chart-trend")) {
            var chartTrend = new ApexCharts(document.querySelector("#chart-trend"), optionsTrend);
            chartTrend.render();
        }

        var optionsVisitorsProfile = {
            series: <?php echo json_encode($chartVisitorsProfile['series'] ?? []); ?>,
            labels: <?php echo json_encode($chartVisitorsProfile['labels'] ?? []); ?>,
            colors: ['#435ebe', '#55c6e8', '#f1b44c'], 
            chart: {
                type: 'donut',
                width: '100%',
                height: '350px'
            },
            legend: {
                position: 'bottom',
                markers: { radius: 12 }
            },
            plotOptions: {
                pie: {
                    donut: {
                        size: '45%',
                        labels: {
                            show: true,
                            total: {
                                show: true,
                                showAlways: true,
                                label: 'Total',
                                fontSize: '14px',
                                fontFamily: 'Nunito, sans-serif',
                                fontWeight: 600,
                                color: '#373d3f',
                            }
                        }
                    }
                }
            },
            dataLabels: {
                enabled: false
            }
        };

        if(document.querySelector("#chart-visitors-profile")) {
            var chartVisitorsProfile = new ApexCharts(document.querySelector("#chart-visitors-profile"), optionsVisitorsProfile);
            chartVisitorsProfile.render();
        }
    </script>

    <script src="<?= BASE_URL ?>/public/assets-admin/js/main.js"></script>
</body>

</html>