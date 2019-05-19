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



$guides = $db->query("SELECT *, YEAR(CURRENT_TIMESTAMP)-g.birth_year age FROM guides g, countries co, cities ci 
WHERE co.country_name = '$a_country' and ci.city_name = '$a_city' 
and g.price < $g_budget and co.id = ci.country_id and g.country_id = co.id and g.city_id = ci.id");
$guides->setFetchMode(PDO::FETCH_ASSOC);
$g = $guides->fetchAll();


?>

<?php if($guide_yes == on): ?>
<?php foreach ($g as $item): ?>
    <div class="item">
        <img style="max-width:300px; height: 200px; margin: 40px" src="images/<?php echo $item["image"]; ?>">
        <div class = "info">

            <p style="margin-top: 10px; font: bold 16px 'PT Serif';">
                <b><?php echo $item["name"]; ?></b>
            </p>
            <p style="margin-top: 10px;">
                <b>Возраст: </b><?php echo $item["age"]; ?>
            </p>
            <p >
                <?php echo $item["info"]; ?>
            </p>

            <p style="color:#316aaa; font: bold 16px 'PT Serif'; margin-top: 15px">
                Цена за экскурсию: <?php echo $item["price"]; ?> тенге
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
            $guide_id = $item["guide_id"];
            $user_id = $_SESSION['user'];

            if(isset($_POST["buy"])) {

                $db->query("
                INSERT INTO basket_guide(user_id, guide_id)
                VALUES($user_id, $guide_id)
                ");
                header("Location: result.php?p=guide&d_country=$d_country&d_city=$d_city&a_country=$a_country&a_city=$a_city&d_day=$d_day&d_month=$d_month&d_year=$d_year&a_day=$a_day&a_month=$a_month&a_year=$a_year&t_budget=$t_budget&housing1=$housing1&housing2=$housing2&h_budget=$h_budget&entertainment1=$entertainment1&entertainment2=$entertainment2&entertainment3=$entertainment3&entertainment4=$entertainment4&entertainment5=$entertainment5&entertainment6=$entertainment6&entertainment7=$entertainment7&entertainment8=$entertainment8&e_budget=$e_budget&guide_yes=$guide_yes&guide_no=$guide_no&g_budget=$g_budget");

            }

            ?>


        </div>
    </div>
<?php endforeach; ?>
<?php endif; ?>