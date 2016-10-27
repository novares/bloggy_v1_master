<?php
include("../classes/Contact.php");
$cat = new Contact();
$cat->_id = $_REQUEST['id'];
$cat->supprimer();
header("Location: contact_liste.php");
?>