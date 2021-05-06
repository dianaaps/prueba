<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <header>
        <?php include_once("vista/header.html"); ?>
    </header>
    
    <section>
        <form id="frm" method="post" action="controlador/login.php">
            Clave  <input type="text" name="txtCve" required="true"/>
            <br/>
            Contrase&ntilde;a  <input type="password" name="txtPwd" required="true"/>
            <br/>
            <input type="submit" value="Enviar"/>
        </form>
    </section>

    <footer>
        <?php include_once("vista/footer.html"); ?>
    </footer>
    
</body>
</html>

