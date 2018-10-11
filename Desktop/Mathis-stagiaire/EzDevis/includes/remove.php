<?php 


global $wpdb;
if(isset($_POST['delete_row']))
 {   
     $id = $_POST['row_id'];
    $result = $wpdb->delete('wp_ezdevis_admin', array( 'ez_id' => $id ), array('%d'));

     if($result){
    echo "success";
 
    exit();
     }
}



if(isset($_POST['delete_row_cli']))
 {   
     $id = $_POST['row_id'];
    $result = $wpdb->delete('wp_ezdevis_client', array( 'cli_id' => $id ), array('%d'));

     if($result){
    echo "success";
 
    exit();
     }
}



if(isset($_POST['delete_all_cli']))
 {   
global $wpdb;
$result = $wpdb->query("TRUNCATE TABLE `wp_ezdevis_client`");

     if($result){
    echo "success";
 
    exit();
     }
}
  
?>