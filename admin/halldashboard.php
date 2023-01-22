<?php
include 'themes/navbar.php';
include 'config.php';
?>

<div class="card ">
    <div class="card-header text-primary">
        <h4> <i class="fa-solid fa-table-columns"></i>
            Hall Dashboard </h4>
    </div>
</div>
<?php

if (isset($_GET['msg'])) {
    $msg = $_GET['msg'];
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
  
  ' . $msg . '
  
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
}

?>

<div class="container-fluid pt-4 bg-secondary" style="height: 100vh;">
    <div class="row ">


        <div class="" id="displayDataTable"></div>


    </div>
</div>

<script>
    $(document).ready(function() {
        displayData();
    });

    //display function
    function displayData() {
        var displayData = "true";
        $.ajax({
            url: "function/halldisplay.php",
            type: 'POST',
            data: {
                displaySend: displayData
            },
            success: function(data, status) {
                $('#displayDataTable').html(data);
            }
        })
    }
</script>
    <?php include 'themes/footer.php'; ?>