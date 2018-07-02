<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title> APP </title>
   <!--  <link rel="stylesheet" href="{{asset('css/app.css')}}"> -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">  
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>  
  </head>

     <?php 

        $servername = "localhost";
        $username = "root";
        $password = "root";
        $db_name ="cube";
        $conn = mysqli_connect($servername, $username, $password,$db_name);

        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        else
           echo "Connected successfully";
           $id=$_GET['id'];
            $sql = "SELECT * FROM cruds WHERE  id= ?";
             if($stmt = $conn->prepare($sql)){
               $stmt->bind_param("i", $ID);
                $ID = $id;
               if($stmt->execute()){
                $result = $stmt->get_result();
                if($result->num_rows == 1){
                    $row = $result->fetch_array(MYSQLI_ASSOC);
                    $Name=$row["name"];
                    $Age=$row["age"];
                    $salary=$row["salary"];
                    $number=$row["number"];
                    $position=$row["position"];
                  }
                }
              }

     ?>


  <body>  
    <div class="container">
      <h2>Update Deatails</h2><br/>
      <form  action="{{action('CrudController@update', $id)}}" method="post">
   
        @csrf
        @method('put')
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="Name">Name:</label>
            <input type="text" class="form-control" name="name" value="<?php echo $Name; ?>">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Email">Age:</label>
              <input type="text" class="form-control" name="age" value="<?php echo $Age; ?>">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Number">salary:</label>
              <input type="text" class="form-control" name="salary" value="<?php echo $salary; ?>">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="Number">Phone Number:</label>
              <input type="text" class="form-control" name="number" value="<?php echo $number; ?>">
            </div>
          </div>
        

         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
                <lable>Position</lable>
                <select name="position" >
                  <option value="<?php echo $position; ?>">PHP developer</option>
                  <option value="java">JAVA developer</option>
                  <option value="Tester">Tester</option>  
                  <option value="UI">UI developer</option>  
                </select>
            </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <input type="submit" class="btn btn-success" value="update">
          </div>
        </div>
      </form>
    </div>
   
  </body>
</html>
