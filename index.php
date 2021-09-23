<?php

require_once('./includes/components/header.inc.php');

if (isset($_SESSION['_id'])) {
    header('Location: main.php');
    exit();
}

?>
dada
<?php

require_once('./includes/components/footer.inc.php');

?>