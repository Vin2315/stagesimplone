<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./css/styless.css">
    <title>Login</title>
</head>

<body>

    <div class="container">
        <h1 class="titre">Login</h1>
        <hr class="border">

        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" class="formulaire" name="login">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i> <input type="text" name="utilisateur" class="utilisateur inputlong" placeholder="Utilisateur">
            </div>


            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i> <input type="password" name="password" class="password_btn" placeholder="Votre password">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>


            <?php if (!empty($error)) : ?>
                <div class="error">
                    <ul>
                        <?php echo $error; ?>
                    </ul>
                </div>
            <?php endif; ?>

        </form>


        <p class="texto-registrate">
            Vous n'avez pas de compte?
            <a href="register.php">Démarrer la session</a>
        </p>

    </div>

</body>

</html>