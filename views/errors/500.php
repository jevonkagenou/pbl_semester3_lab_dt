<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>500 - System Error</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">

    <style>
        :root {
            --neon-green: #00ff88;
            --neon-dark-green: #00cc6a;
            --dark-bg-1: #051a0f;
            --dark-bg-2: #0a291a;
            --dark-bg-3: #000000;
        }

        body {
            background: linear-gradient(135deg, var(--dark-bg-1), var(--dark-bg-2), var(--dark-bg-3));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Nunito', sans-serif;
            color: #fff;
            overflow: hidden;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(0, 255, 136, 0.2);
            /* Border Hijau */
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
        }

        .img-error {
            max-height: 280px;
            width: auto;
            /* Trik CSS: Mengubah warna gambar asli (biru) menjadi kehijauan */
            filter: drop-shadow(0 0 20px rgba(0, 255, 136, 0.3)) hue-rotate(280deg) brightness(1.2);
            animation: pulse 4s ease-in-out infinite;
        }

        .glitch-title {
            font-size: 6rem;
            font-weight: 900;
            letter-spacing: 5px;
            background: linear-gradient(to right, var(--neon-green), #ccff00);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            text-shadow: 0px 0px 25px rgba(0, 255, 136, 0.5);
            margin-bottom: 0;
            line-height: 1.2;
        }

        .btn-futuristic {
            position: relative;
            padding: 12px 35px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--neon-green);
            border: 2px solid var(--neon-green);
            border-radius: 50px;
            background: transparent;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 255, 136, 0.1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-futuristic:hover {
            background: var(--neon-green);
            color: #000;
            box-shadow: 0 0 30px rgba(0, 255, 136, 0.6);
            transform: translateY(-3px);
        }

        .btn-futuristic-secondary {
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.2);
            box-shadow: none;
        }

        .btn-futuristic-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
            color: #fff;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                filter: drop-shadow(0 0 20px rgba(0, 255, 136, 0.3)) hue-rotate(280deg);
            }

            50% {
                transform: scale(1.05);
                filter: drop-shadow(0 0 35px rgba(0, 255, 136, 0.6)) hue-rotate(280deg);
            }
        }

        @keyframes gradientBG {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100 px-3">

        <div class="glass-container text-center col-lg-6 col-md-8 col-12">

            <div class="mb-4">
                <img class="img-fluid img-error" src="<?= BASE_URL ?>public/assets-admin/images/samples/error-500.png"
                    alt="System Error">
            </div>

            <h1 class="glitch-title">500</h1>

            <h2 class="fs-2 fw-bold text-white mb-3 text-uppercase" style="letter-spacing: 2px;">
                Terjadi Kesalahan Sistem
            </h2>

            <p class="fs-6 text-white-50 mb-5 col-md-10 mx-auto">
                Server sedang mengalami gangguan internal atau kodingan sedang bermasalah.
                Silakan coba muat ulang halaman atau hubungi developer.
            </p>

            <div class="d-flex justify-content-center flex-wrap gap-3">

                <button onclick="location.reload()" class="btn btn-futuristic">
                    <i class="bi bi-arrow-clockwise"></i> Refresh Halaman
                </button>

                <a href="<?= BASE_URL ?>" class="btn-futuristic btn-futuristic-secondary">
                    <i class="bi bi-house-door-fill"></i> Ke Beranda
                </a>

            </div>

        </div>

    </div>
</body>

</html>