<?php
include("../classes/Article.php");
include("../classes/Util.php");

@$titre = $_POST['titre'];
@$texte = $_POST['texte'];
@$id = $_POST['id'];

	$art = new Article();
	$util = new Util();
	$art->_titre= $titre;
	$art->_texte = $texte;
	$art->_image = $util->upload( 'image', "../upload/");
   if( empty($id) ) 
	{
	  if($art->ajouter())
		{
		$retour = 1;
	    header("Location: article_liste.php?retour=$retour&titre=$titre");
	    }
	}elseif ( !empty($id)) {
        $art->_id = $id;
		$art->modifier();
		$retour = 1;
		header("Location: article_liste.php?retourm=$retour&titre=$titre");
	}
	else
	{
		$retour = -1;
        header("Location: article_new.php?retour=$retour");
    }    

?>