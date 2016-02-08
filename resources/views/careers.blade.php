@extends('app')
@section('extra_header')
<style>
	h3 > span {
		color: white;
	}
</style>
@stop
@section('content')
	<section class="careers wrap">
		<div class="container wrap-xl careers-container-bg" style="padding-top: 393px; margin-top: 50px; margin-bottom: 50px;">
		</div>
	</section>
	<section class="values careers bg-cement-texture d-wrap bg-repeat">
		<div class="container wrap-md">
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<h2 class="text-center mg-sm"></h2>
					<h3 class="text-center"><span style="color:white;">Careers Available</span></h3>

					<p class="text-justify">
						It takes a wide range of skills sets to run a forklift company.  JVEquipment's jobs include
						professional, technical, and administrative positions.  Some filler information here to describe the awesomenmess that is JVEquipment.
						Perhaps an ordered list explaining our awesomeness?  We're awesome because...
						<ol>
							<li>We have top quality staff</li>
							<li>We have top quality bidness</li>
							<li>We have top quality management</li>
							<li>We have top quality forklifts</li>
							<li>We have THE HIGHEST QUALITY POSSIBLE web developer</li>
						</ol>
					</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<h3 class="text-center mg-sm"><span>Current Job Openings</span></h3><br />
					<table class="table table-bordered table-hover" style="color: black; background-color: white;">
						<thead>
							<th>Date Posted</th>
							<th>Job Title</th>
							<th>Location</th>
						</thead>
						<tbody>
							@forelse($tCareers as $objCareer)
							<tr>
								<td><objectrow href="/careers/view_career/{{ $objCareer->id }}" />{{ $objCareer->created_at->format('m/d/Y') }}</td>
								<td>{{ $objCareer->title }}</td>
								<td>{{ $objCareer->city }}, {{ $objCareer->state}}</td>
							</tr>
							@empty
								<td colspan="99" class='text-center'>No job openings currently available.</td>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<h3 class="text-center mg-sm"><span>Employment Questions</span></h3>
					<p class="text-justify">If you have any concerns or questions, please direct your questions about JVEquipment jobs to <a href="tel: 9565555555">956-555-5555</a>.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<h3 class="text-center mg-sm"><span>Pay and Benefits</span></h3>

					<p class="text-justify">JVEquipment has high quality pay and benefits packages.  We have structured pay and benefits to attract and retain quality employees.</p>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-10 col-xs-offset-1">
					<h3 class="text-center mg-sm"><span>We care</span></h3>

					<p class="text-justify">JVEquipment is committed to creating an environment which supports and encourages diversity in the
						workplace.

						Through communication, employee involvement, and educational events, we promote and
						facilitates organizational culture change.

						JVEquipment's diversity awareness effort brings attention to the attitudes we have towards others
						who are different from us. It provides opportunities for our employees to begin to recognize those
						differences and to learn to get beyond cultural barriers.

						<i>As a fork lift company in the Rio Grande Valley, JVEquipment is an Equal Opportunity Employer and follows
							all City hiring practices.</i>
					</p>
				</div>
			</div>
		</div>
	<section>

	@include('sections.locations')
@stop
