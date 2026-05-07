const canvas = document.querySelector("#game");
const ctx = canvas.getContext("2d");
const scoreEl = document.querySelector("#score");
const timeEl = document.querySelector("#time");
const messageEl = document.querySelector("#message");
const throwButton = document.querySelector("#throw");
const restartButton = document.querySelector("#restart");
const leftButton = document.querySelector("#left");
const rightButton = document.querySelector("#right");

const game = {
    score: 0,
    targetScore: 5,
    timeLeft: 45,
    running: false,
    finished: false,
    lastTick: 0,
    basket: { x: 724, y: 348, w: 178, h: 124, direction: 1 },
    player: { x: 180, y: 404, angle: -36 },
    banana: null,
};

function showMessage(title, detail) {
    messageEl.innerHTML = `<strong>${title}</strong><span>${detail}</span>`;
    messageEl.classList.add("is-visible");
}

function hideMessage() {
    messageEl.classList.remove("is-visible");
}

function updateHud() {
    scoreEl.textContent = game.score;
    timeEl.textContent = Math.max(0, Math.ceil(game.timeLeft));
}

function resetGame() {
    game.score = 0;
    game.timeLeft = 45;
    game.running = false;
    game.finished = false;
    game.player.angle = -36;
    game.basket.x = 724;
    game.basket.direction = 1;
    game.banana = null;
    updateHud();
    showMessage("Start klaar", "Gebruik pijltjes of A/D om te richten. Spatie of de knop gooit.");
    draw();
}

function startGame() {
    if (game.finished) {
        resetGame();
    }

    game.running = true;
    hideMessage();
}

function throwBanana() {
    if (game.banana) {
        return;
    }

    startGame();

    const radians = (game.player.angle * Math.PI) / 180;
    const speed = 760;

    game.banana = {
        x: game.player.x + 46,
        y: game.player.y - 84,
        vx: Math.cos(radians) * speed,
        vy: Math.sin(radians) * speed,
        rotation: radians,
    };
}

function aim(delta) {
    game.player.angle = Math.max(-68, Math.min(-18, game.player.angle + delta));
}

function finish(won) {
    game.running = false;
    game.finished = true;
    game.banana = null;

    if (won) {
        showMessage("Festivalmand gevuld", "Johannes Wilhelmus de 4de heeft alle bananen netjes bezorgd.");
    } else {
        showMessage("Tijd voorbij", "Druk op Opnieuw en probeer de mand sneller te raken.");
    }
}

function update(deltaSeconds) {
    if (!game.running || game.finished) {
        return;
    }

    game.timeLeft -= deltaSeconds;
    if (game.timeLeft <= 0) {
        game.timeLeft = 0;
        updateHud();
        finish(false);
        return;
    }

    game.basket.x += game.basket.direction * 120 * deltaSeconds;
    if (game.basket.x < 625 || game.basket.x > 775) {
        game.basket.direction *= -1;
    }

    if (game.banana) {
        game.banana.vy += 1120 * deltaSeconds;
        game.banana.x += game.banana.vx * deltaSeconds;
        game.banana.y += game.banana.vy * deltaSeconds;
        game.banana.rotation += 5 * deltaSeconds;

        const c = game.banana;
        const b = game.basket;
        const hit =
            c.x > b.x + 28 &&
            c.x < b.x + b.w - 28 &&
            c.y > b.y + 42 &&
            c.y < b.y + b.h;

        if (hit) {
            game.score += 1;
            game.banana = null;
            updateHud();

            if (game.score >= game.targetScore) {
                finish(true);
            }
        } else if (c.y > canvas.height + 70 || c.x > canvas.width + 80 || c.x < -80) {
            game.banana = null;
        }
    }

    updateHud();
}

function drawBackground() {
    const gradient = ctx.createLinearGradient(0, 0, 0, canvas.height);
    gradient.addColorStop(0, "#b8dff4");
    gradient.addColorStop(.58, "#dff4e8");
    gradient.addColorStop(1, "#8fcaa9");
    ctx.fillStyle = gradient;
    ctx.fillRect(0, 0, canvas.width, canvas.height);

    ctx.fillStyle = "#f2b84b";
    ctx.beginPath();
    ctx.arc(820, 88, 42, 0, Math.PI * 2);
    ctx.fill();

    ctx.fillStyle = "#6fb68d";
    ctx.fillRect(0, 438, canvas.width, 102);

    ctx.fillStyle = "rgba(18, 98, 61, .22)";
    for (let x = -40; x < canvas.width; x += 80) {
        ctx.beginPath();
        ctx.ellipse(x, 480, 70, 16, -.2, 0, Math.PI * 2);
        ctx.fill();
    }
}

