<!DOCTYPE html>
<html lang="nl">

<?php require 'website-components/head.php'; ?>

<body>

    <?php require 'website-components/header.php'; ?>
    <main>

        <!-- Section  -->

        <section class="producten-banner">
            <div>
                <h1>Producten</h1>
            </div>
        </section>

        <section class="section-producten">

            <!-- Load in the products via JavaScript (SECTION 5.1) -->
            <div class="ProductContainer">

                <?php

                require 'script/php/producten.php';
                createProducts('website-components/producten-diensten');

                ?>

            </div>

        </section>
        <section class="section-diensten">
            <div class="diensten-box">
                <h2>Onze Diensten</h2>
                <p>
                    Organiseer jij een evenement of heb jij een ruimte in jou kantoor waar je graag powerbanks aan wilt
                    bieden?
                </p>
                <p>
                    Leer hoe onze plaatsingsdienst jou kan helpen en vraag eenvoudig een offerte aan.
                    Binnen 3 werkdagen ontvang je de offerte en wordt er telefonisch contact met je opgenomen om je
                    aanvraag te bespreken.
                    Heb je andere vragen, stel deze via het contactformulier.
                </p>
            </div>
        </section>

    </main>

    <?php require 'website-components/footer.php'; ?>

</body>

</html>