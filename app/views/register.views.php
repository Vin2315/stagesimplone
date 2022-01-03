<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link href='https://fonts.googleapis.com/css?family=Raleway:400,300' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="./css/styless.css">
    <title>Registre</title>
</head>

<body>

    <div class="container">
        <h1 class="titre">Registre</h1>

        <hr class="border">

        <form class="formulaire" name="login" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i> <input type="text" name="utilisateur" class="utilisateur inputlong" placeholder="Utilisateur">
            </div>

            <div class="form-group">
                <i class="icono izquierda fa fa-user"></i> <input type="text" name="mail" class="mail inputlong" placeholder="Email">
            </div>

            <div class="form-group inputlong">
                <i class="icono izquierda fa fa-lock"></i> <input type="password" name="password" class="password inputlong" placeholder="Password">
            </div>

            <div class="form-group">
                <i class="icono izquierda fa fa-lock"></i> <input type="password" name="password2" class="password_btn" placeholder="Repete Votre password">
                <i class="submit-btn fa fa-arrow-right" onclick="login.submit()"></i>
            </div>


            <!-- El condicional if y pregunto si no esta bacia o si no esta bacia!; indicar si hay errores  -->
            <!-- Comprobamos si la variable errores esta seteada, si es asi mostramos los errores -->
            <?php if (!empty($error)) : ?>
                <div class="error">
                    <ul>
                        <?php echo $error; ?>
                    </ul>
                </div>
            <?php endif; ?>
        </form>
        <p class="texto-registrate">
            ¿ Vous avez déjà un compte ?
            <a href="login.php">Démarre la session</a>
        </p>
    </div>


</body>

</html>