<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="../../content/images/favicon_io/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="../../content/images/favicon_io/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="../../content/images/favicon_io/favicon-16x16.png">
    <link rel="manifest" href="../../content/images/favicon_io/site.webmanifest">
    <!--  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="../../content/css/login.css">
    <link rel="stylesheet" href="../../content/css/sanpham.css">
    <link rel="stylesheet" href="../../content/css/testim.css">
    <link rel="stylesheet" href="../../content/css/style.css">
    <link rel="stylesheet" href="../../content/css/carousel.css">
    <link rel="stylesheet" href="../../content/css/lich-su.css">
    <link rel="stylesheet" href="../../content/css/notification.css">

</head>

<body>
    <?php
    require '../../global.php';
    require '../../pdo.php';
    if (exist_param("gioi-thieu")) {
        $VIEW_NAME = "trang-chinh/gioi-thieu.php";
    } else if (exist_param("san-pham")) {
        require_once '../../dao/hang-hoa.php';
        $items_all = hang_hoa_select_all();
        $VIEW_NAME = "trang-chinh/san-pham.php";
    } else if (exist_param("lien-he")) { //kiểm tra xem tham số "lien-he" có tồn tại trong yêu cầu (request) hay không.
        $VIEW_NAME = "trang-chinh/lien-he.php";
    } else if (exist_param("chi-tiet")) {
        $VIEW_NAME = "../hang-hoa/chi-tiet.php";
    } else if (exist_param("gio-hang")) {
        $VIEW_NAME = "../gio-hang/gio-hang-page.php";
    } else if (exist_param("thanh-toan")) {
        $VIEW_NAME = "../gio-hang/thanh-toan-page.php";
    } else if (exist_param("lich-su")) {
        $VIEW_NAME = "../gio-hang/lich-su.php";
    } else {
        require_once '../../dao/hang-hoa.php';
        $items_all = hang_hoa_select_all();
        $dac_biet_list = hang_hoa_select_dac_biet();
        $VIEW_NAME = "trang-chinh/trang-chu.php";
    }
    require '../layout.php';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typed.js/2.0.12/typed.min.js" referrerpolicy="no-referrer"></script>
    <script src="../../content/js/login.js"></script>
    <script src="../../content/js/script.js"></script>
    <script src="../../content/js/testim.js"></script>
    <script>
        const typed = new Typed(".typing", {
            strings: [
                "Clothes with our story",
                "Genuine, suitable for the price",
                "Top fashion style",
            ],
            typeSpeed: 100,
            backSpeed: 60,
            loop: true,
        });
    </script>

</body>

</html>