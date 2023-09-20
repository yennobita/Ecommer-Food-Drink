<?php
// if (isset($_SESSION['user'])) {
// echo "<script>alert('Please login before checkout!')</script>";
// } else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/gio-hang.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/thanh-toan.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/success.css">
    <title>Payment </title>
    <style>
        .address-form {
            flex: 0 0 70%;
            max-width: 70%;
            outline: none;
            border: 1px solid #ccc;
        }

        .payment-btn {
            margin-top: 16px;
            min-width: 240px;
            padding: 16px 36px;
            background-color: #000;
            color: #fff;
            font-size: 1.6rem;
            text-transform: uppercase;
            cursor: pointer;
        }

        .toast-back {
            padding-top: 24px;
            display: flex;
            justify-content: center;
            gap: 24px;
            list-style: none;
        }

        .toast-back li a {
            padding: 12px 24px;
            background-color: #000;
            color: #fff;
        }
        .vnpay{
            border: 1px solid black;
            margin-top: 15px;
            
        }
    </style>
</head>

<body>
    <div class="success-screen">
        <h1 class="success-screen__header">Successfully
            <div class="confetti-container"></div>
    </div>
    <div class="payment-container">
        <div class="row payment-contai">

            <div class="payment-right">
                <div class="payment-details">
                    <h3 class="payment-title">Payment Details</h3>
                    <div class="payment-list">
                        <div class="row">
                            <?php
                            $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE['cart'] : '[]';
                            $cart_data = json_decode($cookie_data, true);
                            // var_dump($cart_data);
                            $total = 0;
                            foreach ($cart_data as $sp) :
                                $giam_gia = $sp['giam_gia'] ? $sp['giam_gia'] : 0;
                                $subtotal = ($sp['don_gia'] - (($sp['don_gia'] * $giam_gia) / 100)) * $sp['quantity'];
                                $total += $subtotal;
                            ?>
                                <form class="payment-item" action="" method="POST">
                                    <input type="hidden" name="ma_hh" value="<?php echo $sp['ma_hh']; ?>">
                                    <input type="hidden" name="size" value="<?php echo $sp['size'] ?>">
                                    <div class="row payment-item">
                                        <div class="payment-img">
                                            <img src="<?= $CONTENT_URL ?>/images/products/<?php echo $sp['hinh']; ?>" alt="">
                                        </div>
                                        <div class="payment-info">
                                            <p class="itemNumber"></p>
                                            <h3><?php echo $sp['ten_hh']; ?></h3>
                                            <div class="size">SIZE: <span><?php echo (($sp['size']) ? $sp['size'] : ''); ?></span></div>
                                            <p>
                                                <span>Quantity:
                                                    <?php echo $sp['quantity'] ?>
                                                </span>
                                                x <?php
                                                    if ($giam_gia > 0) {
                                                    ?>
                                                    <span class="listed-price">
                                                        <del>
                                                            $<?= number_format($sp['don_gia'], 2) ?>
                                                        </del>
                                                        <i>$<?= number_format($sp['don_gia'] - (($sp['don_gia'] * $sp['giam_gia']) / 100), 2) ?></i>
                                                    </span>
                                                <?php
                                                    } else {
                                                ?>
                                                    <span class="listed-price">
                                                        $<?= number_format($sp['don_gia'], 2) ?>
                                                    </span>
                                                <?php
                                                    }
                                                ?>
                                            </p>
                                            <p style="font-size: 2rem;">$<?php echo $subtotal; ?></p>
                                        </div>
                                    </div>
                                </form>
                            <?php
                            endforeach;
                            ?>
                        </div>
                    </div>
                </div>
                <div class="payment-sumary">
                    <h3>ORDER SUMARY</h3>
                    <div class="subtotal">
                        <span>Subtotal</span>
                        <span>$<?php echo $total ?></span>
                    </div>
                    <div class="delivery">
                        <span>Estimated Delivery & Handling
                        </span>
                        <span>FREE</span>
                    </div>
                    <div class="total">
                        <p>TOTAL
                            (inclusive of tax 370,370₫)</p>
                        <p>
                            $<?php echo $total ?></p>
                    </div>
                </div>

            </div>
            <div class="payment-left">
            <?php

            
                $ma_kh = $_SESSION['user']['ma_kh'] ? $_SESSION['user']['ma_kh'] : '';
                $ten_kh = $_SESSION['user']['ho_ten'] ? $_SESSION['user']['ho_ten'] : '';
                $email = $_SESSION['user']['email'] ? $_SESSION['user']['email'] : '';
                ?>
                <form class="payment-form" action="">
                    <input type="hidden" name="ma_kh" value="<?php echo $ma_kh ?>">
                    <input type="hidden" name="ma_hh" value="<?php echo $ma_hh ?>">
                    <input type="hidden" name="total" value="<?php echo $total ?>">

                    <div class="form-group">
                        <label for="username">Name</label>
                        <input type="text" name="ho_ten" id="" class="form-control" value="<?php echo $ten_kh ?>" readonly>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="Email" name="email" id="" class="form-control" value="<?php echo $email ?>" required readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">Phone Number</label>
                        <input type="text" name="so_dien_thoai" id="" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="dia_chi" id="" rows="4" class="form-control address-form" required placeholder="Ex: Hai Chau, Da Nang..."></textarea>
                    </div>
                    <div class="form-group">
                        <label for="address">Note</label>
                        <textarea name="ghi_chu" id="" rows="9" class="form-control address-form"></textarea>
                    </div>
                    <input type="hidden" name="total" id="" value="<?= $total ?>">

                    <button class="payment-btn button" name="buy">
                        <div class="loader button__loader"></div>
                        <span>BUY</span>
                    </button>
                    <div class="vnpay button">
                        <a target="blank" href="../../vnpay_php/">Online Payment</a>
                    </div>
                </form>
            </div>
        </div>
        <!-- Toast -->

        <div class="toastzz">
            <div class="toast__content">
                <div class="toast__header">Order Success!</div>
                <div class="toast__sub-header">Please check the delivery time to receive the goods</div>
                <ul class="toast-back">
                    <li><a href="?trang-chu">Go to home</a></li>
                    <li><a href="?lich-su">View history</a></li>
                </ul>
            </div>
        </div>

    </div>
    <script>
        const paymentForm = document.querySelector('.payment-form'),
            paymentBtn = document.querySelector('.payment-form button')
        paymentForm.onsubmit = (e) => {
            e.preventDefault();
        }
        paymentBtn.onclick = () => {
            const xhr = new XMLHttpRequest(); // create new XML Object
            xhr.open("POST", "./gio-hang/thanh-toan.php?buy", true);
            xhr.onload = () => {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status == 200) {
                        let data = xhr.response;
                        if (data == "success") {
                            showSuccessToast(data, "Order Successfully")
                            success()
                        } else {
                            showErrorToast("Order Fail", data)
                        }
                    }
                }
            };
            let formData = new FormData(paymentForm); //create new formData
            xhr.send(formData); //send formData to PHP
        }

        function success() {
            const successScreen = document.querySelector('.success-screen');
            const toastHeader = document.querySelector('.success-screen__header');
            const toast = document.querySelector('.toastzz');
            const button = document.querySelector('.button');
            simulateLoad();
            // button.addEventListener('click', );
            button.addEventListener('touchend', simulateLoad);

            function simulateLoad() {
                button.classList.add('button--loading');
                button.disabled = true;
                button.querySelector('span').innerHTML = 'Loading...';
                setTimeout(showSuccessScreen, 2000);
            }

            function showSuccessScreen() {
                button.classList.add('button--hide');
                successScreen.classList.add('success-screen--show');
                Confetti.render();

                setTimeout(() => {
                    toastHeader.classList.add('success-screen__header--show');
                }, 500)

                setTimeout(() => {
                    toast.classList.add('toast--show');
                }, 2000)
            }

            const Confetti = (function() {
                const confettiContainer = document.querySelector('.confetti-container');
                const animationSpeeds = ['slow', 'medium', 'fast'];
                const types = ['round', 'rectangle'];
                let renderInterval = null;

                function render() {
                    renderInterval = setInterval(() => {
                        const particle = document.createElement('div');

                        const particleType = types[Math.floor(Math.random() * types.length)];
                        const particleLeft = (Math.floor(Math.random() * confettiContainer.offsetWidth)) + 'px';
                        const particleAnimation = animationSpeeds[Math.floor(Math.random() * animationSpeeds.length)];

                        particle.classList.add(
                            'confetti__particle',
                            `confetti__particle--animation-${particleAnimation}`,
                            `confetti__particle--${particleType}`
                        );
                        particle.style.left = particleLeft;
                        particle.style.webkitTransform = `rotate(${Math.floor(Math.random() * 360)}deg)`;

                        particle.removeTimeout = setTimeout(function() {
                            particle.parentNode.removeChild(particle);
                        }, 15000);

                        confettiContainer.appendChild(particle);
                    }, 300);
                }

                return {
                    render
                }
            })();
        }
    </script>
</body>

</html>