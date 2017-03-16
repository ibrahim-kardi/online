<?php
	require_once('config.php');
	require_once('functions/function.php');
	get_header();
?>
            <div class="body_part">
                <h2>Manage All Student</h2>
                <form action="" method="post">
                    <table width="100%" class="table_manage" align="center" border="0" cellpadding="10" cellspacing="0">
                       <tr>
                       		<th>ID</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Deaprtment</th>
                            <th>Manage</th>
                       </tr>
                       <?php
					   		$srl=1;
					   		$sel= "SELECT * FROM cit_student NATURAL JOIN cit_department ORDER BY stu_id DESC LIMIT 0,10";
							$qry= mysqli_query($con,$sel);
							while($data=mysqli_fetch_array($qry)){
					   ?>
                       <tr>
                       		<td><?php echo $srl++; ?></td>
                            <td><?= $data['stu_name'];?></td>
                            <td><?= $data['stu_email'];?></td>
                            <td><?= substr($data['stu_phone'],0,5);?>...</td>
                            <td><?= $data['dept_name'];?></td>
                            <td>
                            	<a href="view.php?v=<?= $data['stu_id'];?>" title="View"><i class="fa fa-plus-square"></i></a>
                                <a href="edit.php?e=<?= $data['stu_id'];?>" title="Edit"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="delete.php?d=<?= $data['stu_id'];?>" title="Delete"><i class="fa fa-trash"></i></a>
                            </td>
                       </tr>
                       <?php
							}
					   ?>
                    </table>
                </form>
            </div>
<?php
	require_once('includes/footer.php');
?>