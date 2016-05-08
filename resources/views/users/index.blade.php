@extends('layouts.app')
@section('main-content')
@include('vendor.flash.message')
<div class="row">
  <div class="col-xs-12">
    <div class="box">
      <div class="box-header">
        <h3 class="box-title">User list</h3>
        @include('users.partials.searchform')
      </div>
      <div class="box-body table-responsive">
        @include('users.partials.table')
      </div>
      <div class="box-footer clearfix ">
        {!! $users->appends(\Input::except('page'))->render() !!}
      </div>
    </div>
  </div>
</div>
@endsection