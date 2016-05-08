<!DOCTYPE html>
<html>

@include('layouts.partials.htmlheader')

@yield('content')

@section('scripts')
    @include('layouts.partials.scripts_auth')
@show
</html>