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
$user_id = $_SESSION['user'];

$tickets = $db->query("SELECT * FROM tickets t, airlines a, flight_classes f, countries co, cities ci
WHERE t.arrival_country = co.id AND t.arrival_city = ci.id AND t.airline_id = a.id
AND t.class_id = f.id AND ci.country_id = co.id AND t.price < $t_budget AND co.country_name = '$a_country' AND ci.city_name = '$a_city'");
$tickets->setFetchMode(PDO::FETCH_ASSOC);
$ticket = $tickets->fetchAll();


?>



<?php foreach ($ticket as $item): ?>
    <div style="width: 70%; height: 200px; background-color: #e4e6ea; border-radius: 10px; margin: 40px auto;">
        <img style="max-width:100px; height: 50px; margin: 40px" src="images/<?php echo $item["logo_image"]; ?>">
        <div class = "info" style="height: 100px !important;">
            <p style="font: bold 16px 'PT Serif'">
                 <?php echo $item["city_name"]; ?>  - <?php echo $d_city; ?>

            </p>

            <p style="margin-top: 10px;">
                <b>Класс: </b><?php echo $item["class_name"]; ?>

            </p>
            <p style="margin-top: 10px;">
                <b>Время: </b><?php echo $item["day"]; ?>.<?php echo $item["month"]; ?>.<?php echo $item["year"];?>
                <br>
                <?php echo $item["time"]; ?>
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

            endif; ?>

            <?php
            $ticket_id = $item["ticket_id"];


            if(isset($_POST["buy"])) {

                $db->query("
                INSERT INTO basket_ticket(user_id, ticket_id)
                VALUES($user_id, $ticket_id)
                ");
                header("Location: result.php?p=ticket&d_country=$d_country&d_city=$d_city&a_country=$a_country&a_city=$a_city&d_day=$d_day&d_month=$d_month&d_year=$d_year&a_day=$a_day&a_month=$a_month&a_year=$a_year&t_budget=$t_budget&housing1=$housing1&housing2=$housing2&h_budget=$h_budget&entertainment1=$entertainment1&entertainment2=$entertainment2&entertainment3=$entertainment3&entertainment4=$entertainment4&entertainment5=$entertainment5&entertainment6=$entertainment6&entertainment7=$entertainment7&entertainment8=$entertainment8&e_budget=$e_budget&guide_yes=$guide_yes&guide_no=$guide_no&g_budget=$g_budget");

            }

            ?>


        </div>
    </div>
<?php endforeach; ?>
