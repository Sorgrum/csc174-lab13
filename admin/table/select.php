<?php  
 $connect = mysqli_connect("66.147.242.186", "urcscon3_l13edm", "urcscon3_l13edm", "urcscon3_l13edm");  
 $output = '';  
 $sql = "SELECT * FROM survey ORDER BY id ASC";  
 $result = mysqli_query($connect, $sql);  
 $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">  
                <tr>  
                     <th width="5%">id</th>  
                     <th width="20%">Name</th>  
                     <th width="20%">Favorite Planet</th>  
                     <th width="55%">Reason</th>  
                </tr>';  
 $rows = mysqli_num_rows($result);
 if($rows > 0)  
 {  
	  if($rows > 10)
	  {
		  $delete_records = $rows - 10;
		  $delete_sql = "DELETE FROM survey LIMIT $delete_records";
		  mysqli_query($connect, $delete_sql);
	  }
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td>'.$row["id"].'</td>  
                     <td class="name" data-id1="'.$row["id"].'" contenteditable>'.$row["name"].'</td>  
                     <td class="favorite_planet" data-id2="'.$row["id"].'" contenteditable>'.$row["favorite_planet"].'</td>  
                     <td class="reason" data-id3="'.$row["id"].'" contenteditable>'.$row["reason"].'</td>  
                     <td><button type="button" name="delete_btn" data-id4="'.$row["id"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
                </tr>  
           ';  
      }  
      $output .= '  
           <tr>  
                <td></td>
                <td id="name" contenteditable></td>
                <td id="favorite_planet" contenteditable></td>  
                <td id="reason" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 else  
 {  
      $output .= '  
           <tr>  
                <td></td>
                <td id="name" contenteditable></td>
                <td id="favorite_planet" contenteditable></td>  
                <td id="reason" contenteditable></td>  
                <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
           </tr>  
      ';  
 }  
 $output .= '</table>  
      </div>';  
 echo $output;  
 ?>