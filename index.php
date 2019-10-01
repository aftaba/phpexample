<?php 
	namespace opr1;
	//include 'conn.php';
	require_once('conn.php');
	//$data= json_decode(file_get_contents("php://input"));
	class Connection {
		public $data1;
		public function __construct(){
			//$this->conn1= new mysqli("localhost","root","root","students");
			$this->data1= json_decode(file_get_contents("php://input"));
		}
	}
	class Operation  extends Connection{
		
		public function insert($conn ,$data){
				$id = mysqli_real_escape_string($conn ,$data->id);
				$name = mysqli_real_escape_string( $conn ,$data->name);
				$phone = mysqli_real_escape_string( $conn ,$data->phone);
				$address = mysqli_real_escape_string( $conn ,$data->address);
				/*$sql = "INSERT INTO `students_details` VALUES ('".$id."','".$name."','".$phone."','".$address."')";
				$conn->query($sql);*/
				$sql = "INSERT INTO `students_details`(`id`, `name`, `phone`, `address`) VALUES (?,?,?,?)";
				$stmt= $conn->prepare($sql);
				$stmt->bind_param("isis",$id,$name,$phone,$address);
				$stmt->execute();
				echo $id;
				$stmt->close();

		}
		public function delete($conn ,$data){
			$id = mysqli_real_escape_string($conn ,$data->id);
			$sql="DELETE FROM `students_details` WHERE `id`= ? ";
			$stmt= $conn->prepare($sql);
			$stmt->bind_param("i",$id);
			$stmt->execute();
			$stmt->close();
		}
		public function fetch($conn,$data){
			$sql = 'SELECT * FROM `students_details`';
		    $retval = $conn->query($sql);
		    while($row = $retval->fetch_assoc()) {
		     	  $data[]=$row;
   				}
 		    return $data;
		}
		public function update($conn ,$data){
			//$mydata= json_decode(file_get_contents("php://input"));
			$id = mysqli_real_escape_string($conn ,$data->id);
			$name = mysqli_real_escape_string( $conn ,$data->name);
			$phone = mysqli_real_escape_string( $conn ,$data->phone);
			$address = mysqli_real_escape_string( $conn ,$data->address);
			/*$sql="UPDATE `students_details` SET `name`='".$name."',`phone`='".$phone."',`address`='".$address."' WHERE id='".$id."'";
			$conn->query($sql);*/
			$sql = "UPDATE `students_details` SET `name`= ?,`phone`= ?,`address`= ? WHERE id= ?";
			$stmt= $conn->prepare($sql);
			$stmt->bind_param("sisi",$name,$phone,$address,$id);
			$stmt->execute();
			$stmt->close();
		}


}
use opr1;
  	$obj  = new Operation();
  	//$obj->conn();
  	 //$conn=$obj->conn1;
  	$data=$obj->data1;
	$flag = mysqli_real_escape_string($conn ,$data->flag);
	//$flag=1;
	if($flag == 1){
			//$obj->insert($conn ,$data);
		//opr1::insert($conn ,$data);
		opr1/Operation::insert($conn , $data);

	}
	if($flag == 2)
    {
		opr1/Operation::delete($conn ,$data);
		//$obj->delete($conn ,$data);
	}
	if($flag == 3)
	{
		opr1/Operation::update($conn , $data);
		//$obj->update($conn , $data);
	}
	//$obj->opr($flag,$data);
	
	$mydata=$obj->fetch($conn,$data);
 	echo json_encode($mydata);

 	



?>
