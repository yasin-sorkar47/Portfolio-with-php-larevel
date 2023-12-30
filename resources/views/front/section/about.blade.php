<section class="about-area section-padding-top" id="about">
    <div class="container">
       @foreach ($about as $about_item)
       <div class="row align-items-center">
        <div class="col-lg-6 order-2 order-lg-0">
            <div class="about-img">
                <img
                    src="{{ asset( $about_item->image )}}"
                    alt="about img" />
            </div>
        </div>
        <div class="col-lg-6">
            <div class="about-content">
                <h4 class="sub-title">About Me</h4>
                <h2 class="section-heading">{{ $about_item->title }}</h2>
                <div class="about-desc">
                    <p>{{ $about_item->description }}</p>
                </div>
                <div class="about-btns">
                    <a href="#" class="hire-me prim-btn"
                        >Hire Me Now</a
                    >
                    <a href="#" class="download-cv prim-btn"
                        >Download CV</a
                    >
                </div>
            </div>
        </div>
    </div>
       @endforeach
    </div>
</section>