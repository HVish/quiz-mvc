<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery-2.1.4.js"></script>
<script type="text/javascript" src="<?php echo base_url()?>js/dashboard.js"></script>
<header>
	<div class="row">
		<div class="logo col-4"> 
			<h1>QuizBitz</h1>
		</div>
		<div class="col-8">
		</div>
	</div>
</header>
<div class="row wrapper">
	<div class="col-2 row tab">
		<ul>
			<li class="th_active">Add Questions</li>
			<li>List of Questions</li>
			<li>Marking Schemes</li>
			<li>Results</li>
			<li>Account</li>
		</ul>
	</div>
	<div class="col-10 tab_container">
		<div class="tc_active">
			<div class="success"><?php echo $msg['addsuccess']?></div>
			<form method="post" action="<?php echo base_url()."index.php/admin/addque"?>">
				<fieldset>
					<legend>Add a question</legend>
					Question:<br>
					<textarea name="que" id="" cols="30" rows="4" placeholder="Your question comes here..." required></textarea>
					<br>Answers:<br>
					<input type="text" placeholder="Correct Answer" name="op1" value="" required>
					<input type="text" placeholder="Wrong Answer1" name="op2" value="" required>
					<input type="text" placeholder="Wrong Answer2" name="op3" value="" required>
					<input type="text" placeholder="Wrong Answer3" name="op4" value="" required>
					<div class="error"><?php echo $msg['adderror']?></div>
					<input type="submit" name="addque" value="Submit Question">
				</fieldset>
			</form>
		</div>
		<div>
			<table>
				<tr>
					<th>S. No.</th>
					<th>Question</th>
					<th>Correct Answer</th>
					<th>Wrong Answer1</th>
					<th>Wrong Answer2</th>
					<th>Wrong Answer3</th>
				</tr>
				<?php
					$counter = 1;
					foreach($list_table_data as $row){
						echo "<tr>
								<td>{$counter}</td>
								<td>{$row['que']}</td>
								<td>{$row['op1']}</td>
								<td>{$row['op2']}</td>
								<td>{$row['op3']}</td>
								<td>{$row['op4']}</td>
							  </tr>";
						$counter++;
					}
				?>
			</table>
		</div>
		<div>
			<div class="success"><?php echo $msg['msuccess']?></div>
			<form method="post" action="<?php echo base_url()."index.php/admin/addms"?>">
				<fieldset>
					<legend>Marking Scheme</legend>
					Marks:<br>
					<input type="number" min="1" max="4" name="pn" placeholder="Positive Marks" value="" required>
					<input type="number" min="0" max="4" name="nn" placeholder="Negative Marks" value="" required><br>
					Maximum Time:<br>
					<input type="number" min="0" name="hr" placeholder="Hours" value="" required>
					<input type="number" min="0" max="59" name="min" placeholder="Minutes" value="" required>
					<input type="number" min="0" max="59" name="sec" placeholder="Seconds" value="" required><br>
					Passing Marks:<br>
					<input type="number" name="mpm" placeholder="Minimum Passing Marks" value="" required><br>
					<div class="error"><?php echo $msg['merror']?></div>
					<input type="submit" name="markscheme" value="Submit">
				</fieldset>
			</form>
		</div>
		<div>
			<table>
				<tr>
					<th>Rank</th>
					<th>Name of Student</th>
					<th>Positive Marks</th>
					<th>Negative Marks</th>
					<th>Total</th>
					<th>Result</th>
				</tr>
				<?php
					$counter = 1;
					foreach($list_table_result as $row){
						echo "<tr>
								<td>{$counter}</td>
								<td>{$row['st_name']}</td>
								<td>{$row['positive']}</td>
								<td>{$row['negative']}</td>
								<td>{$row['total']}</td>
								<td>{$row['remarks']}</td>
							  </tr>";
						$counter++;
					}
				?>
			</table>
		</div>
		<div>
			<form method="post" action="<?php echo base_url().'index.php/login/logout'?>">
				<input type="submit" name="logout" value="Log Out">
			</form>
		</div>
	</div>
</div>