<?php// class User qui définit toute les charactéristiques d'un user avec pleins de fonctions// qui le définissent et qui lui sont propres// récupère et donc à accès à toutes les fonction de sa class mère (Db)class Resultats extends Bdd{    // fonction publique (visible et utilisable partout dans le projet)    // statique (qui garde la meme signature partout dans le projet)    // qui retourne tous les users trier par id    public static function getAllResultats()    {        return Bdd::getInstance()->conn->query('SELECT * FROM `volley_resultats` ORDER BY id DESC');    }    public static function getJoinTeamStats()    {        return Bdd::getInstance()->conn->query('SELECT *, volley_resultats.id as theId FROM `volley_resultats` INNER JOIN volley_equipes             ON volley_resultats.id_equipe = volley_equipes.id');    }    public static function getJoinTeamStatsBy2018()    {        return Bdd::getInstance()->conn->query('SELECT *, volley_resultats.id as theId FROM `volley_resultats` INNER JOIN volley_equipes             ON volley_resultats.id_equipe = volley_equipes.id            WHERE annee = 2018');    }    public static function getJoinTeamStatsBy2019()    {        return Bdd::getInstance()->conn->query('SELECT *, volley_resultats.id as theId FROM `volley_resultats` INNER JOIN volley_equipes             ON volley_resultats.id_equipe = volley_equipes.id            WHERE annee = 2019');    }    // fonction publique (visible et utilisable partout dans le projet)    // statique (qui garde la meme signature partout dans le projet)    // qui retourne toutes les catégories ou l'id est égale à l'id passé en parametre    public static function getResultats($idResultat, $year)    {        return Bdd::getInstance()->conn->query('SELECT * FROM `volley_resultats` WHERE             `id` = "' . $idResultat . '" AND annee = "' . $year . '"')->fetchAll();    }    public static function getSpecificResultats($idResultat, $year)    {        return Bdd::getInstance()->conn->query('SELECT * FROM `volley_resultats` WHERE             `id_equipe` = "' . $idResultat . '" AND annee = "' . $year . '"')->fetchAll();    }    public static function getFilterResultats($year)    {        return Bdd::getInstance()->conn->query('SELECT * FROM `volley_resultats` INNER JOIN volley_equipes ON volley_resultats.id_equipe = volley_equipes.id             WHERE annee = ' . $year . ' ORDER BY victoires DESC, nb_sets_gagnes DESC');    }    // fonction publique (visible et utilisable partout dans le projet)    // statique (qui garde la meme signature partout dans le projet)    // qui retourne le user dont les informations    // viennent d'etre mise à jour une fois la requete executé    public static function updateResultats($victoires, $defaites, $nb_sets_gagnes,         $nb_points_total, $matchs, $year, $id_equipe, $id)    {        $sql = "UPDATE `volley_resultats` SET `victoires` = ?, `defaites` = ?,             `nb_sets_gagnes` = ?, `nb_points_total` = ?, `nb_matchs` = ?,             `annee` = ?, `id_equipe` = ? WHERE `id` = ?";        $stmt = Bdd::getInstance()->conn->prepare($sql);        $stmt->execute([            $victoires,            $defaites,            $nb_sets_gagnes,            $nb_points_total,            $matchs,            $year,            $id_equipe,            $id        ]);        return Resultats::getResultats($id, $year);    }    // fonction publique (visible et utilisable partout dans le projet)     // statique (qui garde la meme signature partout dans le projet)    // qui retourne les categories qui viennent d'etre créer une fois la requete executé    public static function setResultats($vic, $def, $nb_sets, $nb_points, $nb_matchs,         $annee, $id_equipe)     {        $sql = "INSERT INTO `volley_resultats` (victoires, defaites, nb_sets_gagnes, nb_points_total, nb_matchs, annee, id_equipe) VALUES (?, ?, ?, ?, ?, ?, ?)";        $stmt = Bdd::getInstance()->conn->prepare($sql);        $stmt->execute([            $vic,            $def,            $nb_sets,            $nb_points,            $nb_matchs,            $annee,            $id_equipe        ]);        return Resultats::getAllResultats();    }}?>