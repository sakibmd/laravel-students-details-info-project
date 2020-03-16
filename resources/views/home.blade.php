@extends('layout')


@section('content')

<section id="banner">
	<div class="container">
		<div class="row">
			<div class="col-md-6">
				<p class="promo-title">User Interface</p>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
				tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
				quis nostrud exercitation ullamco. </p>
                <a href="#"><img src="{{ asset('assets/images/play_button.jpg')  }}" class="play-button animated zoomIn">View More</a>
			</div>
			<div class="col-md-6 text-center">
				<img src="{{ asset('assets/images/s3.png')  }}" class="img-fluid img-responsive mt-4">
			</div>
		</div>
	</div>
	<img src="{{ asset('assets/images/Untitled-2.png')  }}" class="img-fluid wave">
</section>



<section id="course">
	<div class="container">
		<h1 class="animated flipInX title text-center">Our Departments</h1>
		<div class="row row1">
			<div class="col-md-4 course">
				<img src="{{ asset('assets/images/d1.jpg') }}">
				<div class="course-content text-center">
				<a href="{{ route('students.index') }}"><h6><strong>Computer Science & Engineering</strong></h6></a>
					<p class="text">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
			<div class="col-md-4 course">
				<img src="{{ asset('assets/images/d2.jpg') }}">
				<div class="course-content text-center">
					<h6><strong>Department of Business Administration</strong></h6>
					<p class="text">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
			<div class="col-md-4 course">
				<img src="{{ asset('assets/images/d3.jpg') }}" class="img-fluid">
				<div class="course-content text-center">
					<h6><strong>Department of Law & Justise</strong></h6>
					<p class="text">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
        </div>
        <br>
			<div class="row row2">
			<div class="col-md-4 course">
				<img src="{{ asset('assets/images/d4.jpg') }}" class="img-fluid">
				<div class="course-content text-center">
					<h6><strong>Electrical & Electronics Engineering</strong></h6>
				<p class="text">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
			<div class="col-md-4 course">
				<img src="{{ asset('assets/images/d6.jpg') }}" class="img-fluid">
				<div class="course-content text-center">
					<h6><strong>Department of Economics</strong></h6>
					<p class="text">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
			<div class="col-md-4 course">
				<img src="{{ asset('assets/images/d5.jpg') }}" class="img-fluid">
				<div class="course-content text-center">
					<h6><strong>Department of Architecture</strong></h6>
					<p class="text">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
		</div>
	</div>
</section>


@endsection