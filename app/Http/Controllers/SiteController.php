<?php

namespace App\Http\Controllers;

use App\Models\Branch\Branch;
use App\Models\Candidate\Candidate;
use App\Models\City;
use App\Models\Cluster\Cluster;
use App\Models\ContactUs;
use App\Models\Dropdown\Dropdown;
use App\Models\Faq\Faq;
use App\Models\News\News;
use App\Models\Page\Page;
use App\Models\Party\Party;
use App\Models\Service\Service;
use App\Models\Slider\Slider;
use App\Models\TeamMember\TeamMember;
use App\Models\Testimonial;
use App\Settings\Site;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class SiteController extends Controller
{
    public function index(Request $request){
         $hero_slider = Slider::active()->whereCategory(Slider::HOMEPAGE_HERO_SLIDER)->first();
         $homepage_services_section = Dropdown::active()
             ->whereCategory(Dropdown::BLOCK_CATEGORY)
             ->whereSlug('homepage-services-section')
             ->first()
             ?->blocks()
             ->first();
         $services = Service::active()->latest()->limit(5)->get();
         $homepage_clients_slider = Slider::active()->whereCategory(Slider::HOMEPAGE_CLIENTS_SLIDER)->first();
         $blogs = News::active()->latest()->limit(5)->get();

        return $this->view('Site.homepage',
            compact('hero_slider', 'homepage_services_section', 'services', 'homepage_clients_slider', 'blogs')
        );
    }

    public function aboutUs(Request $request){
        $testimonials = Testimonial::active()->latest()->limit(10)->get();
        $about_us_services_section = Dropdown::active()->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('about-us-services-section')
            ->first()
            ?->blocks()
            ->first();
        $about_us_clients_slider = Slider::whereCategory(Slider::ABOUT_US_CLIENTS_SLIDER)->first();
        $team_members = TeamMember::active()->latest()->limit(10)->get();
        return $this->view('Site.about-us', [
            'testimonials' => $testimonials,
            'about_us_services_section' => $about_us_services_section,
            'about_us_clients_slider' => $about_us_clients_slider,
            'team_members' => $team_members,
        ]);
    }

    public function faqs(Request $request)
    {
        $faqs = Faq::paginate(app(Site::class)->faqs_page_size)->withQueryString();
        return $this->view('Site.faqs', compact('faqs'));
    }

    public function contactUs(Request $request){
        $phone = app(Site::class)->phone;
        $email = app(Site::class)->email;
        $address = app(Site::class)->translate('address');
        $section = Dropdown::active()->whereCategory(Dropdown::BLOCK_CATEGORY)
            ->whereSlug('contact-us-section')
            ->first()
            ?->blocks()
            ->first();

        if ($request->method() == "POST") {
            $data = $request->validate([
                'name' => 'required|string|max:255',
                'company_name' => 'sometimes|max:255',
                'email' => 'required|email|max:255',
                'phone' => 'sometimes|max:255',
                'case_name' => 'required|string|max:255',
                'case_description' => 'sometimes|nullable|max:255',
                'attachment' => 'sometimes|nullable|mimes:xlsx,xls,doc,docx,pdf',
            ]);

            if (request()->hasFile('attachment')) {
                $filename = \Str::uuid() . '.' . $data['attachment']->extension();
                request()->file('attachment')->storePubliclyAs('public/media', $filename);
                $data['attachment'] = asset('storage/media/' . $filename);
            }
            $model = ContactUs::create($data);
            $model->save();
            return redirect()->route('site.contact-us')->with('success', __("site.Application Has Been Submitted Successfully"));
        }
        return $this->view('Site.contact-us', compact('phone', 'email', 'address', 'section'));
    }
}
