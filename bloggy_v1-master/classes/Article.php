<?php
include("Mysql.php");
class Article extends Mysql  {

	// Attributs de la classe
	private $_id;
	private $_titre;
	private $_image;
	private $_texte;
	private $_d_ajout;

	// Méthode magique pour les setters & getters
	public function __get($property) {
		if (property_exists($this, $property)) {
                return htmlentities( $this->$property );
            }
    }

    public function __set($property, $value) {
        if (property_exists($this, $property)) {
            	$this->$property = $value;
        }
    }

	public function details()
	{
		$q = "SELECT * FROM article WHERE id ='$this->_id' ";
		$result =  $this->get_cnx()->query($q);
		$res = $result->fetch();
		$art = new article();
		
			$art->_id 	     = $res['id'];
			$art->_titre	 = $res['titre'];
			$art->_image 	 = $res['image'];
			$art->_texte 	 = $res['texte'];
			$art->_d_ajout   = $res['d_ajout'];
	
		return $art;
	}
	// Autres méthodes
	public function ajouter()
	{
	    try {
	    if (!isset($this->_titre) || 
	    	!isset($this->_image) || 
	    	!isset($this->_texte)
	    	)
	    	return false;
	    $q = "INSERT INTO article (id, titre, image, texte, d_ajout) 
	    	  VALUES (null, :titre, :image, :texte, NOW())";
		$stmt = $this->get_cnx()->prepare($q);

		$stmt->bindParam(':titre', $this->_titre);
		$stmt->bindParam(':image', $this->_image);
		$stmt->bindParam(':texte', $this->_texte);

		$stmt->execute();

		return $this->get_cnx()->lastInsertId();
		} catch (PDOException $e) {
		    exit("<pre>Erreur de connexion à la BdD : " . $e->getMessage() . "<br/>");
		}

	}
	
	public function supprimer()
	{
		$q = "DELETE FROM article WHERE id = :id";
		$stmt = $this->get_cnx()->prepare($q);
		$stmt->bindParam(':id', $this->_id);
		return ($stmt->execute() == true);
	}

	public function liste()
	{
		$q = "SELECT * FROM article ORDER BY d_ajout DESC";
		$liste = array(); // Tableau VIDE
		$res = $this->get_cnx()->query($q);
		foreach ($res as $row)
		{
			$c = new Article();

			$c->_id 	 = $row['id'];
			$c->_titre	 = $row['titre'];
			$c->_image 	 = $row['image'];
			$c->_texte 	 = $row['texte'];
			$c->_d_ajout = $row['d_ajout'];
		
			$liste[]=$c;
		}
		
		return $liste; // Renvoi un tableau d'objets
	}
	public function nbarticle()
	{
		 $q = "SELECT count(*) as nb   FROM article";
			 $res = $this->get_cnx()->query($q);
			 $data = $res->fetch();
	         $nb = $data['nb'];
	         return $nb;
    } 
   	public function modifier(){
		$q = "UPDATE article SET
			  titre 	= '$this->_titre',
			  image = IF('$this->_image' = '', image, '$this->_image') ,
			  texte = '$this->_texte'
			  WHERE id = '$this->_id' ";
	  
		$res = $this->requete($q);
		return $res;
	}

}

?>