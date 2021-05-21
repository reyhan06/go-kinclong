<?php

namespace App\Http\Controllers;

use App\Models\{
    Review,
    Service,
    User
};
use App\Mail\CustomerMessage as Message;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LandingController extends Controller
{
    public function home()
    {
        $reviews = Review::where('stars', '>=', 4)->latest()->take(5)->get();

        return view('landing.home', compact('reviews'));
    }

    public function servicesList(Request $request)
    {
        $counts = [
            'car-small' => Service::where('vehicle', 'car')->where('size', 'small')->count(),
            'car-large' => Service::where('vehicle', 'car')->where('size', 'large')->count(),
            'motorcycle-small' => Service::where('vehicle', 'motorcycle')->where('size', 'small')->count(),
            'motorcycle-medium' => Service::where('vehicle', 'motorcycle')->where('size', 'medium')->count(),
            'motorcycle-large' => Service::where('vehicle', 'motorcycle')->where('size', 'large')->count(),
        ];

        $services = Service::when($request->filled('vehicle'), function($query) use($request) {
            return $query->where('vehicle', $request->input('vehicle'))->where('size', $request->input('size'));
        })->when($request->filled('service'), function($query) use($request) {
            return $query->where('service', $request->input('service'));
        })->when($request->filled('type'), function($query) use($request) {
            return $query->where('type', $request->input('type'));
        })->get();
        return view('landing.service-index', compact('services', 'counts'));
    }

    public function servicesDetail($service_slug)
    {
        $service = Service::where('slug', $service_slug)->firstOrFail();
        $review_count = Review::whereHas('book', function (Builder $query) use ($service) {
            $query->where('service_id', $service->id);
        })->with(['book' => function ($query) use ($service) {
            $query->where('service_id', $service->id);
        }])->count();

        return view('landing.service-show', compact('service', 'review_count'));
    }

    public function about()
    {
        return view('landing.about');
    }

    public function contact()
    {
        return view('landing.contact');
    }

    public function message(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:32',
            'email' => 'required|email',
            'message' => 'required',
        ]);

        Mail::to(User::getAdmin())->send(new Message($data));

        return 'Your message has been sent. We will reach you back soon';
    }
}
