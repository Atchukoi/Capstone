<?php
include 'config.php';
$sql = "SELECT * FROM tblroomtype";
$result = mysqli_query($conn, $sql);
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Ajax</title>
  <script src="test.js"></script>

  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

  <!-- JQuery CDN -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
  <style>
    .cl {
      outline: 1px solid blue;
    }
  </style>

</head>

<>
  <!-- <div class="container my-5">
    <div class="row">
      <labe class="form-label">Type Id</labe>
      <select class="form-select mb-3" name="typeid" id="typeid" aria-label="Default select example" onchange="fetchroomtype()">
        <option selected>Open this select menu</option>
        <?php
        while ($row = mysqli_fetch_array($result)) {
          $k = $row['Id'];
          $l = $row['Name'];
          echo ' <option value= "' . $k . '">' . $l . '</option> ';
        }
        ?>

      </select>
      <label class="form-label">Name</label>
      <input type="text" name="name" id="name" class="form-control mb-3 ">
      <label class="form-label">Description</label>
      <input type="text" name="desc" id="desc" class="form-control mb-3 ">
      <label class="form-label">Price :</label>
      <input type="text" name="price" id="price" class="form-control mb-3 ">
    </div>
  </div>
  <div class="container">
    <button onclick="disable()">Ignore Hall Details</button>
    <form>
      <label class="form-label">A</label>
      <input type="text" name="name" id="A" class="form-control mb-3 ">
      <label class="form-label">B</label>
      <input type="text" name="desc" id="B" class="form-control mb-3 ">
      <label class="form-label">C :</label>
      <input type="text" name="price" id="C" class="form-control mb-3 ">
  </div>
  </form> -->
  <!-- <div class="container">
    <div class="row mt-3">
      <div class="col">
        <label for="" class="form-label">Arrival</label>
        <input type="date" name="Arrival" id="Arrival" class="form-control">
      </div>
      <div class="col">
        <label for="" class="form-label">Departure</label>
        <input type="date" name="Departure" id="Departure" class="form-control" onchange="getDays()">
      </div>
      <div class="col">
        <label for="" class="form-label">Date Difference</label>
        <input type="number" name="DateDifference" id="DateDifference" class="form-control">
      </div>
      <div class="col">
        <label for="" class="form-label">Price</label>
        <input type="number" name="Price" id="Price" class="form-control">
      </div>
      <div class="col">
        <label for="" class="form-label">Total</label>
        <input type="number" name="Total" id="Total" class="form-control">
      </div>
    </div>
  </div>
      -->




  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="1" id="1" onchange="add1()">
    <label class="form-check-label" for="flexSwitchCheckDefault">1</label>
    <input type="number" class="form-control" value="100" name="1" id="a1">
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="2" id="2" onchange="add2()">
    <label class="form-check-label" for="flexSwitchCheckDefault">2</label>
    <input type="number" class="form-control" value="200" name="1" id="a2">
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="3" id="3" onchange="add3()">
    <label class="form-check-label" for="flexSwitchCheckDefault">3</label>
    <input type="number" class="form-control" value="300" name="1" id="a3">
  </div>
  <div class="form-check form-switch">
    <input class="form-check-input" type="checkbox" role="switch" name="4" id="4" onchange="add4()">
    <label class="form-check-label" for="flexSwitchCheckDefault">4</label>
    <input type="number" class="form-control" value="400" name="1" id="a4">
  </div>

  <div class="row">
    <div class="col-auto">
      <div class="input-group">
        <div class="input-group-text">Chair :</div>
        <input type="number" class="form-control" id="pc1" onchange="rent1()">
        <input type="number" class="form-control" id="price1" value="20">
        <input type="number" class="form-control" id="Total1">
      </div>

      <div class="col -auto">
        <div class="input-group">
          <div class="input-group-text">Table :</div>
          <input type="number" class="form-control" id="pc2" onchange="rent2()">
          <input type="number" class="form-control" id="price2" value="30">
          <input type="number" class="form-control" id="Total2">
        </div>
      </div>
    </div>
  </div>


  <label class="form-check-label mt-2" for="flexSwitchCheckDefault">Total</label>
  <input type="number" class="form-control mt-2" value="500" name="Total" id="Total">

  <input type="date" class="form-control mt-2"  name="Arrival" id="Arrival" value="2022-11-22">
  <input type="date" class="form-control mt-2"  name="Departure" id="Departure" value="2022-11-25">
  <input type="number" class="form-control mt-2"  name="Days" id="Days">

  <?php echo date('m/d/Y h:i:s a')?>


  </body>

  <script>
     $(document).ready(function() {
    var start_date = new Date(document.getElementById('Arrival').value);
    var end_date = new Date(document.getElementById('Departure').value);
    //Here we will use getTime() function to get the time difference
    var time_difference = end_date.getTime() - start_date.getTime();
    //Here we will divide the above time difference by the no of miliseconds in a day
    var days_difference = time_difference / (1000 * 3600 * 24);
    //alert(days);
    document.getElementById('Days').value = days_difference;
  });
  




    // function add radio
    function add1() {

      var button1 = document.getElementById("1");
      var a1 = Number($("#a1").val());
      var Total = Number($("#Total").val());
      var output = 0;
      var newTotal = Total;

      $("#Total").val(newTotal);
      if (button1.checked) {
        var output = Total + a1;
        var newTotal = output;
      } else {
        var output = Total - a1;
        var newTotal = output;;
      }

      $("#Total").val(newTotal);
    }

    // add rent pc
    function rent1() {


      var pc = Number($("#pc1").val());
      var price = Number($("#price1").val());
      var Total = Number($("#Total").val());
      var output = pc * price;
      var newTotal = output + Total;


      $("#Total").val(newTotal);
    }



    $(document).ready(function() {

      $("#DateDifference,#Price").keyup(function() {

        var Total = 0;
        var x = Number($("#DateDifference").val());
        var y = Number($("#Price").val());
        var Total = x * y;
        $("#Total").val(Total);
      });

    });

    function getDays() {

      var start_date = new Date(document.getElementById('Arrival').value);
      var end_date = new Date(document.getElementById('Departure').value);
      //Here we will use getTime() function to get the time difference
      var time_difference = end_date.getTime() - start_date.getTime();
      //Here we will divide the above time difference by the no of miliseconds in a day
      var days_difference = time_difference / (1000 * 3600 * 24);
      //alert(days);
      document.getElementById('DateDifference').value = days_difference;
    }
  </script>

  <script src="jquery-3.2.1.min.js"></script>
  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>

</html>