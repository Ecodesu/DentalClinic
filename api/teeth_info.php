<?php
	include 'database.php';
	$user_id = $_POST['user_id'];
	
    $request_type = $_POST['request_type'];

	if($request_type == 'view'){
	$sql = "SELECT * FROM tbl_teeth_info WHERE user_id = '$user_id'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$r = 1;
	}
	else
	{
    	$sql = "INSERT INTO tbl_teeth_info (user_id) 
		VALUES 
    	('$user_id')";
		if (mysqli_query($conn, $sql)) {
			echo json_encode(array("status"=>true));
		} 
		else 
		{
			echo json_encode(array("status"=>false));
		}
        
	}
}elseif($request_type == 'update'){
    $t11 = $_POST['t11'];
    $t12 = $_POST['t12'];
    $t13 = $_POST['t13'];
    $t14 = $_POST['t14'];
    $t15 = $_POST['t15'];
    $t16 = $_POST['t16'];
    $t17 = $_POST['t17'];
    $t18 = $_POST['t18'];
    $t21 = $_POST['t21'];
    $t22 = $_POST['t22'];
    $t23 = $_POST['t23'];
    $t24 = $_POST['t24'];
    $t25 = $_POST['t25'];
    $t26 = $_POST['t26'];
    $t27 = $_POST['t27'];
    $t28 = $_POST['t28'];
    $t31 = $_POST['t31'];
    $t32 = $_POST['t32'];
    $t33 = $_POST['t33'];
    $t34 = $_POST['t34'];
    $t35 = $_POST['t35'];
    $t36 = $_POST['t36'];
    $t37 = $_POST['t37'];
    $t38 = $_POST['t38'];
    $t41 = $_POST['t41'];
    $t42 = $_POST['t42'];
    $t43 = $_POST['t43'];
    $t44 = $_POST['t44'];
    $t45 = $_POST['t45'];
    $t46 = $_POST['t46'];
    $t47 = $_POST['t47'];
    $t48 = $_POST['t48'];
    $t51 = $_POST['t51'];
    $t52 = $_POST['t52'];
    $t53 = $_POST['t53'];
    $t54 = $_POST['t54'];
    $t55 = $_POST['t55'];
    $t61 = $_POST['t61'];
    $t62 = $_POST['t62'];
    $t63 = $_POST['t63'];
    $t64 = $_POST['t64'];
    $t65 = $_POST['t65'];
    $t71 = $_POST['t71'];
    $t72 = $_POST['t72'];
    $t73 = $_POST['t73'];
    $t74 = $_POST['t74'];
    $t75 = $_POST['t75'];
    $t81 = $_POST['t81'];
    $t82 = $_POST['t82'];
    $t83 = $_POST['t83'];
    $t84 = $_POST['t84'];
    $t85 = $_POST['t85'];
    $remarks = $_POST['remarks'];


    $sql = "UPDATE `tbl_teeth_info` 
	SET t11 = '$t11',
        t12 = '$t12',
        t13 = '$t13',
        t14 = '$t14',
        t15 = '$t15',
        t16 = '$t16',
        t17 = '$t17',
        t18 = '$t18',
        t21 = '$t21',
        t22 = '$t22',
        t23 = '$t23',
        t24 = '$t24',
        t25 = '$t25',
        t26 = '$t26',
        t27 = '$t27',
        t28 = '$t28',
        t31 = '$t31',
        t32 = '$t32',
        t33 = '$t33',
        t34 = '$t34',
        t35 = '$t35',
        t36 = '$t36',
        t37 = '$t37',
        t38 = '$t38',
        t41 = '$t41',
        t42 = '$t42',
        t43 = '$t43',
        t44 = '$t44',
        t45 = '$t45',
        t46 = '$t46',
        t47 = '$t47',
        t48 = '$t48',
        t51 = '$t51',
        t52 = '$t52',
        t53 = '$t53',
        t54 = '$t54',
        t55 = '$t55',
        t61 = '$t61',
        t62 = '$t62',
        t63 = '$t63',
        t64 = '$t64',
        t65 = '$t65',
        t71 = '$t71',
        t72 = '$t72',
        t73 = '$t73',
        t74 = '$t74',
        t75 = '$t75',
        t81 = '$t81',
        t82 = '$t82',
        t83 = '$t83',
        t84 = '$t84',
        t85 = '$t85',
        remarks = '$remarks'
        WHERE user_id=$user_id";
	if (mysqli_query($conn, $sql)) {
		$r1 = false;
	} 
	else {
		$r1 = true;
	}
}



$sql = "SELECT * FROM tbl_teeth_info WHERE user_id = '$user_id'";	


$result = mysqli_query($conn,$sql);
$arr = array();
if(mysqli_num_rows($result) > 0){
	while($rows = mysqli_fetch_assoc($result)){
		array_push($arr, $rows);
	}
}
header('Content-type: application/json');
echo json_encode($arr);
	
?>

