<!-- si l'utilsateur n'a pas clické -->
<?php if (!isset($_COOKIE['cdd'])) { ?>
    <div class="cookie-alert">
        <p>Mon site utilise des cookies pour vous offrir le meilleur service possible.
        <?php if(!isset($titleAdminCrud)) { ?>
            <a href="include/cookie.php">OK</a></p>
        <!-- si on se trouve dans le répertoire du crud alors il faut sortir du dossier crud -->
        <!-- c'est pourquoi on utilise le ../ pour revenir à la racine du site -->
        <?php } else { ?>
            <a href="../include/cookie.php">OK</a></p>
        <?php } ?>
    </div>
<?php }  ?>

<footer>
    <div class="copyright">
        <p style="text-align: center; font-family: cursive;">
            © FIEF HUGO | Tous droits réservés volley78 | <strong>Copyright 2019 </strong>
            <a class="source" style="color: #FFFFFF" href="https://www.fsgt78volley.com/en-savoir-plus/loisir-85344" target="_blank"> | Source
            </a>
        </p>
    </div>

</footer>


</body>
</html>