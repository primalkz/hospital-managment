@extends('layout.main')
@section('title', 'Home')
@section('content')
  <!-- Enhanced Navbar -->
  @include('home.common.header')
  <!-- Hero Section with Carousel -->
  <section class="hero-gradient py-5">
    <div class="container py-5">
      <div class="row align-items-center hero-content">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <h1 class="display-4 fw-bold mb-4">The Hospital of The Future, Today</h1>
          <p class="lead mb-4">Providing exceptional healthcare with cutting-edge technology and compassionate care.</p>
          <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn btn-light text-primary">Learn More</a>
            <a href="#" class="btn btn-outline-light">Contact Us</a>
          </div>
        </div>
        <div class="col-lg-6">
          {{-- <img src="https://placehold.co/600x400?text=Medical+Professionals" alt="Medical professionals" class="img-fluid rounded shadow mb-4"> --}}
          
          <!-- Added Carousel -->
          <div id="heroCarousel" class="carousel slide hero-carousel" data-bs-ride="carousel">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="https://www.maxhealthcare.in/img/doctor-consult-illustration.svg" class="d-block w-100 h-50" alt="Advanced Medical Equipment">
                <div class="carousel-caption d-none d-md-block pt-2 pb-1">
                  <h5>State-of-the-Art Equipment</h5>
                  <p>Our hospital is equipped with the latest medical technology</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://www.maxhealthcare.in/img/doctor-consult-illustration.svg" class="d-block w-100 h-50" alt="Expert Medical Team">
                <div class="carousel-caption d-none d-md-block pt-2 pb-1">
                  <h5>Expert Medical Team</h5>
                  <p>Our specialists are leaders in their respective fields</p>
                </div>
              </div>
              <div class="carousel-item">
                <img src="https://www.maxhealthcare.in/img/doctor-consult-illustration.svg" class="d-block w-100 h-50" alt="Patient Care">
                <div class="carousel-caption d-none d-md-block pt-2 pb-1">
                  <h5>Compassionate Care</h5>
                  <p>We prioritize patient comfort and well-being</p>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Key Metrics -->
  <section class="bg-white py-5">
    <div class="container">
      <div class="row text-center">
        <div class="col-md-4 mb-4 mb-md-0">
          <h3 class="display-5 fw-bold text-primary mb-2">25+</h3>
          <p class="text-secondary">Years of Excellence</p>
        </div>
        <div class="col-md-4 mb-4 mb-md-0">
          <h3 class="display-5 fw-bold text-primary mb-2">100K+</h3>
          <p class="text-secondary">Patients Treated</p>
        </div>
        <div class="col-md-4">
          <h3 class="display-5 fw-bold text-primary mb-2">50+</h3>
          <p class="text-secondary">Specialist Doctors</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Medical Hospital Center -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="display-6 fw-bold mb-4">Medical Hospital Center</h2>
          <p class="mb-4">Our state-of-the-art medical center provides comprehensive healthcare services with the latest technology and expert medical professionals.</p>
          <ul class="list-unstyled row department-list p-1 m-1">
            <li class="col-md-6">Cardiology</li>
            <li class="col-md-6">Neurology</li>
            <li class="col-md-6">Orthopedics</li>
            <li class="col-md-6">Pediatrics</li>
            <li class="col-md-6">Gynecology</li>
            <li class="col-md-6">Dermatology</li>
            <li class="col-md-6">Ophthalmology</li>
            <li class="col-md-6">Oncology</li>
          </ul>
          <a href="#" class="btn btn-primary mt-3">
            View All Departments <i class="bi bi-arrow-right ms-2"></i>
          </a>
        </div>
        <div class="col-lg-6">
          <img src="https://placehold.co/600x400?text=Medical+Team" alt="Medical team discussion" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Our Services -->
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="display-6 fw-bold text-center mb-5">Our Services</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card service-card border-0 shadow h-100">
            <img src="https://placehold.co/600x400?text=Medical+Center" class="card-img-top" alt="Medical Center">
            <div class="card-body">
              <h5 class="card-title fw-bold">Medical Center</h5>
              <p class="card-text text-secondary">Comprehensive medical care with state-of-the-art facilities and expert physicians.</p>
              <a href="#" class="text-primary text-decoration-none">Learn More <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card border-0 shadow h-100">
            <img src="https://placehold.co/600x400?text=Surgical+Services" class="card-img-top" alt="Surgical Services">
            <div class="card-body">
              <h5 class="card-title fw-bold">Surgical Services</h5>
              <p class="card-text text-secondary">Advanced surgical procedures performed by highly skilled surgeons using cutting-edge technology.</p>
              <a href="#" class="text-primary text-decoration-none">Learn More <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card service-card border-0 shadow h-100">
            <img src="https://placehold.co/600x400?text=Emergency+Care" class="card-img-top" alt="Emergency Care">
            <div class="card-body">
              <h5 class="card-title fw-bold">Emergency Care (24/7)</h5>
              <p class="card-text text-secondary">Round-the-clock emergency services with rapid response teams ready to provide immediate care.</p>
              <a href="#" class="text-primary text-decoration-none">Learn More <i class="bi bi-arrow-right"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Working Process -->
  <section class="py-5 bg-primary text-white">
    <div class="container">
      <h2 class="display-6 fw-bold text-center mb-5">Our Working Process</h2>
      <div class="row g-4">
        <div class="col-md-4 text-center process-col">
          <div class="process-icon bg-primary-dark">
            <i class="bi bi-calendar-check"></i>
          </div>
          <h4 class="fw-bold mb-3">Book Appointment</h4>
          <p>Schedule your visit online or by phone for your convenience.</p>
        </div>
        <div class="col-md-4 text-center process-col">
          <div class="process-icon bg-primary-dark">
            <i class="bi bi-clipboard2-pulse"></i>
          </div>
          <h4 class="fw-bold mb-3">Get Consultation</h4>
          <p>Meet with our specialists for thorough examination and diagnosis.</p>
        </div>
        <div class="col-md-4 text-center process-col">
          <div class="process-icon bg-primary-dark">
            <i class="bi bi-activity"></i>
          </div>
          <h4 class="fw-bold mb-3">Get Treatment</h4>
          <p>Receive personalized treatment plans and quality care from our team.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Scrollable Patient Reviews Section -->
  <section class="py-5 bg-light reviews-container">
    <div class="container">
      <h2 class="display-6 fw-bold text-center mb-4">What Our Patients Say</h2>
      <p class="text-center text-secondary mb-5">Read reviews from our satisfied patients</p>
      
      <div class="reviews-scroll">
        <div class="review-card">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://placehold.co/100x100?text=P1" alt="Patient" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h5 class="card-title mb-0">John Smith</h5>
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p class="card-text text-secondary fst-italic">"The care I received at this hospital was exceptional. The doctors were knowledgeable and compassionate, and the staff was attentive to all my needs. I highly recommend this facility to anyone seeking quality healthcare."</p>
              <p class="text-end text-primary mb-0">Cardiology Department</p>
            </div>
          </div>
        </div>
        
        <div class="review-card">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://placehold.co/100x100?text=P2" alt="Patient" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h5 class="card-title mb-0">Sarah Johnson</h5>
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                  </div>
                </div>
              </div>
              <p class="card-text text-secondary fst-italic">"I had surgery here last month and was impressed by the professionalism of the entire team. From pre-op to recovery, everyone was supportive and informative. The facilities are modern and clean. My recovery has been smooth thanks to their excellent care."</p>
              <p class="text-end text-primary mb-0">Surgical Department</p>
            </div>
          </div>
        </div>
        
        <div class="review-card">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://placehold.co/100x100?text=P3" alt="Patient" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h5 class="card-title mb-0">Michael Brown</h5>
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                  </div>
                </div>
              </div>
              <p class="card-text text-secondary fst-italic">"The emergency department saved my life. I came in with severe chest pain, and the team acted quickly and efficiently. Dr. Wilson was exceptional in explaining my condition and treatment options. I'm grateful for their expertise and quick response."</p>
              <p class="text-end text-primary mb-0">Emergency Department</p>
            </div>
          </div>
        </div>
        
        <div class="review-card">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://placehold.co/100x100?text=P4" alt="Patient" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h5 class="card-title mb-0">Emily Davis</h5>
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star"></i>
                  </div>
                </div>
              </div>
              <p class="card-text text-secondary fst-italic">"I've been bringing my children to the pediatric department for years. The doctors are patient and kind, making my kids feel comfortable during visits. The waiting area is child-friendly, and appointment scheduling is always efficient. Highly recommend for families."</p>
              <p class="text-end text-primary mb-0">Pediatric Department</p>
            </div>
          </div>
        </div>
        
        <div class="review-card">
          <div class="card border-0 shadow h-100">
            <div class="card-body p-4">
              <div class="d-flex align-items-center mb-3">
                <img src="https://placehold.co/100x100?text=P5" alt="Patient" class="rounded-circle me-3" width="50" height="50">
                <div>
                  <h5 class="card-title mb-0">Robert Wilson</h5>
                  <div class="text-warning">
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-fill"></i>
                    <i class="bi bi-star-half"></i>
                  </div>
                </div>
              </div>
              <p class="card-text text-secondary fst-italic">"The physical therapy department has been instrumental in my recovery after a car accident. The therapists are knowledgeable and encouraging. They created a personalized plan that has significantly improved my mobility. The facilities are excellent with modern equipment."</p>
              <p class="text-end text-primary mb-0">Physical Therapy</p>
            </div>
          </div>
        </div>
      </div>
      
      <div class="text-center mt-4">
        <a href="#" class="btn btn-primary">View All Reviews</a>
      </div>
    </div>
  </section>

  <!-- Appointment Booking -->
  <section class="py-5 bg-white">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-6">
          <div class="appointment-form p-4 p-md-5">
            <h3 class="fw-bold mb-4">Book Your Appointment</h3>
            <form>
              <div class="row g-3">
                <div class="col-md-6">
                  <input type="text" class="form-control" placeholder="Full Name" required>
                </div>
                <div class="col-md-6">
                  <input type="email" class="form-control" placeholder="Email Address" required>
                </div>
                <div class="col-md-6">
                  <input type="tel" class="form-control" placeholder="Phone Number" required>
                </div>
                <div class="col-md-6">
                  <input type="date" class="form-control" required>
                </div>
                <div class="col-12">
                  <textarea class="form-control" rows="4" placeholder="Your Message"></textarea>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-light text-primary w-100 fw-bold">Book Now</button>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="col-lg-6">
          <h2 class="display-6 fw-bold mb-4">What is our appointment policy?</h2>
          <p class="text-secondary mb-4">Our appointment policy is designed to ensure that all patients receive the care they need in a timely manner. We strive to accommodate urgent cases while maintaining our scheduled appointments.</p>
          <ul class="list-unstyled mb-4">
            <li class="d-flex mb-3">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">1</div>
              <div>
                <h5 class="fw-bold">Schedule in Advance</h5>
                <p class="text-secondary">We recommend booking appointments at least 48 hours in advance.</p>
              </div>
            </li>
            <li class="d-flex mb-3">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">2</div>
              <div>
                <h5 class="fw-bold">Cancellation Notice</h5>
                <p class="text-secondary">Please provide at least 24 hours notice for cancellations.</p>
              </div>
            </li>
            <li class="d-flex mb-3">
              <div class="bg-primary bg-opacity-10 text-primary rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">3</div>
              <div>
                <h5 class="fw-bold">Arrive Early</h5>
                <p class="text-secondary">Please arrive 15 minutes before your scheduled appointment.</p>
              </div>
            </li>
          </ul>
          <div class="d-flex flex-wrap gap-4">
            <div>
              <p class="fw-bold mb-1">Contact us</p>
              <a href="tel:+1234567890" class="text-primary text-decoration-none">
                <i class="bi bi-telephone me-1"></i> (123) 456-7890
              </a>
            </div>
            <div>
              <p class="fw-bold mb-1">Email us</p>
              <a href="mailto:info@medicalhospital.com" class="text-primary text-decoration-none">
                <i class="bi bi-envelope me-1"></i> info@medicalhospital.com
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Emergency Contact -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <h2 class="display-6 fw-bold mb-4">Need Emergency Contact</h2>
          <p class="text-secondary mb-4">Our emergency services are available 24/7. Don't hesitate to contact us immediately in case of emergency.</p>
          <div class="d-flex align-items-center mb-4">
            <div class="bg-primary text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 60px; height: 60px;">
              <i class="bi bi-telephone-fill fs-4"></i>
            </div>
            <div>
              <p class="text-secondary mb-0">Emergency Hotline</p>
              <a href="tel:+1234567890" class="text-primary fs-3 fw-bold text-decoration-none">(123) 456-7890</a>
            </div>
          </div>
          <a href="#" class="btn btn-primary">Contact Now</a>
        </div>
        <div class="col-lg-6 text-center">
          <div class="emergency-circle">
            <img src="https://placehold.co/400x400?text=Doctor" alt="Doctor" class="img-fluid" style="max-width: 300px;">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Meet Our Expert Doctors -->
  <section class="py-5 bg-white">
    <div class="container">
      <h2 class="display-6 fw-bold text-center mb-5">Meet Our Expert Doctors</h2>
      <div class="row g-4">
        <div class="col-6 col-md-3">
          <div class="card doctor-card border-0 shadow text-center h-100">
            <img src="https://placehold.co/400x400?text=Dr.+John" class="card-img-top" alt="Dr. John Smith">
            <div class="card-body">
              <h5 class="card-title fw-bold">Dr. John Smith</h5>
              <p class="text-primary">Cardiologist</p>
              <div class="d-flex justify-content-center">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="card doctor-card border-0 shadow text-center h-100">
            <img src="https://placehold.co/400x400?text=Dr.+Sarah" class="card-img-top" alt="Dr. Sarah Johnson">
            <div class="card-body">
              <h5 class="card-title fw-bold">Dr. Sarah Johnson</h5>
              <p class="text-primary">Neurologist</p>
              <div class="d-flex justify-content-center">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="card doctor-card border-0 shadow text-center h-100">
            <img src="https://placehold.co/400x400?text=Dr.+Michael" class="card-img-top" alt="Dr. Michael Brown">
            <div class="card-body">
              <h5 class="card-title fw-bold">Dr. Michael Brown</h5>
              <p class="text-primary">Orthopedic</p>
              <div class="d-flex justify-content-center">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6 col-md-3">
          <div class="card doctor-card border-0 shadow text-center h-100">
            <img src="https://placehold.co/400x400?text=Dr.+Emily" class="card-img-top" alt="Dr. Emily Davis">
            <div class="card-body">
              <h5 class="card-title fw-bold">Dr. Emily Davis</h5>
              <p class="text-primary">Pediatrician</p>
              <div class="d-flex justify-content-center">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="#" class="btn btn-outline-primary">View All Doctors</a>
      </div>
    </div>
  </section>

  <!-- Physiotherapy Promotion -->
  <section class="py-5 bg-light">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-4 mb-lg-0">
          <span class="badge bg-primary rounded-pill px-3 py-2 mb-3">20% Off</span>
          <h2 class="display-6 fw-bold mb-4">Physiotherapy</h2>
          <ul class="list-unstyled mb-4 department-list">
            <li>Professional physiotherapists with years of experience</li>
            <li>State-of-the-art equipment and facilities</li>
            <li>Personalized treatment plans for optimal recovery</li>
          </ul>
          <div class="d-flex flex-wrap gap-2">
            <a href="#" class="btn btn-primary">Book Now</a>
            <a href="#" class="btn btn-outline-primary">Learn More</a>
          </div>
        </div>
        <div class="col-lg-6">
          <img src="https://placehold.co/600x400?text=Physiotherapy" alt="Physiotherapy session" class="img-fluid rounded shadow">
        </div>
      </div>
    </div>
  </section>

  <!-- Newsletter -->
  <section class="py-4 bg-primary text-white">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6 mb-3 mb-lg-0">
          <h3 class="fw-bold">Subscribe to Our Newsletter</h3>
          <p class="mb-0">Stay updated with our latest news and special offers</p>
        </div>
        <div class="col-lg-6">
          <form class="d-flex">
            <input type="email" class="form-control me-2" placeholder="Your Email Address" required>
            <button type="submit" class="btn btn-light text-primary fw-bold">Subscribe</button>
          </form>
        </div>
      </div>
    </div>
  </section>

  <!-- Latest News & Articles -->
  <section class="py-5 bg-light">
    <div class="container">
      <h2 class="display-6 fw-bold text-center mb-5">Latest News & Articles</h2>
      <div class="row g-4">
        <div class="col-md-4">
          <div class="card news-card border-0 shadow h-100">
            <div class="position-relative">
              <span class="badge bg-primary category-badge">Research</span>
              <img src="https://placehold.co/600x400?text=Article+1" class="card-img-top" alt="Article 1">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">New Cancer Treatment Shows Promising Results</h5>
              <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-secondary"><i class="bi bi-calendar me-1"></i> May 12, 2025</small>
                <a href="#" class="text-primary text-decoration-none">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card news-card border-0 shadow h-100">
            <div class="position-relative">
              <span class="badge bg-primary category-badge">Health Tips</span>
              <img src="https://placehold.co/600x400?text=Article+2" class="card-img-top" alt="Article 2">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">Tips for Maintaining Heart Health</h5>
              <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-secondary"><i class="bi bi-calendar me-1"></i> May 10, 2025</small>
                <a href="#" class="text-primary text-decoration-none">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card news-card border-0 shadow h-100">
            <div class="position-relative">
              <span class="badge bg-primary category-badge">Hospital News</span>
              <img src="https://placehold.co/600x400?text=Article+3" class="card-img-top" alt="Article 3">
            </div>
            <div class="card-body">
              <h5 class="card-title fw-bold">Hospital Expands Pediatric Care Unit</h5>
              <p class="card-text text-secondary">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
              <div class="d-flex justify-content-between align-items-center">
                <small class="text-secondary"><i class="bi bi-calendar me-1"></i> May 8, 2025</small>
                <a href="#" class="text-primary text-decoration-none">Read More <i class="bi bi-arrow-right"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="text-center mt-4">
        <a href="#" class="btn btn-outline-primary">View All Articles</a>
      </div>
    </div>
  </section>

  <!-- Footer -->
  <footer class="bg-dark text-white pt-5 pb-3">
    <div class="container">
      <div class="row g-4">
        <div class="col-lg-3 col-md-6">
          <h4 class="fw-bold mb-4">Medical Hospital</h4>
          <p class="mb-4">Providing exceptional healthcare services with compassion and expertise for over 25 years.</p>
          <div class="d-flex">
            <a href="#" class="social-icon"><i class="bi bi-facebook"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-twitter"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-instagram"></i></a>
            <a href="#" class="social-icon"><i class="bi bi-linkedin"></i></a>
          </div>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="fw-bold mb-4">Quick Links</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Home</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">About Us</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Services</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Doctors</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Contact</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="fw-bold mb-4">Our Services</h4>
          <ul class="list-unstyled">
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Cardiology</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Neurology</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Orthopedics</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Pediatrics</a></li>
            <li class="mb-2"><a href="#" class="text-white text-decoration-none hover-opacity">Gynecology</a></li>
          </ul>
        </div>
        <div class="col-lg-3 col-md-6">
          <h4 class="fw-bold mb-4">Contact Info</h4>
          <ul class="list-unstyled footer-contact">
            <li>
              <div class="footer-contact-icon">
                <i class="bi bi-geo-alt"></i>
              </div>
              <span>123 Medical Drive, Healthcare City, CA 90210</span>
            </li>
            <li>
              <div class="footer-contact-icon">
                <i class="bi bi-telephone"></i>
              </div>
              <span>(123) 456-7890</span>
            </li>
            <li>
              <div class="footer-contact-icon">
                <i class="bi bi-envelope"></i>
              </div>
              <span>info@medicalhospital.com</span>
            </li>
            <li>
              <div class="footer-contact-icon">
                <i class="bi bi-clock"></i>
              </div>
              <div>
                <p class="mb-0">Mon-Fri: 8:00 AM - 8:00 PM</p>
                <p class="mb-0">Sat-Sun: 9:00 AM - 5:00 PM</p>
              </div>
            </li>
          </ul>
        </div>
      </div>
      <hr class="my-4 bg-secondary opacity-25">
      <p class="text-center mb-0">© 2025 Medical Hospital. All rights reserved.</p>
    </div>
  </footer>

  <!-- Bootstrap 5 JS Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  
  <!-- Custom JS -->
  <script>
    // Navbar scroll effect
    window.addEventListener('scroll', function() {
      const navbar = document.querySelector('.navbar');
      if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
      } else {
        navbar.classList.remove('scrolled');
      }
    });
  </script>
@endsection