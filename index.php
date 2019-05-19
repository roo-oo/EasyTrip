<?php
include 'db.php';

if(isset($_POST["submit"])) {

    header("Location: result.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Easy Trip</title>

    <?php  include "include/head.php";  ?>

</head>
<body>
<div>

    <?php  include "include/header.php";  ?>


    <form method="get" action="result.php">
    <div id="choice">

        <div class = "input_filter">
                <a>Вылет:</a>
                <input type="text" name="d_country" placeholder="Страна вылета" value="Казахстан">
                <input type="text" name="d_city" placeholder="Город вылета" value="Алматы">

        </div>
        <div class = "input_filter">

                <a>Прибытие:</a>
                <input type="text" name="a_country" placeholder="Страна прибытия" value="Турция">
                <input type="text" name="a_city" placeholder="Город прибытия" value="Стамбул">

        </div>
        <div class="date">

                <a>Туда:</a>
                <input type="number" name="d_day" placeholder="День" min="1" max="31">
                <input type="number" name="d_month" placeholder="Месяц" min="1" max="12" >
                <input type="number" name="d_year" placeholder="Год" min="2019" max="2030" >

        </div>
        <div class="date">

                <a>Обратно:</a>
                <input type="number" name="a_day" placeholder="День" min="1" max="31" >
                <input type="number" name="a_month" placeholder="Месяц" min="1" max="12">
                <input type="number" name="a_year" placeholder="Год" min="2019" max="2030" >

        </div>

        <div class="budget">

                <input type="number" name="t_budget" placeholder="Бюджет на билеты" min="1" >
                <a>тенге</a>

        </div>

        <div class="checkbox_filter">
            <a>Жилье:</a><br>

                <label><input type="checkbox" name="housing1" value="Хостел"> Хостел</label><br>
                <label><input type="checkbox" name="housing2" value="Гостиница"> Гостиница</label><br>

            <div class="checkbox_budget">

                <input type="number" name="h_budget" placeholder="Бюджет на жилье" min="1">
                <a>тенге</a>

        </div>
    </div>


    <div class="checkbox_filter" style="width: 250px !important;">
        <a>Развлечения:</a><br>

            <input type="checkbox" name="entertainment1" value="Музей"><label>Музей</label><br>
            <input type="checkbox" name="entertainment2" value="Театр"><label>Театр</label><br>
            <input type="checkbox" name="entertainment3" value="Кино"><label>Кино</label><br>
            <input type="checkbox" name="entertainment4" value="Спорт"><label>Спорт</label><br>
            <input type="checkbox" name="entertainment5" value="Клубы"><label>Клубы</label><br>
            <input type="checkbox" name="entertainment6" value="Парки"><label>Парки</label><br>
            <input type="checkbox" name="entertainment7" value="Достопримечательности"><label>Достопримечательности</label><br>
            <input type="checkbox" name="entertainment8" value="Концерты"><label>Концерты</label><br>

        <div class="checkbox_budget">

            <input type="number" name="e_budget" placeholder="Бюджет на развлечения" min="1" >
            <a>тенге</a>
        </div>
</div>


<div class="checkbox_filter">
    <a>Гид:</a><br>

        <input type="radio" name="guide_yes"><label>Да</label><br>
        <input type="radio" name="guide_no"><label>Нет</label><br>

    <div class="checkbox_budget">

        <input type="number" name="g_budget" placeholder="Бюджет на гида" min="1">
        <a>тенге</a>

    </div>
</div>

<div id="submit">
    <button type="submit" name="submit">В путь</button>
</div>

    </div> </form>
</div>

<?php  include "include/footer.php";  ?>

</body>


</html>