let rubyGreen;
let rubyBlue;
let rubyRed;
let rubyGold;
let island;
let heart;

let elementSpeed = 10;
let nextRubySpawn = 0;
let nextBonusSpawn = 0;

let elements = []; // Stock tous les élements affichés à l'écran
let rubyFamily = {
  // Définit les valeurs et la probabilité d'apparition de chaque rubis
  rubyGreen: { val: 1, proba: 0.75 },
  rubyBlue: { val: 5, proba: 0.15 },
  rubyRed: { val: 20, proba: 0.9 },
  rubyGold: { val: 300, proba: 0.01 },
};
let bonusFamily = {
  // Définit les vies et la probabilité d'apparition de chaque element
  island: { val: -1, proba: 0.95 },
  heart: { val: 1, proba: 0.05 },
};

function initElements() {
  rubyGreen = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/rubis/rubis-vert.png",
    ),
  );
  rubyBlue = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/rubis/rubis-bleu.png",
    ),
  );
  rubyRed = loadImage(
    window.zeldaskywardswordGame.assetUrl(
      "assets/images/rubis/rubis-rouge.png",
    ),
  );
  rubyGold = loadImage(
    window.zeldaskywardswordGame.assetUrl("assets/images/rubis/rubis-or.png"),
  );
  island = loadImage(
    window.zeldaskywardswordGame.assetUrl("assets/images/ile.png"),
  );
  heart = loadImage(
    window.zeldaskywardswordGame.assetUrl("assets/images/coeur.png"),
  );
}

function randomRubyChoice() {
  // Choisi un rubis par rapport à sa probabilité d'apparition
  let choice = random(0, 1);
  let cumul = 0;

  cumul += rubyFamily.rubyGreen.proba;
  if (choice < cumul) return { img: rubyGreen, type: "rubyGreen" };

  cumul += rubyFamily.rubyBlue.proba;
  if (choice < cumul) return { img: rubyBlue, type: "rubyBlue" };

  cumul += rubyFamily.rubyRed.proba;
  if (choice < cumul) return { img: rubyRed, type: "rubyRed" };

  return { img: rubyGold, type: "rubyGold" };
}

function randomBonusChoice() {
  // Choisi un coeur ou ile par rapport à sa probabilité d'apparition
  let choice = random(0, bonusFamily.island.proba + bonusFamily.heart.proba);

  if (choice <= bonusFamily.island.proba) {
    return { img: island, type: "island" };
  } else {
    return { img: heart, type: "heart" };
  }
}

function createRuby() {
  // Cree un element au hasard
  let randomEl = randomRubyChoice();

  elements.push({
    pos: { x: width, y: random(100, height - randomEl.img.height - 100) },
    img: randomEl.img,
    size: { w: randomEl.img.width, h: randomEl.img.height },
    type: randomEl.type,
  });
}

function createBonus() {
  // Cree un element au hasard
  let randomEl = randomBonusChoice();

  elements.push({
    pos: { x: width, y: random(100, height - randomEl.img.height - 100) },
    img: randomEl.img,
    size: { w: randomEl.img.width, h: randomEl.img.height },
    type: randomEl.type,
  });
}

function moveElements() {
  // Fait bouger et/ou supprimer les élements
  for (let i = elements.length - 1; i >= 0; i--) {
    let el = elements[i];
    el.pos.x -= elementSpeed;
    // Supprime l'élement s'il sort de l'écran
    if (el.pos.x < 0 - el.size.w) {
      elements.splice(i, 1);
    }
  }
}

function drawElements() {
  // Crée des rubis avec une fréquence aléatoire
  if (millis() > nextRubySpawn) {
    createRuby();
    nextRubySpawn = millis() + speed * 10 + random(1000 - speed * 100, 2000 - speed * 100);
  }
  // Crée des rubis avec une fréquence aléatoire
  if (millis() + speed > nextBonusSpawn) {
    createBonus();
    nextBonusSpawn = millis() + speed * 10 + random(1500 - speed * 100, 2500 - speed * 100);
  }

  moveElements();

  for (let el of elements) {
    image(el.img, el.pos.x, el.pos.y);
  }
}
