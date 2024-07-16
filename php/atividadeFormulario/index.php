<?php

    if(isset($_POST["cookie"])){
        header('Location: ./comCookie/form2.html');
    }else if(isset($_POST["session"])){
        header('Location: ./comSession/form.html');
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirecionador</title>
</head>
<body>
    <h1>Você quer fazer login com Cookie ou com Session?</h1>
    <form action="" method="post" style="display: flex; justify-content: center; ">
        <input type="submit" value="Cookie" name="cookie" style="width: 10em; height: 7em; margin: 0px 30px">
        <input type="submit" value="Session" name="session" style="width: 10em;">
    </form>
</body>
</html>

