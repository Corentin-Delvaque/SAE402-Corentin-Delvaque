let stats;
let Menu;
let MenuMini;
let overStart;

let isMenu = false;

function initOverlay() {
  stats = loadImage(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/images/statistiques.png",
  );
  Menu = loadImage(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/images/valeurs-rubis.png",
  );
  MenuMini = loadImage(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/images/valeurs-rubis-mini.png",
  );
  overStart = loadImage(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/images/over-start.png",
  );
  overEnd = loadImage(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/images/over-end.png",
  );
}

function textParameters() {
  // Paramètres du texte
  textSize(42);
  textFont("Cinzel Decorative");
  textStyle(BOLD);
  fill(231, 187, 109);
}

function displayScore() {
  // Affiche le score et les vies
  push();
  // Affiche le fond des statistiques
  translate(20, 20);
  image(stats, 0, 0);
  translate(30, 65);

  // Affiche le score et une img de rubis
  push();
  scale(0.5);
  image(rubyGreen, 0, -75);
  pop();
  text("x" + score, 50, 5);
  translate(195, 0);

  // Affiche les vies et une img de coeur
  push();
  scale(0.5);
  image(heart, 0, -60);
  pop();
  text("x" + lives, 60, 5);
  pop();
}

function displayMenu() {
  let img;
  push();
  if (isMenu) {
    img = Menu;
  } else {
    img = MenuMini;
  }
  // N'affiche le menu que si la largeur de la fenêtre est suffisante
  if (width > 800) {
    translate(width - img.width - 20, 20);
    image(img, 0, 0);
  }
  pop();
}

function drawPauseStatus() {
  // Affiche le menu de lancement du jeu
  push();
  background(0, 0, 0, 150);
  translate(width / 2 - overStart.width / 2, height / 2 - overStart.height / 2);
  image(overStart, 0, 0);
  pop();
}

function drawGameOver() {
  // Affiche le menu de fin du jeu
  push();
  background(0, 0, 0, 150);
  translate(width / 2 - overEnd.width / 2, height / 2 - overEnd.height / 2);
  image(overEnd, 0, 0);

  translate(overEnd.width / 2 - rubyGreen.width, 225);
  push();
  scale(0.5);
  image(rubyGreen, 0, -75);
  pop();
  text("x" + score, 50, 5);
  translate(195, 0);
  pop();
}

function drawOverlay() {
  textParameters();
  displayScore();
  displayMenu();
}
