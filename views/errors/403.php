<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 - Forbidden Access</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASE_URL ?>public/assets-admin/vendors/bootstrap-icons/bootstrap-icons.css">

    <style>
        :root {
            --neon-red: #ff3366;
            --neon-warn: #ffcc00;
            --dark-bg-1: #1a0505;
            --dark-bg-2: #2d0a10;
            --dark-bg-3: #1f0808;
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
            border: 1px solid rgba(255, 51, 102, 0.2);
            border-radius: 25px;
            padding: 3rem;
            box-shadow: 0 8px 32px 0 rgba(0, 0, 0, 0.5);
        }

        .img-error {
            max-height: 280px;
            width: auto;
            filter: drop-shadow(0 0 20px rgba(255, 51, 102, 0.3));
            animation: float 6s ease-in-out infinite;
        }

        .glitch-title {
            font-size: 6rem;
            font-weight: 900;
            letter-spacing: 5px;
            background: linear-gradient(to right, var(--neon-red), var(--neon-warn));
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            position: relative;
            text-shadow: 0px 0px 25px rgba(255, 51, 102, 0.5);
            margin-bottom: 0;
            line-height: 1.2;
        }

        .btn-futuristic {
            position: relative;
            padding: 12px 35px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--neon-red);
            border: 2px solid var(--neon-red);
            border-radius: 50px;
            background: transparent;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 0 10px rgba(255, 51, 102, 0.1);
            display: inline-flex;
            align-items: center;
            gap: 10px;
        }

        .btn-futuristic:hover {
            background: var(--neon-red);
            color: #fff;
            box-shadow: 0 0 30px rgba(255, 51, 102, 0.6);
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
                <img class="img-fluid img-error" src="<?= BASE_URL ?>public/assets-admin/images/samples/error-403.png"
                    alt="Forbidden">
            </div>

            <h1 class="glitch-title">403</h1>

            <h2 class="fs-2 fw-bold text-white mb-3 text-uppercase" style="letter-spacing: 2px;">
                Akses Dilarang
            </h2>

            <p class="fs-6 text-white-50 mb-5 col-md-10 mx-auto">
                Maaf, Anda tidak memiliki izin untuk memasuki area ini. Silakan kembali atau hubungi administrator jika
                ini kesalahan.
            </p>

            <div class="d-flex justify-content-center flex-wrap gap-3">

                <a href="javascript:history.back()" class="btn-futuristic">
                    <i class="bi bi-shield-lock-fill"></i> Kembali
                </a>

                <a href="<?= BASE_URL ?>" class="btn-futuristic btn-futuristic-secondary">
                    <i class="bi bi-house-door-fill"></i> Ke Beranda
                </a>

            </div>

        </div>

    </div>
</body>

</html>