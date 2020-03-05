<?php 
    session_destroy(); 
    unset($_SESSION);

    echo '<script>
    
     window.location = "'.$ruta.'";
    
    </script>';
?>