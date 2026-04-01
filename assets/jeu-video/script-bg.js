// Déclaration des images
let cloudClose;
let cloudMedium;
let cloudFar;

// Vitesse de déplacement des nuages
let moveClose = 8;
let moveMedium = 4;
let moveFar = 2;

// Positions x des nuages
let xCloudClose = 0;
let xCloudMedium = 0;
let xCloudFar = 0;

function initBg() {
  // Charge les images (alternative à preload())
  cloudClose = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/nuages/cloud-close.png",
    ),
  );
  cloudMedium = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/nuages/cloud-medium.png",
    ),
  );
  cloudFar = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/nuages/cloud-far.png",
    ),
  );
}

function moveClouds(cloud, X, move) {
  // Fait bouger les nuages
  // cloud -> l'image du nuage
  // X -> la position x du nuage
  // move -> la vitesse de déplacement du nuage
  if (X + cloud.width <= 0) {
    return 0;
  } else {
    return X - move;
  }
}

function drawBg() {
  // Fait apparaitre le background (alternative à draw())

  // bg
  background(70, 200, 255);
  // soleil
  push();
  fill(255, 255, 30);
  noStroke();
  circle(100, 100, 400);
  pop();

  // Affiche les nuages
  // 1er plan
  image(cloudFar, xCloudFar, 0);
  image(cloudFar, xCloudFar + cloudFar.width, 0);
  xCloudFar = moveClouds(cloudFar, xCloudFar, moveFar);

  // 2eme plan
  image(cloudMedium, xCloudMedium, 0);
  image(cloudMedium, xCloudMedium + cloudMedium.width, 0);
  xCloudMedium = moveClouds(cloudMedium, xCloudMedium, moveMedium);

  // 3eme plan
  image(cloudClose, xCloudClose, 0);
  image(cloudClose, xCloudClose + cloudClose.width, 0);
  xCloudClose = moveClouds(cloudClose, xCloudClose, moveClose);
}
