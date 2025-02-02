<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>

    <style>
        .bg-fixed-wrap {
            padding: 48px 0 80px;
            height: 40vh;
            width: 100vw;
            position: relative;
            left: calc(-50vw + 50%);

        }
        .slider {
            margin-bottom: 40px;
        }
        .mb-3 {
            font-weight: 600;
        }
        .btn-bottom {
            font-weight: 500;
            transition: .5s;
            border-radius: 50rem ;
            padding-top: 0.5rem ;
            padding-bottom: 0.5rem;
            padding-right: 1.5rem;
            padding-left: 1.5rem ;
            border-width: 2px;
            color: #3CB815;
            border-color: #3CB815;
            border: 1px solid ;
        }
        .btn-bottom:hover {
            background: #3CB815;
            color: #fff;
            border: none;
        }
        .container-fluid{
            border-radius: 5px;
            padding-top: 6rem;
            padding-bottom: 6rem;
            width: 100%;
            background: url(../../content/images/favicon_io/bg-icon.png) ;
            background-size: contain;
        }
        .bg-green {
            background: #3CB815;
        }
        .btn-right {
            visibility: visible;
            animation-delay: 0.5s;
            animation-name: fadeIn;
            font-weight: 500;
            transition: .5s;
            background-color: #F65005;
            border-color: #F65005;
        }
        

     

       
        
      
        .display-5 {
            font-weight: 700;
        }
    </style>
    <title>hôme</title>
</head>

