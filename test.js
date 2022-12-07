function fetchroomtype(){
   var id = document.getElementById("typeid").value;


$.ajax({
    url:"test1.php",
    method: "POST",
    data: {
        x : id
    },
    dataType: "JSON",
    success: function(data) {
        document.getElementById("name").value = data.name;
        document.getElementById("desc").value = data.desc;
        document.getElementById("price").value = data.price;
        
    }
})

}