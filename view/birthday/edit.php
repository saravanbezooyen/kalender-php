<div class="container">
	<h1>Edit</h1>
	<form action="<?= URL ?>birthday/editSave" method="post">
	
		<p><input type="text" name="person" value="<?= $birthday['person']; ?>"></p>
		<p><input type="text" name="day" value="<?= $birthday['day']; ?>"></p>
		<p><input type="text" name="month" value="<?= $birthday['month']; ?>"></p>
		<p><input type="text" name="year" value="<?= $birthday['year']; ?>"></p>

		<input type="hidden" name="id" value="<?= $birthday['id']; ?>">
		<input type="submit" value="Verzenden">
	
	</form>

</div>
