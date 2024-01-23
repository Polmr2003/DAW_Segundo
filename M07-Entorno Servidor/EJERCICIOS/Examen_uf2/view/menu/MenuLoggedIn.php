<nav>
    <ul>
        <li>
            <a href="index.php?menu=users&option=home_login" class="menu-loggedIn">Home</a>
        </li>
        <li>
            <a href="index.php?menu=users&option=logout" class="menu-loggedIn">Logout</a>
        </li>
        <li class="menu-loggedIn">
            <?php
                // recojemos las variables de sesion con el nombre i el rol
                $user=$_SESSION["user"];
                $rol=$_SESSION["Rol"];
                // lo mostramos
                echo "Hola " . $user ." " .$rol ."!!";
            ?>
        </li>
        
    </ul>
</nav>