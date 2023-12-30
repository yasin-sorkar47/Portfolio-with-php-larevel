<section class="banner-area bg-default" id="banner">
    <div class="container h-100">
        @foreach ($sliders as $slider)
        <div class="row align-items-center">
            <div class="col-lg-6 pb-5 pb-lg-0">
                <div class="banner-left">
                    <span class="sub-heading">{{ $slider->getting }}</span>
                    <h1 class="banner-title">{{ $slider->title }}</h1>
                    <span class="deg">{{ $slider->subtitle }}</span>
                    <p class="banner-desc">{{ $slider->description }}</p>

                    <ul class="social-icons">
                        <li>
                            <a href="#">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fab fa-github"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
                <div class="banner-right">
                    <img
                        src="{{ asset( $slider->image ) }}"
                        alt="banner avatar" />
                    <div class="exp-block project">
                        <span class="amount"
                            >{{ $slider->project }}<span class="plus">+</span></span
                        >
                        <p class="title">
                            project <br />
                            completed
                        </p>
                    </div>
                    <div class="exp-block experience">
                        <span class="amount">{{ $slider->experience }}</span>
                        <p class="title">
                            Years of <br />
                            Experience
                        </p>
                    </div>
                </div>
            </div>
        </div>     
        @endforeach
    </div>
</section>