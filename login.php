<?php

//Connection to DB
include 'db.php';
$email = false;
$error = false;
//IS BUTTON
if(isset($_POST["submit"])){

	//TAKE DATA
	$email = $_POST["email"];
	$password = md5($_POST["password"]);


	//QUERY TO DB
	$statement = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");

	$statement->setFetchMode(PDO::FETCH_ASSOC);

	//CREATE SESSION
	$user = $statement->fetch();
	if($user){
		$_SESSION["user"] = $user["id"];
        $_SESSION["first_name"] = $user["first_name"];
		$_SESSION["last_name"] = $user["last_name"];
		header("Location: index.php");
	}
	else{
		$error = "Неверный Email и пароль";
	}

}
?>



<!DOCTYPE html>
<html>
<head>
    <?php include "include/head.php"; ?>
    <title>Вход</title>
</head>
<body>


<?php include "include/header.php"; ?>




<div class="form">
    <h1>Вход</h1>
    <p style="color:red"><b><?php echo $error; ?></b></p>
    <form method="POST">
        <input type="text" name="email" placeholder="Email" value="" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit" name="submit">Вход</button>
    </form>
</div>

<?php include "include/footer.php"; ?>
</body>
</html>