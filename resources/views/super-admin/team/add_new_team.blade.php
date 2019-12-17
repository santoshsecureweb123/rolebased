@extends('super-admin.super-admin.header')

@section('dashboard_content')
   <div class="content-page">
   	<div class="content">
			<div class="container-fluid">
				<div class="page-title-box">
					@if(Session::has('success'))
					    {{ Session::get('success') }}
					@endif
					<h2>Create New Team </h2>
					<form action="{{route('create_team') }}" method="post">
						@csrf
						<input type="hidden" name="author_id" value="{{$user_id}}">
						<input type="hidden" name="author_role_id" value="{{$role_id}}">
						<div class="form-group">
							<label for="team_name">Team Name:</label>
							<input type="text" class="form-control" id="team_name" placeholder="Enter Name" name="team_name" value="{{ old('team_name') }}">
						</div>
						@error('team_name') 
							<span class="invalid-feedback" role="alert">
								<strong>{{ $message }}</strong>
							</span>
						@enderror
						<div class="form-group">
							<label for="u_skills">Team Leader:</label>
							<select class="form-control" name="team_lead" id="team_lead" value="{{ old('team_lead') }}">
								<option value="">Select a team leader</option>
								@foreach($teamleader as  $teamLead)
									<option value="{{$teamLead->id}}">{{$teamLead->name}}</option>
								@endforeach
							</select>
						</div>
						@error('team_lead') 
							<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
							</span>
						@enderror

						<div class="form-group">
							<label for="team_member">Team Member:</label>
							<select class="form-control team_member" name="team_member[]" id="team_member" multiple="multiple" value="{{ old('team_member[]') }}" >
								@foreach($teamMember as  $teamMem)
							<option value="{{$teamMem->id}}">{{$teamMem->name}}</option>
								@endforeach
							</select>
						</div>

						@error('team_member')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
						@enderror
						<button type="submit" class="btn btn-primary">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>
@endsection