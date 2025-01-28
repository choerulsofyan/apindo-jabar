<div id="myCarousel" class="carousel slide"
    style="height:436px; background-image: url('{{ asset('assets/images/hero-pattern.png') }}');" data-bs-ride="carousel"
    data-bs-pause="hover">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-left text-white p-4">
                    <h1 class="mb-3 display-4">Discover Your Next Adventure</h1>
                    <p class="mb-0 lead">Explore breathtaking destinations with us.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-left text-white p-4">
                    <h1 class="mb-3 display-4">Unleash Your Potential</h1>
                    <p class="mb-0 lead">Learn new skills and achieve your goals.</p>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="d-flex justify-content-center align-items-center h-100">
                <div class="text-left text-white p-4">
                    <h1 class="mb-3 display-4">Experience the Difference</h1>
                    <p class="mb-0 lead">Quality products and exceptional service.</p>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
