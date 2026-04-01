let endSound;
let startSound;
let islandSound;
let rubySound;
let heartSound;
let flapSound;
let crySound;
let music;
let lastCryTime = 0;
let crySoundInterval = 3000; // Délai minimum entre les cris (en millisecondes)

function initSounds() {
  endSound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/zelda-chest.mp3",
  );
  startSound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/zelda-chest.mp3",
  );
  islandSound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/hit-island.mp3",
  );
  rubySound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/collect-ruby.mp3",
  );
  heartSound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/collect-heart.mp3",
  );
  flapSound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/flap-bird.mp3",
  );
  crySound = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/eagle-sound.mp3",
  );
  music = loadSound(
    "http://la-boutique-zelda.wp.local/wp-content/themes/zeldaskywardsword/assets/jeu-video/assets/son/Exploring-The-Sky.mp3",
  );

  endSound.setVolume(0.3);
  startSound.setVolume(1);
  islandSound.setVolume(1);
  rubySound.setVolume(1);
  heartSound.setVolume(0.3);
  flapSound.setVolume(1);
  crySound.setVolume(1);
  music.setVolume(0.2);
}

function playCryRandomly() {
  // Joue le son de cri aléatoirement pendant que le jeu est lancé
  if (gameLaunched && millis() - lastCryTime > crySoundInterval) {
    // Probabilité de 0.1% de jouer le son à chaque frame
    if (random(100) < 0.1) {
      crySound.play();
      lastCryTime = millis();
    }
  }
}
