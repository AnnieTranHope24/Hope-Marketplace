<?php  

//<Annie Tran> get ip_address
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

// <Annie Tran> add the item to the data base if add_to_cart is set
function cart($link){

    if(isset($_GET['add_to_cart'])){       
        global $pdo;
        $ip =   getIPAddress();
        $get_product_id = $_GET['add_to_cart'];
        $stmt = $pdo->prepare("SELECT * FROM cart WHERE ip_address=? and ID=?");
        $stmt->bindParam(1,$ip, PDO::PARAM_INT);
        $stmt->bindParam(2,$get_product_id, PDO::PARAM_INT);
        $stmt->execute();
        $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
        

        if (!empty($items)) {
            echo "<script>alert('This item is already in the cart')</script>";
            echo "<script>window.open($link, '_self')</script>";
        }
        else {
            $sql = "INSERT INTO cart (ID, ip_address, quantity) VALUES (?,?,?)";
            $pdo->prepare($sql)->execute([$get_product_id, $ip, 1]);
            echo "<script>alert('Item is added to cart')</script>";
            echo "<script>window.open($link, '_self')</script>";          
            
        }
    }

}
//<Annie Tran> function to get cart item number
function cart_item_count(){

    global $pdo;
    $ip =   getIPAddress();
    $stmt = $pdo->prepare("SELECT * FROM cart");
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $count = 0;
    foreach($items as $item){
        $count += 1;
    }

    echo $count;
}

//<Annie Tran> get the total price of the items in the cart table
function get_total_price(){
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM cart");
    $stmt->execute();
    $items = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $total_price = 0;
    foreach($items as $item){
        $stmt = $pdo->prepare("SELECT * FROM items WHERE ID = ?");
        $stmt->bindParam(1,$item['ID'], PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);		
        foreach($products as $product)	{
            $total_price += $product['Price'];
        }  
}
    echo $total_price;
}


?>  
