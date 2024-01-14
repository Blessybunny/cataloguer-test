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
			
			<h6 class = "align-middle heading">Certification</h6>

			<div class = "row">
				<div class = "col-12 align-middle">
					<span>I CERTIFY that this is a true record of ____________________ with LRN ____________________ and that he / she is eligible for admission to Grade __________.</span>
					<span>Name of School:____________________ School ID: ____________________ Last School Year Attended: ____________________</span>
				</div>
			</div>

			<div class = "row">
				<div class = "col-3 align-middle">
					<span>____________________</span>
					<span>Date</span>
				</div>
				<div class = "col-6 align-middle">
					<span>____________________________________________________________</span>
					<span>Name of Principal / School Head over Printed Name</span>
				</div>
				<div class = "col-3 align-middle">
					<span>____________________</span>
					<span>Affix School Seal here</span>
				</div>
			</div>
				
		</div>

	</div>
</section>