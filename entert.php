
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



$enterts = $db->query("SELECT * FROM entertainments e, entertainment_types e_t, countries co, cities ci
WHERE e.type_id = e_t.id AND e.country_id = co.id AND e.city_id = ci.id
AND (e_t.type_name = '$entertainment1' or e_t.type_name = '$entertainment2' or e_t.type_name = '$entertainment3' or e_t.type_name = '$entertainment4' or e_t.type_name = '$entertainment5' or e_t.type_name = '$entertainment6' or e_t.type_name = '$entertainment7' or e_t.type_name = '$entertainment8') AND ci.country_id = co.id
AND co.country_name = '$a_country' AND ci.city_name = '$a_city' AND e.price < $e_budget");
$enterts->setFetchMode(PDO::FETCH_ASSOC);
$entert = $enterts->fetchAll();
?>





<?php foreach ($entert as $item): ?>
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
                Цена: <?php echo $item["price"]; ?> тенге
            </p>

            <?php if(isset($_SESSION["user"])) : ?>
                <form method="post">
                    <button type="submit" name="buy" style="margin-left: 250px;">
                        Купить
                    </button>
                </form>

            <?php
            $entertainment_id = $item["entertainment_id"];
            $user_id = $_SESSION['user'];

            if(isset($_POST["buy"])) {

                $db->query("
                INSERT INTO basket_entertainment(user_id, entertainment_id)
                VALUES($user_id, $entertainment_id)
                ");
                header("Location: result.php?p=entert&d_country=$d_country&d_city=$d_city&a_country=$a_country&a_city=$a_city&d_day=$d_day&d_month=$d_month&d_year=$d_year&a_day=$a_day&a_month=$a_month&a_year=$a_year&t_budget=$t_budget&housing1=$housing1&housing2=$housing2&h_budget=$h_budget&entertainment1=$entertainment1&entertainment2=$entertainment2&entertainment3=$entertainment3&entertainment4=$entertainment4&entertainment5=$entertainment5&entertainment6=$entertainment6&entertainment7=$entertainment7&entertainment8=$entertainment8&e_budget=$e_budget&guide_yes=$guide_yes&guide_no=$guide_no&g_budget=$g_budget");

            }

            ?>

            <?php

            endif; ?>

        </div>
    </div>
<?php endforeach; ?>
