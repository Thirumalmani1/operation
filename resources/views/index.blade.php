<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Index Page</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
  <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.min.js" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script>
  $(document).ready(function () {
        $("#buttonClass").click(function() {
              getValueUsingClass();
           });
        $("#buttonParent").click(function() {
              getValueUsingParentTag();
         });
      });
    function getValueUsingClass(){
       /* var chkArray = [];
        $(".chk:checked").each(function() {
             chkArray.push($(this).val());
            }); 
        var selected;
        selected = chkArray.join(',') ;
        $('#transferInput').val(selected);
        var dd=$('#transferInput').val();
        alert(dd);
         if(selected.length > 0){
             
              alert("You have selected " + selected); 
            }else{
              alert("Please at least check one of the checkbox"); 
            }*/
            $("#form1").submit();
            }
     function getValueUsingParentTag(){
          /*var chkArray = [];
           $(".chk:checked").each(function() {
                chkArray.push($(this).val());
              });
          //var selected;
              var selected = chkArray.join(',');
              $('#ddddddd').val(selected);
              var dd=$('#ddddddd').val();
             // alert(dd);
              if(selected.length > 0){
                alert("You have selected " + selected); 
              }else{
                alert("Please at least check one of the checkbox"); 
              }*/
              $("#form1").submit();
            }

      function func(ide){
            var chkArray = [];
           $(".chk:checked").each(function() {
                chkArray.push($(this).val());
              });
          //var selected;
              var selected = chkArray.join(',');
              $('#transferInput').val(selected);
              $('#ddddddd').val(selected);

      }
 </script>    
  </head>
  <body>
    <div class="container">
    <br />
    @if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif

     <div class="container mt-5">
   <div class="card-header"><h2>Employee details</h2>
   <div class="bg-info text-white p-5 mb-3">
          <a href="{{route('crud.create')}}" class="btn btn-secondary" >create</a>
          </div>
    <table class="table table-striped">
    <thead>
      <tr>
        <th>choose</th>
        <th>ID</th>
        <th>Name</th>
        <th>Age</th>
        <th>salary</th>
        <th>Position</th>
        <th>Phone Number</th>
        
      </tr>
    </thead>
      </div>
    <tbody>
    @foreach($cruds as $cd)
      
      <tr>
        <div id="checkboxlist">
        <td><input type="checkbox" name="checkbox" value="{{$cd['id']}}"   class="chk"></td>
        <td>{{$cd['id']}}</td>
        <td>{{$cd['name']}}</td>
        <td>{{$cd['age']}}</td>
        <td>{{$cd['salary']}}</td>
        <td>{{$cd['position']}}</td>
        <td>{{$cd['number']}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>   

  <form name="form" method="get" id="form1" action="{{ action('CrudController@edit', $cd->id) }}">
  
  
           <input type="hidden" id="transferInput" name="id">
           <input type="hidden" id="ddddddd" name="dddddd">
           <!--  <?php $cd['id']='<script type="text/javascript">documet.write(selected);</script>' ?> -->
           <!-- a href="{{ action('CrudController@edit', $cd->id) }}" class="btn btn-secondary" id="buttonClass">update</a>
           <a href="{{ action('CrudController@destroy', $cd['id']) }}" class="btn btn-secondary" id="buttonParent">Delete</a> -->

           <a href="#" class="btn btn-secondary" onclick="func('upd')"  id="buttonClass">Update</a>
           <a href="{{ action('CrudController@destroy',1) }}"  class="btn btn-secondary" id="1">Delete</a>
             
               

         </div>
       </form>

  </body>
</html>  
