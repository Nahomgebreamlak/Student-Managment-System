<script type="text/javascript">
		$(document).ready(function(){
			$("#faculty").change(function(){
				var aid = $("#faculty").val();
				$.ajax({
					url: '../include/data.php',
					method: 'post',
					data: 'aid=' + aid
				}).done(function(books){
					console.log(books);
					books = JSON.parse(books);
					$('#department').empty();
					books.forEach(function(book){
						$('#department').append('<option>' + book.departmentname	+ '</option>')
					})
				})
			})
		})
	</script>
