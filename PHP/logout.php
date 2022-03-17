<!-- Dacă se va apăsa pe un buton de logout va returna acest cod care va finaliza sesiunea și va scoate utilizatorul din cont -->

<?php

session_start();

session_unset();
session_destroy();

header("Location: index.php");