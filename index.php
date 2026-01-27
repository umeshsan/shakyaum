<?php include('inc/header.php'); ?>
<main>
	<!-- Hero Section -->
	<section id="hero">
		<div class="custom-container">
			<h1 class="fw-bold mb-0 fn-ubuntu">Umesh Shakya</h1>
			<p class="text fw-medium fs-3 mb-3">CSS / Frontend Designer</p>
			<p class="text fw-medium fs-4 mb-4">I create responsive, user-friendly websites</p>
			<button onclick="document.getElementById('projects').scrollIntoView({ behavior: 'smooth' })">View My Work</button>
			<button onclick="document.getElementById('contact').scrollIntoView({ behavior: 'smooth' })">Contact Me</button>
		</div>
	</section>

	<!-- About Section -->
	<section id="about">
		<div class="custom-container">
			<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">About Me</div>
			<p class="split fs-4">I’m a Frontend Designer who loves turning designs into <br>clean, functional, and responsive websites. <br>I focus on modern UI, clean code, and smooth user experience.</p>
		</div>
	</section>

<!-- Skills Section -->
<section id="skills">
	<div class="custom-container">
		<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">Skills</div>
		<ul class="">
			<li data-aos="fade-up">HTML5</li>
			<li data-aos="fade-up">CSS3 / SCSS</li>
			<li data-aos="fade-up">JavaScript (ES6+)</li>
			<li data-aos="fade-up">Bootstrap / Tailwind</li>
			<li data-aos="fade-up">Responsive Design</li>
			<li data-aos="fade-up">Git & GitHub</li>
		</ul>
	</div>
</section>

<section id="experience">
	<div class="experience-container">
		<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">Work Experience</div>
		<p class="section-intro text-center" data-aos="fade-up">
			My professional journey as a frontend & CSS designer.
		</p>

		<div class="row row-cols-1 row-cols-md-2">
			<div class="col">
				<div class="experience-item h-100" data-aos="fade-up">
					<h3>Frontend / CSS Designer</h3>
					<p class="company fw-semibold mb-0">Miracle Interface Pvt. Ltd.</p>
					<small class="date text-muted">2013 – Present</small>
					<ul>
						<li>Designed responsive layouts using HTML, CSS, and Flexbox/Grid</li>
						<li>Converted Figma designs into pixel-perfect UI</li>
						<li>Improved website performance and UI consistency</li>
						<li>Collaborated with developers to enhance UX</li>
					</ul>
				</div>
			</div>
			<div class="col">
				<div class="experience-item h-100" data-aos="fade-up">
					<h3>Graphic Designer</h3>
					<p class="company fw-semibold mb-0">Miracle Interface Pvt. Ltd.</p>
					<small class="date text-muted">2011 – 2013</small>
					<ul>
						<li>Retouched and enhanced images for websites, social media, and marketing campaigns.</li>
						<li>Removed backgrounds, adjusted colors, and optimized images for digital platforms.</li>
						<li>Collaborated with clients to translate ideas into creative design solutions.</li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Projects Section -->
<section id="projects">
	<div class="custom-container">
		<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">Projects</div>
		<div class="project-card" data-aos="fade-up">
			<h3 class="fw-semibold">CMS Website</h3>
			<p>Responsive landing page built with HTML, CSS, and JavaScript.</p>
			<a href="#" target="_blank">Live Demo</a> | <a href="#" target="_blank">GitHub</a>
		</div>
		<div class="project-card" data-aos="fade-up">
			<h3 class="fw-semibold">Landing Page Website</h3>
			<p>Responsive landing page built with HTML, CSS, and JavaScript.</p>
			<a href="#" target="_blank">Live Demo</a> | <a href="#" target="_blank">GitHub</a>
		</div>
		<div class="project-card" data-aos="fade-up">
			<h3 class="fw-semibold">Portfolio Website</h3>
			<p>My personal portfolio showcasing projects and skills.</p>
			<a href="#" target="_blank">Live Demo</a> | <a href="#" target="_blank">GitHub</a>
		</div>
<!-- Add more project cards here -->
</div>
</section>

<section id="works" class="projects-wrapper">
	<div class="custom-container" data-aos="fade-up">
		<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">My Works</div>
		<div class="custom-border">
			<img src="dist/img/img_1.jpg" alt="" />
			<img src="dist/img/img_2.jpg" alt="" />
			<img src="dist/img/img_3.jpg" alt="" />
			<img src="dist/img/img_4.jpg" alt="" />
		</div>
	</div>
	<div class="buttons" data-aos="fade-up">
		<button id="next">Next</button>
		<button id="prev">Previous</button>
	</div>
</section>

<!-- Services Section -->
<section id="services">
	<div class="custom-container">
		<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">Services</div>
		<ul class="">
			<li>Website Design (UI)</li>
			<li>Frontend Development</li>
			<li>Responsive Layouts</li>
			<li>Website Redesign</li>
			<li>Bug Fixing</li>
		</ul>
	</div>
</section>

<!-- Contact Section -->
<section id="contact">
	<div class="custom-container">
		<div class="contact-container">
			<div class="title fs-1 text-center mb-5 fw-bold fn-ubuntu" data-aos="fade-up">Contact Me</div>
			<p class="fs-5">Have a project or need a frontend designer?<br> I’d love to hear from you.</p>

			<div class="contact-info mb-4">
				<p><strong>Name:</strong> Umesh Shakya</p>
				<p><strong>Role:</strong> CSS / Frontend Designer</p>
				<p><strong>Email:</strong> umeshshakya@gmail.com</p>
				<p><strong>Location:</strong>Patan, Nepal</p>
			</div>

			<form class="contact-form">
				<input type="text" placeholder="Your Name" required>
				<input type="email" placeholder="Your Email" required>
				<textarea rows="4" placeholder="Your Message" required></textarea>
				<button type="submit">Send Message</button>
			</form>
		</div>
	</div>
</section>
</main>
<!--index-page-->

<?php include('inc/footer.php'); ?>


