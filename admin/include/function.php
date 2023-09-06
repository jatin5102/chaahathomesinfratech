<?php  

function getName($n) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < $n; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

function encryptor($action, $string) {


    $output = false;
    $encrypt_method = "AES-256-CBC";
    
    $secret_key = 'PerfectTutorHash';
    $secret_iv = 'faiz@12345678';

   
    $key = hash('sha256', $secret_key);
    
   
    $iv = substr(hash('sha256', $secret_iv), 0, 16);

    
    if( $action == 'encrypt' ) 
    {
        $output = openssl_encrypt($string, $encrypt_method, $key, 0, $iv);
        $output = base64_encode($output);
    }
    else if( $action == 'decrypt' )
    {
    	
        $output = openssl_decrypt(base64_decode($string), $encrypt_method, $key, 0,      $iv);
      
    }

    return $output;
}



function deleteFileFromServer($tablename,$columnname,$compareid){
    $compareid=encryptor('decrypt',$compareid);
    $allbanenrq = mysqli_query($conn, "SELECT $columnname FROM $tablename WHERE id=".$compareid."");
    echo  "<pre>";print_r($allbanenrq);
}

function getOthertimeName($conn,$id){

    $getrecords = mysqli_query($conn, "SELECT `name` FROM `other_icons` WHERE id=".$id."");

    if($getrecords->num_rows >0){
        $data=mysqli_fetch_assoc($getrecords);
        return $data['name'];
    }
}
?>