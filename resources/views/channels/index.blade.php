@extends('layouts.app')
@section('main-content')
@include('vendor.flash.message')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">Channel list</h3>
        @include('channels.partials.searchform')
      </div>
      <div class="box-body table-responsive">
        @include('channels.partials.table')
      </div>
      <div class="box-footer clearfix ">
        {!! $channels->appends(\Input::except('page'))->render() !!}
      </div>
    </div>
  </div>
</div>
@endsection