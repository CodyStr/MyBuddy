<div id="test3">
	<h1>Overview</h1>
</div>

<!--
 <?php 
		$sql = "SELECT reminders.title, reminders.description, users.userID FROM reminders
		JOIN users ON reminders.FK_userID = users.userID
		WHERE users.userID = 1";
    $query = $conn->prepare( $sql );
    $query->execute();
    $results = $query->fetchAll();
	
    foreach( $results as $row ){
      print_r( $row );
		echo ($row['title']);
		echo "<br>";
		echo ($row['description']);
    }
 ?>	
-->

<div class="container">
<form class="reminders-form" method="post" autocomplete="off">
<?php
					if (isset($_POST['delete_btn']))
					{
						$reminderID = $_POST["delete_btn"];
						$query3 = $conn->prepare("DELETE FROM reminders WHERE reminderID =:reminderID");
						$query3->bindvalue('reminderID', $reminderID);
						$query3->execute();
					} else {
						
					}
				?>
				<?php
					$query = "SELECT reminderID, title, description, date FROM users
							  INNER JOIN reminders ON users.userID = reminders.FK_userID
							  INNER JOIN date ON reminders.FK_dataID = date.dateID";
					$sth = $conn->query($query);
					if($sth->rowCount() > 0)
					{
						$data = $sth->fetchAll();

						echo '<table class="table table-bordered">
							<tr>
							<th>Titel</th>
							<th>Datum</th>
							<th>Beschrijving</th>
							<th>Verwijder</th>
							</tr>';	

						foreach($data as $row)
						{
							echo '<tr>
									<td>'.$row["title"].'</td>
									<td>'.$row["date"].'</td>
									<td>'.$row["description"].'</td>
									<td><button type="submit" value="' . $row['reminderID'] . '" name="delete_btn"><i class="fa fa-trash" aria-hidden="true"></i>
</button></td>
								</tr>';
						}
						echo '</table>';
					}
					else{
						echo '<p>Er zijn geen herinneringen</p>';
					}
				?>
</form>
</div>