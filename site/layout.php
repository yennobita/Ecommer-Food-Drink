<style>
    .text-logo {
        color: #3CB815 ;
    }
    .text-logo2 {
        color: #f65005;
    }

</style>

<main>
    <header>
    <a href="./index.php" class="navbar-brand ms-4 ms-lg-0">
          <h1 class="fw-bold text-logo  m-0">
            F<span class="text-logo2">oo</span>dy
          </h1>
        </a>
        <?php require '../layout/nav.php' ?>
        <?php require '../layout/dang-nhap.php' ?>
    </header>

    <?php require '../layout/notification.php' ?>
    <div class="content">
        <?php require $VIEW_NAME; ?>
    </div>
    <?php require '../layout/footer.php' ?>
</main>