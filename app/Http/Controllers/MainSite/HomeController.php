<?php
/*
|--------------------------------------------------------------------------
| app/Http/Controllers/MainSite/HomeController.php
|--------------------------------------------------------------------------
*/

namespace App\Http\Controllers\MainSite;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the main site home page.
     */
    public function index(): View
    {
        // Future: fetch from DB (featured courses, stats, testimonials)
        $data = [
            'stats' => [
                ['number' => '2000+', 'label' => 'Students Trained'],
                ['number' => '50+',   'label' => 'Courses Offered'],
                ['number' => '95%',   'label' => 'Placement Rate'],
                ['number' => '8+',    'label' => 'Years Experience'],
            ],
            'featured_courses' => [
                ['name' => 'DCA',   'desc' => 'Diploma in Computer Applications',    'duration' => '6 Months',  'badge' => 'popular'],
                ['name' => 'ADCA',  'desc' => 'Advanced Diploma in Computer Apps',   'duration' => '12 Months', 'badge' => 'hot'],
                ['name' => 'Tally', 'desc' => 'Tally Prime with GST & Accounting',   'duration' => '3 Months',  'badge' => 'new'],
            ],
        ];

        return view('main_site.pages.index', $data);
    }
}
