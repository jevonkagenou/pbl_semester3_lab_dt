<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Mazer Admin Dashboard</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/css/app.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/css/pages/error.css">

    <style>
        /* --- FUTURISTIC THEME STYLES --- */
        :root {
            --neon-blue: #00f2fe;
            --neon-purple: #4facfe;
            --dark-bg-1: #0f0c29;
            --dark-bg-2: #302b63;
            --dark-bg-3: #24243e;
        }

        body {
            /* Latar belakang gradien gelap seperti luar angkasa */
            background: linear-gradient(135deg, var(--dark-bg-1), var(--dark-bg-2), var(--dark-bg-3));
            background-size: 400% 400%;
            animation: gradientBG 15s ease infinite;
            font-family: 'Segoe UI', Roboto, Helvetica, Arial, sans-serif;
            color: #fff;
            overflow: hidden;
        }

        /* Class Penting: Glassmorphism */
        .glass-container {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.37);
        }

        .img-error {
            max-height: 280px;
            /* Sedikit diperkecil agar proporsional */
            width: auto;
            filter: drop-shadow(0 0 15px rgba(79, 172, 254, 0.4));
            animation: float 6s ease-in-out infinite;
        }

        /* Class Penting: Judul Neon */
        .glitch-title {
            font-size: 6rem;
            /* Ukuran disesuaikan agar tidak terlalu raksasa */
            font-weight: 900;
            letter-spacing: 5px;
            background: linear-gradient(to right, var(--neon-blue), var(--neon-purple));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            text-shadow: 0px 0px 20px rgba(79, 172, 254, 0.5);
            margin-bottom: 0;
            line-height: 1.2;
        }

        /* Class Penting: Tombol Neon */
        .btn-futuristic {
            position: relative;
            padding: 12px 35px;
            font-weight: 600;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--neon-blue);
            border: 2px solid var(--neon-blue);
            border-radius: 50px;
            background: transparent;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(0, 242, 254, 0.2);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-futuristic:hover {
            background: var(--neon-blue);
            color: var(--dark-bg-1);
            box-shadow: 0 0 30px rgba(0, 242, 254, 0.6);
            transform: translateY(-3px);
        }

        .btn-futuristic-secondary {
            color: #fff;
            border: 2px solid rgba(255, 255, 255, 0.3);
            box-shadow: none;
        }

        .btn-futuristic-secondary:hover {
            background: rgba(255, 255, 255, 0.1);
            border-color: #fff;
            color: #fff;
            box-shadow: 0 0 15px rgba(255, 255, 255, 0.3);
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
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
                <img class="img-fluid img-error" src="<?= BASE_URL ?>public/assets-admin/images/samples/error-404.png"
                    alt="Not Found">
            </div>

            <h1 class="glitch-title">404</h1>

            <h2 class="fs-3 fw-bold text-white mb-3 text-uppercase" style="letter-spacing: 2px;">
                Halaman Tidak Ditemukan
            </h2>

            <p class="fs-6 text-white-50 mb-5 col-md-10 mx-auto">
                Maaf, halaman yang Anda cari tidak tersedia atau telah dipindahkan ke dimensi lain.
            </p>

            <div class="d-flex justify-content-center flex-wrap gap-3">
                <a href="javascript:history.back()" class="btn-futuristic">
                    <i class="bi bi-arrow-left"></i> Kembali
                </a>

                <a href="<?= BASE_URL ?>" class="btn-futuristic btn-futuristic-secondary">
                    <i class="bi bi-house-door"></i> Ke Beranda
                </a>
            </div>

        </div>

    </div>
</body>

</html>