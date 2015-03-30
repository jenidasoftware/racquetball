<?php namespace App\Services;

use App\Scraper;
use App\Ranking;
use App\Tournament;

class ScreenScraper {

	/**
	 * Insert new Ranking
	 *
	 * @param  array  $data
	 * @return Ranking
	 */

	public function create_ranking(array $data)
	{

			return Ranking::create([
				'ranking_date' => $data['ranking_date'],
				'player_id' => $data['player_id'],
				'ranking' =>  $data['ranking'],
			]);

	}

	/**
	 * Insert new Tournament
	 *
	 * @param  array  $data
	 * @return Tournament
	 */

	public function create_tournament(array $data)
	{

			return Tournament::create([
				'tournament_id' => $data['tournament_id'],				
				'name' => $data['name'],
				'location' =>  $data['location'],
				'start_date' => $data['start_date'],
				'end_date' => $data['end_date'],
			]);

	}

}
