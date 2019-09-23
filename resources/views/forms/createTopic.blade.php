<form method="POST">
@csrf
	<div>
		<div>
			<label>Title</label>
			<input type="text name="title">
		</div>

		<div>
			<label>Description</label>
			<input type="text" name="description">
		</div>

		<div>
			<label></label>
			<textarea name="bodyText"></textarea>
		</div>

		<button>Submit</button>
	</div>
</form>