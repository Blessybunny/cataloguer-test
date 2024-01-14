<section class = "container paper">
	<div class = "row">

		<!-- Header -->
		<div class = "col-12">

			<div class = "row">
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-2.png') }}" height = 75>
				</div>
				<div class = "col-8 align-middle">
					<span>Republic of the Philippines</span>
					<span>Department of Education</span>
					<h6 class = "margin-none">Learner Permanent Record for Junior High School (SF10-JHS)</h6>
					<span>(Formerly Form 137)</span>
				</div>
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-1.png') }}" height = 75 style = "float: right">
				</div>
			</div>

		</div>

		<!-- Learner's information -->
		<div class = "col-12">

			<h6 class = "align-middle heading">Learner's Information</h6>

			<div class = "row">
				<div class = "col-3">
					<span data-type = "text" data-parameters = "info_name_last" data-label = "LAST NAME"></span>
				</div>
				<div class = "col-3">
					<span data-type = "text" data-parameters = "info_name_first" data-label = "FIRST NAME"></span>
				</div>
				<div class = "col-3">
					<span>EXTN. (Jr, I, II):</span>
				</div>
				<div class = "col-3">
					<span data-type = "text" data-parameters = "info_name_middle" data-label = "MIDDLE NAME"></span>
				</div>
			</div>
			<div class = "row">
				<div class = "col-6">
					<span data-type = "text" data-parameters = "info_lrn" data-label = "Leaner Reference Number (LRN)"></span>
				</div>
				<div class = "col-3">
					<span data-type = "date" data-parameters = "info_birthdate" data-label = "Birthdate (MM/DD/YYYY)"></span>
				</div>
				<div class = "col-3">
					<span data-type = "text" data-parameters = "info_sex" data-label = "Sex"></span>
				</div>
			</div>

		</div>

		<!-- Eligibility for JHS enrollment -->
		<div class = "col-12">

			<h6 class = "align-middle heading">Eligibility for JHS Enrollment</h6>

			<div class = "row">
				<div class = "col-4">
					<label>
						<input type = "checkbox" data-type = "boolean" data-target = "enrollment_elementary_boolean">
						<span>Elementary School Completer</span>
					</label>
				</div>
				<div class = "col-8">
					<span data-type = "text" data-parameters = "enrollment_elementary_average" data-label = "General Average"></span>
					<span data-type = "text" data-parameters = "enrollment_elementary_citation" data-label = "Citation (If Any)"></span>
					<span data-type = "text" data-parameters = "enrollment_elementary_name" data-label = "Name of Elementary School"></span>
					<span data-type = "text" data-parameters = "enrollment_elementary_id" data-label = "School ID"></span>
					<span data-type = "text" data-parameters = "enrollment_elementary_address" data-label = "Address of School"></span>
				</div>
			</div>

			<hr>

			<div class = "row">
				<div class = "col-4">
					<label>
						<input type = "checkbox" data-type = "boolean" data-target = "enrollment_other_pept_boolean">
						<span>PEPT Passer |&nbsp;</span>
						<span class = "width-100" data-type = "text" data-parameters = "enrollment_other_pept_rating" data-label = "Rating"></span>
					</label>
					<label>
						<input type = "checkbox" data-type = "boolean" data-target = "enrollment_other_alsae_boolean">
						<span>ALS A&E Passer |&nbsp;</span>
						<span class = "width-100" data-type = "text" data-parameters = "enrollment_other_alsae_rating" data-label = "Rating"></span>
					</label>
					<label>
						<input type = "checkbox" data-type = "boolean" data-target = "enrollment_other_specify_boolean">
						<span>Others |&nbsp;</span>
						<span class = "width-100"  data-type = "text" data-parameters = "enrollment_other_specify_label" data-label = "Please specify"></span>
					</label>
				</div>
				<div class = "col-8">
					<span data-type = "date" data-parameters = "enrollment_other_date" data-label = "Date of Examination / Assessment (MM/DD/YYYY)"></span>
					<span data-type = "text" data-parameters = "enrollment_other_location" data-label = "Name and Address of Testing Center"></span>
				</div>
			</div>

		</div>

		<!-- Scholastic record 7-8 -->
		<div class = "col-12">
			
			<h6 class = "align-middle heading">Scholastic Record</h6>

			@include('layouts.manager.sf10-table', ['grade' => 7])
			@include('layouts.manager.sf10-table', ['grade' => 8])

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