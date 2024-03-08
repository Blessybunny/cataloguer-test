<div class = "container-fluid paper">

	<!-- Header -->
	<div class = "row">
		<div class = "col-12">
			<span>SF10-JHS</span>
		</div>
	</div>

	<!-- Scholastic record 9-10 -->
	<div class = "row">
		<div class = "col-12">
			<h6 class = "heading">Scholastic Record</h6>
		</div>
	</div>

	@include('layouts.students.sf10-scholastic-record', ['grade' => 9])
	@include('layouts.students.sf10-scholastic-record', ['grade' => 10])

	<!-- Certification -->
	<div class = "row">
		<div class = "col-12">
			<span class = "font-bold">For Transfer Out/JHS Completer Only</span>
    		<span class = "break"></span>
		</div>
	</div>

	@include('layouts.students.sf10-certification', ['side' => 'back'])

	<div class = "row">
		<div class = "col-6">
			<span>(May add Certification box if needed)</span>
		</div>
		<div class = "col-6">
			<span class = "font-italic text-right">SFRT Revised 2017</span>
		</div>
	</div>

</div>