@extends('manager.manager.header')
@section('dashboard_content')
<div class="content-page">
  <div class="content">
    <div class="container-fluid">
    	<form action="{{route('addbroadcast')}}" method="post">

    		<textarea name="broadcast_test"></textarea>
    		<input class="btn btn-primary" type="submit" name="">
    	</form>

    </div>
  </div>
</div>
<script src="//cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
<script>
	CKEDITOR.replace('broadcast_test');
</script>
@endsection