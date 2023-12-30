<?php
use Illuminate\Support\Str;

const SLIDER_IMAGE_PATH = "slider/upload/";
const ABOUT_IMAGE_PATH = "about/upload/";
const SERVICE_IMAGE_PATH = "service/upload/";
const BLOG_IMAGE_PATH = "blog/upload/";
const PORTFOLIO_IMAGE_PATH = "portfolio/upload/";
const MAIN_LOGO_IMAGE_PATH = "main_logo/upload/";
const FOOTER_LOGO_IMAGE_PATH = "footer_logo/upload/";
const FAVICON_IMAGE_PATH = "favicon/upload/";
const TECHNOLOGY_IMAGE_PATH = "technologies/upload/";



function upload_customImage ($path, $image, $old = null ) {

    if($old){
        unlink(public_path($old));
    }

    if(!is_dir(public_path($path))){
        mkdir(public_path($path), 0777, true);
    }

    $ext = $image->getClientOriginalExtension();
    $fullName = $image->getClientOriginalName();
    $slug = Str::slug($fullName);
    $original_name = str_replace($ext, "", $slug). "-" . rand(1111, 9999) . '.' . $ext;
    $image->move(public_path($path), $original_name);

    return ($path . $original_name);
}

