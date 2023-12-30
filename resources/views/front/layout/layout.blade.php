<!DOCTYPE html>
<html class="no-js" lang="zxx">
    <head>
       @include('front.section.head')
    </head>

    <body>
        <div class="mass">
            <p class="py-3 text-center">This side in under constriction</p>
        </div>
        <!-- sidebar-information-area-start -->
        @include('front.section.sideber_info')
        <!-- sidebar-information-area-end -->
        <div class="popup-overlay"></div>
        <!-- service item popup start -->
        @include('front.section.service_popup')
        <!-- service item popup end -->
        <!-- ============================= -->
        <!-- portfolio item popup start -->
        @include('front.section.portfolio_popup')
        <!-- portfolio item popup end -->
        <!-- header area start -->
        @include('front.section.header')
        <!-- header area end -->
        <!-- main area start -->
        <main>
            <!-- banner area start -->
           @include('front.section.banner')
            <!-- banner area end -->
            <!-- =========================== -->
            <!-- about area start -->
            @include('front.section.about')
            <!-- about area end -->
            <!-- =========================== -->
            <!-- service area start -->
            @include('front.section.service')
            <!-- service area end -->
            <!-- =========================== -->
            <!-- portfolio area start -->
            @include('front.section.portfolio')
            <!-- portfolio area end -->
            <!-- =========================== -->
            <!-- contact area start -->
            @include('front.section.contact')
            <!-- contact area end -->
            <!-- =========================== -->
            <!-- technology area start -->
            @include('front.section.technology')
            <!-- technology area end -->
            <!-- =========================== -->
            <!-- footer area start -->
            @include('front.section.footer')
            <!-- footer area end -->
        </main>
        <!-- main area end -->

        <!-- JS here -->
        @extends('front.section.script')
    </body>
</html>
