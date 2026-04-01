let settingsPerso = {
  imgPerso: null,
  imgPersoJump: null,

  xPerso: 150,
  yPerso: 200,

  velocityY: 0,
  gravity: 0.4,
  jumpSpeed: -15,
  fall: true,

  // Propriétés pour le tremblement
  isShaking: false,
  shakeIntensity: 0,
  shakeStartTime: 0,
  shakeDuration: 300, // durée en ms
};

function initPerso() {
  // Charge les images (alternative à preload())
  settingsPerso.imgPerso = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/celestriers/celestrier-plane.png",
    ),
  );
  settingsPerso.imgPersoJump = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/celestriers/celestrier-vol.png",
    ),
  );
}

function createGravity() {
  // gravité constante
  settingsPerso.velocityY += settingsPerso.gravity;
  // limite la vitesse de chute
  settingsPerso.velocityY = constrain(settingsPerso.velocityY, -10, 12);
  // mouvement
  settingsPerso.yPerso += settingsPerso.velocityY;
}

function mousePressed() {
  // natif
  // Fait sauter perso
  settingsPerso.fall = false;
  settingsPerso.velocityY = settingsPerso.jumpSpeed;
  flapSound.play();
}

function updateFall() {
  // Vérifie si le perso chutte
  if (settingsPerso.yPerso < height - settingsPerso.imgPerso.height) {
    settingsPerso.fall = settingsPerso.velocityY > 0 ? true : false;
  } else {
    settingsPerso.fall = false;
  }
}

function replacePerso() {
  // Replace le perso au milieu si il sort du canva
  if (
    settingsPerso.yPerso > canvasHeight ||
    settingsPerso.yPerso < -settingsPerso.imgPerso.height
  ) {
    lives += bonusFamily.island.val;
    settingsPerso.yPerso = canvasHeight / 2 - settingsPerso.imgPerso.height;
    islandSound.play();
  }
}

function drawPerso() {
  // Fait apparaitre le perso (alternative à draw())

  // Fonctions autonomes
  createGravity();
  replacePerso();
  updateFall();
  updateShake();

  // Applique le tremblement
  let shakeOffsetX = 0;
  let shakeOffsetY = 0;
  if (settingsPerso.isShaking) {
    shakeOffsetX = random(-settingsPerso.shakeIntensity, settingsPerso.shakeIntensity);
    shakeOffsetY = random(-settingsPerso.shakeIntensity, settingsPerso.shakeIntensity);
  }

  push();
  translate(settingsPerso.xPerso + shakeOffsetX, settingsPerso.yPerso + shakeOffsetY);
  // incline selon la vitesse
  let angle = map(settingsPerso.velocityY, -4, 4, -10, 10);
  rotate(radians(angle));
  if (settingsPerso.fall) {
    image(settingsPerso.imgPerso, 0, 0);
  } else {
    image(settingsPerso.imgPersoJump, 0, 0);
  }
  pop();
}

function updateShake() {
  // Gère la durée du tremblement
  if (settingsPerso.isShaking) {
    let elapsed = millis() - settingsPerso.shakeStartTime;
    if (elapsed > settingsPerso.shakeDuration) {
      settingsPerso.isShaking = false;
      settingsPerso.shakeIntensity = 0;
    } else {
      // Réduit l'intensité progressivement
      settingsPerso.shakeIntensity = map(elapsed, 0, settingsPerso.shakeDuration, 10, 0);
    }
  }
}
