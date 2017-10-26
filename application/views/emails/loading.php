<!DOCTYPE html>
<html>
<head>
   <title>Ajax Before Send With Form Serialize And Bootstrap</title>

 <script type="text/javascript">
  $(document).ready(function(){
   
  //Callback handler for form submit event
    $("#myform").submit(function(e)
    {
  
    var formObj = $(this);
    var formURL = formObj.attr("action");
    var formData = new FormData(this);
    $.ajax({
        url: formURL,
        type: 'POST',
        data:  formData,        
        contentType: false,
        cache: false,
        processData:false,
        beforeSend: function (){
                   $("#loading").show(1000).html("<img src='load.gif' height='50'>");                   
                   },
        success: function(data, textStatus, jqXHR){
                $("#result").html(data);
                $("#loading").hide();
        },
            error: function(jqXHR, textStatus, errorThrown){
     }         
    });
        e.preventDefault(); //Prevent Default action.
        e.unbind();
    });    

 });
 </script>
</head>
<body>

<div class="container">
<h3>Tambah Data</h3>
<form method="post" id="myform" action="simpan.php">
 <input type="text" placeholder="Nama" class="form-control" name="nama"/><br>
    <input type="text" class="form-control" placeholder="Alamat" name="alamat" /><br>
 <input type="submit" value="Simpan" class="btn btn-primary" />
</form>


<center><div id="loading"></div></center><br>
<div id="result"></div>
</div>
</body>
</html>