@extends('layouts.page')

@section('title')
Dashboard
@endsection

@section('content')
	
<main id = "main">
    <section id = "grade-card" class = "container">
		<!-- Options -->
		<div class = "row">
			<div class = "col">
				<a href = "#" class = "btn-custom">Return</a>
			</div>
		</div>
		<hr>

		<!-- Header -->
		<div class = "row">
			<div class = "col-3">
				<img src = "assets/img/deped-2.png" height = 100>
			</div>
			<div class = "col-6 align-middle">
				<h4>Final Semestral Grades</h4>
				<table class = "table">					
					<tbody>			
						<tr>		
							<td class = "bold text-right">REGION</td>
							<td class = "align-middle text-left">CAR</td>
							<td class = "bold text-right">DIVISION</td>
							<td class = "align-middle text-left">Baguio City</td>
							<td class = "bold text-right">School ID</td>
							<td class = "align-middle text-left"></td>
						</tr>	
						<tr>		
							<td class = "bold text-right">SCHOOL NAME</td>
							<td class = "align-middle text-left" colspan = "3">Irisan National High School</td>
							<td class = "bold text-right">School Year</td>
							<td class = "align-middle text-left"></td>
						</tr>
					</tbody>
				</table>
			</div>
			<div class = "col-3">
				<img src = "assets/img/deped-1.png" height = 100 style = "float: right">
			</div>
		</div>
		<hr>

		<!-- Semestral grades -->
		<div class = "row">
			<div class = "col">
				<table class = "table">					
					<tbody>
						<tr>		
							<td class = "align-middle bold" rowspan = "4">LEARNER'S NAME</td>
							<td class = "align-middle bold left" colspan = "2" rowspan = "2">GRADE & SECTION:</td>
							<td class = "align-middle bold left" colspan = "2">SEMESTER:</td>
						</tr>
						<tr>
							<td class = "align-middle bold left" colspan = "2">SUBJECT:</td>
						</tr>
						<tr>
							<td class = "align-middle bold left" colspan = "2">TEACHER:</td>
							<td class = "align-middle bold left" colspan = "2">TRACK:</td>
						</tr>
						<tr>
							<td class = "align-middle bold">FIRST QUARTER</td>
							<td class = "align-middle bold">SECOND QUARTER</td>
							<td class = "align-middle bold">??? Confirm this</td>
							<td class = "align-middle bold">REMARKS</td>
						</tr>
						<tr>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
							<td>&nbsp;</td>
						</tr>
					</tbody>
				</table>
				<hr>
			</div>
		</div>
    </section>
</main>

@endsection