<footer class="centre">
    <div class="gris-clair">
        <div class="principale containerx2">
            <div class="footer footer-logo">
                <p class="logo-footer">logoUBFC</p>
            </div>
            <div class="footer footer-contact">
                <h2>Contact</h2>
                <p>Julie Bodet</p>
                <p>Université Bourgogne Franche-Comté</p>
                <p>Besançon</p>
                <p>Adresse</p>
                <p>Mail</p>
                <p>tel: 06 .. .. .. ..</p>
            </div>
        </div>
    </div>
    <div class="gris-fonce">
        <div class="principale containerx2">
            <div class="footer footer-partenaire">
                <h2>Partenaires</h2>
                <ul>
                    <li><p class="logo-partenaire partenaire1">partenaire1</p></li>
                    <li><p class="logo-partenaire partenaire2">partenaire2</p></li>
                    <li><p class="logo-partenaire partenaire3">partenaire3</p></li>
                    <li><p class="logo-partenaire partenaire4">partenaire4</p></li>
                    <li><p class="logo-partenaire partenaire5">partenaire5</p></li>
                    <li><p class="logo-partenaire partenaire6">partenaire6</p></li>
                </ul>
            </div>
            <div class="footer info-utile">
                <h2>Infos utiles</h2>
                <div class="liste">
                    <a href="https://mmi-projet.pu-pm.univ-fcomte.fr/projets-co1617/projet1617_14/wordpress/mention-legales/" class="gras">Mentions légales</a>
                    <a href="#" class="gras">Recrutement</a>
                    <a href="<?php echo get_post_type_archive_link( 'actualite' ); ?>" class="gras">Agenda</a></div>

            </div>
        </div>
    </div>

</footer>
<?php wp_footer(); ?>
</body>
</html>