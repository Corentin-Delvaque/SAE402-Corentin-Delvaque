let canvasWidth = window.innerWidth;
let canvasHeight = window.innerHeight;

let speed = 0.01;
let gameLaunched = false;

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
  canvas.parent("p5js-game-container");
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
      loop();
    } else if (gameLaunched && lives <= 0) {
      // Revenir au début si le jeu est terminé
      gameLaunched = false;
      score = 0;
      lives = 3;
      moveClose = 8;
      moveMedium = 4;
      moveFar = 2;
      elementSpeed = 10;
      elements = [];
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
