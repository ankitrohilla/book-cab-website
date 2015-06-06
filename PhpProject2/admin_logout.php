<?php
    session_start();
    session_destroy();
?>
<script type="text/javascript">
    alert("YOU HAVE SUCCESSFULLY LOGGED OUT");
    window.location="home.php";
</script>