<!-- Pagina que sirve para cerrar la sesion -->
<?php
    session_start();
    session_destroy();
    header("Location: index.php");
?>