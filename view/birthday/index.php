<?php
	$db = new PDO("mysql:host=localhost;dbname=calendar", "root", "");
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
	$sql = "SELECT * FROM birthdays ORDER BY month ASC, day ASC, year ASC";
	$stmt = $db->prepare($sql);
	$stmt->execute();
 	$text=array("januari" , "februari", "march", "april", "may", "june", "july", "august", "september", "october", "november", "december");
	$currentMonth = null; 
	$birthdays = $stmt->fetchALL();
	?>

<div class="container">
		        <?php foreach($birthdays as $birthday){ ?>

		        <?php	 	
			        if  ($currentMonth != $text[$birthday["month"]-1]){
			        	$currentMonth = $text[$birthday["month"]-1];
			        	echo '<h1>';echo $text[$birthday["month"]-1]; echo '</h1>';?>
			        	<h2><?php echo $birthday["day"]; ?></h2>
						<a href="edit/<?php echo $birthday["id"]; ?>"><?php echo $birthday["person"] ?></a>
		  				<a href="delete/<?php echo $birthday["id"]; ?>"> x </a>
		  			<p>(<?php echo $birthday["year"]; ?>)</p>
			        	<?php
			        }
		       	?>

				<?php } ?>

				<p><a href="create">+ toevoegen</a></p>
</div>