<?php
	require_once('config.php');
	require_once('functions/function.php');
	get_header();
	$id=$_GET['e'];
	$sele="SELECT * FROM cit_student NATURAL JOIN cit_department WHERE stu_id='$id'";
	$Q=mysqli_query($con,$sele);
	$info=mysqli_fetch_array($Q);
	if(!empty($_POST)){
		$name= $_POST['name'];
		$email= $_POST['email'];
		$cell= $_POST['phone'];
		$roll= $_POST['roll'];
		$dept= $_POST['department'];
		$session= $_POST['session'];
		if(!empty($name)){
			$update="UPDATE cit_student SET stu_name='$name',stu_email='$email' WHERE stu_id='$id'";
			if(mysqli_query($con,$update)){
				echo "Update Completed!";
				header('Location:manage.php');
			}else{
				echo "Update Failed!";	
			}
		}else{
			echo "Please Enter Student Name!";	
		}	
	}
?>
            <div class="body_part">
                <h2>Student Registration</h2>
                <form action="" method="post">
                    <table class="reg_table" border="0" cellpadding="0" cellspacing="10">
                        <tr>
                            <td>Student Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="name" value="<?= $info['stu_name'];?>" id="" class="input_field"/>
                            </td>
                        </tr>
                         <tr>
                            <td>Student Email</td>
                            <td>:</td>
                            <td>
                                <input type="email" name="email" id="" value="<?= $info['stu_email'];?>" class="input_field"/>
                            </td>
                        </tr>                   
                        <tr>
                            <td>Student Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="phone" id="" value="<?= $info['stu_phone'];?>" class="input_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Roll</td>
                            <td>:</td>
                            <td>
                                <input type="text" value="<?= $info['stu_roll'];?>" name="roll" id="" class="input_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Department</td>
                            <td>:</td>
                            <td>
           						<select name="department" class="input_field">
                                    <?php 
										$sel="SELECT * FROM cit_department ORDER BY dept_name";
										$qry=mysqli_query($con,$sel);
										while($dept=mysqli_fetch_array($qry)){
											if($dept['dept_id']==$info['dept_id']){
												echo '<option selected="selected" value="'.$dept['dept_id'].'">'.$dept['dept_name'].'</option>';
											}else{
												echo '<option value="'.$dept['dept_id'].'">'.$dept['dept_name'].'</option>';
											}
										}
									?>
                                    <?= $dept['dept_id'];?>"><?= $dept['dept_name'];?></option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Session</td>
                            <td>:</td>
                            <td>
                                <input value="<?= $info['stu_session'];?>" type="text" name="session" id="" class="input_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" value="UPDATE" id="" class="submit"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
<?php
	require_once('includes/footer.php');
?>