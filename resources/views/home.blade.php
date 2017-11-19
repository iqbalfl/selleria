@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="block-header">
        <h2>Dashboard</h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                    <h2>Welcome</h2>
                    <ul class="header-dropdown m-r--5">
                        <li class="dropdown">
                            <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                <i class="material-icons">more_vert</i>
                            </a>
                            <ul class="dropdown-menu pull-right">
                                <li><a href="javascript:void(0);">Action</a></li>
                                <li><a href="javascript:void(0);">Another action</a></li>
                                <li><a href="javascript:void(0);">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div class="body">
                  @can('admin-access')
                    <!-- Hover Zoom Effect -->
                    <div class="block-header">
                        <h2>Live data statistic</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-pink hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">shopping_cart</i>
                                </div>
                                <div class="content">
                                    <div class="text">Orders</div>
                                    <div class="number">{{ $orders }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-blue hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">face</i>
                                </div>
                                <div class="content">
                                    <div class="text">Members</div>
                                    <div class="number">{{ $members }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-light-blue hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">widgets</i>
                                </div>
                                <div class="content">
                                    <div class="text">Product</div>
                                    <div class="number">{{ $products }}</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <div class="info-box-3 bg-cyan hover-zoom-effect">
                                <div class="icon">
                                    <i class="material-icons">style</i>
                                </div>
                                <div class="content">
                                    <div class="text">Categories</div>
                                    <div class="number">{{ $categories }}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- #END# Hover Zoom Effect -->
                  @endcan
                  @can('customer-access')
                      Hai <b>{{auth()->user()->name}}</b>
                      - Happy Shopping :)
                  @endcan
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
