let score = 0;
let lives = 3;

function detectTouch() {
  // Détecte et gère les collisions entre le perso et les éléments
  for (let i = elements.length - 1; i >= 0; i--) {
    let el = elements[i];

    // Coordonnées du perso
    let px = settingsPerso.xPerso;
    let py = settingsPerso.yPerso;
    let pw = settingsPerso.imgPerso.width;
    let ph = settingsPerso.imgPerso.height;

    // Coordonnées de l'élément
    let ex = el.pos.x;
    let ey = el.pos.y;
    let ew = el.size.w;
    let eh = el.size.h;

    // Vérifie si les rectangles se chevauchent
    if (px < ex + ew && px + pw > ex && py < ey + eh && py + ph > ey) {
      // Supprime l'élément ou marque-le comme collecté
      elements.splice(i, 1);
      updateScore(el);
    }
  }
}

function updateScore(elmt) {
  // Met à jour le score et les vies en fonction des éléments collectés
  let type = elmt.type;

  if (
    type == "rubyGreen" ||
    type == "rubyBlue" ||
    type == "rubyRed" ||
    type == "rubyGold"
  ) {
    score += rubyFamily[type].val;
    rubySound.play();
  } else if (type == "island" || type == "heart") {
    lives += bonusFamily[type].val;
    // Déclenche le tremblement seulement pour l'île
    if (type == "island") {
      animationHitObstacle();
      islandSound.play();
    } else {
      heartSound.play();
    }
  }
}

function animationHitObstacle() {
  // Gère l'animation de collision avec un obstacle
  settingsPerso.isShaking = true;
  settingsPerso.shakeIntensity = 10;
  settingsPerso.shakeStartTime = millis();
}
