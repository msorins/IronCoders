<?php
/*
 * Copyright 2011 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */
require_once "src/apiClient.php";
require_once "src/contrib/apiAdsenseService.php";
/**
 * Handles authentication and OAuth token.
 * @author Silvano Luciani <silvano.luciani@gmail.com>
 */
class AdSenseAuth {
  protected $apiClient;
  protected $adSenseService;
  private $user;
  public function __construct() {
    $this->apiClient = new apiClient();
  	global $apiCredentials;
    $this->apiClient->setClientId($apiCredentials['ClientId']);
    $this->apiClient->setClientSecret($apiCredentials['ClientSecret']);
    $this->apiClient->setRedirectUri($apiCredentials['RedirectUri']);
    $this->apiClient->setDeveloperKey('AIzaSyBgm2QSSVq2IzIHl_4PwddQyDUa_v_BH7k');
    $this->adSenseService = new apiAdsenseService($this->apiClient);
  }
  public function authenticate($user) {
  	$token = get_option('WordCents_oauth_token'.$user);
    if ($token)
      $this->apiClient->setAccessToken($token);
    else {
      $this->apiClient->setScopes(array("https://www.googleapis.com/auth/adsense.readonly"));
      $token = $this->apiClient->authenticate();
      $this->apiClient->setAccessToken($token);
      update_option('WordCents_oauth_token'.$user, $token);
    }
  }
  public function getAdSenseService() {
    return $this->adSenseService;
  }
}

