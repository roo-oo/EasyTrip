<?php

//Connection to DB
include 'db.php';
$email = false;
$first_name = false;
$last_name = false;
$error = false;

//IS BUTTON
if(isset($_POST["submit"])){

    //TAKE DATA
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $email = $_POST["email"];
    $password = md5($_POST["password"]);


    $statement = $db->query("SELECT count(id) FROM users WHERE email = '$email'");
    $statement->setFetchMode(PDO::FETCH_NUM);
    $user = $statement->fetch();

    if(intval($user[0]) == 0){
        $db->query("
			INSERT INTO users(first_name, last_name, email, password)
			VALUES('$first_name','$last_name', '$email','$password')
		");



        //QUERY TO DB
        $statement = $db->query("SELECT * FROM users WHERE email = '$email' AND password = '$password'");


        $statement->setFetchMode(PDO::FETCH_ASSOC);

        //CREATE SESSION
        $user = $statement->fetch();


        $_SESSION["user"] = $user["id"];
        $_SESSION["first_name"] = $user["first_name"];
        header("Location: index.php");
    }
    else{
        $error = "Пользователь с таким именем уже существует!";
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
    <h1>Регистрация</h1>
    <p style="color:red;text-align: center;"><b><?php echo $error; ?></b></p>
    <form method="POST">
        <input type="text" name="first_name" placeholder="Имя" value="<?php echo $first_name; ?>" required>
        <input type="text" name="last_name" placeholder="Фамилия" value="<?php echo $last_name; ?>" required>
        <input type="text" name="email" placeholder="email" value="<?php echo $email; ?>" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit" name="submit">Зарегистрироваться</button>
    </form>
</div>

<?php include "include/footer.php"; ?>
</body>
</html>