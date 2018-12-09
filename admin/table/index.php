<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../login.php");
    exit;
}
?>
<html>  
    <head>  
        <title>Lab 13 | csc 174</title>  
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    </head>  
    <body>  
        <div class="container">  
            <br />  
            <br />
			<br />
			<div class="table-responsive">  
				<h3 align="center">Lab 13: Space Survey</h3>

                <div class="alert alert-primary" role="alert">

                </div>
				<span id="result"></span>
				<div id="live_data"></div>

                <div>
                    <a href="../reset-password.php" class="btn btn-warning">Reset Your Password</a>
                    <a href="../logout.php" class="btn btn-danger">Sign Out of Your Account</a>
                </div>
			</div>  
		</div>
    </body>  
</html>  
<script>  
$(document).ready(function(){  

    function show_success_alert(message) {
        $('#result').html("\
            <div class='alert alert-success alert-dismissible'>"+message+"\
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>\
                    <span aria-hidden='true'>&times;</span>\
                </button>\
            </div>");
    }

    function show_warning_alert(message) {
        $('#result').html("\
            <div class='alert alert-warning alert-dismissible'>"+message+"\
                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>\
                    <span aria-hidden='true'>&times;</span>\
                </button>\
            </div>");
    }

    function fetch_data()  
    {  
        $.ajax({  
            url:"select.php",  
            method:"POST",  
            success:function(data){  
				$('#live_data').html(data);  
            }  
        });  
    }  
    fetch_data();  
    $(document).on('click', '#btn_add', function(){  
        var name = $('#name').text();  
        var favorite_planet = $('#favorite_planet').text();  
        var reason = $('#reason').text();
        if(name == '')  
        {  
            show_warning_alert("Enter name");  
            return false;  
        }  
        if(favorite_planet == '')  
        {  
            show_warning_alert("Enter your favorite planet");  
            return false;  
        }  
        if(reason == '')  
        {  
            show_warning_alert("Enter your reason");  
            return false;  
        }  
        $.ajax({  
            url:"insert.php",  
            method:"POST",  
            data:{name:name, favorite_planet:favorite_planet, reason: reason},  
            dataType:"text",  
            success:function(data)  
            {  
                show_success_alert(data);  
                fetch_data();  
            }  
        })  
    });  
    
	function edit_data(id, text, column_name)  
    {  
        $.ajax({  
            url:"edit.php",  
            method:"POST",  
            data:{id:id, text:text, column_name:column_name},  
            dataType:"text",  
            success:function(data){  
                //alert(data);
				show_success_alert(data);
            }  
        });  
    }  
    $(document).on('blur', '.name', function(){  
        var id = $(this).data("id1");  
        var name = $(this).text();  
        edit_data(id, name, "name");  
    });  
    $(document).on('blur', '.favorite_planet', function(){  
        var id = $(this).data("id2");  
        var favorite_planet = $(this).text();  
        edit_data(id,favorite_planet, "favorite_planet");  
    });
    $(document).on('blur', '.reason', function(){  
        var id = $(this).data("id3");  
        var reason = $(this).text();  
        edit_data(id,reason, "reason");  
    });  
    $(document).on('click', '.btn_delete', function(){  
        var id=$(this).data("id4");  
        if(confirm("Are you sure you want to delete this?"))  
        {  
            $.ajax({  
                url:"delete.php",  
                method:"POST",  
                data:{id:id},  
                dataType:"text",  
                success:function(data){  
                    show_success_alert(data);  
                    fetch_data();  
                }  
            });  
        }  
    });  
});  
</script>