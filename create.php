<?php
header('Access-Contol-Allow-Origin:*');
header('Content-Type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers-Content-Type,Access-Control-Alllow-Headers,Authoriation,X-request-with');
error_reporting(0);
$data=json_decode(file_get_contents("php://input"));
include('db.php');
if($data->discout==''){
    echo json_encode(['status'=>'faild','msg'=>' discount not provided!']);
}
elseif($data->product_name==''){
    echo json_encode(['status'=>'faild','msg'=>' name not provided!']);
}
elseif($data->product_price==''){
    echo json_encode(['status'=>'faild','msg'=>' price not provided!']);
}
elseif($data->stock==''){
    echo json_encode(['status'=>'faild','msg'=>' stock not provided!']);
}else{
$query="INSERT INTO products(product_name,product_price,stock,discount)";
$query.="VALUES('$data->product_name',$data->product_price,$data->stock,$data->discount)";
$run=mysqli_query($db,$query);
if($run){
    echo json_encode(['status'=>'success','msg'=>'product added!']);

}
else {
     echo json_encode(['status'=>'faild','msg'=>' not product added!']);
}
}