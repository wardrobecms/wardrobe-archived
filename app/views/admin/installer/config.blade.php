@extends('core::admin.layout')

@section('title')
  Installer | Step 1
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
    <form method="post" style="text-align: center;" action="{{ url('install/config') }}" class="form-horizontal">
      <p>Don't worry you can always change these later inside app/config/</p>
      <div class="control-group">
        <label class="control-label" for="title">Site Title</label>
        <div class="controls">
          <input type="text" id="title" name="title" placeholder="Site Title" value="{{ (isset($old) ? $old->title : '') }}">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="theme">Site Theme</label>
        <div class="controls">
          <select name="theme">
            <option value="default">default</option>
            <option value="blocky">blocky</option>
            <option value="simple">simple</option>
          </select>
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="per_page">Posts Per Page</label>
        <div class="controls">
          <input type="number" name="per_page" value="5">
        </div>
      </div>
      <button style="text-align: center;" type="submit" class="btn save">Save</button>
    </form>
  </div>
@stop
