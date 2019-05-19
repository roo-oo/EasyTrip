<?php
include 'db.php';

if(isset($_POST["main_button"])) {

    header("Location: result.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Easy Trip</title>

    <?php  include "include/head.php";  ?>

</head>

<div>

    <?php  include "include/header.php";  ?>



    <div id="choice">
        <div class = "input_filter">
            <form method="post">
                <a>Вылет:</a>
                <input type="text" name="d_country" placeholder="Страна вылета" required>
                <input type="text" name="d_city" placeholder="Город вылета" required>
            </form>
        </div>
        <div class = "input_filter">
            <form method="post">
                <a>Прибытие:</a>
                <input type="text" name="a_country" placeholder="Страна прибытия" required>
                <input type="text" name="a_city" placeholder="Город прибытия" required>
            </form>
        </div>
        <div class="date">
            <form method="post">
                <a>Туда:</a>
                <input type="number" name="d_day" placeholder="День" min="1" max="31" required>
                <input type="number" name="d_month" placeholder="Месяц" min="11" max="12" required>
                <input type="number" name="d_year" placeholder="Год" min="2019" max="2030" required>
            </form>
        </div>
        <div class="date">
            <form method="post">
                <a>Обратно:</a>
                <input type="number" name="b_day" placeholder="День" min="1" max="31" required>
                <input type="number" name="b_month" placeholder="Месяц" min="11" max="12" required>
                <input type="number" name="b_year" placeholder="Год" min="2019" max="2030" required>
            </form>
        </div>

        <div class="budget">
            <form method="post">
                <input type="number" name="t_budget" placeholder="Бюджет на билеты" min="1" required>
                <a>тенге</a>
            </form>
        </div>

        <div class="checkbox_filter">
            <a>Жилье:</a><br>
            <form method="post">
                <label><input type="checkbox" name="housing"> Хостел</label><br>
                <label><input type="checkbox" name="housing"> Гостиница</label><br>
            </form>
            <div class="checkbox_budget"">
            <form method="post">
                <input type="number" name="h_budget" placeholder="Бюджет на жилье" min="1" required>
                <a>тенге</a>
            </form></div>
    </div>


    <div class="checkbox_filter" style="width: 250px !important;">
        <a>Развлечения:</a><br>
        <form method="post">
            <input type="checkbox" name="entertainment"><label>Музей</label><br>
            <input type="checkbox" name="entertainment"><label>Театр</label><br>
            <input type="checkbox" name="entertainment"><label>Кино</label><br>
            <input type="checkbox" name="entertainment"><label>Спорт</label><br>
            <input type="checkbox" name="entertainment"><label>Клубы</label><br>
            <input type="checkbox" name="entertainment"><label>Парки</label><br>
            <input type="checkbox" name="entertainment"><label>Достопримечательности</label><br>
            <input type="checkbox" name="entertainment"><label>Концерты</label><br>
        </form>
        <div class="checkbox_budget"">
        <form method="post">
            <input type="number" name=e_budget" placeholder="Бюджет на развлечения" min="1" required>
            <a>тенге</a>
        </form></div>
</div>


<div class="checkbox_filter" ">
<a>Гид:</a><br>
<form method="post">
    <input type="radio" name="contact"><label>Да</label><br>
    <input type="radio" name="contact"><label>Нет</label><br>

</form>
<div class="checkbox_budget"">
<form method="post">
    <input type="number" name="g_budget" placeholder="Бюджет на гида" min="1" required>
    <a>тенге</a>
</form></div>
</div>

<div id="submit">
    <form method="post">
        <button type="submit" name="main_button">В путь</button>
    </form>
</div>

</div>

<?php  include "include/footer.php";  ?>

</body>


</html>