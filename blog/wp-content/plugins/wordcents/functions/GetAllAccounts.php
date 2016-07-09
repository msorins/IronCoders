<?php
/*
 * Copyright 2012 Google Inc.
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
class GetAllAccounts extends BaseExample {
	public function render($current_userID = '') {
	    $Acounts = array();
	    try {
			$clients = $this->adSenseService->adclients->listAdclients();
			if (isset($clients['items']) && is_array($clients['items'])) {
				foreach ($clients['items'] as $client) {
					$adunits = $this->adSenseService->adunits->listAdunits($client['id']);
					if (isset($adunits['items']) && is_array($adunits['items']) && count($adunits['items'])) {
						$Acounts[$client['id']] = $client['id'];
						foreach ($adunits['items'] as $adunit) {
							$Acounts[$adunit['id']] = '--'.$adunit['name'];
						}
					}
				}
			}
			return $Acounts;
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}

