<?php 
$ExistingNames = array("Dennis", "Daniel", "Danny", "Edward");

if(isset($_POST['suggestion'])) {
    $name = $_POST['suggestion'];

    if(!empty($name)){
        foreach($ExistingNames as $ExistingName) {
            if(strpos($ExistingName,$name) !== false) {
                echo $ExistingName;
                echo "<br>";
            }
        }
    }

    
}
?>