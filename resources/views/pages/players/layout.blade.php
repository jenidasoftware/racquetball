@extends('layouts.app')

@section('style')
	<style type="text/css">
		.td-profile-head {
			font-weight: bold;
			padding-right: 5px;
		}
		.tournament {
			font-weight: bold;
			font-size: 12pt;
			color: #fff;
		}

		.tr-games{
			font-weight: bold;
			text-align: center;
		}
		.seed {
			width:15px;
			font-size: 9pt;
			color:gray;
		}
		.games {
			font-weight: bolder;
			text-align: right;
		}
		.winner {
			color:green;
			font-weight: bold;
		}
		.loser {
			color:gray;
			font-weight: bold;
		}
		.high-score {
			color:green;
			font-weight: bold;
			text-align: center;
		}
		.low-score {
			color:gray;
			font-weight: bold;
			text-align: center;
		}
	</style>
@stop

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-primary">
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4">
							<h3 style="">{{ $player->first_name }} {{ $player->last_name }} </h3>
						</div>						
					</div>
					<div class="row">
					   	<div class="col-md-2">
							<img src={{ 'http://www.r2sports.com/tourney/imageGallery/gallery/player/'.$player->player_id.'_normal.jpg' }} class="img-thumbnail" width="100" >
						</div>
						<div class="col-md-3">
							<table>								
								<tr>
				                    <td class="td-profile-head">National Rank:</td><td> {{ $player->national_rank }}</td>
				                 </tr>
				                <tr>
				                    <td class="td-profile-head">State Rank:</td><td>{{ $player->state_rank}}</td>
				                </tr>
								<tr>
				                    <td class="td-profile-head">Tracking #:</td><td>{{ $player->tracking_id }}</td>
				                </tr>
				                <tr>
				                    <td class="td-profile-head">Tracking:</td><td>{{ $player->tracking }}</td>
				                </tr>				                
							</table>							
						</div>
						<div class="col-md-3">
							<table>
								<tr>
									<td class="td-profile-head">Skill Level:</td><td>{{ $player->skill_level }}</td>
								</tr>
							</table>	
						</div>	
						<div class="col-md-3">
							<table>
								<tr>
									<td class="td-profile-head">Home:</td><td>{{ $player->home }}</td>
								</tr>
								<tr>
									<td class="td-profile-head">Gender:</td><td>{{ $player->gender }}</td>
								</tr>
							</table>	
						</div>
					</div>	
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<ul class="nav nav-pills">
				<li><a href="#">Profile</a></li>
				<li class="active"><a href="#">Tournaments</a></li>
				<li><a href="#">My Journal</a></li>
				<li><a href="#">My Gallery</a></li>
			</ul>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table">
				<!--thead>
					<th>Date</th>
					<th>Tournament</th>
					<th>Result</th>
				</thead-->
				<tbody>
				@foreach ($tournaments as $tournament)
					<tr class="tournament label-success">		
						<td>{{ $tournament->start_date }}</td>
						<td>{{ $tournament->name }}  </td>
						<td> 1st Place  </td>
					</tr>
					<tr>
						<td colspan="3">
							<table class="table">
								<thead>
									<th>Div</th>
									<th>Format</th>
									<th>Round</th>
									<th>Results</th>										
								</thead>
								<tbody>		
									@foreach ($matches as $m)
									<tr>	
										<td>{{ $m->match_division }} </td>						
										<td>{{ $m->match_type }} </td>
										<td>Rnd 1</td>
										<td>
											<table class="table table-condensed">
												<tr class="tr-games label-info">
													<td></td>
													<td class="games">Gm</td>
													<td class="">1</td>
													<td class="">2</td>
													<td class="">3</td>
													<td class="">4</td>
													<td class="">5</td>
												</tr>
												<tr>
													<td class="seed">[1]</td>
													<td class="winner">{{ $m->winner_first_name.' '.$m->winner_last_name}}</td>
													<td class="high-score">15</td>
													<td class="low-score">12</td>
													<td class="high-score">11</td>
													<td class="low-score"></td>
													<td class="low-score"></td>
												</tr>
												<tr>
													<td class="seed">[2]</td>
													<td class="loser">{{ $m->loser_first_name.' '.$m->loser_last_name }}</td>
													<td class="low-score">10</td>
													<td class="high-score">15</td>
													<td class="low-score">3</td>
													<td class="low-score"></td>
													<td class="low-score"></td>
												</tr>
											</table>
										</td>													
									</tr>
									@endforeach	
								</tbody>
							</table>									
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
		</div>
	</div>
</div>
@stop