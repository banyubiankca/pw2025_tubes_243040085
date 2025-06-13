<?php

require "partials/header.php";

//cek tombol submit 
if(isset($_POST["submit"])){
    //cek username & password
    if($_POST["username"] == "admin" && $_POST["password"] == 
        "admin"){   
    //jika benar redirect ke halaman admin
        header("Location: admin.php");
        exit;
    }else { 
    //jika salah, tampilkan pesan kesalahan
        $error = true;
    }
}

?>

<title>Login Admin</title>

<h1 class="miskan login-box">Login Admin</h1>

<?php if( isset($error)): ?>
    <p class="posisi" style="color : red ; font-style: italic;"><b>username / password salah!</b></p>
<?php endif; ?>

<ul>
<form class="posisi menu-login" action="" Method="post">
    <li>
        <label class="geosan " for="username">username :</label>
        <input class="geosan CL" type="text" autocomplete="off" name="username" id="username" autofocus required>
    </li>

    <li>
        <label class="geosan" for="password">password :</label>
        <input class="geosan CL" type="password" name="password" id="password" required>
    </li>
    
    <li>
        <button name="submit" type="submit" class="btn btn-primary geosan butlog"><b>Login</b></button>
    </li>

</form>
</ul>

</body>
</html>