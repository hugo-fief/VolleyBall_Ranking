<style>    .table td, .table th {        border: none;    }    .arrow {      border: solid black;      border-width: 0 3px 3px 0;      padding: 10px;      cursor: pointer;    }    .left {      transform: rotate(135deg);      position: absolute;      left: 20px;      top: 20px;    }    .right {      transform: rotate(-45deg);      position: absolute;      right: 20px;      top: 20px;    }    @media screen and (max-width: 550px) {        .arrow {            padding: 5px;        }        .left {            top: 30px;            left: 5px;        }        .right {            top: 30px;            right: 5px;        }        nav {            padding: .5rem 2rem !important;        }    }</style><div style="padding: 0 50px;" class="content">        <script>        var h = document.getElementsByTagName('h2');        var arrow = document.getElementsByClassName('arrow');        arrow.innerHTML = h;    </script>    <a href="resultats.php?year=<?php echo $get_year-= 1; ?>"         title="Année <?php echo $get_year; ?>"         class="arrow left"></a>        <a href="resultats.php?year=<?php echo $get_year+= 2; ?>"         title="Année <?php echo $get_year; ?>"         class="arrow right"></a>    <?php if (isset($_SESSION['login'])) { ?>        <div style="display: flex; justify-content: center; margin-bottom: 30px;">            <a style="text-decoration: none;" href="logout.php">                <button style="display: block; margin: 0 auto" type="button" class="btn btn-danger">                    Se Deconnecter                </button>            </a>            <a style="text-decoration: none;" href="crud/index.php">                <button style="display: block; margin: 0 auto" type="button" class="btn btn-primary">                    Accéder Au CRUD                </button>            </a>        </div>    <?php } ?>    <h2 style="font-size: 2.0rem !important; margin-bottom: 50px;">        <?php echo $get_year-= 1; ?>            </h2>    <div class="table-responsive text-nowrap table-responsive-home" style="margin-bottom: 20px">        <table style="background-color: #FFFFFF;" class="table" aria-describedby="classement volley78">            <thead class="thead-dark">            <tr>                <th scope="col">Détails</th>                <th scope="col">Classement</th>                <th scope="col">Nom</th>                <th scope="col">Victoires</th>                <th scope="col">Defaites</th>                <th scope="col">Sets Gagnés</th>                <th scope="col">Points</th>            </tr>            </thead>            <tbody>            <!-- on affiche toutes les infos du produits qui à été ajouter au panier -->            <?php                foreach ($classementList as $key => $value) { ?>                    <tr class="classement">                        <td>                            <a class="matchs"                                 href="matchs.php?year=<?php echo $get_year; ?>&id=<?php echo $value['id_equipe']; ?>"                                title="Détail de l'équipe">                            </a>                        </td>                        <?php $key++; ?>                        <td><?php echo $key; ?></td>                        <td><?php echo $value['nom']; ?></td>                        <td>                            <?php echo $value['victoires']; ?>                             /                             <?php echo $value['nb_matchs']; ?>                        </td>                        <td><?php echo $value['defaites']; ?></td>                        <td><?php echo $value['nb_sets_gagnes']; ?></td>                        <td><?php echo $value['nb_points_total']; ?></td>                    </tr>                <?php } ?>            </tbody>        </table>    </div>    <button onclick="redirect('login.php')" style="display: block; margin: 0 auto" type="button"            class="btn btn-primary">Ajouter un Match    </button></div><script>    function redirect(path) {        location.href = path;    }</script><!-- on inclut le footer du site tout à la fin car le but est de le charger en dernier--><br/><br/><br/><style>    footer {        position: fixed;        width: 100%;        padding: 0;    }</style><?php require_once('include/footer.php'); ?>