<body>
    <div class="slider">
        <div class="slider-img">
            <img src="https://mediawinwin.vn/upload/images/sanpham/50-concept-chup-anh-do-uong-dep-dia-chi-chup-hinh-tuy-tin-6.JPG" alt="">
        </div>
      
    </div>
    <div class="content">
        <section class="favourite">
            <div class="row" style="padding-top: 30px;">
                <h3 class="title">Product Now</h3>
            </div>
            <div class="row" style="padding-top: 50px;">
                <?php
                require '../layout/top10.php';
                ?>
            </div>

        </section>
    </div>
      
       
        <!-- ../ -->
        <div class="container-xxl">
      <div class="">
        <div class="row g-5 align-items-center">
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
            <div class="about-img position-relative overflow-hidden p-5 pe-0">
              <img class="img-fluid w-100" src="../../content/images/favicon_io/about.jpg" />
            </div>
          </div>
          <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
            <h1 class="display-5 mb-4">Best Organic Fruits And Vegetables</h1>
            <p class="mb-4">
              Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
              diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
              lorem sit clita duo justo magna dolore erat amet
            </p>
            <p>
              <i class="fa fa-check text-primary me-3"></i>Tempor erat elitr
              rebum at clita
            </p>
            <p>
              <i class="fa fa-check text-primary me-3"></i>Aliqu diam amet diam
              et eos
            </p>
            <p>
              <i class="fa fa-check text-primary me-3"></i>Clita duo justo magna
              dolore erat amet
            </p>
            <a class="btn btn-primary rounded-pill py-3 px-5 mt-3" href=""
              >Read More</a
            >
          </div>
        </div>
      </div>
    </div>
    <!-- ../ -->
    <div class="container-fluid bg-light bg-icon my-5 py-6">
  <div class="">
    <div
      class="section-header text-center mx-auto mb-5 wow fadeInUp"
      data-wow-delay="0.1s"
      style="max-width: 500px"
    >
      <h1 class="display-5 mb-3">Our Features</h1>
      <p>
        Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam
        justo sed rebum vero dolor duo.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <div class="bg-white text-center h-100 p-4 p-xl-5">
          <img class="img-fluid mb-4" src="../../content/images/favicon_io/icon-1.png" alt="" />
          <h4 class="mb-3">Natural Process</h4>
          <p class="mb-4">
            Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum
            diam justo sed vero dolor duo.
          </p>
          <a
            class="btn-bottom btn-outline-primary border-2 py-2 px-4 rounded-pill"
            href=""
            >Read More</a
          >
        </div>
    </div>
     
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <div class="bg-white text-center h-100 p-4 p-xl-5">
          <img class="img-fluid mb-4" src="../../content/images/favicon_io/icon-2.png" alt="" />
          <h4 class="mb-3">Organic Products</h4>
          <p class="mb-4">
            Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum
            diam justo sed vero dolor duo.
          </p>
          <a
            class="btn-bottom btn-outline-primary border-2 py-2 px-4 rounded-pill"
            href=""
            >Read More</a
          >
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <div class="bg-white text-center h-100 p-4 p-xl-5">
          <img class="img-fluid mb-4" src="../../content/images/favicon_io/icon-1.png" alt="" />
          <h4 class="mb-3">Biologically Safe</h4>
          <p class="mb-4">
            Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum
            diam justo sed vero dolor duo.
          </p>
          <a
            class="btn-bottom  btn-outline-primary border-2 py-2 px-4 rounded-pill"
            href=""
            >Read More</a
          >
        </div>
      </div>
    </div>

    <!-- ../ -->
    <div class="container-fluid bg-green  bg-icon mt-5 py-6">
  <div class="">
    <div class="row g-5 align-items-center">
      <div class="col-md-7 wow fadeIn" data-wow-delay="0.1s">
        <h1 class="display-5 text-white mb-3">Visit Our Firm</h1>
        <p class="text-white mb-0">
          Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu
          diam amet diam et eos. Clita erat ipsum et lorem et sit, sed stet
          lorem sit clita duo justo magna dolore erat amet. Diam dolor diam
          ipsum sit. Aliqu diam amet diam et eos.
        </p>
      </div>
      <div class="col-md-5 text-md-end wow fadeIn" data-wow-delay="0.5s">
        <a class="btn-right btn-lg btn-secondary rounded-pill py-3 px-5" href=""
          >Visit Now</a
        >
      </div>
    </div>
    </div>
    </div>
    <!-- // -->
    <div class="container-xxl py-5">
  <div class="">
    <div
      class="section-header text-center mx-auto mb-5 wow fadeInUp"
      data-wow-delay="0.1s"
      style="max-width: 500px"
    >
      <h1 class="display-5 mb-3">Latest Blog</h1>
      <p>
        Tempor ut dolore lorem kasd vero ipsum sit eirmod sit. Ipsum diam
        justo sed rebum vero dolor duo.
      </p>
    </div>
    <div class="row g-4">
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
        <img class="img-fluid" src="../../content/images/favicon_io/blog-1.jpg" alt="" />
        <div class="bg-light p-4">
          <a class="d-block h5 lh-base mb-4" href=""
            >How to cultivate organic fruits and vegetables in own firm</a
          >
          <div class="text-muted border-top pt-4">
            <small class="me-3"
              ><i class="fa fa-user text-primary me-2"></i>Admin</small
            >
            <small class="me-3"
              ><i class="fa fa-calendar text-primary me-2"></i>01 Jan,
              2045</small
            >
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.3s">
        <img class="img-fluid" src="../../content/images/favicon_io/blog-2.jpg" alt="" />
        <div class="bg-light p-4">
          <a class="d-block h5 lh-base mb-4" href=""
            >How to cultivate organic fruits and vegetables in own firm</a
          >
          <div class="text-muted border-top pt-4">
            <small class="me-3"
              ><i class="fa fa-user text-primary me-2"></i>Admin</small
            >
            <small class="me-3"
              ><i class="fa fa-calendar text-primary me-2"></i>01 Jan,
              2045</small
            >
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
        <img class="img-fluid" src="../../content/images/favicon_io/blog-3.jpg" alt="" />
        <div class="bg-light p-4">
          <a class="d-block h5 lh-base mb-4" href=""
            >How to cultivate organic fruits and vegetables in own firm</a
          >
          <div class="text-muted border-top pt-4">
            <small class="me-3"
              ><i class="fa fa-user text-primary me-2"></i>Admin</small
            >
            <small class="me-3"
              ><i class="fa fa-calendar text-primary me-2"></i>01 Jan,
              2045</small
            >
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
</div>

</body>


</html>