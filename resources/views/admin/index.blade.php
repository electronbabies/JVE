@extends('admin-app')
@section('content')
                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Statistics Overview</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Dashboard
                            </li>
                        </ol>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa {{ Config::get('constants.ICON_INVOICE') }} fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count($tNewInvoices) }}</div>
                                        <div>New Orders!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/admin/invoices">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa {{ Config::get('constants.ICON_GALLERY') }} fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count($tActiveGalleryImages) }}</div>
                                        <div>Gallery Images!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/admin/gallery">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa {{ Config::get('constants.ICON_USERS') }} fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ count($tAllClients) }}</div>
                                        <div>Clients!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/admin/users">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa {{ Config::get('constants.ICON_BLOG') }} fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge">{{ $BlogCount }}</div>
                                        <div>Blog Posts!</div>
                                    </div>
                                </div>
                            </div>
                            <a href="/admin/blog">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row">
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i
										class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i> New Orders
								</h3>
							</div>
							<div class="panel-body">
								<div class="list-group">
									@forelse($tNewInvoices as $objInvoice)
										<a href="/admin/invoices/edit/{{ $objInvoice->id}}/ReturnTo/Dashboard" class="list-group-item">
											<span class="badge">{{ str_replace('before', 'ago', $objInvoice->created_at->diffForHumans(Carbon\Carbon::now())) }}</span>
											<i class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i> {{ $objInvoice->User->name }}
										</a>
									@empty
										<a href="#" class="list-group-item">
											<i class="fa fa-fw {{ Config::get('constants.ICON_INVOICE') }}"></i>
											No new orders.
										</a>
									@endforelse
								</div>
							</div>
						</div>
					</div>
                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i> Upcoming Vacations</h3>
                            </div>
                            <div class="panel-body">
                                <div class="list-group">
                                @forelse($tUpcomingVacations as $objVacation)
                                    <a href="/admin/vacations/edit/{{ $objVacation->id}}/ReturnTo/Dashboard" class="list-group-item">
                                        <span class="badge">{{ str_replace('after', '', $objVacation->from->diffForHumans(Carbon\Carbon::now())) }}</span>
                                        <i class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i> {{ $objVacation->User->name }}
                                    </a>
                                @empty
										<a href="#" class="list-group-item">
											<i class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i>
											No upcoming vacations
										</a>
                                @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
					<div class="col-lg-4">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h3 class="panel-title"><i
										class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i> Vacation Requests</h3>
							</div>
							<div class="panel-body">
								<div class="list-group">
									@forelse($tVacationRequests as $objVacation)
										<a href="/admin/vacations/edit/{{ $objVacation->id}}/ReturnTo/Dashboard" class="list-group-item">
											<span
												class="badge">{{ str_replace('after', '', $objVacation->from->diffForHumans(Carbon\Carbon::now())) }}</span>
											<i class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i> {{ $objVacation->User->name }}
										</a>
									@empty
										<a href="#" class="list-group-item">
											<i class="fa fa-fw {{ Config::get('constants.ICON_VACATION') }}"></i>
											No vacation requests.
										</a>
									@endforelse
								</div>
							</div>
						</div>
					</div>

            </div>
            <!-- /.container-fluid -->
@stop