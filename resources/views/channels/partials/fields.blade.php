{{csrf_field() }}
{{Form::hidden('id',isset($search->id)?$search->id:\Input::old("id"))}}
<div class="form-group @if($errors->has('first_name')) has-error @endif">
	{{Form::label('first_name','First name')}}
	{{Form::text('first_name',isset($search->first_name)?$search->first_name:\Input::old("first_name"),['class'=>'form-control','id'=>'first_name-field','placeholder'=>'Fill first name'])}}
	@if($errors->has("first_name"))
	<span class="help-block">{{ $errors->first("first_name") }}</span>
	@endif
</div>
<div class="form-group @if($errors->has('last_name')) has-error @endif">
	{{Form::label('last_name','Last name')}}
	{{Form::text('last_name',isset($search->last_name)?$search->last_name:\Input::old("last_name"),['class'=>'form-control','id'=>'last_name-field','placeholder'=>'Fill last name'])}}
	@if($errors->has("last_name"))
	<span class="help-block">{{ $errors->first("last_name") }}</span>
	@endif
</div>
<div class="form-group @if($errors->has('email')) has-error @endif">	
	{{Form::label('email','Email')}}
	{{Form::text('email',isset($search->email)?$search->email:\Input::old("email"),['class'=>'form-control','id'=>'email-field','placeholder'=>'Fill Your email'])}}
	@if($errors->has("email"))
	<span class="help-block">{{ $errors->first("email") }}</span>
	@endif
</div>
<div class="form-group @if($errors->has('bio')) has-error @endif">
	{{Form::label('bio','Bio')}}
	{{Form::textarea('bio',isset($search->bio)?$search->bio:\Input::old("bio"),['class'=>'form-control','id'=>'bio-field','placeholder'=>'Fill Your bio'])}}
	@if($errors->has("bio"))
	<span class="help-block">{{ $errors->first("bio") }}</span>
	@endif
</div>