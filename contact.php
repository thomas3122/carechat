<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Neem contact op met CareChat voor een digitale balie-assistent die telefoondruk verlaagt en veilige praktijkcommunicatie ondersteunt.">
    <title>Contact | CareChat</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <header class="site-header">
        <a class="brand" href="index.php" aria-label="CareChat home">
            <span class="brand-mark">C</span>
            <span>CareChat</span>
        </a>
        <button class="nav-toggle" type="button" aria-expanded="false" aria-controls="site-nav">Menu</button>
        <nav class="site-nav" id="site-nav" aria-label="Hoofdnavigatie">
            <a href="index.php">Home</a>
            <a href="functies.php">Chatbot functies</a>
            <a class="is-active" href="contact.php">Contact</a>
        </nav>
    </header>

    <main>
        <section class="contact-hero">
            <div>
                <p class="eyebrow">Contact</p>
                <h1>Ontdek waar CareChat uw praktijk direct tijd kan besparen.</h1>
                <p>
                    Vertel kort wat voor praktijk u heeft en waar de meeste druk zit: telefoon, balie, mail, intake of terugbelverzoeken. Dan kijken we samen welke eerste inrichting het meeste oplevert.
                </p>
            </div>
            <aside class="contact-card">
                <strong>Snelle route</strong>
                <p>Stuur een bericht met uw praktijknaam, type praktijk en de grootste terugkerende vraag.</p>
                <a class="button button-primary" href="mailto:info@carechat.nl?subject=Kennismaking%20CareChat&body=Hallo%20CareChat%2C%0A%0AIk%20wil%20graag%20meer%20weten%20over%20CareChat.%0A%0APraktijknaam%3A%0AType%20praktijk%3A%0AGrootste%20uitdaging%3A%0AAantal%20locaties%3A%0AWebsite%3A%0A%0AGroet%2C">Mail info@carechat.nl</a>
            </aside>
        </section>

        <section class="contact-layout">
            <form class="lead-form" action="mailto:info@carechat.nl" method="post" enctype="text/plain">
                <h2>Vraag een kennismaking aan</h2>
                <label>
                    Naam
                    <input type="text" name="Naam" autocomplete="name" required>
                </label>
                <label>
                    E-mailadres
                    <input type="email" name="E-mail" autocomplete="email" required>
                </label>
                <label>
                    Praktijknaam
                    <input type="text" name="Praktijknaam" autocomplete="organization">
                </label>
                <label>
                    Type praktijk
                    <select name="Type praktijk">
                        <option>Huisartsenpraktijk</option>
                        <option>Fysiopraktijk</option>
                        <option>Tandartspraktijk</option>
                        <option>Psychologiepraktijk</option>
                        <option>Kliniek of salon</option>
                        <option>Anders</option>
                    </select>
                </label>
                <label>
                    Waar wilt u vooral minder druk?
                    <textarea name="Uitdaging" rows="5" placeholder="Bijvoorbeeld: veel telefoontjes over afspraken, openingstijden, herhaalrecepten of vergoedingen."></textarea>
                </label>
                <button class="button button-primary" type="submit">Verstuur aanvraag</button>
            </form>

            <div class="contact-notes">
                <div>
                    <strong>Wat we bespreken</strong>
                    <p>Welke vragen uw team vaak krijgt, welke routes veilig moeten zijn en welke informatie bezoekers nu lastig vinden.</p>
                </div>
                <div>
                    <strong>Wat u niet hoeft te doen</strong>
                    <p>Geen technisch plan schrijven. Een paar voorbeelden van veelgestelde vragen is genoeg om te starten.</p>
                </div>
                <div>
                    <strong>Wat u krijgt</strong>
                    <p>Een scherpe eerste inschatting van de beste startflow: FAQ, terugbelverzoek, intake, spoedroute of live overname.</p>
                </div>
            </div>
        </section>

        <section class="pricing-section">
            <div class="section-heading">
                <p class="eyebrow">Model</p>
                <h2>Heldere opbouw, passend bij de praktijk.</h2>
            </div>
            <div class="pricing-grid">
                <article>
                    <strong>Setup</strong>
                    <p>Eenmalige inrichting van kennisbank, praktijkroutes, veiligheidsregels en widget.</p>
                </article>
                <article>
                    <strong>Maandabonnement</strong>
                    <p>Hosting, beheer, monitoring, updates, dashboard en support.</p>
                </article>
                <article>
                    <strong>Uitbreidingen</strong>
                    <p>Livechat, WhatsApp, meerdere locaties, maatwerkflows of extra talen.</p>
                </article>
            </div>
        </section>
    </main>

    <footer class="site-footer">
        <span>CareChat.nl</span>
        <span>info@carechat.nl</span>
    </footer>

    <script src="assets/js/site.js"></script>
</body>
</html>
