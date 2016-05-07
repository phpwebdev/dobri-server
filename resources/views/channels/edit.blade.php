@extends('layout')
@section('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/css/bootstrap-datepicker.css" rel="stylesheet">
@endsection
@section('header')

<div class="page-header">
  <div class="pull-left">
    <h1><i class="glyphicon glyphicon-edit"></i> Searches / Edit #{{$search->id}}</h1>
  </div>
  <div class="pull-right">
      
  </div>
  <div class="clearfix"></div>
</div>

@endsection
@section('content')

<div class="row">
  <div class="col-md-12">
    
      {{Form::open(['route'=>['searches.update',$search->id],'method'=>'PUT'])}}
      @include('searches.partials.fields')
      <div class="well well-sm">
        <button type="submit" class="btn btn-primary">Save</button>
        <a class="btn btn-link pull-right" href="{{ route('searches.index') }}"><i class="glyphicon glyphicon-backward"></i>  Back</a>
      </div>
    </form>
  </div>
</div>
@endsection
@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.0/js/bootstrap-datepicker.min.js"></script>
<script>
$('.date-picker').datepicker({
});
</script>
@endsection