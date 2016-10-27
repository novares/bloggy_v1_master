<?php
 $xml="<?xml version='1.0' encoding='utf8' ?>

<contacts>";


require_once("../classes/Contact.php");
$c= new Contact();
$liste =$c->liste();
foreach ($liste as $item) {
		$xml.="<contact>";
		$xml.="<id> $item->_id</id>";
		$xml.="<email> $item->_email</email>";
		$xml.="<sujet>$item->_sujet</sujet>";
		$xml.="<message>$item->_message</message>";
		$xml.="<newsletter>$item->_newsletter</newsletter>";
		$xml.="<date>$item->_d_ajout</date>";
		$xml.="</contact>";
	}	
$xml.="</contacts>";
header(" Content-disposition: attachment; filename='export.xml'");
print $xml;