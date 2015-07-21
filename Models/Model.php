<?php
	// Dispatcheur
	// URL -> index.php -> App -> Controller A -> Traitement
	// L'instance App est toujours unique -> donc on passe par le singleton (On ne veut qu'une et une seule instance)
	// Donc le construteur est en privé
    class Model {
    	
    	private static $_instance;
		
    	private function __construct() {
    		
    	}
		
		public static function getInstance() {
			if (!self::$_instance){
				self::$_instance = new App();
			}
			return self::$_instance;
		}
		
    	public function delete($id) {
		
    		$id_annonce=$id;
		$mysqli = connexionBdd();	
	
		$requete='DELETE FROM Annonces WHERE id='.$id_annonce;
		$resultat=$mysqli->query($requete) or die ('Erreur '.$mysqli->error);
		
		echo '<p>Votre article a bien été supprimé ! </p>
		      <p><a href="index.php?p=annonces">Revenir au listing</a></p>' ;
	}
	
	/*
	 * Modifie une annonce
	 */
 		public function update($id,$titre,$description,$prix) {
		$id_annonce=$id;
		$titre_annonce=$titre;
		$description_annonce=$description;
		$prix_annonce=$prix;
		
		$mysqli = connexionBdd();	
	
		$resultat=$mysqli->query("UPDATE Annonces SET titre = '" . $titre_annonce . "' ,description='" . $description_annonce . "' ,prix= '" . $prix_annonce . "' WHERE id = ".$id_annonce ) or die ('Erreur update '.$mysqli->error); // permet l'affiche des erreurs non obligatoire. .$mysqli->error
		
		echo '<p>Votre article a bien été modifié ! </p>' ;
		      
	}
	
	/*
	 * créé une annonce
	 */
	function creationok($titre,$description,$prix) {

		$titre_annonce=$titre;
		$description_annonce=$description;
		$prix_annonce=$prix;
		
		$mysqli = connexionBdd();	
		$requete = "INSERT INTO Annonces (titre, description, prix) VALUES ('" . $titre_annonce . "', '" . $description_annonce . "', '" . $prix_annonce . "' )";
		$resultat=$mysqli->query( $requete ) or die ('Erreur insert '.$mysqli->error); // permet l'affiche des erreurs non obligatoire. .$mysqli->error
		
		echo '<p>Votre article a bien été créé</p>
		  	<p><a href="index.php?p=annonces">Retour au listing</a></p>';
		
	}
	
		
    }
?>