function drawPlayer() {
    const { x, y, angle } = game.player;

    ctx.save();
    ctx.translate(x, y);

    ctx.fillStyle = "#26323b";
    ctx.fillRect(-19, -68, 38, 70);

    ctx.fillStyle = "#f0b486";
    ctx.beginPath();
    ctx.arc(0, -102, 31, 0, Math.PI * 2);
    ctx.fill();

    ctx.fillStyle = "#17212b";
    ctx.beginPath();
    ctx.arc(-10, -110, 3, 0, Math.PI * 2);
    ctx.arc(10, -110, 3, 0, Math.PI * 2);
    ctx.fill();

    ctx.strokeStyle = "#17212b";
    ctx.lineWidth = 3;
    ctx.beginPath();
    ctx.arc(0, -98, 10, .15, Math.PI - .15);
    ctx.stroke();

    ctx.fillStyle = "#234156";
    ctx.fillRect(-27, -40, 18, 55);
    ctx.fillRect(9, -40, 18, 55);

    ctx.save();
    ctx.translate(22, -75);
    ctx.rotate((angle * Math.PI) / 180);
    ctx.strokeStyle = "#f0b486";
    ctx.lineWidth = 13;
    ctx.lineCap = "round";
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(76, 0);
    ctx.stroke();
    ctx.restore();

    ctx.fillStyle = "#ffffff";
    ctx.font = "700 16px system-ui";
    ctx.textAlign = "center";
    ctx.fillText("Johannes", 0, -47);

    ctx.restore();
}

function drawBasket() {
    const b = game.basket;

    ctx.save();
    ctx.translate(b.x, b.y);

    ctx.fillStyle = "#f8d97a";
    ctx.beginPath();
    ctx.moveTo(20, 38);
    ctx.quadraticCurveTo(b.w / 2, -28, b.w - 20, 38);
    ctx.lineTo(b.w - 4, b.h - 14);
    ctx.quadraticCurveTo(b.w / 2, b.h + 18, 4, b.h - 14);
    ctx.closePath();
    ctx.fill();

    ctx.strokeStyle = "#b57334";
    ctx.lineWidth = 8;
    ctx.stroke();

    ctx.fillStyle = "#7b4528";
    ctx.beginPath();
    ctx.ellipse(b.w / 2, 73, 58, 34, 0, 0, Math.PI * 2);
    ctx.fill();

    ctx.fillStyle = "#fff8dd";
    ctx.font = "900 24px system-ui";
    ctx.textAlign = "center";
    ctx.fillText("KITO", b.w / 2, 36);

    ctx.strokeStyle = "#d89a44";
    ctx.lineWidth = 5;
    for (let x = 28; x < b.w - 20; x += 28) {
        ctx.beginPath();
        ctx.moveTo(x, 45);
        ctx.lineTo(x - 10, b.h - 12);
        ctx.stroke();
    }
    ctx.restore();
}

function drawBanana() {
    if (!game.banana) {
        return;
    }

    const c = game.banana;
    ctx.save();
    ctx.translate(c.x, c.y);
    ctx.rotate(c.rotation);

    ctx.strokeStyle = "#f3c431";
    ctx.lineWidth = 18;
    ctx.lineCap = "round";
    ctx.beginPath();
    ctx.moveTo(-34, -10);
    ctx.quadraticCurveTo(0, 20, 38, -7);
    ctx.stroke();

    ctx.strokeStyle = "#ffe680";
    ctx.lineWidth = 6;
    ctx.beginPath();
    ctx.moveTo(-20, -4);
    ctx.quadraticCurveTo(3, 12, 27, -3);
    ctx.stroke();

    ctx.fillStyle = "#6b4a21";
    ctx.beginPath();
    ctx.arc(-37, -11, 4, 0, Math.PI * 2);
    ctx.arc(40, -8, 4, 0, Math.PI * 2);
    ctx.fill();
    ctx.restore();
}

function drawPowerLine() {
    const { x, y, angle } = game.player;
    const radians = (angle * Math.PI) / 180;

    ctx.save();
    ctx.translate(x + 22, y - 75);
    ctx.rotate(radians);
    ctx.strokeStyle = "rgba(18, 98, 61, .35)";
    ctx.setLineDash([10, 9]);
    ctx.lineWidth = 4;
    ctx.beginPath();
    ctx.moveTo(0, 0);
    ctx.lineTo(230, 0);
    ctx.stroke();
    ctx.restore();
}

function draw() {
    drawBackground();
    drawPowerLine();
    drawBasket();
    drawPlayer();
    drawBanana();
}

function loop(timestamp) {
    if (!game.lastTick) {
        game.lastTick = timestamp;
    }

    const deltaSeconds = Math.min((timestamp - game.lastTick) / 1000, .04);
    game.lastTick = timestamp;

    update(deltaSeconds);
    draw();
    requestAnimationFrame(loop);
}

document.addEventListener("keydown", (event) => {
    if (event.key === "ArrowLeft" || event.key.toLowerCase() === "a") {
        aim(-3);
    }

    if (event.key === "ArrowRight" || event.key.toLowerCase() === "d") {
        aim(3);
    }

    if (event.code === "Space") {
        event.preventDefault();
        throwBanana();
    }
});

leftButton.addEventListener("click", () => aim(-4));
rightButton.addEventListener("click", () => aim(4));
throwButton.addEventListener("click", throwBanana);
restartButton.addEventListener("click", resetGame);

resetGame();
requestAnimationFrame(loop);
