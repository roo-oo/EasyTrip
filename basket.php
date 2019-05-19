<?php
include 'db.php';
$user_id = $_SESSION['user'];

$tickets = $db->query("SELECT * FROM tickets t, airlines a, flight_classes f, countries co, cities ci, basket_ticket b
WHERE t.arrival_country = co.id AND t.arrival_city = ci.id AND t.airline_id = a.id
AND t.class_id = f.id AND ci.country_id = co.id AND b.user_id = $user_id AND b.ticket_id = t.ticket_id" );
$tickets->setFetchMode(PDO::FETCH_ASSOC);
$ticket = $tickets->fetchAll();


$houses = $db->query("SELECT * FROM housing h, housing_types h_t, countries co, cities ci, basket_housing b
        WHERE h.type_id = h_t.id and co.id = ci.country_id and h.country_id = co.id and h.city_id = ci.id 
        AND b.user_id = $user_id AND b.housing_id = h.housing_id");
$houses->setFetchMode(PDO::FETCH_ASSOC);
$house = $houses->fetchAll();

$enterts = $db->query("SELECT * FROM entertainments e, entertainment_types e_t, countries co, cities ci, basket_entertainment b
WHERE e.type_id = e_t.id AND e.country_id = co.id AND e.city_id = ci.id
AND ci.country_id = co.id AND b.user_id = $user_id AND b.entertainment_id = e.entertainment_id");
$enterts->setFetchMode(PDO::FETCH_ASSOC);
$entert = $enterts->fetchAll();


$guides = $db->query("SELECT *, YEAR(CURRENT_TIMESTAMP)-g.birth_year age FROM guides g, countries co, cities ci, basket_guide b
WHERE co.id = ci.country_id and g.country_id = co.id and g.city_id = ci.id 
AND b.user_id = $user_id AND g.guide_id = g.guide_id");
$guides->setFetchMode(PDO::FETCH_ASSOC);
$g = $guides->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Easy Trip</title>

    <?php  include "include/head.php";  ?>

</head>

<body>
<?php  include "include/header.php";  ?>


<div class="paragraphs">
    <div class="wrapper" style="padding-top: 15px;">

        <?php foreach ($ticket as $item): ?>
        <div class="item" style="width: 70% !important; height: auto !important; margin: auto;">
            <div style="width: 100%; height: 150px; background-color: #e4e6ea; border-radius: 10px; margin: 20px auto;">
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

                    <form method="post">
                        <button type="submit" name="delete_ticket" style="margin-left: 250px;">
                            Удалить
                        </button>
                    </form>


                    <?php
                    $ticket_id = $item["ticket_id"];
                    $ticket_price = $item["price"];
                    if(isset($_POST["delete_ticket"])) {
                        $db->query("DELETE FROM basket_ticket WHERE user_id = $user_id AND ticket_id = $ticket_id");

                        header("Location: basket.php");

                    }

                    ?>

                </div>
            </div>
        </div>
        <?php endforeach; ?>

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


                        <form method="post">
                            <button type="submit" name="delete_housing" style="margin-left: 250px;">
                                Удалить
                            </button>
                        </form>


                        <?php
                            $housing_id = $item["housing_id"];
                        $housing_price = $item["price"];
                        if(isset($_POST["delete_housing"])) {
                            $db->query("DELETE FROM basket_housing WHERE user_id = $user_id AND housing_id = $housing_id");

                            header("Location: basket.php");

                        }

                        ?>

                </div>
            </div>
        <?php endforeach; ?>


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

                    <form method="post">
                        <button type="submit" name="delete_entertainment" style="margin-left: 250px;">
                            Удалить
                        </button>
                    </form>


                    <?php
                    $entertainment_id = $item["entertainment_id"];
                    $entertainment_price = $item["price"];
                    if(isset($_POST["delete_entertainment"])) {
                        $db->query("DELETE FROM basket_entertainment WHERE user_id = $user_id AND entertainment_id = $entertainment_id");

                        header("Location: basket.php");

                    }

                    ?>

                </div>
            </div>
        <?php endforeach; ?>



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


                    <form method="post">
                        <button type="submit" name="delete_guide" style="margin-left: 250px;">
                            Удалить
                        </button>
                    </form>


                    <?php
                    $guide_id = $item["guide_id"];
                    $guide_price = $item["price"];
                    if(isset($_POST["delete_guide"])) {
                        $db->query("DELETE FROM basket_guide WHERE user_id = $user_id AND guide_id = $guide_id");

                        header("Location: basket.php");

                    }

                    ?>


                </div>
            </div>
        <?php endforeach; ?>


    </div>

        <button onclick="myFunction()" style="margin-left: 650px; width: 150px !important; height: 60px; font-size: 16px;">
            Сумма: <?php echo $ticket_price + $housing_price + $entertainment_price + $guide_price ?>
        </button>

    <script>
        function myFunction() {
            alert("Успешная покупка! Хорошего отдыха :)");
        }
    </script>


</div>
<?php  include "include/footer.php";  ?>

</body>


</html>

