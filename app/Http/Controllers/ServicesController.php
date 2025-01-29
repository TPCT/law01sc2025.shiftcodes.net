<?php

namespace App\Http\Controllers;

use App\Models\Dropdown\Dropdown;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\TeamMember\TeamMember;
use Illuminate\Http\Request;

class ServicesController extends Controller
{

    public function index(){
        $services = Service::active()->get();
        return view('Services.index', compact('services'));
    }
    public function show($locale, Service $service){
        $services = Service::active()->get();
        return view('Services.show', compact('services', 'service'));
    }
}
