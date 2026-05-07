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
    basket: { x: 760, y: 386, w: 130, h: 88, direction: 1 },
    player: { x: 180, y: 404, angle: -38 },
    cucumber: null,
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
    game.player.angle = -38;
    game.basket.x = 760;
    game.basket.direction = 1;
    game.cucumber = null;
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

function throwCucumber() {
    if (game.cucumber) {
        return;
    }

    startGame();

    const radians = (game.player.angle * Math.PI) / 180;
    const speed = 760;

    game.cucumber = {
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
    game.cucumber = null;

    if (won) {
        showMessage("Mand gevuld", "Johannes Wilhelmus de 4de heeft alle komkommers netjes bezorgd.");
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

    game.basket.x += game.basket.direction * 130 * deltaSeconds;
    if (game.basket.x < 650 || game.basket.x > 820) {
        game.basket.direction *= -1;
    }

    if (game.cucumber) {
        game.cucumber.vy += 1120 * deltaSeconds;
        game.cucumber.x += game.cucumber.vx * deltaSeconds;
        game.cucumber.y += game.cucumber.vy * deltaSeconds;
        game.cucumber.rotation += 5 * deltaSeconds;

        const c = game.cucumber;
        const b = game.basket;
        const hit =
            c.x > b.x &&
            c.x < b.x + b.w &&
            c.y > b.y &&
            c.y < b.y + b.h;

        if (hit) {
            game.score += 1;
            game.cucumber = null;
            updateHud();

            if (game.score >= game.targetScore) {
                finish(true);
            }
        } else if (c.y > canvas.height + 70 || c.x > canvas.width + 80 || c.x < -80) {
            game.cucumber = null;
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
    ctx.strokeStyle = "#9b6335";
    ctx.lineWidth = 10;
    ctx.beginPath();
    ctx.arc(b.w / 2, 12, 48, Math.PI, 0);
    ctx.stroke();

    ctx.fillStyle = "#c88345";
    ctx.fillRect(0, 22, b.w, b.h - 22);
    ctx.fillStyle = "#a96a35";
    for (let x = 10; x < b.w; x += 24) {
        ctx.fillRect(x, 26, 9, b.h - 28);
    }
    ctx.fillStyle = "#e2a762";
    ctx.fillRect(0, 50, b.w, 12);
    ctx.restore();
}

function drawCucumber() {
    if (!game.cucumber) {
        return;
    }

    const c = game.cucumber;
    ctx.save();
    ctx.translate(c.x, c.y);
    ctx.rotate(c.rotation);
    ctx.fillStyle = "#1f8d59";
    ctx.beginPath();
    ctx.moveTo(-28, -10);
    ctx.lineTo(28, -10);
    ctx.quadraticCurveTo(38, -10, 38, 0);
    ctx.quadraticCurveTo(38, 10, 28, 10);
    ctx.lineTo(-28, 10);
    ctx.quadraticCurveTo(-38, 10, -38, 0);
    ctx.quadraticCurveTo(-38, -10, -28, -10);
    ctx.fill();
    ctx.fillStyle = "#c7ef7a";
    ctx.beginPath();
    ctx.arc(-25, -2, 3, 0, Math.PI * 2);
    ctx.arc(0, 5, 3, 0, Math.PI * 2);
    ctx.arc(24, -4, 3, 0, Math.PI * 2);
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
    drawCucumber();
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
        throwCucumber();
    }
});

leftButton.addEventListener("click", () => aim(-4));
rightButton.addEventListener("click", () => aim(4));
throwButton.addEventListener("click", throwCucumber);
restartButton.addEventListener("click", resetGame);

resetGame();
requestAnimationFrame(loop);
