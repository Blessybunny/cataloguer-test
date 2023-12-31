<section class = "container custom-paper">
	<div class = "row">

		<!-- Scholastic record -->
		<div class = "col-12">
			
			<h6 class = "align-middle custom-header">Scholastic Record</h6>

		</div>
		
		<!-- Grade 9 -->
		@include('layouts.manager.sf10-grade', ['grade' => 9])

		<!-- Grade 10 -->
		@include('layouts.manager.sf10-grade', ['grade' => 10])
		
		<!-- Grade X -->
		<div class = "col-12">
			
			<div class = "row">
				<div class = "col-2">
					<span>School:</span>
				</div>
				<div class = "col-2">
					<span>School ID:</span>
				</div>
				<div class = "col-2">
					<span>District:</span>
				</div>
				<div class = "col-3">
					<span>Division:</span>
				</div>
				<div class = "col-3">
					<span>Region:</span>
				</div>
				<div class = "col-2">
					<span>Classified as Grade:</span>
				</div>
				<div class = "col-2">
					<span>Section:</span>
				</div>
				<div class = "col-2">
					<span>School Year:</span>
				</div>
				<div class = "col-6">
					<span>Name of Adviser / Teacher:</span>
				</div>
			</div>

			<br>

			<table class = "table">
				<tr>
					<th class = "align-middle uppercase" colspan = "2" rowspan = "2">Learning Areas</th>
					<th class = "align-middle uppercase" colspan = "4">Quarter</th>
					<th class = "align-middle sf10-width-wide uppercase" rowspan = "2">Final Rating</th>
					<th class = "align-middle sf10-width-wide uppercase" rowspan = "2">Remarks</th>
				</tr>
				<tr>
					<th class = "align-middle sf10-width-thin">1st</th>
					<th class = "align-middle sf10-width-thin">2nd</th>
					<th class = "align-middle sf10-width-thin">3rd</th>
					<th class = "align-middle sf10-width-thin">4th</th>
				</tr>
				<tr>
					<td colspan = "2">Filipino</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">English</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Mathematics</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Science</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Araling Panlipunan (AP)</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Edukasyon sa Pagpapakatao (EP)</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">Technology and Livelihood Education (TLE)</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td colspan = "2">MAPEH</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "sf10-indent" colspan = "2">Music</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "sf10-indent" colspan = "2">Arts</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "sf10-indent" colspan = "2">Physical Education</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<td class = "sf10-indent" colspan = "2">Health</td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
					<td class = "align-middle"></td>
				</tr>
				<tr>
					<th class = "sf10-custom-border-1" colspan = "2"></th>
					<th class = "align-middle sf10-custom-border-2 uppercase" colspan = "4">General Average</th>
					<td></td>
					<td></td>
				</tr>
				<tr>
					<th class = "align-middle uppercase">Remedial Classes</td>
					<td class = "align-middle" colspan = "7">Conducted from (mm/dd/yyyy) __/__/____ to (mm/dd/yyyy) __/__/____</td>
				</tr>
				<tr>
					<th class = "bold align-middle uppercase">Learning Areas</th>
					<th class = "bold align-middle uppercase">Final Rating</th>
					<th class = "bold align-middle uppercase" colspan = "4">Remedial Class Mark</th>
					<th class = "bold align-middle uppercase">Recomputed Final</th>
					<th class = "bold align-middle uppercase">Remarks</th>
				</tr>
				<tr>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
					<td colspan = "4">&nbsp;</td>
					<td>&nbsp;</td>
					<td>&nbsp;</td>
				</tr>
			</table>
				
		</div>

		<!-- Certification -->
		<div class = "col-12">

				<span class = "bold uppercase">For Transfer Out / JHS Completer Only</span>
				<br>
				<br>
			
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