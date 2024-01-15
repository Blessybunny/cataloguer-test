<section class = "container paper">
	<div class = "row">

		<!-- Scholastic record 9-10 -->
		<div class = "col-12">
			
			<h6 class = "align-middle heading">Scholastic Record</h6>
		
			@include('layouts.manager.sf10-table', ['grade' => 9])
			@include('layouts.manager.sf10-table', ['grade' => 10])

		</div>
		
		<!-- Certification -->
		<div class = "col-12">
			
			@include('layouts.manager.sf10-certification')
				
		</div>

	</div>
</section>