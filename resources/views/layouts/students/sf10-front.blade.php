<section class = "container paper">
	<div class = "row">

		<!-- Header -->
		<div class = "col-12">

			<span>SF10-JHS</span>

			<div class = "row">
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-2.png') }}" height = 75 draggable = "false">
				</div>
				<div class = "col-8 align-middle">
					<span>Republic of the Philippines</span>
					<span>Department of Education</span>
					<h6 class = "margin-none">Learner Permanent Record for Junior High School (SF10-JHS)</h6>
					<span>(Formerly Form 137)</span>
				</div>
				<div class = "col-2">
					<img src = "{{ asset('assets/img/deped-1.png') }}" height = 75 draggable = "false" style = "float: right">
				</div>
			</div>

		</div>

		<!-- Learner's information -->
		<div class = "col-12">

			<h6 class = "align-middle heading-1">Learner's Information</h6>

			<div class = "row">
				<div class = "col-3">
					<span data-property = "string" data-target = "info_name_last" data-label = "LAST NAME: "></span>
				</div>
				<div class = "col-3">
					<span data-property = "string" data-target = "info_name_first" data-label = "FIRST NAME: "></span>
				</div>
				<div class = "col-3">
					<span data-property = "string" data-target = "info_name_suffix" data-label = "EXTN. (Jr, I, II): "></span>
				</div>
				<div class = "col-3">
					<span data-property = "string" data-target = "info_name_middle" data-label = "MIDDLE NAME: "></span>
				</div>
			</div>

			<div class = "row">
				<div class = "col-6">
					<span data-property = "string" data-target = "info_lrn" data-label = "Leaner Reference Number (LRN): "></span>
				</div>
				<div class = "col-3">
					<span data-property = "date" data-target = "info_birthdate" data-label = "Birthdate (MM/DD/YYYY): "></span>
				</div>
				<div class = "col-3">
					<span data-property = "string" data-target = "info_sex" data-label = "Sex: "></span>
				</div>
			</div>

		</div>

		<!-- Eligibility for JHS enrollment -->
		<div class = "col-12">

			<h6 class = "align-middle heading-1">Eligibility for JHS Enrollment</h6>

			<div class = "border-all enrollment-spacing-1">
				<div class = "row">
					<div class = "col-4">
						<label>
							<input type = "checkbox" data-property = "boolean" data-target = "enrollment_elementary_boolean">
							<span>Elementary School Completer</span>
						</label>
					</div>
					<div class = "col-4">
						<span data-property = "string" data-target = "enrollment_elementary_average" data-label = "General Average: "></span>
					</div>
					<div class = "col-4">
						<span data-property = "string" data-target = "enrollment_elementary_citation" data-label = "Citation (If Any): "></span>
					</div>
				</div>
				<div class = "row">
					<div class = "col-4">
						<span data-property = "string" data-target = "enrollment_elementary_name" data-label = "Name of Elementary School: "></span>
					</div>
					<div class = "col-4">
						<span data-property = "string" data-target = "enrollment_elementary_id" data-label = "School ID: "></span>
					</div>
					<div class = "col-4">
						<span data-property = "string" data-target = "enrollment_elementary_address" data-label = "Address of School: "></span>
					</div>
				</div>
			</div>

			<span class = "span-spacing-1">Other Credential Presented</span>

			<div class = "enrollment-spacing-2">
				<div class = "row">
					<div class = "col-4">
						<label>
							<input type = "checkbox" data-property = "boolean" data-target = "enrollment_other_pept_boolean">
							<span>PEPT Passer |&nbsp;</span>
							<span class = "width-100" data-property = "string" data-target = "enrollment_other_pept_rating" data-label = "Rating: "></span>
						</label>
					</div>
					<div class = "col-4">
						<label>
							<input type = "checkbox" data-property = "boolean" data-target = "enrollment_other_alsae_boolean">
							<span>ALS A&E Passer |&nbsp;</span>
							<span class = "width-100" data-property = "string" data-target = "enrollment_other_alsae_rating" data-label = "Rating: "></span>
						</label>
					</div>
					<div class = "col-4">
						<label>
							<input type = "checkbox" data-property = "boolean" data-target = "enrollment_other_specify_boolean">
							<span>Others |&nbsp;</span>
							<span class = "width-100"  data-property = "string" data-target = "enrollment_other_specify_rating" data-label = "Please specify: "></span>
						</label>
					</div>
				</div>
				<div class = "row">
					<div class = "col-6">
						<span data-property = "date" data-target = "enrollment_other_date" data-label = "Date of Examination / Assessment (MM/DD/YYYY): "></span>
					</div>
					<div class = "col-6">
						<span data-property = "string" data-target = "enrollment_other_location" data-label = "Name and Address of Testing Center: "></span>
					</div>
				</div>
			</div>
		</div>

		<!-- Scholastic record 7-8 -->
		<div class = "col-12">
			
			<h6 class = "align-middle heading-1">Scholastic Record</h6>

			@include('layouts.students.sf10-table', ['grade' => 7])
			@include('layouts.students.sf10-table', ['grade' => 8])

		</div>

		<!-- Certification -->
		<div class = "col-12">
			
			@include('layouts.students.sf10-certification')
				
		</div>

	</div>
</section>