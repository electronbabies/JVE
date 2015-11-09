@extends('app')

@section('content')
	<div class="wrap {{ $BGColor or Config::get('constants.COLOR_LIGHT_BLUE') }} d-wrap">
		<div class="container wrap-lg">
			<div class="row">
				<div class="col-sm-12">
					<h6 class="text-center  mg-md">
					</h6>

					<h2 class=" text-center mg-sm tc-white">
						Success
					</h2>

					<h3 class="text-center mg-md	">
						<span>Your request has been submitted!</span>
					</h3>
				</div>
			</div>
			<div class="row voffset-sm">
				<div class="col-sm-12">
					<p class="text-center">
						Your browser will be redirect to main page in <span id="RedirectTimer">5</span> seconds...
					</p>
				</div>
			</div>
		</div>
	</div>
@include('sections.locations', ['BGColor' => Config::get('constants.COLOR_DARK_BLUE')] )

<script type="text/javascript">
	var Seconds = 5;

	var TimerID = setInterval(function () {
		Seconds--;
		$('#RedirectTimer').html(Seconds);
		if(Seconds == 0) {
			clearInterval(TimerID);
			window.location.href = '/';
		}
	}, 1000);

</script>
@stop