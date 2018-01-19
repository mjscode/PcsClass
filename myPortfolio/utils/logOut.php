<?php
    session_unset();
    http_response_code(302);
    header("Location: index.php?action=signin");
?>   