(function (window) {
  window.zeldaskywardswordGame = window.zeldaskywardswordGame || {};

  const gameConfig = window.zeldaskywardswordGame;

  gameConfig.assetBaseUrl = gameConfig.assetBaseUrl || "";
  gameConfig.ajaxUrl = gameConfig.ajaxUrl || "/wp-admin/admin-ajax.php";
  gameConfig.nonce = gameConfig.nonce || "";
  gameConfig.action = gameConfig.action || "give_rubies";
  gameConfig.assetUrl = function (path) {
    const baseUrl = String(gameConfig.assetBaseUrl || "").replace(/\/$/, "");
    const cleanPath = String(path || "").replace(/^\/+/, "");

    return `${baseUrl}/${cleanPath}`;
  };
})(window);
