<!DOCTYPE html>
<html lang="th">
<head>
    <!-- Required meta tags -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" xintegrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Google Fonts (Sarabun & Inter) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@400;500;700;800&family=Inter:wght@400;500;700&display=swap" rel="stylesheet">

    <title>Program Homepage - Modern Design</title>

    <style>
        :root {
            --primary-orange: #FF7B25;
            --secondary-green: #10B981;
            --light-bg: #FDFCFB;
            --dark-text: #1F2937;
            --light-text: #6B7280;
            --card-bg: #FFFFFF;
            --border-color: #F3F4F6;
        }

        body {
            font-family: 'Sarabun', 'Inter', sans-serif;
            background-color: var(--light-bg);
            color: var(--dark-text);
        }

        /* Watermark Logo Background */
        .background-logo {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-image: url('https://i.postimg.cc/fLMTBLyM/1539055-0.jpg');
            background-position: center;
            background-repeat: no-repeat;
            background-size: contain;
            opacity: 0.05; /* Adjust opacity to make it a subtle watermark */
            z-index: -1; /* Place it behind all content */
        }

        .navbar {
            background-color: rgba(255, 255, 255, 0.8) !important;
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border-bottom: 1px solid var(--border-color);
        }

        .navbar-brand {
            color: var(--primary-orange) !important;
            font-weight: 800;
            font-size: 1.5rem;
        }

        .hero-section {
            padding: 6rem 0;
            text-align: center;
        }

        .hero-section .display-4 {
            font-weight: 800;
            color: var(--dark-text);
            margin-bottom: 1rem;
        }

        .hero-section .lead {
            color: var(--light-text);
            max-width: none;
            margin: 0 auto 2rem auto;
            font-size: 1.25rem;
        }

        .flag-container {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .flag-icon {
            height: 40px;
            border-radius: 4px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            transition: transform 0.2s ease-in-out;
        }

        .flag-icon:hover {
            transform: scale(1.15);
        }

        .program-card {
            background: var(--card-bg);
            border: 1px solid var(--border-color);
            border-radius: 1rem;
            box-shadow: 0 4px 6px -1px rgb(0 0 0 / 0.05), 0 2px 4px -2px rgb(0 0 0 / 0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            position: relative;
        }

        .program-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 25px -5px rgb(0 0 0 / 0.1), 0 8px 10px -6px rgb(0 0 0 / 0.1);
        }

        .card-icon-wrapper {
            height: 80px;
            width: 80px;
            margin: 0 auto 1.5rem auto;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.5rem;
            transition: all 0.3s ease;
        }

        /* Unique colors for each card icon */
        #db-card .card-icon-wrapper {
            background: linear-gradient(135deg, var(--primary-orange), #FFAD84);
            color: white;
        }
        #print-card .card-icon-wrapper {
            background: linear-gradient(135deg, var(--secondary-green), #6EE7B7);
            color: white;
        }
        #tracking-card .card-icon-wrapper {
            background: linear-gradient(135deg, #3B82F6, #93C5FD);
            color: white;
        }
        #settings-card .card-icon-wrapper {
            background: linear-gradient(135deg, #6366F1, #A5B4FC);
            color: white;
        }

        .program-card .card-title {
            font-weight: 700;
            color: var(--dark-text);
        }

        .program-card .card-text {
            color: var(--light-text);
            min-height: 48px;
        }

        .btn-primary {
            background-color: var(--primary-orange);
            border-color: var(--primary-orange);
            font-weight: 700;
            padding: 0.75rem 1.5rem;
            border-radius: 50px;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #E86A17;
            border-color: #E86A17;
            transform: scale(1.05);
        }

        .dropdown-menu {
            border-radius: 0.75rem;
            box-shadow: 0 10px 15px -3px rgb(0 0 0 / 0.1), 0 4px 6px -4px rgb(0 0 0 / 0.1);
            border: 1px solid var(--border-color);
        }

        .dropdown-item {
            padding: 0.75rem 1.25rem;
            font-weight: 500;
        }

        .dropdown-item:active {
            background-color: var(--primary-orange);
        }

        .footer {
            background-color: var(--dark-text);
        }
    </style>
</head>
<body>

    <!-- Background Logo Watermark -->
    <div class="background-logo"></div>

    <!-- Navigation Bar -->
    <nav class="navbar navbar-expand-lg sticky-top">
        <div class="container">
            <a class="navbar-brand" href="#">
                <i class="bi bi-box-seam-fill me-2"></i>
                โปรแกรมของคุณ
            </a>
        </div>
    </nav>

    <!-- Main Content Area -->
    <main>
        <!-- Hero Section -->
        <section class="hero-section">
            <div class="container">
                <div class="flag-container">
                    <img src="https://flagcdn.com/h40/th.png" alt="ธงชาติไทย" class="flag-icon" title="ประเทศไทย">
                    <img src="https://flagcdn.com/h40/la.png" alt="ธงชาติลาว" class="flag-icon" title="ประเทศลาว">
                    <img src="https://flagcdn.com/h40/vn.png" alt="ธงชาติเวียดนาม" class="flag-icon" title="ประเทศเวียดนาม">
                    <img src="https://flagcdn.com/h40/mm.png" alt="ธงชาติเมียนมา" class="flag-icon" title="ประเทศเมียนมา">
                    <img src="https://flagcdn.com/h40/kh.png" alt="ธงชาติกัมพูชา" class="flag-icon" title="ประเทศกัมพูชา">
                </div>
                <h1 class="display-4">ยินดีต้อนรับ</h1>
                <p class="lead">ระบบจัดการข้อมูล บริษัท นำคนต่างด้าวเข้ามาทำงานในประเทศ โปร เวิร์คเกอร์ เลเบอร์ จำกัด</p>
            </div>
        </section>

        <!-- Program Links -->
        <section class="container pb-5">
            <div class="row g-4 justify-content-center">

                <!-- Card 1: Database -->
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div id="db-card" class="card text-center program-card w-100">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column">
                            <div class="card-icon-wrapper">
                                <i class="bi bi-database-fill-gear"></i>
                            </div>
                            <h5 class="card-title mt-3">ฐานข้อมูล</h5>
                            <p class="card-text my-3">จัดการและเข้าถึงฐานข้อมูลทั้งหมดของโปรแกรม</p>
                            <a href="index.html" class="btn btn-primary mt-auto stretched-link">เข้าสู่ฐานข้อมูล</a>
                        </div>
                    </div>
                </div>

                <!-- Card 2: Printing with Dropdown -->
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div id="print-card" class="card text-center program-card w-100">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column">
                            <div class="card-icon-wrapper">
                                <i class="bi bi-printer-fill"></i>
                            </div>
                            <h5 class="card-title mt-3">พิมพ์เอกสาร</h5>
                            <p class="card-text my-3">เลือกประเภทเอกสารที่ต้องการพิมพ์จากเมนูด้านล่าง</p>
                            <div class="dropdown mt-auto">
                                <button class="btn btn-primary dropdown-toggle w-100" type="button" id="dropdownPrint" data-bs-toggle="dropdown" aria-expanded="false">
                                    เลือกเมนูพิมพ์
                                </button>
                                <ul class="dropdown-menu w-100" aria-labelledby="dropdownPrint">
                                    <li><a class="dropdown-item" href="print-demand.html"><i class="bi bi-file-earmark-text me-2"></i>พิมพ์ Demand</a></li>
                                    <li><a class="dropdown-item" href="print-general.html"><i class="bi bi-files me-2"></i>พิมพ์ เอกสารทั่วไป</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 3: Tracking System with Direct Links -->
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div id="tracking-card" class="card text-center program-card w-100">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column">
                            <div class="card-icon-wrapper">
                                <i class="bi bi-clipboard2-data-fill"></i>
                            </div>
                            <h5 class="card-title mt-3">ระบบติดตามงาน</h5>
                            <p class="card-text my-3">ติดตามสถานะและขั้นตอนการทำงานต่างๆ ของเอกสาร</p>
                            <div class="d-grid gap-2 mt-auto">
                                <!-- Removed "เข้าสู่ระบบติดตามงาน" link -->
                                <a href="index3.html" class="btn btn-primary"><i class="bi bi-list-task me-2"></i>ระบบติดตามงาน</a>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Card 4: Settings -->
                <div class="col-md-6 col-lg-6 col-xl-3 d-flex align-items-stretch">
                    <div id="settings-card" class="card text-center program-card w-100">
                        <div class="card-body p-4 p-lg-5 d-flex flex-column">
                            <div class="card-icon-wrapper">
                                <i class="bi bi-gear-wide-connected"></i>
                            </div>
                            <h5 class="card-title mt-3">ตั้งค่า</h5>
                            <p class="card-text my-3">ปรับแต่งการตั้งค่าต่างๆ ของโปรแกรม</p>
                            <a href="settings.html" class="btn btn-primary mt-auto stretched-link">ไปที่การตั้งค่า</a>
                        </div>
                    </div>
                </div>

            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="footer mt-auto py-4 footer">
        <div class="container text-center">
            <span class="text-white-50">© 2025 Your Company, Inc. All Rights Reserved.</span>
        </div>
    </footer>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
