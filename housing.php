<?php

include 'db.php';


$d_country = $_GET['d_country'];

$d_city = $_GET['d_city'];

$a_country = $_GET['a_country'];

$a_city = $_GET['a_city'];

$d_day = $_GET['d_day'];

$d_month = $_GET['d_month'];

$d_year = $_GET['d_year'];

$a_day = $_GET['a_day'];

$a_month = $_GET['a_month'];

$a_year = $_GET['a_year'];

$t_budget = $_GET['t_budget'];

$housing1 = $_GET['housing1'];
$housing2 = $_GET['housing2'];

$h_budget = $_GET['h_budget'];

$entertainment1 = $_GET['entertainment1'];
$entertainment2 = $_GET['entertainment2'];
$entertainment3 = $_GET['entertainment3'];
$entertainment4 = $_GET['entertainment4'];
$entertainment5 = $_GET['entertainment5'];
$entertainment6 = $_GET['entertainment6'];
$entertainment7 = $_GET['entertainment7'];
$entertainment8 = $_GET['entertainment8'];

$e_budget = $_GET['e_budget'];

$guide_yes = $_GET['guide_yes'];
$guide_no = $_GET['guide_no'];

$g_budget = $_GET['g_budget'];



$houses = $db->query("SELECT * FROM housing h, housing_types h_t, countries co, cities ci 
WHERE (h_t.type_name = '$housing1' or h_t.type_name = '$housing2')
and h.type_id = h_t.id and co.country_name = '$a_country' and ci.city_name = '$a_city' 
and h.price < $h_budget/($a_day-$d_day) and co.id = ci.country_id and h.country_id = co.id and h.city_id = ci.id");
$houses->setFetchMode(PDO::FETCH_ASSOC);
$house = $houses->fetchAll();


?>


<?php foreach ($house as $item): ?>
<div class="item">
        <img style="max-width:300px; height: 200px; margin: 40px" src="images/<?php echo $item["image"]; ?>">
        <div class = "info">
            <p >
                <?php echo $item["info"]; ?>
            </p>

            <p style="margin-top: 10px;">
                <b>Адрес: </b><?php echo $item["address"]; ?>
            </p>
            <p style="color:#316aaa; font: bold 16px 'PT Serif'; margin-top: 15px">
                Цена за 1 ночь: <?php echo $item["price"]; ?> тенге
            </p>

            <?php if(isset($_SESSION["user"])) : ?>
                <form method="post">
                    <button type="submit" name="buy" style="margin-left: 250px;">
                        Купить
                    </button>
                </form>


            <?php
            $housing_id = $item["housing_id"];
            $user_id = $_SESSION['user'];

            if(isset($_POST["buy"])) {

                $db->query("
                INSERT INTO basket_housing(user_id, housing_id)
                VALUES($user_id, $housing_id)
                ");
                header("Location: result.php?p=housing&d_country=$d_country&d_city=$d_city&a_country=$a_country&a_city=$a_city&d_day=$d_day&d_month=$d_month&d_year=$d_year&a_day=$a_day&a_month=$a_month&a_year=$a_year&t_budget=$t_budget&housing1=$housing1&housing2=$housing2&h_budget=$h_budget&entertainment1=$entertainment1&entertainment2=$entertainment2&entertainment3=$entertainment3&entertainment4=$entertainment4&entertainment5=$entertainment5&entertainment6=$entertainment6&entertainment7=$entertainment7&entertainment8=$entertainment8&e_budget=$e_budget&guide_yes=$guide_yes&guide_no=$guide_no&g_budget=$g_budget");

            }

            ?>

            <?php

            endif; ?>
        </div>
</div>
<?php endforeach; ?>
