<section class = "container custom-paper">
	<div class = "row">

		<!-- Header -->
		<div class = "col-12">

			<div class = "row">
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-2.png') }}" height = 100>
				</div>
				<div class = "col-8 align-middle">
					<span>Republic of the Philippines</span>
					<br>
					<span>Department of Education</span>
					<br>
					<h6 class = "header-no-margin">Learner Permanent Record for Junior High School (SF10-JHS)</h6>
					<span>(Formerly Form 137)</span>
				</div>
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-1.png') }}" height = 100 style = "float: right">
				</div>
			</div>

			<br>

		</div>

		<!-- Learner's information -->
		<div class = "col-12">

			<h6 class = "align-middle custom-header">Learner's Information</h6>

			<div class = "row">
				<div class = "col-4">
					<span>LAST NAME:</span>
					<br>
					<span>Leaner Reference Number (LRN):</span>
				</div>
				<div class = "col-4">
					<span>FIRST NAME:</span>
					<br>
					<span>Birthdate (mm/dd/yyyy):</span>
				</div>
				<div class = "col-4">
					<span>MIDDLE NAME:</span>
					<br>
					<span>Sex</span>
				</div>
			</div>
			
			<br>

		</div>

		<!-- Eligibility for JHS enrollment -->
		<div class = "col-12">

			<h6 class = "align-middle custom-header">Eligibility for JHS Enrollment</h6>

			<div class = "row">
				<div class = "col-4">
					<label>
						<input type = "checkbox">
						<span>Elementary School Completer</span>
					</label>
				</div>
				<div class = "col-8">
					<span>General Average:</span>
					<br>
					<span>Citation (if any):</span>
					<br>
					<span>Name of Elementary School:</span>
					<br>
					<span>School ID:</span>
					<br>
					<span>Address of School:</span>
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-4">
					<label>
						<input type = "checkbox">
						<span>PEPT Passer | Rating:</span>
					</label>
					<br>
					<label>
						<input type = "checkbox">
						<span>ALS A & E Passer | Rating:</span>
					</label>
					<br>
					<label>
						<input type = "checkbox">
						<span>Others (please specify):</span>
					</label>
				</div>
				<div class = "col-8">
					<span>Date of Examination / Assessment (mm/dd/yyy):</span>
					<br>
					<span>Name and Address of Testing Center:</span>
				</div>
			</div>

			<br>

		</div>

		<!-- Scholastic record 7-8 -->
		<div class = "col-12">
			
			<h6 class = "align-middle custom-header">Scholastic Record</h6>

			@include('layouts.manager.sf10-table', ['grade' => 7])
			@include('layouts.manager.sf10-table', ['grade' => 8])

		</div>

		<!-- Certification -->
		<div class = "col-12">
			
			<h6 class = "align-middle custom-header">Certification</h6>

			<div class = "align-middle">
				<span>I CERTIFY that this is a true record of</span>
				<span>____________________</span>
				<span>with LRN</span>
				<span>____________________</span>
				<span>and that he / she is eligible for admission to Grade</span>
				<span>__________</span>
				<span>.</span>
				<br>
				<span>Name of School:</span>
				<span>________________________________________</span>
				<span>School ID:</span>
				<span>________________________________________</span>
				<span>Last School Year Attended:</span>
				<span>________________________________________</span>
				<br>
				<br>
			</div>

			<div class = "align-middle row">
				<div class = "col">
					<span>____________________</span>
					<br>
					<span>Date</span>
				</div>
				<div class = "col">
					<span>________________________________________________________________________________</span>
					<br>
					<span>Name of Principal / School Head over Printed Name</span>
				</div>
				<div class = "col">
					<span>________________________________________</span>
					<br>
					<span>Affix School Seal here</span>
				</div>
			</div>
				
		</div>

	</div>
</section>