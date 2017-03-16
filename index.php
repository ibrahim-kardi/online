<?php
	require_once('config.php');	
	if(!empty($_POST)){
		$name= $_POST['name'];
		$email= $_POST['email'];
		$cell= $_POST['phone'];
		$roll= $_POST['roll'];
		$dept= $_POST['department'];
		$session= $_POST['session'];
		$image= $_FILES['pic'];
		$ImageName='STUDENT-'.time().'-'.rand(1000,100000).'.'.pathinfo($image['name'],PATHINFO_EXTENSION);
		if(!empty($name)){
			$insert="INSERT INTO cit_student(stu_id,stu_name,stu_email,stu_phone,stu_roll,dept_id,stu_session,stu_image)
			VALUES('','$name','$email','$cell','$roll','$dept','$session','$ImageName')";
			
			if(mysqli_query($con,$insert)){
				move_uploaded_file($image['tmp_name'],'uploads/'.$ImageName);
				echo "Student Registration Completed.";				
			}else{
				echo "Hoi Nai!";	
			}
		}else{
			echo "Please Enter Student Name!";	
		}	
	}
?>
<?php
	require_once('functions/function.php');
	get_header();
?>
            <div class="body_part">
                <h2>Student Registration</h2>
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="reg_table" border="0" cellpadding="0" cellspacing="10">
                        <tr>
                            <td>Student Name</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="name" id="" class="input_field"/>
                            </td>
                        </tr>
                         <tr>
                            <td>Student Email</td>
                            <td>:</td>
                            <td>
                                <input type="email" name="email" id="" class="input_field"/>
                            </td>
                        </tr>                   
                        <tr>
                            <td>Student Phone</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="phone" id="" class="input_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Roll</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="roll" id="" class="input_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Department</td>
                            <td>:</td>
                            <td>
           						<select name="department" class="input_field">
                                	<option value="">Select Department</option>
                                    <?php 
										$sel="SELECT * FROM cit_department ORDER BY dept_name";
										$qry=mysqli_query($con,$sel);
										while($dept=mysqli_fetch_array($qry)){
									?>
                                    <option value="<?= $dept['dept_id'];?>"><?= $dept['dept_name'];?></option>
									<?php	
										}
									?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Session</td>
                            <td>:</td>
                            <td>
                                <input type="text" name="session" id="" class="input_field"/>
                            </td>
                        </tr>
                        <tr>
                            <td>Student Picture</td>
                            <td>:</td>
                            <td>
                                <input type="file" name="pic" id=""/>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td>
                                <input type="submit" value="REGISTRATION" id="" class="submit"/>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
<?php
	require_once('includes/footer.php');
?>