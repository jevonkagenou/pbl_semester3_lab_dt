<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Service Details - FlexStart Bootstrap Template</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="<?= BASE_URL ?>/public/assets/img/favicon.png" rel="icon">
    <link href="<?= BASE_URL ?>/public/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="<?= BASE_URL ?>/public/assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: FlexStart
  * Template URL: https://bootstrapmade.com/flexstart-bootstrap-startup-template/
  * Updated: Nov 01 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="service-details-page">

    <?php include 'navbar.php'; ?>

    <main class="main">

        <style>
            .academic-accordion .accordion-item {
                border: none;
                border-radius: 12px;
                margin-bottom: 16px;
                background: #ffffff;
                box-shadow: 0 4px 20px rgba(39, 80, 91, 0.08);
                transition: all 0.3s ease;
                overflow: hidden;
            }

            .academic-accordion .accordion-item:hover {
                transform: translateY(-3px);
                box-shadow: 0 8px 25px rgba(39, 80, 91, 0.2);
            }

            .academic-accordion .accordion-button {
                border-radius: 12px;
                background: #fff;
                color: #27505B;
                font-weight: 700;
                padding: 20px 25px;
                font-size: 1.1rem;
                transition: all 0.3s ease;
                border: none;
            }

            .academic-accordion .accordion-button:focus {
                box-shadow: none;
            }

            .academic-accordion .accordion-button:not(.collapsed) {
                background-color: #f2f9f8;
                color: #2a9d8f;
                box-shadow: inset 5px 0 0 #2a9d8f;
            }

            .academic-accordion .accordion-button::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%2327505B'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                transition: transform 0.3s ease-in-out;
            }

            .academic-accordion .accordion-button:not(.collapsed)::after {
                background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%232a9d8f'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e");
                transform: rotate(-180deg);
            }

            .academic-accordion .accordion-body {
                padding: 20px 25px 30px 25px;
                color: #555;
                line-height: 1.8;
                background-color: #fcfcfc;
                border-top: 1px solid #ecf0f1;
            }

            .icon-wrapper {
                display: inline-flex;
                align-items: center;
                justify-content: center;
                width: 35px;
                height: 35px;
                background-color: #eef5f4;
                border-radius: 50%;
                margin-right: 15px;
                color: #27505B;
                transition: all 0.3s ease;
            }

            .accordion-button:not(.collapsed) .icon-wrapper {
                background-color: #2a9d8f;
                color: #fff;
            }
        </style>

        <section class="section py-5" style="background-color: #f4f7f6; min-height: 100vh;">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-10">

                        <div class="mb-5 text-center" data-aos="fade-up">
                            <h1 class="fw-bold" style="color: #27505B; font-size: 2.5rem; letter-spacing: -1px;">Aturan
                                Akademik</h1>
                            <p class="text-muted">Pedoman dan tata tertib kegiatan akademik di lingkungan program studi.
                            </p>
                        </div>

                        <div class="accordion academic-accordion" id="accordionAturanAkademik">

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="100">
                                <h2 class="accordion-header" id="headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                        <span class="icon-wrapper"><i class="bi bi-book"></i></span>
                                        PROSES PEMBELAJARAN
                                    </button>
                                </h2>
                                <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p>Proses pembelajaran di Polinema dilaksanakan dengan ketentuan sebagai
                                            berikut:</p>
                                        <ul>
                                            <li>Pelaksanaan Proses Pembelajaran melalui tahapan Penetapan, Pelaksanaan,
                                                Evaluasi, Pengendalian, dan Peningkatan mutu pembelajaran (siklus
                                                PPEPP).</li>
                                            <li>Pelaksanaan proses pembelajaran mengacu pada kurikulum dan Rencana
                                                Pembelajaran Semester (RPS) yang disusun oleh dosen, disahkan oleh
                                                program studi.</li>
                                            <li>Pelaksanaan proses pembelajaran dititikberatkan pada peningkatan
                                                pengetahuan, keterampilan dan karakter dalam ekosistem industri.</li>
                                            <li>Pelaksanaan proses pembelajaran dilakukan dalam bentuk: ceramah,
                                                seminar, diskusi, praktikum, pengerjaan tugas mandiri dan kelompok,
                                                studi lapangan atau melakukan magang di industri maupun pelaksanaan
                                                kegiatan yang sesuai dengan 8 pilar pada MBKM.</li>
                                            <li>Pelaksanaan proses pembelajaran, masing-masing jurusan/program studi
                                                dibantu oleh Kelompok Bidang Keahlian.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="150">
                                <h2 class="accordion-header" id="headingTwo">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        <span class="icon-wrapper"><i class="bi bi-calendar-week"></i></span>
                                        JADWAL PERKULIAHAN
                                    </button>
                                </h2>
                                <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p>Pelaksanaan perkuliahan diatur dalam SK Direktur dan diturunkan kepada
                                            masing-masing Jurusan, dengan ketentuan umum sebagai berikut:</p>
                                        <ul>
                                            <li>Dilaksanakan mulai hari Senin sampai dengan Jumat mulai pukul 07.00 dan
                                                berakhir maksimal pukul 20.00 WIB atau berakhir sesuai dengan jadwal
                                                yang ditetapkan oleh Jurusan/program studi.</li>
                                            <li>Jadwal kuliah diatur oleh masing-masing jurusan/ program studi
                                                berdasarkan kalender akademik Polinema yang berlaku.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="200">
                                <h2 class="accordion-header" id="headingThree">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseThree" aria-expanded="false"
                                        aria-controls="collapseThree">
                                        <span class="icon-wrapper"><i class="bi bi-person-x"></i></span>
                                        KETIDAKHADIRAN
                                    </button>
                                </h2>
                                <div id="collapseThree" class="accordion-collapse collapse"
                                    aria-labelledby="headingThree" data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p><strong>1. Alasan Ketidakhadiran</strong></p>
                                        <ul>
                                            <li><strong>SAKIT</strong>
                                                <p>Bagi mahasiswa yang tidak hadir dalam perkuliahan karena sakit maka
                                                    harus memenuhi ketentuan berikut:</p>
                                                <ol type="a">
                                                    <li>Jika satu hari sakit tanpa surat dokter harus ada surat
                                                        keterangan tertulis.</li>
                                                    <li>Tidak hadir lebih dari 1 (satu) hari karena sakit harus
                                                        menyerahkan surat keterangan dokter yang diberikan
                                                        selambat-lambatnya 2 (dua) hari kerja sejak tidak hadir karena
                                                        sakit.</li>
                                                    <li>Meninggalkan kuliah karena sakit pada saat perkuliahan
                                                        berlangsung harus minta izin dosen yang bersangkutan dengan
                                                        mengisi form yang tersedia.</li>
                                                    <li>Jika alasan sakit tidak memenuhi ketentuan poin a, b, c maka
                                                        mahasiswa dinyatakan alpha.</li>
                                                </ol>
                                            </li>
                                            <li class="mt-3"><strong>IZIN</strong>
                                                <p>Bagi mahasiswa yang tidak hadir dalam perkuliahan karena izin maka
                                                    harus memenuhi ketentuan berikut:</p>
                                                <ol type="a">
                                                    <li>Tidak hadir 1 (satu) hari atau lebih karena ada kepentingan
                                                        harus ada surat keterangan/ijin.</li>
                                                    <li>Meninggalkan kuliah karena izin pada saat perkuliahan
                                                        berlangsung harus minta izin dosen yang bersangkutan dengan
                                                        mengisi form yang tersedia.</li>
                                                    <li>Jika alasan izin tidak memenuhi ketentuan poin a, dan b, maka
                                                        mahasiswa dinyatakan alpha.</li>
                                                </ol>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="250">
                                <h2 class="accordion-header" id="headingFour">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFour" aria-expanded="false"
                                        aria-controls="collapseFour">
                                        <span class="icon-wrapper"><i class="bi bi-graph-up"></i></span>
                                        EVALUASI HASIL BELAJAR
                                    </button>
                                </h2>
                                <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <ol type="a">
                                            <li><strong>TUJUAN</strong>
                                                <ul>
                                                    <li>Mendapatkan informasi ketercapaian tujuan pembelajaran yang
                                                        telah dirumuskan dalam RPS.</li>
                                                    <li>Mengetahui kemajuan belajar mahasiswa yang akan dilaporkan
                                                        kepada orang tua.</li>
                                                </ul>
                                            </li>
                                            <li>Evaluasi dapat dilaksanakan dalam bentuk observasi, partisipasi, unjuk
                                                kerja, tes tertulis, tes daring dan tes lisan yang akan diatur dalam
                                                Rencana Pembelajaran Semester.</li>
                                            <li>Evaluasi hasil belajar mahasiswa mencakup: Tugas
                                                Terstruktur/Kuis/Tutorial/Tes Harian, Presentasi, Seminar, Praktikum,
                                                UTS, UAS yang bentuk evaluasinya disesuaikan dengan mata kuliah dan
                                                digunakan untuk penilaian penguasaan pengetahuan, keterampilan umum, dan
                                                keterampilan khusus yang dilakukan dengan memilih satu atau kombinasi
                                                dari berbagai teknik dan instrumen penilaian.</li>
                                            <li>Remedial wajib diselenggarakan oleh program studi untuk memberikan
                                                kesempatan kepada mahasiswa memperbaiki nilai yang belum memenuhi
                                                persyaratan yaitu nilai C untuk mata kuliah wajib, nilai D untuk mata
                                                kuliah praktik/praktikum, dan nilai E untuk semua mata kuliah.</li>
                                            <li>Perhitungan nilai akhir semester berdasarkan perhitungan bobot nilai
                                                yang ditentukan pada suatu mata kuliah. 5 nilai dikumpulkan saat tengah
                                                semester dan 5 nilai berikutnya di akhir semester sehingga total dalam 1
                                                semester dosen mengunggah 10 nilai.</li>
                                            <li>Dosen pengampu mata kuliah mengunggah hasil penilaian melalui SIAKAD
                                                selambat-lambatnya 2 minggu setelah pelaksanaan ujian akhir semester.
                                            </li>
                                            <li>Ujian diselenggarakan 2 kali tiap semester, yaitu ujian tengah semester
                                                (UTS) dan ujian akhir semester (UAS).</li>
                                            <li>Penyelenggaraan UTS tidak terjadwal tetapi diatur dan dikoordinasi oleh
                                                jurusan/program studi. Penyerahan nilai UTS sesuai dengan kalender
                                                akademik.</li>
                                            <li>Penyelenggaraan UAS dilaksanakan secara terjadwal yang diatur dan
                                                dikoordinasi oleh jurusan/program studi sesuai dengan kalender akademik.
                                            </li>
                                        </ol>
                                        <p><strong>TATA TERTIB UAS</strong><br>
                                            Tata tertib pelaksanaan ujian semester, meliputi:</p>
                                        <ul>
                                            <li>Telah memenuhi kewajiban pembayaran UKT</li>
                                            <li>Hadir tepat pada waktu yang ditentukan.</li>
                                            <li>Menunjukkan Kartu Tanda Mahasiswa (KTM) yang masih berlaku pada saat
                                                UAS.</li>
                                            <li>Menandatangani daftar hadir pada saat UAS.</li>
                                            <li>Dilarang melakukan kecurangan selama ujian berlangsung.</li>
                                            <li>Hal-hal lain diatur oleh jurusan masing-masing.</li>
                                        </ul>
                                        <p>Pelanggaran tata tertib di atas dikenakan sanksi yang diatur oleh jurusan.
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="300">
                                <h2 class="accordion-header" id="headingFive">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFive" aria-expanded="false"
                                        aria-controls="collapseFive">
                                        <span class="icon-wrapper"><i class="bi bi-pencil-square"></i></span>
                                        SISTEM PENILAIAN
                                    </button>
                                </h2>
                                <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p><strong>A. NILAI AKHIR</strong></p>
                                        <p>Nilai Akhir adalah nilai angka untuk masing masing mata kuliah hasil dari
                                            beberapa kali evaluasi mata kuliah yang bersangkutan. Nilai Akhir ditentukan
                                            dengan rumus sebagai berikut:</p>

                                        <div class="alert alert-secondary text-center">
                                            NA = &Sigma; (f<sub>i</sub> x x<sub>i</sub>) / &Sigma; f<sub>i</sub>
                                        </div>
                                        <p>Dengan:<br>
                                            NA = nilai akhir<br>
                                            f<sub>i</sub> = bobot ke - i<br>
                                            x<sub>i</sub> = nilai ke - i</p>

                                        <p>Nilai akhir akan dikonversikan ke nilai mutu yang berupa nilai huruf dan
                                            nilai setara dengan ketentuan sebagai berikut:</p>

                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped text-center">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th rowspan="2" class="align-middle">Nilai Angka</th>
                                                        <th colspan="3">Nilai Mutu</th>
                                                    </tr>
                                                    <tr>
                                                        <th>Nilai Huruf</th>
                                                        <th>Nilai Setara</th>
                                                        <th>Kualifikasi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>80 < N ≤ 100</td> <td>A</td>
                                                        <td>4</td>
                                                        <td>Sangat Baik</td>
                                                    </tr>
                                                    <tr>
                                                        <td>73 < N ≤ 80</td> <td>B+</td>
                                                        <td>3,5</td>
                                                        <td>Lebih dari Baik</td>
                                                    </tr>
                                                    <tr>
                                                        <td>65 < N ≤ 73</td> <td>B</td>
                                                        <td>3</td>
                                                        <td>Baik</td>
                                                    </tr>
                                                    <tr>
                                                        <td>60 < N ≤ 65</td> <td>C+</td>
                                                        <td>2,5</td>
                                                        <td>Lebih dari Cukup</td>
                                                    </tr>
                                                    <tr>
                                                        <td>50 < N ≤ 60</td> <td>C</td>
                                                        <td>2</td>
                                                        <td>Cukup</td>
                                                    </tr>
                                                    <tr>
                                                        <td>39 < N ≤ 50</td> <td>D</td>
                                                        <td>1</td>
                                                        <td>Kurang</td>
                                                    </tr>
                                                    <tr>
                                                        <td>N ≤ 39</td>
                                                        <td>E</td>
                                                        <td>0</td>
                                                        <td>Gagal</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                        <p><strong>B. INDEK PRESTASI SEMESTER (IPS)</strong><br>
                                            Indek Prestasi Semester adalah nilai rata-rata akhir semester dari gabungan
                                            mata kuliah yang ditempuh pada semester yang bersangkutan. Indek Prestasi
                                            Semester dihitung dengan cara menjumlahkan perkalian antara nilai huruf
                                            setiap mata kuliah yang ditempuh dan SKS mata kuliah bersangkutan dibagi
                                            dengan jumlah sks mata kuliah yang diambil dalam satu semester.</p>

                                        <p><strong>C. INDEK PRESTASI KUMULATIF (IPK)</strong><br>
                                            Indek Prestasi Kumulatif adalah nilai rata-rata akhir studi dari gabungan
                                            mata kuliah yang ditempuh selama studi yang bersangkutan. Indek Prestasi
                                            Kumulatif dihitung dengan cara menjumlahkan perkalian antara nilai huruf
                                            setiap mata kuliah yang ditempuh dan SKS mata kuliah bersangkutan dibagi
                                            dengan jumlah sks mata kuliah yang diambil yang telah ditempuh.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="350">
                                <h2 class="accordion-header" id="headingSix">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                        <span class="icon-wrapper"><i class="bi bi-award"></i></span>
                                        YUDISIUM
                                    </button>
                                </h2>
                                <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p>Yudisium merupakan keputusan rapat jurusan/program studi untuk menetapkan
                                            nilai dan status kelulusan mahasiswa. Sedangkan untuk status putus studi
                                            mahasiswa ditetapkan oleh Direktur Polinema berdasarkan pertimbangan yang
                                            diberikan oleh program studi. Untuk keperluan pelaksanaan yudisium maka
                                            penyerahan nilai tengah semester dan akhir semester di jurusan/program studi
                                            diserahkan ke bagian akademik sesuai kalender akademik. Yudisium
                                            dilaksanakan pada:</p>
                                        <ol>
                                            <li>Tengah Semester : yudisium tengah semester untuk menentukan status
                                                kelulusan bagi mahasiswa yang lulus percobaan pada semester sebelumnya.
                                            </li>
                                            <li>Akhir Semester : yudisium akhir semester untuk menentukan status
                                                kelulusan mahasiswa di akhir semester.</li>
                                            <li>Akhir Studi : yudisium yang dilaksanakan pada akhir masa studi
                                                mahasiswa.</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="400">
                                <h2 class="accordion-header" id="headingSeven">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseSeven" aria-expanded="false"
                                        aria-controls="collapseSeven">
                                        <span class="icon-wrapper"><i class="bi bi-check2-circle"></i></span>
                                        EVALUASI AKHIR STUDI
                                    </button>
                                </h2>
                                <div id="collapseSeven" class="accordion-collapse collapse"
                                    aria-labelledby="headingSeven" data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p>Evaluasi akhir studi dilakukan setelah mahasiswa mengikuti sidang akhir.
                                            Evaluasi ini, yang dilakukan pada saat yudisium, bertujuan untuk menetapkan
                                            nilai tugas akhir mahasiswa dan memastikan bahwa jumlah SKS yang ditempuh
                                            sesuai dengan persyaratan. Nilai yang diperoleh dalam yudisium merupakan
                                            akumulasi dari seluruh nilai semester. Evaluasi dilakukan dengan ketentuan
                                            bahwa mahasiswa dinyatakan lulus jika memiliki IPK minimal 2,00.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="450">
                                <h2 class="accordion-header" id="headingEight">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseEight" aria-expanded="false"
                                        aria-controls="collapseEight">
                                        <span class="icon-wrapper"><i class="bi bi-info-circle"></i></span>
                                        STATUS AKADEMIK
                                    </button>
                                </h2>
                                <div id="collapseEight" class="accordion-collapse collapse"
                                    aria-labelledby="headingEight" data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p><strong>A. LULUS SEMESTER</strong><br>
                                            1. Mahasiswa dinyatakan lulus semester (L) bila Indek Prestasi Semester
                                            (IPS) minimal sama dengan 2,00 dengan syarat:</p>
                                        <ul>
                                            <li>Nilai mata kuliah Agama, Pancasila, Kewarganegaraan tidak kurang dari C.
                                            </li>
                                            <li>Jumlah nilai D tidak lebih dari 1 untuk mata kuliah praktik/praktikum.
                                            </li>
                                            <li>Tidak terdapat nilai E.</li>
                                        </ul>
                                        <p>2. Mahasiswa dinyatakan lulus semester dengan masa percobaan setengah
                                            semester (L**) apabila terpenuhi syarat Lulus Semester pada Status Akademik
                                            ditambah dengan salah satu atau lebih ketentuan berikut:</p>
                                        <ul>
                                            <li>Mendapat surat peringatan III.</li>
                                            <li>Jumlah nilai D lebih dari 3 mata kuliah.</li>
                                        </ul>

                                        <p><strong>B. TIDAK LULUS SEMESTER</strong><br>
                                            1. Mahasiswa dinyatakan tidak lulus di akhir semester apabila memenuhi salah
                                            satu atau lebih ketentuan berikut:</p>
                                        <ul>
                                            <li>IPS kurang dari 2,00.</li>
                                            <li>Terdapat nilai E.</li>
                                            <li>Nilai mata kuliah Agama, Pancasila, Kewarganegaraan, Bahasa Indonesia
                                                kurang dari C.</li>
                                            <li>Jumlah nilai D lebih dari 1 untuk mata kuliah praktik/praktikum.</li>
                                            <li>Dua kali berturut-turut lulus semester dengan status lulus percobaan.
                                            </li>
                                            <li>Tidak mengajukan cuti akademik.</li>
                                        </ul>
                                        <p>2. Mahasiswa dinyatakan tidak lulus pada tengah semester apabila dalam
                                            evaluasi masa percobaan setengah semester terdapat salah satu atau lebih
                                            ketentuan berikut:</p>
                                        <ul>
                                            <li>IPS kurang dari 2,00.</li>
                                            <li>Terdapat nilai E.</li>
                                            <li>Terdapat nilai kurang dari C pada salah satu mata kuliah untuk mata
                                                kuliah Agama, Pancasila, Kewarganegaraan, dan Bahasa Indonesia.</li>
                                            <li>Jumlah nilai D lebih dari 1 untuk mata kuliah praktik/praktikum.</li>
                                            <li>Terdapat nilai D lebih dari 3 mata kuliah.</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                            <div class="accordion-item" data-aos="fade-up" data-aos-delay="500">
                                <h2 class="accordion-header" id="headingNine">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseNine" aria-expanded="false"
                                        aria-controls="collapseNine">
                                        <span class="icon-wrapper"><i class="bi bi-mortarboard"></i></span>
                                        PREDIKAT KELULUSAN
                                    </button>
                                </h2>
                                <div id="collapseNine" class="accordion-collapse collapse" aria-labelledby="headingNine"
                                    data-bs-parent="#accordionAturanAkademik">
                                    <div class="accordion-body">
                                        <p>Penentuan predikat kelulusan khusus untuk mahasiswa yang pernah cuti akademik
                                            atau terminal, predikat kelulusan maksimal adalah sangat memuaskan.</p>
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped text-center">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Predikat Kelulusan</th>
                                                        <th>IPK Diploma Dua, Diploma Tiga, dan Sarjana Terapan</th>
                                                        <th>IPK Magister Terapan dan Doktor Terapan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>Lulus Dengan Pujian*</td>
                                                        <td>3,51 - 4,00</td>
                                                        <td>3,76 - 4,00</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lulus Sangat Memuaskan</td>
                                                        <td>3,01 - 3,50</td>
                                                        <td>3,51 - 3,75</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lulus Memuaskan</td>
                                                        <td>2,76 - 3,00</td>
                                                        <td>3,00 - 3,50</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Lulus</td>
                                                        <td>2,00 - 2,75</td>
                                                        <td>-</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <p>*) syarat predikat lulus dengan pujian:</p>
                                        <ul>
                                            <li>Masa studi Diploma Dua 4 semester, Diploma Tiga 6 semester, Sarjana
                                                Terapan 8 semester, Magister terapan 4 semester dan Doktor Terapan 6
                                                semester.</li>
                                            <li>Tidak ada nilai lebih kecil dari B</li>
                                            <li>Tidak pernah mendapatkan sanksi pelanggaran dan ketidakhadiran</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>

    <?php include 'footer.php'; ?>

    <!-- Scroll Top -->
    <a href=" #" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="<?= BASE_URL ?>/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/php-email-form/validate.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/aos/aos.js"></script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/glightbox/js/glightbox.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/purecounter/purecounter_vanilla.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/isotope-layout/isotope.pkgd.min.js">
    </script>
    <script src="<?= BASE_URL ?>/public/assets/vendor/swiper/swiper-bundle.min.js">
    </script>

    <!-- Main JS File -->
    <script src="<?= BASE_URL ?>/public/assets/js/main.js"></script>

</body>

</html>