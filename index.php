<!doctype html>
<html lang="nl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="CareChat.nl komt binnenkort online: warme, toegankelijke digitale ondersteuning voor zorg en welzijn.">
    <title>CareChat.nl | Binnenkort online</title>
    <style>
        :root {
            --ink: #17212b;
            --muted: #53606f;
            --line: #dbe5e3;
            --surface: #ffffff;
            --soft: #eef7f5;
            --aqua: #2aa7a1;
            --aqua-dark: #14736f;
            --coral: #ef7d67;
            --lavender: #7769c9;
            --gold: #f4b84b;
            --shadow: 0 24px 70px rgba(23, 33, 43, .14);
        }

        * {
            box-sizing: border-box;
        }

        body {
            min-height: 100vh;
            margin: 0;
            color: var(--ink);
            font-family: Inter, ui-sans-serif, system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at 12% 20%, rgba(42, 167, 161, .18), transparent 28rem),
                radial-gradient(circle at 88% 15%, rgba(239, 125, 103, .16), transparent 24rem),
                linear-gradient(135deg, #f7fbfb 0%, #eef7f5 54%, #fff7f2 100%);
        }

        a {
            color: inherit;
        }

        .page {
            display: grid;
            min-height: 100vh;
            grid-template-rows: auto 1fr auto;
        }

        .wrap {
            width: min(1120px, calc(100% - 40px));
            margin: 0 auto;
        }

        header {
            padding: 28px 0 18px;
        }

        .brand {
            display: inline-flex;
            align-items: center;
            gap: 12px;
            color: var(--aqua-dark);
            font-weight: 800;
            letter-spacing: 0;
            text-decoration: none;
        }

        .brand-mark {
            display: grid;
            width: 44px;
            height: 44px;
            place-items: center;
            border-radius: 14px;
            color: #fff;
            background: linear-gradient(145deg, var(--aqua), var(--lavender));
            box-shadow: 0 14px 30px rgba(42, 167, 161, .26);
        }

        .brand-mark svg {
            width: 25px;
            height: 25px;
        }

        main {
            display: grid;
            align-items: center;
            padding: 28px 0 54px;
        }

        .hero {
            display: grid;
            grid-template-columns: minmax(0, 1.02fr) minmax(320px, .98fr);
            gap: clamp(32px, 7vw, 86px);
            align-items: center;
        }

        .eyebrow {
            display: inline-flex;
            align-items: center;
            gap: 10px;
            width: fit-content;
            margin: 0 0 22px;
            padding: 8px 12px;
            border: 1px solid rgba(42, 167, 161, .24);
            border-radius: 999px;
            color: var(--aqua-dark);
            background: rgba(255, 255, 255, .72);
            font-size: .9rem;
            font-weight: 700;
        }

        .eyebrow::before {
            content: "";
            width: 9px;
            height: 9px;
            border-radius: 50%;
            background: var(--coral);
            box-shadow: 0 0 0 5px rgba(239, 125, 103, .14);
        }

        h1 {
            max-width: 780px;
            margin: 0;
            font-size: clamp(3rem, 8vw, 6.9rem);
            line-height: .9;
            letter-spacing: 0;
        }

        .lead {
            max-width: 650px;
            margin: 28px 0 0;
            color: var(--muted);
            font-size: clamp(1.08rem, 2vw, 1.32rem);
            line-height: 1.65;
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 34px;
        }

        .button {
            display: inline-flex;
            min-height: 52px;
            align-items: center;
            justify-content: center;
            gap: 10px;
            padding: 0 20px;
            border: 1px solid transparent;
            border-radius: 8px;
            font-weight: 800;
            text-decoration: none;
            transition: transform .2s ease, box-shadow .2s ease, border-color .2s ease;
        }

        .button:hover {
            transform: translateY(-2px);
        }

        .button-primary {
            color: #fff;
            background: var(--aqua-dark);
            box-shadow: 0 16px 32px rgba(20, 115, 111, .22);
        }

        .button-secondary {
            color: var(--aqua-dark);
            border-color: rgba(20, 115, 111, .22);
            background: rgba(255, 255, 255, .7);
        }

        .button svg {
            width: 19px;
            height: 19px;
            flex: 0 0 auto;
        }

        .highlights {
            display: grid;
            grid-template-columns: repeat(3, minmax(0, 1fr));
            gap: 14px;
            margin-top: 42px;
            max-width: 720px;
        }

        .highlight {
            padding: 18px;
            border: 1px solid rgba(219, 229, 227, .84);
            border-radius: 8px;
            background: rgba(255, 255, 255, .68);
            backdrop-filter: blur(18px);
        }

        .highlight strong {
            display: block;
            margin-bottom: 5px;
            font-size: .98rem;
        }

        .highlight span {
            color: var(--muted);
            font-size: .92rem;
            line-height: 1.45;
        }

        .preview {
            position: relative;
            min-height: 560px;
        }

        .phone {
            position: absolute;
            inset: 22px auto auto 50%;
            width: min(360px, 86vw);
            min-height: 520px;
            padding: 18px;
            border: 1px solid rgba(23, 33, 43, .1);
            border-radius: 34px;
            background: #f9fcfc;
            box-shadow: var(--shadow);
            transform: translateX(-50%) rotate(2deg);
        }

        .phone::before {
            content: "";
            display: block;
            width: 72px;
            height: 6px;
            margin: 0 auto 18px;
            border-radius: 999px;
            background: #d7e2e0;
        }

        .chat {
            display: grid;
            gap: 14px;
            padding: 18px;
            border-radius: 24px;
            background: linear-gradient(180deg, #fff, #eff8f6);
        }

        .chat-top {
            display: flex;
            align-items: center;
            gap: 12px;
            padding-bottom: 14px;
            border-bottom: 1px solid var(--line);
        }

        .avatar {
            display: grid;
            width: 42px;
            height: 42px;
            place-items: center;
            border-radius: 50%;
            color: #fff;
            background: var(--coral);
            font-weight: 900;
        }

        .status {
            margin-left: auto;
            color: var(--aqua-dark);
            font-size: .82rem;
            font-weight: 800;
        }

        .chat-top strong,
        .chat-top span {
            display: block;
        }

        .chat-top span {
            color: var(--muted);
            font-size: .84rem;
        }

        .bubble {
            width: fit-content;
            max-width: 86%;
            padding: 13px 15px;
            border-radius: 18px;
            color: var(--muted);
            background: #fff;
            box-shadow: 0 10px 24px rgba(23, 33, 43, .07);
            line-height: 1.45;
        }

        .bubble.user {
            justify-self: end;
            color: #fff;
            background: var(--aqua-dark);
        }

        .tools {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 10px;
            margin-top: 10px;
        }

        .tool {
            display: grid;
            min-height: 82px;
            place-items: center;
            gap: 7px;
            padding: 12px 8px;
            border: 1px solid var(--line);
            border-radius: 8px;
            background: rgba(255, 255, 255, .72);
            color: var(--muted);
            font-size: .78rem;
            font-weight: 800;
            text-align: center;
        }

        .tool svg {
            width: 22px;
            height: 22px;
            color: var(--aqua-dark);
        }

        .note {
            position: absolute;
            right: 0;
            bottom: 44px;
            width: min(245px, 48vw);
            padding: 18px;
            border: 1px solid rgba(244, 184, 75, .32);
            border-radius: 8px;
            background: #fff;
            box-shadow: 0 18px 46px rgba(23, 33, 43, .12);
        }

        .note strong {
            display: block;
            margin-bottom: 6px;
        }

        .note span {
            color: var(--muted);
            font-size: .92rem;
            line-height: 1.45;
        }

        footer {
            padding: 24px 0 30px;
            color: var(--muted);
            font-size: .92rem;
        }

        @media (max-width: 900px) {
            main {
                align-items: start;
            }

            .hero {
                grid-template-columns: 1fr;
            }

            .preview {
                min-height: 500px;
                order: -1;
            }

            .phone {
                min-height: 475px;
            }

            .note {
                right: 4px;
                bottom: 10px;
            }
        }

        @media (max-width: 680px) {
            .wrap {
                width: min(100% - 28px, 1120px);
            }

            header {
                padding-top: 20px;
            }

            .preview {
                min-height: 420px;
            }

            .phone {
                top: 0;
                width: min(330px, 96vw);
                min-height: 430px;
                padding: 14px;
                border-radius: 28px;
            }

            .chat {
                padding: 14px;
            }

            .bubble {
                font-size: .92rem;
            }

            .note {
                display: none;
            }

            .highlights {
                grid-template-columns: 1fr;
            }

            .actions {
                display: grid;
                grid-template-columns: 1fr;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="page">
        <header>
            <div class="wrap">
                <a class="brand" href="https://carechat.nl" aria-label="CareChat.nl">
                    <span class="brand-mark" aria-hidden="true">
                        <svg viewBox="0 0 24 24" fill="none">
                            <path d="M7.2 10.7c0-2.8 2.2-5 5-5h1.1c2.8 0 5 2.2 5 5v.3c0 2.8-2.2 5-5 5h-.8l-4.1 2.7v-2.9a5 5 0 0 1-1.2-3.2v-1.9Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                            <path d="M10 11.2h5.4M10 8.7h3.4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                        </svg>
                    </span>
                    <span>CareChat.nl</span>
                </a>
            </div>
        </header>

        <main>
            <section class="wrap hero" aria-labelledby="hero-title">
                <div>
                    <p class="eyebrow">Binnenkort beschikbaar</p>
                    <h1 id="hero-title">Zorgzame chat, dichtbij wanneer het telt.</h1>
                    <p class="lead">
                        CareChat.nl werkt aan een toegankelijke digitale plek waar mensen sneller de juiste ondersteuning, antwoorden en vervolgstappen vinden binnen zorg en welzijn.
                    </p>

                    <div class="actions" aria-label="Contact opties">
                        <a class="button button-primary" href="mailto:info@carechat.nl">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M4 6.8h16v10.4H4V6.8Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                <path d="m5 7.5 7 5 7-5" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            Neem contact op
                        </a>
                        <a class="button button-secondary" href="https://carechat.nl">
                            <svg viewBox="0 0 24 24" fill="none" aria-hidden="true">
                                <path d="M12 4v16M5 11l7-7 7 7" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            carechat.nl
                        </a>
                    </div>

                    <div class="highlights" aria-label="CareChat kenmerken">
                        <div class="highlight">
                            <strong>Menselijk</strong>
                            <span>Heldere taal en warme begeleiding.</span>
                        </div>
                        <div class="highlight">
                            <strong>Toegankelijk</strong>
                            <span>Ontworpen voor snelle hulpvragen.</span>
                        </div>
                        <div class="highlight">
                            <strong>Betrouwbaar</strong>
                            <span>Met aandacht voor privacy en zorgvuldigheid.</span>
                        </div>
                    </div>
                </div>

                <div class="preview" aria-hidden="true">
                    <div class="phone">
                        <div class="chat">
                            <div class="chat-top">
                                <span class="avatar">C</span>
                                <div>
                                    <strong>CareChat</strong>
                                    <span>Digitale zorgassistent</span>
                                </div>
                                <span class="status">online</span>
                            </div>
                            <div class="bubble">Waarmee kan ik je vandaag helpen?</div>
                            <div class="bubble user">Ik zoek passende ondersteuning voor mijn situatie.</div>
                            <div class="bubble">Ik denk met je mee en help je stap voor stap verder.</div>
                            <div class="tools">
                                <div class="tool">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M12 21s7-4.4 7-11a4 4 0 0 0-7-2.7A4 4 0 0 0 5 10c0 6.6 7 11 7 11Z" stroke="currentColor" stroke-width="1.8" stroke-linejoin="round"/>
                                    </svg>
                                    Welzijn
                                </div>
                                <div class="tool">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M12 5v14M5 12h14" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    </svg>
                                    Zorg
                                </div>
                                <div class="tool">
                                    <svg viewBox="0 0 24 24" fill="none">
                                        <path d="M6 6h12v12H6V6Z" stroke="currentColor" stroke-width="1.8"/>
                                        <path d="M9 10h6M9 14h4" stroke="currentColor" stroke-width="1.8" stroke-linecap="round"/>
                                    </svg>
                                    Advies
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="note">
                        <strong>Lancering in voorbereiding</strong>
                        <span>We bouwen aan een veilige en duidelijke ervaring voor bezoekers, zorgprofessionals en partners.</span>
                    </div>
                </div>
            </section>
        </main>

        <footer>
            <div class="wrap">
                &copy; 2026 CareChat.nl. Alle rechten voorbehouden.
            </div>
        </footer>
    </div>
</body>
</html>
