<div style="padding: 0 50px;" class="content">
    <?php if (isset($_SESSION['login'])) { ?>
        <div style="display: flex; justify-content: center; margin-bottom: 30px;">    
            <a style="text-decoration: none;" href="logout.php">
                <button style="display: block; margin: 0 auto" type="button" class="btn btn-danger">
                    Se Deconnecter
                </button>
            </a>

            <a style="text-decoration: none;" href="crud/index.php">
                <button style="display: block; margin: 0 auto" type="button" class="btn btn-primary">
                    Accéder Au CRUD
                </button>
            </a>
        </div>
    <?php } ?>


    <div class="table-responsive text-nowrap table-responsive-home" style="margin-bottom: 20px">
        <table class="table" aria-describedby="classement volley78">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Détails</th>
                    <th scope="col">Classement</th>
                    <th scope="col">Nom</th>
                    <th scope="col">Victoires</th>
                    <th scope="col">Defaites</th>
                    <th scope="col">Sets Gagnés</th>
                    <th scope="col">Points</th>
                </tr>
            </thead> 

            <tbody> 
                <!-- on affiche toutes les infos du produits qui à été ajouter au panier -->
                <?php 
                    $i = 1;
                    while($i <= 11) {
                        foreach ($classementList as $value) { ?>
                    
                    <tr class="classement">
                        <td>
                            <a  class="matchs" href="matchs.php?id=<?php echo $value['id_equipe']; ?>" 
                                title="Détail de l'équipe">
                            </a>
                        </td>
                        <td><?php echo $i; ?></td>
                        <?php $i++; ?>
                        <td><?php echo $value['nom']; ?></td>
                        <td><?php echo $value['victoires']; ?> / 5</td>
                        <td><?php echo $value['defaites']; ?></td>
                        <td><?php echo $value['nb_sets_gagnes']; ?></td>
                        <td><?php echo $value['nb_points_total']; ?></td>
                    </tr>
                <?php } 
                } ?>
                    
                    <tr class="hide">
                        <td></td><td></td><td></td><td></td><td></td><td></td><td></td>
                    </tr>
            </tbody>
        </table> 
    </div>

    <button onclick="redirect('login.php')" style="display: block; margin: 0 auto" type="button" 
        class="btn btn-primary">Ajouter un Match
    </button>        
</div>

<script>
function redirect(path)
{
    location.href = path;
} 
</script>

<!-- on inclut le footer du site tout à la fin car le but est de le charger en dernier-->
<?php require_once('include/footer.php'); ?>
