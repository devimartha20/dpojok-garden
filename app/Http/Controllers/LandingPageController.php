<?php

namespace App\Http\Controllers;

use App\Models\Admin\Product;
use App\Models\Info\CompanyInformation;
use App\Models\Info\Event;
use App\Models\Info\Facility;
use App\Models\Info\Gallery;
use App\Models\Info\SocialMedia;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function index(){
        $products = Product::all();
        // $facilities = Facility::where('shown', true)->orderBy('seq', 'asc')->get();
        // $events = Event::where('shown', true)->orderBy('seq', 'asc')->get();
        // $galleries = Gallery::where('shown', true)->orderBy('seq', 'asc')->get();
        // $company_info = CompanyInformation::all();
        // $social_medias = SocialMedia::where('shown', true)->orderBy('seq', 'asc')->get();

        return view('landing-page', compact('products', 'facilities',
        'events',
        'galleries',
        'company_info',
        'social_medias',
    ));
    }
}
