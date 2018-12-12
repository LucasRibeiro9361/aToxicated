var Steam = require('steam');
var GlobalOffensive = require('globaloffensive');
 
var client = new Steam.SteamClient();
var user = new Steam.SteamUser(client);
var csgo = new GlobalOffensive(user);
