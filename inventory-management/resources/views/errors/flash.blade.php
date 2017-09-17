@if(Session::has('alert'))
  <span class="alert alert-success">{{ Session::get('alert') }}</span>
@endif
