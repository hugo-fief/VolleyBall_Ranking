 <?php

// class User qui définit toute les charactéristiques d'un user avec pleins de fonctions 
// qui le définissent et qui lui sont propres
// récupère et donc à accès à toutes les fonction de sa class mère (Db)
class Matchs extends Bdd
{
	// fonction publique (visible et utilisable partout dans le projet) 
    // statique (qui garde la meme signature partout dans le projet)
    // qui retourne tous les users trier par id
    public static function getAllMatchs()
    {
        return Bdd::getInstance()->conn->query('SELECT * FROM `volley_matchs`');
    }

    public static function getSpecificMatchs($id) {
    	return Bdd::getInstance()->conn->query('SELECT * FROM `volley_matchs` WHERE id_equipe1 = "' . $id . '"');
    }

    public static function getTeam1Matchs($id) {
    	return Bdd::getInstance()->conn->query('SELECT * FROM `volley_matchs` INNER JOIN volley_equipes 
            ON volley_matchs.id_equipe1 = volley_equipes.id WHERE id_equipe1 = "' . $id . '"');
    }

    public static function getTeam2Matchs($id) {
    	return Bdd::getInstance()->conn->query('SELECT * FROM `volley_matchs` INNER JOIN volley_equipes 
            ON volley_matchs.id_equipe2 = volley_equipes.id WHERE id_equipe1 = "' . $id . '"');
    }
}

?>