<div id="header">

    <div class="wrapper">

        <img src="images/e98eb3e77c4c0554163e6d3d17688cd5.png">
        <a href="index.php" id="logo">EasyTrip</a>

        <div id="top-user">
            <?php if(isset($_SESSION["user"])) : ?>



                <span class="header_span">
					<a href="profile.php">Привет, <?php echo $_SESSION["first_name"];?>!</a>
                </span>
                <span class="header_span">
					<a href="basket.php">Корзина</a>
                </span>

                <span class="header_span">
					<a href="logout.php">Выход</a>
				</span>


            <?php else: ?>
                <a href="login.php">Вход</a>
            <br>
                <a href="registration.php">Регистрация</a>
            <?php endif; ?>

        </div>

        <div style="clear: both;"></div>

    </div>

</div>