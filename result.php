<?php
include 'db.php';

$page = 'ticket';

    if(isset($_GET['p'])) {
        if ($_GET['p'] == 'ticket') {
            $page = 'ticket';
        }
        if ($_GET['p'] == 'housing') {
            $page = 'housing';

        }
        if ($_GET['p'] == 'entert') {
            $page = 'entert';
        }
        if ($_GET['p'] == 'guide') {
            $page = 'guide';
        }
    }


if($_SERVER['REQUEST_METHOD'] == 'GET') {
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

}


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
<div class="paragraphs_top">
<span>
<a href="?p=ticket&d_country=<?php echo $d_country; ?>&d_city=<?php echo $d_city;?>&a_country=<?php echo $a_country; ?>&a_city=<?php echo $a_city;?>&d_day=<?php echo $d_day; ?>&d_month=<?php echo $d_month;?>&d_year=<?php echo $d_year;?>&a_day=<?php echo $a_day; ?>&a_month=<?php echo $a_month;?>&a_year=<?php echo $a_year;?>&t_budget=<?php echo $t_budget; ?>&housing1=<?php echo $housing1; ?>&housing2=<?php echo $housing2; ?>&h_budget=<?php echo $h_budget; ?>&entertainment1=<?php echo $entertainment1; ?>&entertainment2=<?php echo $entertainment2; ?>&entertainment3=<?php echo $entertainment3; ?>&entertainment4=<?php echo $entertainment4; ?>&entertainment5=<?php echo $entertainment5; ?>&entertainment6=<?php echo $entertainment6; ?>&entertainment7=<?php echo $entertainment7; ?>&entertainment8=<?php echo $entertainment8; ?>&e_budget=<?php echo $e_budget; ?>&guide_yes=<?php echo $guide_yes; ?>&guide_no=<?php echo $guide_no; ?>&g_budget=<?php echo $g_budget; ?>">Билеты</a>
<a href="?p=housing&d_country=<?php echo $d_country; ?>&d_city=<?php echo $d_city;?>&a_country=<?php echo $a_country; ?>&a_city=<?php echo $a_city;?>&d_day=<?php echo $d_day; ?>&d_month=<?php echo $d_month;?>&d_year=<?php echo $d_year;?>&a_day=<?php echo $a_day; ?>&a_month=<?php echo $a_month;?>&a_year=<?php echo $a_year;?>&t_budget=<?php echo $t_budget; ?>&housing1=<?php echo $housing1; ?>&housing2=<?php echo $housing2; ?>&h_budget=<?php echo $h_budget; ?>&entertainment1=<?php echo $entertainment1; ?>&entertainment2=<?php echo $entertainment2; ?>&entertainment3=<?php echo $entertainment3; ?>&entertainment4=<?php echo $entertainment4; ?>&entertainment5=<?php echo $entertainment5; ?>&entertainment6=<?php echo $entertainment6; ?>&entertainment7=<?php echo $entertainment7; ?>&entertainment8=<?php echo $entertainment8; ?>&e_budget=<?php echo $e_budget; ?>&guide_yes=<?php echo $guide_yes; ?>&guide_no=<?php echo $guide_no; ?>&g_budget=<?php echo $g_budget; ?>">Жилье</a>
<a href="?p=entert&d_country=<?php echo $d_country; ?>&d_city=<?php echo $d_city;?>&a_country=<?php echo $a_country; ?>&a_city=<?php echo $a_city;?>&d_day=<?php echo $d_day; ?>&d_month=<?php echo $d_month;?>&d_year=<?php echo $d_year;?>&a_day=<?php echo $a_day; ?>&a_month=<?php echo $a_month;?>&a_year=<?php echo $a_year;?>&t_budget=<?php echo $t_budget; ?>&housing1=<?php echo $housing1; ?>&housing2=<?php echo $housing2; ?>&h_budget=<?php echo $h_budget; ?>&entertainment1=<?php echo $entertainment1; ?>&entertainment2=<?php echo $entertainment2; ?>&entertainment3=<?php echo $entertainment3; ?>&entertainment4=<?php echo $entertainment4; ?>&entertainment5=<?php echo $entertainment5; ?>&entertainment6=<?php echo $entertainment6; ?>&entertainment7=<?php echo $entertainment7; ?>&entertainment8=<?php echo $entertainment8; ?>&e_budget=<?php echo $e_budget; ?>&guide_yes=<?php echo $guide_yes; ?>&guide_no=<?php echo $guide_no; ?>&g_budget=<?php echo $g_budget; ?>">Развлечение</a>
<a href="?p=guide&d_country=<?php echo $d_country; ?>&d_city=<?php echo $d_city;?>&a_country=<?php echo $a_country; ?>&a_city=<?php echo $a_city;?>&d_day=<?php echo $d_day; ?>&d_month=<?php echo $d_month;?>&d_year=<?php echo $d_year;?>&a_day=<?php echo $a_day; ?>&a_month=<?php echo $a_month;?>&a_year=<?php echo $a_year;?>&t_budget=<?php echo $t_budget; ?>&housing1=<?php echo $housing1; ?>&housing2=<?php echo $housing2; ?>&h_budget=<?php echo $h_budget; ?>&entertainment1=<?php echo $entertainment1; ?>&entertainment2=<?php echo $entertainment2; ?>&entertainment3=<?php echo $entertainment3; ?>&entertainment4=<?php echo $entertainment4; ?>&entertainment5=<?php echo $entertainment5; ?>&entertainment6=<?php echo $entertainment6; ?>&entertainment7=<?php echo $entertainment7; ?>&entertainment8=<?php echo $entertainment8; ?>&e_budget=<?php echo $e_budget; ?>&guide_yes=<?php echo $guide_yes; ?>&guide_no=<?php echo $guide_no; ?>&g_budget=<?php echo $g_budget; ?>">Гиды</a>
</span>
</div>
    <div class="wrapper">

                <?php
                    include $page.'.php';
                    ?>


    </div>

</div>
<?php  include "include/footer.php";  ?>

</body>


</html>

