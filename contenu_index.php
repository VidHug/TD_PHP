<body>
    <h1>Hugo Ciné</h1>
    <section>
        <ol>
            <?php
                foreach ($data['films'] as $film){
                    echo '<li><a href="film.php?id=' . $film['id'] . '"><img class="img_verticale" src="' . $film['chemin'] . '"><label>' . $film['titre'] . '</label></a>';
                    echo "\n";
                }
            ?>
        </ol>
    </section>

    <?php getBlock('footer.html'); ?>
</body>