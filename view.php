<?php
	require_once('config.php');
	require_once('functions/function.php');
	get_header();
	$id=$_GET['v'];
	$sele="SELECT * FROM cit_student NATURAL JOIN cit_department WHERE stu_id='$id'";
	$Q=mysqli_query($con,$sele);
	$info=mysqli_fetch_array($Q);
?>
            <div class="body_part">
                <h2>Student Personal Information</h2>
                <form action="" method="post">
                    <table class="reg_table" border="0" cellpadding="0" cellspacing="10">
                        <tr>
                            <td>Student Name</td>
                            <td>:</td>
                            <td><?= $info['stu_name'];?></td>
                        </tr>
                         <tr>
                            <td>Student Email</td>
                            <td>:</td>
                            <td><?= $info['stu_email'];?></td>
                        </tr>                   
                        <tr>
                            <td>Student Phone</td>
                            <td>:</td>
                            <td><?= $info['stu_phone'];?></td>
                        </tr>
                        <tr>
                            <td>Student Roll</td>
                            <td>:</td>
                            <td><?= $info['stu_roll'];?></td>
                        </tr>
                        <tr>
                            <td>Student Department</td>
                            <td>:</td>
                            <td><?= $info['dept_name'];?></td>
                        </tr>
                        <tr>
                            <td>Student Session</td>
                            <td>:</td>
                            <td><?= $info['stu_session'];?></td> 
                        </tr>
                        <tr>
                            <td valign="top">Student Image</td>
                            <td valign="top">:</td>
                            <td>
                            	<img width="80" src="uploads/<?= $info['stu_image'];?>"/>
                            </td> 
                        </tr>
                    </table>
                </form>
            </div>
<?php
	require_once('includes/footer.php');
?>