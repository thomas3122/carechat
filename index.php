<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Komkommer Koers: een kleine arcadegame met Johannes Wilhelmus de 4de.">
    <title>Komkommer Koers | CareChat.nl</title>
    <link rel="stylesheet" href="assets/css/styles.css">
</head>
<body>
    <main class="shell">
        <section class="game-panel" aria-labelledby="game-title">
            <div class="intro">
                <p class="kicker">CareChat.nl presenteert</p>
                <h1 id="game-title">Komkommer Koers</h1>
                <p>
                    Help Johannes Wilhelmus de 4de om komkommers netjes in de picknickmand te mikken.
                    Raak de mand vijf keer voordat de tijd om is.
                </p>
            </div>

            <div class="hud" aria-label="Spelstatus">
                <div>
                    <span>Score</span>
                    <strong id="score">0</strong>
                </div>
                <div>
                    <span>Tijd</span>
                    <strong id="time">45</strong>
                </div>
                <div>
                    <span>Doel</span>
                    <strong>5</strong>
                </div>
            </div>

            <div class="stage-wrap">
                <canvas id="game" width="960" height="540" aria-label="Speelveld voor Komkommer Koers"></canvas>
                <div class="message is-visible" id="message">
                    <strong>Start klaar</strong>
                    <span>Gebruik pijltjes of A/D om te richten. Spatie of de knop gooit.</span>
                </div>
            </div>

            <div class="controls">
                <button type="button" class="icon-button" id="left" aria-label="Richt naar links">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="M15 6 9 12l6 6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button type="button" class="primary-button" id="throw">Gooi komkommer</button>
                <button type="button" class="icon-button" id="right" aria-label="Richt naar rechts">
                    <svg viewBox="0 0 24 24" aria-hidden="true">
                        <path d="m9 6 6 6-6 6" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </button>
                <button type="button" class="secondary-button" id="restart">Opnieuw</button>
            </div>
        </section>
    </main>

    <script src="assets/js/game.js"></script>
</body>
</html>
