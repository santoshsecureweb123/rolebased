@extends('manager.manager.header')

@section('dashboard_content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">

			<div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>Sr.No</th>
                                            <th>Skill Name</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    	<?php $i=1; ?>
                                    	@foreach($getskill as $skills)
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$skills->skills_name}}</td>
                                            <td>
<button type="button" class="btn btn-info waves-effect waves-light" onClick="editskill({{$skills->skills_id}})">Edit</button>
<button type="button" class="btn btn-danger waves-effect waves-light">Delete</button>
                                            </td>
                                        </tr>
                                        <?php $i++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
                </div>


              <div class="row">
	                <div class="col-12">
	                    <div class="card">
	                        <div class="card-body">

	                           <form class="" action="{{ route('addskil')}}" method="post">
	                           	@csrf
	                           	 <div class="row">
                                	<div class="form-group">
                                        <label>Enter Skil Name</label>
                                        <input type="text" name="skill_name" class="form-control" required placeholder="Enter Skil Name"/>
                                    </div>
	                     
                                     <div class="form-group mb-0 ">
                                       <button type="submit" class="btn btn-primary waves-effect waves-light mr-1"> Submit
                                       </button>		
                                    </div>
                                
                                </div>
                                </form>
	                           
	                         
	                        </div>
	                    </div>
	                </div> <!-- end col -->
	            </div> <!-- end row -->


            </div>
        </div>
    </div>
</div>

<script>
	
	function editskill(skillID) {
			console.log(skillID);
			$.ajax({
				
			});
		}	

</script>
@endsection
