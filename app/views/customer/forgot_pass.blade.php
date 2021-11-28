<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <title>Login Form Using HTML And CSS Only</title>
    <!-- reset -->
    <link rel="stylesheet" href="../../../public/css/customerCss/reset.css">
    <!-- icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css">
    <!-- css -->
    <link rel="stylesheet" href="../../../public/css/customerCss/style.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

</head>

<body class="bgr-img form-log-section">
    <div class="form-log-container">
        <div class="form-base">
            <div class="form-base-header">
                <h4>Nhập email của bạn</h4>
            </div>
            <div class="form-base-body">
                <div class="form-base-content">
                    <div class="icon">
                        <i class="fas fa-lock"></i>
                    </div>
                    <form class="log__form" action="">
                        <input type="text" id="check-mail-forgot" onblur="checkEmailForgot()"
                            oninput="checkEmailForgot()" placeholder="Email">
                        <span class="alert-mess check-mail-forgot mess-margin"></span>
                        <div class="btn-base-log-section">
                            <button class="base-logn__btn btn-primary" type="reset">Nhập lại</button>
                            <button class="base-logn__btn btn-primary" type="submit">Gửi</button>
                        </div>
                    </form>
                    <a href="" class="form-link">Trang chủ</a>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/validateFormLog.js"></script>

</html>