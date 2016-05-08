@extends('layouts.app')
@section('htmlheader_title')
Home
@endsection
@section('main-content')
<div class="box">
	<div class="box-header with-border">
		<h3 class="box-title">Default Box Example</h3>
		<div class="box-tools pull-right">
			<span class="label label-primary"></span>
		</div>
	</div>
	<div class="box-body">
		<div class="row">
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="info-box bg-red">
					<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Users</span>
						<span class="info-box-number">{{$info->usersCount}}</span>
						<!-- The progress section is optional -->
						<div class="progress">
							<div class="progress-bar" style="width: {{$info->usersActivePercent}}%"></div>
						</div>
						<span class="progress-description">
							Active users - {{$info->usersActive}}
						</span>
					</div>
				</div>
			</div>

			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="info-box bg-aqua">
					<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Servers</span>
						<span class="info-box-number">{{$info->serversCount}}</span>
						<!-- The progress section is optional -->
						<div class="progress">
							<div class="progress-bar" style="width: {{$info->serversActivePercent}}%"></div>
						</div>
						<span class="progress-description">
							Active servers {{$info->serversActiveCount}}
						</span>
					</div>
				</div>
			</div>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<div class="info-box bg-green">
					<span class="info-box-icon"><i class="fa fa-comments-o"></i></span>
					<div class="info-box-content">
						<span class="info-box-text">Channels</span>
						<span class="info-box-number">{{$info->channelsCount}}</span>
						<!-- The progress section is optional -->
						<div class="progress">
							<div class="progress-bar" style="width: {{$info->channelsActivePercent}}%"></div>
						</div>
						<span class="progress-description">
							Active channels {{$info->channelsActive}}
						</span>
					</div>
				</div>
			</div>

		</div>
		
	</div>
	<div class="box-footer">
		The footer of the box
	</div>
</div>
@endsection