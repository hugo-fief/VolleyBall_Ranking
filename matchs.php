<?php// on définit notre balise title$title = "Page des matchs";// on inclut notre package (librairie) qui s'occupe de charger toutes les pages dont on a besoinrequire_once('include/require.php');// on définit nos variables propre au produit comme son identifiant par exemple// afin de pouvoir les passer dans l'url pour qu'on ait l'affichage du produit propre// à l'id qui à été passé dand l'url$get_id = htmlspecialchars(Util::getGetParam('id'));$matchs = Matchs::getSpecificMatchs($get_id);$team_matchs1 = Matchs::getTeam1Matchs($get_id);$team_matchs2 = Matchs::getTeam2Matchs($get_id);// on inclut la vue (partie visible => front) de la pagerequire_once('views/matchs.view.php');?>