<html>
<head>

<title>LOGIN</title>
<link href="CSS/login.css" rel="stylesheet" type="text/css" />
</head>

<body>
<div id="container">
<div id="mainLog">
<div id="coninp">
    <h1>SETNAS INKINDO</h1>
    <form action="MOD/ceklogin.php" method="post">
        <input type="text" name="user" id="user" class="Baginputu" placeholder="User">
        <input type="password" name="pass" id="pass" class="Baginputb" placeholder="Password">
        <input type="submit" class="Bagsubmit" value="Login">
    </form>
    <p>&copy; <?php echo date ("Y"); ?> SetnasINKINDO</p>
</div>
</div>
</div>
</body>
</html>
