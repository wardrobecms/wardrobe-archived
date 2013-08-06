@extends('core::admin.layout')

@section('title')
  Installer | Step 2
@stop

@section('content')
  <div id="install-region">
    <h1>Wardrobe Install</h1>
    @if (Session::has('install_errors'))
    <div class="alert alert-block alert-error">
      <strong>Error!</strong>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </div>
    @endif
    <form method="post" action="{{ url('install/user') }}" class="form-horizontal">
      <div id="js-errors" class="hide">
        <div class="alert alert-error">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <span></span>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="first_name">First Name</label>
        <div class="controls">
          <input type="text" id="first_name" name="first_name" placeholder="First Name" value="{{ (isset($old) ? $old->first_name : '') }}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="last_name">Last Name</label>
        <div class="controls">
          <input type="text" id="last_name" name="last_name" placeholder="Last Name" value="{{ (isset($old) ? $old->last_name : '') }}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="email">Email</label>
        <div class="controls">
          <input type="text" id="email" name="email" placeholder="Email" value="{{ (isset($old) ? $old->email : '') }}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="password">Password</label>
        <div class="controls">
          <input id="password" type="password" name="password" value="">
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <button type="submit" class="btn save">Save</button>
        </div>
      </div>
    </form>
  </div>
@stop
