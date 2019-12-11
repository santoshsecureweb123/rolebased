<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body
@extends('manager.manager.header')

@section('dashboard_content')
       <div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
              <iframe name="NewsIFrame" src="{{URL::to('news')}}" frameborder="0" scrolling="no" style="float: right;"></iframe>
            </div>
        </div>
       <div id = "container">
		  <h1>To-Do List<i class="removeall">Clear</i><i class="add">+</i></h1>
		  <input type="text" placeholder="[Add New Todo]">
		  <ul>
		    <li><span><i class="fa fa-trash"></i></span><number></number>Go to potions Class </li>
		    <li> <span><i class="fa fa-trash"></i></span><number></number> Buy new Robes </li>
		    <li> <span><i class="fa fa-trash"></i></span><number></number> Visit Hagrid </li>
		  </ul>
     </div>
    </div>
</div>
@endsection
</body>
</html>
<body> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
		function updateNumbers() {
  //update variable
    var lists = document.querySelectorAll("number");
    //update number
    for(var i = 0; i < lists.length; i++) {
      $(lists[i]).html(i+1 + ") ");
    }
}
updateNumbers();
//Check off Specific Todos By Clicking
$("ul").on("click", "li", function () {
  $(this).toggleClass("completed");
});

//Click on X to delete Todo
$("ul").on('click', "span", function (e) {
  e.stopPropagation();
  $(this).closest("li").fadeOut(500,function() {
   $(this).remove();
    updateNumbers();
  });
});

//Clear All
$(".removeall").on('click', function (e) {
    $("li").fadeOut(500, function() {
      $(this).remove();
    });
});

//Add new todos
$("input[type='text']").keypress(function(e) {
  if(e.which === 13) {
    //grab text
    var todoText = $(this).val();
    //append todotext to ul
    if( $(this).val() !== "") {
    $("ul").append("<li><span><i class='fa fa-trash'> </i></span>" + "<number></number>" + todoText + "</li>");
      }
    updateNumbers();
    //clear text
    $(this).val("");
  }
});

$(".add").click(function() {
  $("input[type='text']").fadeToggle(200);
});
</script>

