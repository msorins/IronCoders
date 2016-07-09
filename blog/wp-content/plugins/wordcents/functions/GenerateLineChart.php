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

/**
 * Generates a Line Chart for a report.
 *
 * @author Silvano Luciani <silvano.luciani@gmail.com>
 */
class GenerateLineChart extends BaseExample {
	public function render($current_userID = '') {
		global $selGroups;
		$account_id = get_option('WordCents_account_id'.$current_userID);
		$metricDr = get_option('WordCents_DateRange'.$current_userID);
		if (!(isset($metricDr) && is_numeric($metricDr)))
			$metricDr = 6;
		$metricAr = get_option('WordCents_Metrics'.$current_userID);
		if (!(isset($metricAr) && is_array($metricAr)))
			$metricAr = array('AD_REQUESTS','INDIVIDUAL_AD_IMPRESSIONS');
		$metricGr = get_option('WordCents_GroupBy'.$current_userID);
		if (!isset($metricGr))
			$metricGr = 'DATE';
		$startDate = $this->getMonthsBeforeNow($metricDr);
		$endDate = $this->getNow();
		$columns = array(array('string', $selGroups[$metricGr]));
		foreach ($metricAr as $metric)
			$columns[] = array('number',str_replace('_',' ',$metric));
		$optParams = array(
			'metric' => $metricAr,
			'dimension' => array($metricGr),
			'filter' => 'AD_'.(count(explode(':', $account_id.':')) > 2?'UNIT':'CLIENT').'_ID=='.get_option('WordCents_account_id'.$current_userID),
			'sort' => $metricGr);
		try {
			$report = $this->adSenseService->reports->generate($startDate, $endDate, $optParams);
			if (function_exists('your_own_custom_function'))
				your_own_custom_function($report, $columns);
			//   	print_r($columns);
			foreach ($report['rows'] as &$row)
				for ($r=1;$r<count($row);$r++)
					$row[$r] = (float)$row[$r];
			$data1 = json_encode($report['rows']);
			$type = 'LineChart';
			print generateChartHtml($data1, $columns, $type, json_encode(array('title' => "adSense Data for $startDate through $endDate")), 'dataChart1');
		} catch (Exception $e) {
			return $e->getMessage();
		}
	}
}

