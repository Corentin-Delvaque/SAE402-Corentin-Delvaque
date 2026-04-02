let canvasWidth = window.innerWidth;
let canvasHeight = window.innerHeight;

let speed = 0.01;
let gameLaunched = false;
let scoreSent = false;

function sendScore(scoreValue) {
  const gameConfig = window.zeldaskywardswordGame || {};
  const ajaxUrl = gameConfig.ajaxUrl || "/wp-admin/admin-ajax.php";
  const body = new URLSearchParams({
    action: gameConfig.action || "give_rubies",
    score: String(scoreValue),
    nonce: gameConfig.nonce || "",
  });

  return fetch(ajaxUrl, {
    method: "POST",
    credentials: "same-origin",
    headers: {
      "Content-Type": "application/x-www-form-urlencoded; charset=UTF-8",
    },
    body: body.toString(),
  })
    .then((response) => response.json())
    .then((payload) => {
      if (!payload.success) {
        throw new Error(payload?.data?.message || "Erreur MyCRED");
      }

      console.log(payload.data?.message || "Score envoyé à MyCRED");
      return payload;
    })
    .catch((error) => {
      console.error("Erreur lors de l'envoi du score:", error);
    });
}

function preload() {
  // natif
  initBg();
  initElements();
  initPerso();
  initOverlay();
  initSounds();
}

function setup() {
  // natif
  const canvas = createCanvas(canvasWidth, canvasHeight);
  const gameContainer = document.getElementById("p5js-game-container");
  if (gameContainer) {
    canvas.parent(gameContainer);
  }
  background(70, 200, 255);
  restartGame();
  music.loop();
}

function acceleration() {
  // Fait accelérer le jeu
  moveClose += speed;
  moveMedium += speed;
  moveFar += speed;
  elementSpeed += speed;
}

function keyPressed() {
  // Affiche ou cache le menu des rubis
  if (key == "m" || key == "M") {
    if (isMenu) {
      isMenu = false;
    } else {
      isMenu = true;
    }
  }
  // Affiche ou cache le menu du début
  else if (keyCode === ENTER) {
    if (!gameLaunched) {
      // Lancer le jeu au démarrage
      gameLaunched = true;
      scoreSent = false;
      startSound.play();
      loop();
    } else if (gameLaunched && lives <= 0) {
      // Revenir au début si le jeu est terminé
      scoreSent = false;
      score = 0;
      lives = 3;
      moveClose = 8;
      moveMedium = 4;
      moveFar = 2;
      elementSpeed = 10;
      elements = [];
      gameLaunched = true;
      startSound.play();
      loop();
    }
  }
  return false;
}

function restartGame() {
  // Relance le jeu
  if (!gameLaunched) {
    drawPauseStatus();
    noLoop();
    score = 0;
    lives = 3;
    moveClose = 8;
    moveMedium = 4;
    moveFar = 2;
    elementSpeed = 10;
    elements = [];
    music.setVolume(0.2);
  }
}

function stopGame() {
  // Si plus de vies, le jeu s'arrête
  if (gameLaunched && lives <= 0) {
    drawGameOver();
    if (!scoreSent) {
      scoreSent = true;
      sendScore(score);
    }
    noLoop();
    endSound.play();
    music.setVolume(0.05);
  }
}

function draw() {
  detectTouch();
  acceleration();
  playCryRandomly();

  drawBg();
  drawElements();
  drawPerso();
  drawOverlay();
  stopGame();
  restartGame();
}
