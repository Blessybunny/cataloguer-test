<section class = "container paper">
	<div class = "row">

		<!-- Header -->
		<div class = "col-12">

			<span>SF10-JHS</span>

		</div>

		<!-- Scholastic record 9-10 -->
		<div class = "col-12">
			
			<h6 class = "heading">Scholastic Record</h6>
		
			@include('layouts.students.sf10-table', ['grade' => 9])
			@include('layouts.students.sf10-table', ['grade' => 10])

		</div>
		
		<!-- Certification -->
		<div class = "col-12">

			<span class = "font-bold">For Transfer Out/JHS Completer Only</span>
    		<span class = "break"></span>

			@include('layouts.students.sf10-certification')

			<div class = "row">
				<div class = "col-6">
					<span>(May add Certification box if needed)</span>
				</div>
				<div class = "col-6 ">
					<span class = "font-italic text-right">SFRT Revised 2017</span>
				</div>
			</div>
				
		</div>

	</div>
</section>