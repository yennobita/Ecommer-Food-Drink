<?php
function hang_hoa_select_top10()
{
    $sql = "SELECT * FROM hang_hoa
WHERE so_luot_xem > 0
ORDER BY so_luot_xem DESC LIMIT 0, 6";
    return pdo_query($sql);
}
?>
<div class="prod-list carousel-list">
    <?php
    require_once '../../dao/hang-hoa.php'; //require_once => chỉ nhập tệp tin một lần duy nhất, ngay cả khi nó được gọi nhiều lần trong mã.
    $hh_array = hang_hoa_select_top10();
    foreach ($hh_array as $hh) {
        extract($hh)
    ?>
        <div class="prod-item carousel-items">
            <a href="?chi-tiet&ma_hh=<?= $ma_hh ?>">
                <div class="prod-image">
                    <img src="<?= $CONTENT_URL ?>/images/products/<?= $hinh ?>" />
                    <?php
                    if ($giam_gia > 0) {
                    ?>
                        <div class="prod-sale">
                            <span>
                                -<?= $giam_gia ?>%
                            </span>
                        </div>
                    <?php
                    } ?>
                </div>
                <div class="prod-content">
                    <div class="prod-info">
                        <h2 class="prod-title"><?= $ten_hh ?></h2>
                        <p class="prod-price">
                            <?php
                            if ($giam_gia > 0) {
                            ?>
                                <span class="listed-price">
                                    <del>
                                        $<?= number_format($don_gia, 2) ?>
                                    </del>
                                    <i>$<?= number_format($don_gia - (($don_gia * $giam_gia) / 100), 2) ?></i>
                                </span>
                            <?php
                            } else {
                            ?>
                                <span class="listed-price">
                                    $<?= number_format($don_gia, 2) ?>
                                </span>
                            <?php
                            }
                            ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
    <?php
    }
    ?>
</div>

<div class="carousel-btn">
    <div class="carou-left-icon">
        <i class="fa-solid fa-chevron-left"></i>
    </div>
    <div class="carou-right-icon">
        <i class="fa-solid fa-chevron-right"></i>
    </div>
</div>

<script>
    document.querySelector('.carou-right-icon').onclick = carouNext;
    document.querySelector('.carou-left-icon').onclick = carouPrev;

    function carouNext() {
        let carouList = document.querySelectorAll('.carousel-items')
        document.querySelector('.carousel-list').appendChild(carouList[0]);
    }

    function carouPrev() {
        let carouList = document.querySelectorAll('.carousel-items')
        document.querySelector('.carousel-list').prepend(carouList[carouList.length - 1]);
    }

    setInterval(carouNext, 4000)
</script>