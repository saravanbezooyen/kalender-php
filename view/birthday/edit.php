<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>birthday/editSave" method="post">
	
		<input type="text" name="person" value="<?= $birthday['birthday_person']; ?>">
		<input type="date" name="date" value="<?= $birthday['birthday_date']; ?>">
		
		<input type="hidden" name="id" value="<?= $birthday['birthday_id']; ?>">
		<input type="submit" value="Verzenden">
	
	</form>

</div>
