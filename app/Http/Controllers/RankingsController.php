<?php namespace App\Http\Controllers;

use App\Ranking;
use App\Group;
use App\Location;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class RankingsController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//$rankings = Ranking::all();

		$latest_date = \DB::table('rankings')
						->max('ranking_date');
						
		$groups = group::lists('name','group_id');
		$locations = location::lists('location','location_id');

		$rankings = \DB::table('rankings')
				->leftJoin('players', 'rankings.player_id', '=', 'players.player_id')
				->where('ranking_date', '=', $latest_date)
				->get();

		return view('pages/rankings', compact('rankings', 'groups', 'locations'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show(Request $request)
	{

		$groups = group::lists('name','group_id');
		$locations = location::lists('location','location_id');

		$group_id = $request->input('group_id');
		$location_id = $request->input('location_id');

		$latest_date = \DB::table('rankings')
						->max('ranking_date');
						
		$rankings = \DB::table('rankings')
				->join('players', 'rankings.player_id', '=', 'players.player_id')
				->join('groups', 'rankings.group_id', '=', 'groups.group_id')
				->join('locations', 'rankings.location_id', '=', 'locations.location_id')
				->where('ranking_date', '=', $latest_date)
				->where('rankings.group_id', '=', $group_id)
				->where('rankings.location_id', '=', $location_id)
				->distinct()
				->get();

		return view('pages/rankings', compact('rankings', 'groups', 'locations'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
