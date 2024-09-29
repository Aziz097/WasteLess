<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'WasteLess')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="/resource/app.css">
    

    <style>
        /* Untuk tata letak dan style utama */
        body, html {
            height: 100%;
            margin: 0;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .container {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .box {
            background-color: white;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .icon-container {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100px;
            width: 100px;
            background-color: #f8f9fa;
            border-radius: 10px;
            margin: 0 auto 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .icon-container img {
            width: 50px;
            height: 50px;
        }

        .btn-custom {
            width: 100%;
            padding: 15px;
            border-radius: 10px;
            font-size: 18px;
            margin-bottom: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        h1 {
            font-size: 24px;
            margin-bottom: 10px;
        }

        p {
            margin-bottom: 30px;
            color: #6c757d;
        }

        /* Footer */
        .footer {
            text-align: center;
            padding: 20px;
            background-color: white;
            box-shadow: 0 -2px 4px rgba(0, 0, 0, 0.05);
        }

        .footer-logo img {
            width: 100px;
            height: auto; /* Allow SVG to scale */
        }

        /* Responsive Layout */
        @media (max-width: 768px) {
            .col-6 {
                width: 100%;
                margin-bottom: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        @yield('content')
    </div>

    <div class="footer">
        <div class="footer-logo">
            <img src="/images/footerlogo.png" alt="WasteLess Logo">
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
<script>
function togglePasswordVisibility(fieldId, btn) {
    const passwordField = document.getElementById(fieldId);
    const icon = btn.querySelector('i');

    if (passwordField.type === 'password') {
        passwordField.type = 'text';
        icon.classList.remove('fa-eye');
        icon.classList.add('fa-eye-slash');
    } else {
        passwordField.type = 'password';
        icon.classList.remove('fa-eye-slash');
        icon.classList.add('fa-eye');
    }
}
</script>

</html>
