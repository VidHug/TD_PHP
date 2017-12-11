<body>
    <h1 id="titreIndex">Hugo Ciné</h1>
    <section>
        <table id="id_filmogrphie">
            <?php
            foreach($data['films'] as $film){
                echo '<tr>' . "\n";
                echo '<td><a href="http://hugovidal.fr/td_film/film.php?id=' . $film['id'] . '"><img class="img_verticale" src="' . $film['chemin'] . '"></a></td>';
                echo '<td><a href="http://hugovidal.fr/td_film/film.php?id=' . $film['id'] . '">' . $film['titre'] . '</a></td>' . "\n";
                echo '</tr>' . "\n";
            }
            ?>
        </table>
        <a href="#titreIndex"><img id="fleche" src="image/fleche.png" style="display: none;"></a>
    </section>

    <?php getBlock('footer.html'); ?>
</body>