<?php  

//get ip_address
    function getIPAddress() {  
    //whether ip is from the share internet  
     if(!empty($_SERVER['HTTP_CLIENT_IP'])) {  
                $ip = $_SERVER['HTTP_CLIENT_IP'];  
        }  
    //whether ip is from the proxy  
    elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {  
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];  
     }  
//whether ip is from the remote address  
    else{  
             $ip = $_SERVER['REMOTE_ADDR'];  
     }  
     return $ip;  
}  
// $ip = getIPAddress();  
// echo 'User Real IP Address - '.$ip;  


//TODO: finish the cart function
function cart(){
    global $pdo;
    $ip =   getIPAddress();
    $get_product_id = $_GET['add_to_cart'];
    $stmt = $pdo->prepare("SELECT * FROM cart WHERE ip_address=? and ID=?");
    $stmt->bindParam(1,$ip, PDO::PARAM_INT);
    $stmt->bindParam(2,$get_product_id, PDO::PARAM_INT);
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>  
