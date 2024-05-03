<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Faculty;
use App\Models\FontSize;
use App\Models\Giveaway;
use App\Models\Job;
use App\Models\Product;
use App\Models\Skill;
use App\Models\Slider;
use App\Models\Testimonial;
use App\Models\Text;
use App\Models\WebContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status', 1)->get();
        $reviews = Testimonial::where('status', 1)->get();
        $blogs = Blog::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $power_skills = Skill::where('status', 1)->where('type', 1)->get();
        $leader_skills = Skill::where('status', 1)->where('type', 2)->get();
        $about_text = WebContent::where('id', 1)->where('status', 1)->first();
        
        $solution_first_text = Text::where('id', 1)->where('status', 1)->first();
        $solution_second_text = Text::where('id', 2)->where('status', 1)->first();
        $best_solutions = WebContent::where('id', 5)->where('status', 1)->first();
        $quality_point_one = Text::where('id', 3)->where('status', 1)->first();
        $quality_point_two = Text::where('id', 4)->where('status', 1)->first();
        $quality_point_three = Text::where('id', 5)->where('status', 1)->first();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();

        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();

        return view('welcome', compact('sliders', 'reviews', 'blogs', 'products', 'power_skills', 'leader_skills', 'about_text', 'solution_first_text', 'solution_second_text', 'best_solutions', 'quality_point_one', 'quality_point_two', 'quality_point_three', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }

    public function about()
    {
        $products = Product::where('status', 1)->get();
        $about_text = WebContent::where('id', 1)->where('status', 1)->first();
        $about_page_text = Text::where('id', 6)->where('status', 1)->first();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();

        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();

        return view('about', compact('products', 'about_text', 'about_page_text', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function mission()
    {
        $products = Product::where('status', 1)->get();
        $mission_text = WebContent::where('id', 2)->where('status', 1)->first();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();

        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();

        return view('mission', compact('products', 'mission_text', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function vision()
    {
        $products = Product::where('status', 1)->get();
        $vision_text = WebContent::where('id', 3)->where('status', 1)->first();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('vision', compact('products', 'vision_text', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function csr()
    {
        $products = Product::where('status', 1)->get();
        $csr_text = WebContent::where('id', 4)->where('status', 1)->first();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('csr', compact('products', 'csr_text', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function solutions()
    {
        $solution_first_text = Text::where('id', 1)->where('status', 1)->first();
        $solution_second_text = Text::where('id', 2)->where('status', 1)->first();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('solutions', compact('products','solution_first_text', 'solution_second_text', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function solutionDetails($slug)
    {
        $products = Product::where('status', 1)->get();
        $solution = Product::where('slug', $slug)->first();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('solution-details', compact('solution', 'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }

    public function powerskills()
    {
        $power_skills = Skill::where('status', 1)->where('type', 1)->get();
        $leader_skills = Skill::where('status', 1)->where('type', 2)->get();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('powerskills', compact('power_skills', 'leader_skills', 'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function faculties()
    {
        $faculties = Faculty::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('faculties', compact('faculties', 'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function corporateGiveaways()
    {
        $giveaways = Giveaway::where('status', 1)->get();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('giveaways', compact('giveaways', 'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function testimonials()
    {
        $testimonials = Testimonial::where('status', '1')->get();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('testimonial', compact('testimonials', 'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
    
    public function blogs()
    {
        $blogs = Blog::where('status', '1')->get();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('blog', compact('blogs', 'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'font_one', 'font_two', 'font_three'));
    }
   
    public function career()
    {
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $jobs = Job::where('status', 1)->get();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('career', compact('products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'jobs', 'font_one', 'font_two', 'font_three'));
    }

    public function contact()
    {
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $location_iframe = Text::where('id', 16)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('contact', compact('products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'location_iframe', 'font_one', 'font_two', 'font_three'));
    }

    public function terms()
    {
        $term_text = WebContent::where('id', 6)->where('status', 1)->first();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $location_iframe = Text::where('id', 16)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('terms', compact( 'term_text' ,'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'location_iframe', 'font_one', 'font_two', 'font_three'));
    }

    public function privacy()
    {
        $privacy_text = WebContent::where('id', 7)->where('status', 1)->first();
        $products = Product::where('status', 1)->get();
        $location_text = Text::where('id', 9)->where('status', 1)->first();
        $phone_text = Text::where('id', 10)->where('status', 1)->first();
        $email_text = Text::where('id', 11)->where('status', 1)->first();
        $twitter_text = Text::where('id', 12)->where('status', 1)->first();
        $linkedin_text = Text::where('id', 13)->where('status', 1)->first();
        $whatsapp_text = Text::where('id', 17)->where('status', 1)->first();
        $location_iframe = Text::where('id', 16)->where('status', 1)->first();
        $font_one = FontSize::where('id', 1)->first();
        $font_two = FontSize::where('id', 2)->first();
        $font_three = FontSize::where('id', 3)->first();
        return view('privacy', compact( 'privacy_text' ,'products', 'location_text', 'phone_text', 'email_text', 'twitter_text', 'linkedin_text', 'whatsapp_text', 'location_iframe', 'font_one', 'font_two', 'font_three'));
    }

    public function submitApplication(Request $request)
    {
        // Validate the form data
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'cover_letter' => 'required|string',
            'g-recaptcha-response' => 'required|captcha',
            'resume' => 'required|mimes:pdf,doc,docx|max:2048', // Allow only PDF, DOC, DOCX files with a maximum size of 2MB
        ]);

        // Get form data
        $name = $request->input('name');
        $email = $request->input('email');
        $coverLetter = $request->input('cover_letter');
        $resume = $request->file('resume');

        // Send email with attachment
        Mail::send('emails.job_application', ['name' => $name, 'coverLetter' => $coverLetter], function ($message) use ($email, $name, $resume) {
            $message->to('hr@star2c.com', 'HR Department')->subject('Job Application from ' . $name);
            $message->from($email, $name);
            $message->attach($resume->getRealPath(), [
                'as' => $resume->getClientOriginalName(),
                'mime' => $resume->getClientMimeType(),
            ]);
        });

        // You may want to redirect back with a success message
        return redirect()->back()->with('status', 'Your application has been submitted successfully!');
    }

    public function license(){
        return view('license');
    }
}
