<?php
// require '../../global.php';
// require '../../pdo.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/style.css">
    <link rel="stylesheet" href="<?= $CONTENT_URL ?>/css/gio-hang.css">
    <title>Cart</title>
    <style>
    </style>
</head>

<body>
    <div class="cart-container">
        <div class="row cart-contai">
            <div class="prod-list">
                <div class="row">
                    <?php
                    $cookie_data = isset($_COOKIE["cart"]) ? $_COOKIE['cart'] : '[]';
                    $cart_data = json_decode($cookie_data, true);
                    // var_dump($cart_data);
                    $total = 0;
                    if ($cart_data) {
                        foreach ($cart_data as $sp) :
                            $giam_gia = $sp['giam_gia'] ? $sp['giam_gia'] : 0;
                            $subtotal = ($sp['don_gia'] - (($sp['don_gia'] * $giam_gia) / 100)) * $sp['quantity'];
                            $total += $subtotal;
                    ?>
                            <form class="cart-prod-item" action="" method="POST">
                                <input type="hidden" name="ma_hh" value="<?php echo $sp['ma_hh']; ?>">
                                <input type="hidden" name="size" value="<?php echo $sp['size'] ?>">
                                <div class="row cart-item">
                                    <div class="prod-img">
                                        <img src="<?= $CONTENT_URL ?>/images/products/<?php echo $sp['hinh']; ?>" alt="">
                                    </div>
                                    <div class="prod-info">
                                        <p class="itemNumber">#QUE-007544-002</p>
                                        <h3>
                                            <?php echo $sp['ten_hh']; ?>
                                            <?php
                                            if ($giam_gia > 0) {
                                            ?>
                                                <div class="cart-prod-sale">
                                                    <span> 
                                                        -<?= $giam_gia ?>%
                                                    </span>
                                                </div>
                                            <?php
                                            } ?>
                                        </h3>
                                        <div class="size">SIZE: <span><?php echo (($sp['size']) ? $sp['size'] : ''); ?></span></div>
                                        <p style="display: flex; align-items: center;">
                                            <input class="quantityInp" type="number" name="quantity" class="qty product-qty" value='<?php echo $sp['quantity'] ?>' /> <span style="margin: 4px;">x</span> <span class="prod-price">
                                                <?php
                                                if ($giam_gia > 0) {
                                                ?>
                                                    <span class="">
                                                        <del>
                                                            $<?= number_format($sp['don_gia'], 2) ?>
                                                        </del>
                                                        <i>$<?= ($sp['don_gia'] - (($sp['don_gia'] * $sp['giam_gia']) / 100)) ?></i>
                                                    </span>
                                                <?php
                                                } else {
                                                ?>
                                                    <span class="">
                                                        <i>$<?= number_format($sp['don_gia'], 2) ?></i>
                                                    </span>
                                                <?php
                                                }
                                                ?>
                                            </span>
                                        </p>
                                    </div>
                                    <div class="prod-total">
                                        <p class="prod-subtotal">$<?php echo $subtotal; ?></p>
                                    </div>
                                    <div class="prod-action">
                                        <button class="delete-prod" name="delcart">x</button>
                                    </div>
                                </div>
                            </form>
                        <?php
                        endforeach;
                    } else {
                        ?>
                        <div class="cart-empty">
                            <div class="cart-icon"><i class="fa-solid fa-cart-shopping"></i></div>
                            <div class="cart-heading">Cart is Empty</div>
                            <a href="?san-pham">Continue Shopping</a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <div class="cart-checkout">
                <div class="cart-sumary">
                    <h3>ORDER SUMARY</h3>
                    <div class="subtotal">
                        <span>Subtotal</span>
                        <span class="cart-subtotal">$<?php echo $total ?></span>
                    </div>
                    <div class="delivery">
                        <span>Estimated Delivery & Handling
                        </span>
                        <span>FREE</span>
                    </div>
                    <div class="total">
                        <p>TOTAL
                            (inclusive of tax 370,370₫)</p>
                        <p class="cart-total">
                            $<?php echo $total ?>
                        </p>
                    </div>
                </div>
                <div class="checkout-btn">
                    <a href="?thanh-toan">
                        Checkout
                        <i class="fa-solid fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <script>
        const prodForms = document.querySelectorAll('.cart-prod-item')
        prodForms?.forEach(prod => {
            prod.onsubmit = (e) => {
                e.preventDefault();
            }

            // UPDATE QUANTITY IN CART
            prod.querySelector('.quantityInp').onchange = (e) => {
                if (e.target.value <= 0) {
                    prod.querySelector('.quantityInp').value === 1;
                } else {
                    const xhr = new XMLHttpRequest(); // create new XML Object
                    xhr.open("POST", "./gio-hang/gio-hang.php?updateqty", true);
                    xhr.onload = () => {
                        if (xhr.readyState === XMLHttpRequest.DONE) {
                            if (xhr.status == 200) {
                                let data = xhr.response;
                                let cartTotal = 0;
                                let result = Object.entries(JSON.parse(data))
                                result.map(rs => {
                                    cartTotal += (rs[1].don_gia - ((rs[1].don_gia * rs[1].giam_gia) / 100)) * rs[1].quantity;
                                })
                                let prodPrice = Number(prod.querySelector('.prod-price i').textContent.slice(1))

                                let prodSale = prod.querySelector('.prod-sale span')?.innerText?.slice(1).slice(0, -1) ?? 0;
                                prod.querySelector('.prod-subtotal').textContent = "$" + (new Intl.NumberFormat().format(((prodPrice - (prodPrice * prodSale) / 100) * e.target.value)))
                                document.querySelector('.total .cart-total').textContent = "$" + new Intl.NumberFormat().format(cartTotal)
                                document.querySelector('.subtotal .cart-subtotal').textContent = "$" + new Intl.NumberFormat().format(cartTotal)
                            }
                        }
                    };
                    let formData = new FormData(prod); //create new formData
                    xhr.send(formData); //send formData to PHP
                }
            }

            // DELETE PRODUCT IN CART
            prod.querySelector('.delete-prod').onclick = () => {
                const xhr = new XMLHttpRequest(); // create new XML Object
                xhr.open("POST", "./gio-hang/gio-hang.php?delcart", true);
                xhr.onload = () => {
                    if (xhr.readyState === XMLHttpRequest.DONE) {
                        if (xhr.status == 200) {
                            let data = xhr.response;
                            let cartTotal = 0;
                            let result = Object.entries(JSON.parse(data))
                            result.map(rs => {
                                cartTotal += (rs[1].don_gia - ((rs[1].don_gia * rs[1].giam_gia) / 100)) * rs[1].quantity;
                            })
                            document.querySelector('.total .cart-total').textContent = "$" + cartTotal
                            document.querySelector('.subtotal .cart-subtotal').textContent = "$" + cartTotal
                            prod.remove();
                        }
                    }
                };
                let formData = new FormData(prod); //create new formData
                xhr.send(formData); //send formData to PHP
            }
        })

        if (prodForms.length <= 0) {
            document.querySelector('.checkout-btn a').onclick = (e) => {
                e.preventDefault()
            }
        }
    </script>
</body>

</html>