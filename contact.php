<!DOCTYPE html>
<html lang="nl">

    <?php include 'website-components/head.php'; ?>

    <body>

        <?php include 'website-components/header.php'; ?>
        
        <main>

            <!-- Contact banner (SECTION 6) -->
            <section class="contact-banner">
                <div>
                    <h1>Contact</h1>
                </div>
            </section>

            <!-- Inputboxes to send an email to us (SECTION 6.1) -->
            <section class="contact-info">
                <div class="info-form">
                    <form>
                        <label for="name">Naam:</label>
                        <input type="text" id="name" name="name" required>

                        <label for="email">E-mail:</label>
                        <input type="email" id="email" name="email" required>

                        <label for="organisatie">Organisatie:</label>
                        <input type="text" id="organisatie" name="organisatie">

                        <label for="message">Bericht:</label>
                        <textarea id="message" name="message" required></textarea>

                        <button type="submit">Verstuur</button>
                    </form>
                </div>

                <!-- Give out our contactinfo with a fun little message -->
                <div class="info-text">

                    <h2>DE KOFFIE STAAT KLAAR!</h2>
                    <p>
                        Bent u nieuwsgierig geworden naar de mogelijkheden om samen met ons te werken? Neem dan contact met ons op.
                        In een persoonlijk gesprek vertellen wij u graag meer.
                        U vindt ons in het Brabantse Breda.
                        Wij zorgen dat de koffie klaarstaat!
                    </p>
                    <h3>U kunt ons bereiken op:</h3>
                    <p>Plug & Play<p>
                    <p>Hogeschoollaan 1</p>
                    <p>4818 CR Breda</p>

                    <P>Telefoon: <a href="tel:0031850073030">088 525 7500</a></p>
                    <p>E-mail: <a href="mailto:info@plugplay.pro">info@plugplay.pro</a></p>

                </div>

                <!-- Load the map to show where we are located -->
                <div class="info-map">
                    <h3>Bekijk ons op de kaart</h3>

                    <iframe width="30%" height="60%"
                        src="https://www.openstreetmap.org/export/embed.html?bbox=4.795634150505067%2C51.5823632693168%2C4.799271225929261%2C51.58643982276231&amp;layer=mapnik&amp;marker=51.58440159175703%2C4.797452688217163"
                        style="border: 1px solid black">
                    </iframe>
                </div>
            </section>
        </main>

        <?php include 'website-components/footer.php'; ?>

    </body>

</html>