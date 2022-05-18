<?php 
session_start();
unset($_SESSION['id']);
session_destroy();
?>
<script>
   document.location = 'index.php';
</script>