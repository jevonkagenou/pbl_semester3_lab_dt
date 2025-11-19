<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>
        :root {
            --primary-color: #27505B;
            --background-color: #f0f2f5;
            --card-bg-color: #ffffff;
            --text-color: #333333;
            --secondary-text-color: #6c757d;
        }

        body {
            background-color: var(--background-color);
        }

        .center-screen {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px 0;
        }

        .login-card-minimal {
            width: 100%;
            max-width: 380px;
            padding: 40px;
            border-radius: 15px;
            background-color: var(--card-bg-color);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08), 0 5px 15px rgba(0, 0, 0, 0.05);
            border: none;
            position: relative;
        }

        .login-card-minimal h4 {
            color: var(--primary-color);
            font-weight: 700;
            margin-bottom: 5px;
        }

        .login-card-minimal p.subtitle {
            color: var(--secondary-text-color);
            margin-bottom: 30px;
        }

        .form-control-minimal {
            border: 1px solid #dee2e6;
            border-radius: 8px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }

        .form-control-minimal:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.15rem rgba(39, 80, 91, 0.2);
            background-color: #ffffff;
        }

        .btn-minimal-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            font-weight: 600;
            padding: 12px 0;
            border-radius: 8px;
            transition: background-color 0.3s ease, transform 0.1s;
        }

        .btn-minimal-primary:hover {
            background-color: #1a3b44;
            border-color: #1a3b44;
            transform: translateY(-1px);
            color: white;
        }

        .form-check-label,
        .link-dark-blue {
            font-size: 0.9rem;
            color: var(--secondary-text-color);
        }

        .link-dark-blue {
            color: var(--primary-color) !important;
            text-decoration: none;
            font-weight: 500;
        }

        .link-dark-blue:hover {
            text-decoration: underline;
        }

        .form-check-input:checked {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .back-to-home {
            margin-top: 30px;
            text-align: center;
        }

        .back-to-home a {
            color: var(--secondary-text-color);
            font-size: 0.95rem;
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            padding: 8px 15px;
            border-radius: 50px;
            background-color: #ffffff;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .back-to-home a:hover {
            color: var(--primary-color);
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .back-to-home a i {
            margin-right: 8px;
        }
    </style>
</head>

<body>

    <div class="center-screen">
        <div>
            <div class="login-card-minimal">

                <div class="text-center mb-4">
                    <i class="fas fa-lock fa-2x" style="color: var(--primary-color);"></i>
                </div>
                <h4 class="text-center">Akses Akun Anda</h4>
                <p class="text-center subtitle">Silakan masukkan detail Anda untuk melanjutkan.</p>

                <form>
                    <div class="mb-3">
                        <label for="emailMinimal" class="form-label visually-hidden">Email</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"
                                style="color: var(--primary-color); border-radius: 8px 0 0 8px;"><i
                                    class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control form-control-minimal border-start-0"
                                id="emailMinimal" placeholder="Alamat Email" required>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="passwordMinimal" class="form-label visually-hidden">Password</label>
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0"
                                style="color: var(--primary-color); border-radius: 8px 0 0 8px;"><i
                                    class="fas fa-key"></i></span>
                            <input type="password" class="form-control form-control-minimal border-start-0"
                                id="passwordMinimal" placeholder="Kata Sandi" required>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="rememberMinimal">
                            <label class="form-check-label" for="rememberMinimal">
                                Remember Me
                            </label>
                        </div>
                        <div>
                            <a href="#" class="link-dark-blue">Lupa Password?</a>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-minimal-primary w-100">
                        Masuk
                    </button>
                </form>

                <p class="text-center mt-4">
                    <span style="color: var(--secondary-text-color);">Tidak punya akun?</span> <a href="#"
                        class="link-dark-blue">Daftar di sini</a>
                </p>
            </div>

            <div class="back-to-home">
                <a href="index.php">
                    <i class="fas fa-arrow-left"></i> Kembali ke Beranda
                </a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>