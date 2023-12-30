<section class="technology-area section-padding">
    <div class="container">
        <div class="row align-items-center">
            @foreach ($technologies as $technology)            
            <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2">
                <div class="single-tech">
                    <div class="tech-img">
                        <img
                            src="{{ asset( $technology->image )}}"
                            alt="Html" />
                    </div>
                    <span class="tech-name">{{ $technology->title }}</span>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>