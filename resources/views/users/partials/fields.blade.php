{{csrf_field() }}
{{Form::hidden('id',isset($user->id)?$user->id:\Input::old("id"))}}

{{--
<div class="form-group @if($errors->has('user_name')) has-error @endif">
	{{Form::label('user_name','user name')}}
	{{Form::text('user_name',isset($user->user_name)?$user->user_name:\Input::old("user_name"),['class'=>'form-control','id'=>'user_name-field','placeholder'=>'Fill user_name'])}}
	@if($errors->has("user_name"))
	<span class="help-block">{{ $errors->first("user_name") }}</span>
	@endif
</div>
--}}
{{--
<div class="form-group @if($errors->has('server_id')) has-error @endif">
	{{Form::label('server_id','Name')}}
	{{Form::select('server_id',$servers,isset($user->server_id)?$user->server_id:\Input::old("server_id"),['class'=>'form-control','id'=>'server_id-field','placeholder'=>'Pick a server...'])}}
	@if($errors->has("server_id"))
	<span class="help-block">{{ $errors->first("server_id") }}</span>
	@endif
</div>
--}}

<div class="form-group @if($errors->has('name')) has-error @endif">	
	{{Form::label('name','Name')}}
	{{Form::text('name',isset($user->name)?$user->name:\Input::old("name"),['class'=>'form-control','id'=>'name-field','placeholder'=>'Fill Your name'])}}
	@if($errors->has("name"))
	<span class="help-block">{{ $errors->first("name") }}</span>
	@endif
</div>

<div class="form-group @if($errors->has('email')) has-error @endif">	
	{{Form::label('email','Email')}}
	{{Form::text('email',isset($user->email)?$user->email:\Input::old("email"),['class'=>'form-control','id'=>'email-field','placeholder'=>'Fill Your email'])}}
	@if($errors->has("email"))
	<span class="help-block">{{ $errors->first("email") }}</span>
	@endif
</div>


<div class="form-group @if($errors->has('password')) has-error @endif">	
	{{Form::label('password','Password')}}
	{{Form::password('password',['class'=>'form-control','id'=>'password-field','placeholder'=>'Fill Your password'])}}
	@if($errors->has("password"))
	<span class="help-block">{{ $errors->first("password") }}</span>
	@endif
</div> 

<div class="form-group @if($errors->has('password_confirmation')) has-error @endif">	
	{{Form::label('password_confirmation','Confirm password')}}
	{{Form::password('password_confirmation',['class'=>'form-control','id'=>'password_confirmation-field','placeholder'=>'Confirm your password'])}}
	@if($errors->has("password_confirmation"))
	<span class="help-block">{{ $errors->first("password_confirmation") }}</span>
	@endif
</div> 

<div class="form-group @if($errors->has('enabled')) has-error @endif">
	<div class="checkbox">
		<label>
			{{ Form::hidden('enabled', false) }}
			{{ Form::checkbox('enabled', 1, isset($user->enabled)?$user->enabled:null, ['class' => 'field','id'=>'enabled-field']) }}
			enabled
		</label>
		@if($errors->has("enabled"))
			<span class="help-block">{{ $errors->first("enabled") }}</span>
		@endif
	</div>
</div>

