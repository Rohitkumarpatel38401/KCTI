<?php

namespace App\Http\Controllers\MainSite;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class CoursesController extends Controller
{
    public function index(): View
    {
        $courses = $this->getCourses();

        $categoryCounts = [];
        foreach ($courses as $c) {
            $categoryCounts[$c['category']] = ($categoryCounts[$c['category']] ?? 0) + 1;
        }

        $categoryLabels = [
            'diploma'    => 'Diploma',
            'accounting' => 'Accounting',
            'office'     => 'MS Office',
            'web'        => 'Web & Design',
            'language'   => 'Programming',
        ];

        $categories = [];
        foreach ($categoryCounts as $slug => $count) {
            $categories[] = [
                'slug'  => $slug,
                'label' => $categoryLabels[$slug] ?? ucfirst($slug),
                'count' => $count,
            ];
        }

        return view('main_site.pages.courses', compact('courses', 'categories'));
    }

    private function getCourses(): array
    {
        return [

            // ── DIPLOMA ──
            [
                'name'        => 'DCA',
                'category'    => 'diploma',
                'badge'       => 'popular',
                'short_desc'  => 'Diploma in Computer Applications — sabse popular beginner course.',
                'full_desc'   => 'DCA ek comprehensive course hai jo computer ki basic se leke practical skills tak cover karta hai. Ye course un logon ke liye best hai jo computer field mein apna career shuru karna chahte hain.',
                'duration'    => '6 Months',
                'eligibility' => '10th Pass',
                'fee'         => '₹4,500',
                'tags'        => ['Beginner', 'Government Recognized', 'Certificate'],
                'syllabus'    => [
                    ['section' => 'Computer Fundamentals', 'topics' => [
                        'Introduction to Computers',
                        'Hardware & Software Basics',
                        'Operating System (Windows)',
                        'File Management',
                    ]],
                    ['section' => 'MS Office', 'topics' => [
                        'MS Word — Documents & Formatting',
                        'MS Excel — Spreadsheets & Formulas',
                        'MS PowerPoint — Presentations',
                        'MS Access — Basic Database',
                    ]],
                    ['section' => 'Internet & Basics', 'topics' => [
                        'Internet & Email Usage',
                        'Google Workspace Basics',
                        'Cyber Safety & Ethics',
                    ]],
                ],
            ],

            [
                'name'        => 'ADCA',
                'category'    => 'diploma',
                'badge'       => 'hot',
                'short_desc'  => 'Advanced Diploma — DCA ke baad ka next level course.',
                'full_desc'   => 'ADCA ek advanced level diploma hai jisme DCA ka poora syllabus plus programming aur advanced tools cover hote hain. Ye course better job prospects ke liye ideal hai.',
                'duration'    => '12 Months',
                'eligibility' => '10th Pass',
                'fee'         => '₹8,500',
                'tags'        => ['Advanced', 'Job Ready', 'Government Recognized'],
                'syllabus'    => [
                    ['section' => 'DCA Full Syllabus', 'topics' => [
                        'Computer Fundamentals',
                        'MS Office Complete',
                        'Internet & Email',
                    ]],
                    ['section' => 'Advanced Topics', 'topics' => [
                        'C Programming Basics',
                        'HTML & CSS Web Basics',
                        'Database Management (SQL)',
                        'Photoshop Fundamentals',
                    ]],
                    ['section' => 'Professional Skills', 'topics' => [
                        'Typing (Hindi & English)',
                        'Resume & Cover Letter',
                        'Interview Preparation',
                    ]],
                ],
            ],

            [
                'name'        => 'PGDCA',
                'category'    => 'diploma',
                'badge'       => 'new',
                'short_desc'  => 'Post Graduate Diploma — graduates ke liye professional course.',
                'full_desc'   => 'PGDCA ek post-graduate level diploma hai jo graduates ko advanced computer skills provide karta hai. Government jobs aur private sector dono mein valuable hai.',
                'duration'    => '12 Months',
                'eligibility' => 'Graduation',
                'fee'         => '₹12,000',
                'tags'        => ['Post Graduate', 'Professional', 'Govt Jobs'],
                'syllabus'    => [
                    ['section' => 'Core Computing', 'topics' => [
                        'Advanced OS & Networking',
                        'Database Management Systems',
                        'Software Engineering Basics',
                    ]],
                    ['section' => 'Programming', 'topics' => [
                        'C & C++ Programming',
                        'Python Fundamentals',
                        'Web Technologies (HTML/CSS/JS)',
                    ]],
                    ['section' => 'Applications', 'topics' => [
                        'Tally Prime with GST',
                        'Advanced MS Office',
                        'Project Work',
                    ]],
                ],
            ],

            // ── ACCOUNTING ──
            [
                'name'        => 'Tally Prime with GST',
                'category'    => 'accounting',
                'badge'       => 'popular',
                'short_desc'  => 'Accounting, GST filing aur inventory management seekho.',
                'full_desc'   => 'Tally Prime course mein aap business accounting, GST returns, payroll aur inventory management seekhenge. Har business mein Tally expert ki demand hai.',
                'duration'    => '3 Months',
                'eligibility' => '12th Pass',
                'fee'         => '₹3,500',
                'tags'        => ['Accounting', 'GST', 'High Demand'],
                'syllabus'    => [
                    ['section' => 'Tally Basics', 'topics' => [
                        'Company Creation & Setup',
                        'Ledger & Group Management',
                        'Voucher Entry (Sales, Purchase)',
                        'Bank Reconciliation',
                    ]],
                    ['section' => 'GST in Tally', 'topics' => [
                        'GST Configuration',
                        'GSTR-1, GSTR-3B Filing',
                        'GST Reports & Returns',
                        'E-Way Bill Generation',
                    ]],
                    ['section' => 'Advanced Features', 'topics' => [
                        'Inventory Management',
                        'Payroll Processing',
                        'Cost Center & Profit/Loss',
                        'MIS Reports',
                    ]],
                ],
            ],

            [
                'name'        => 'Busy Accounting Software',
                'category'    => 'accounting',
                'badge'       => 'new',
                'short_desc'  => 'Small business ke liye popular accounting software.',
                'full_desc'   => 'Busy ek widely used accounting software hai especially small aur medium businesses mein. Tally ke alternative ke roop mein bahut popular hai.',
                'duration'    => '2 Months',
                'eligibility' => '10th Pass',
                'fee'         => '₹2,500',
                'tags'        => ['Accounting', 'SMB', 'Quick Course'],
                'syllabus'    => [
                    ['section' => 'Busy Fundamentals', 'topics' => [
                        'Company & Master Setup',
                        'Sales & Purchase Entry',
                        'Payment & Receipt Vouchers',
                        'GST in Busy',
                    ]],
                    ['section' => 'Reports', 'topics' => [
                        'Balance Sheet',
                        'Profit & Loss Statement',
                        'GST Reports',
                        'Inventory Reports',
                    ]],
                ],
            ],

            // ── MS OFFICE ──
            [
                'name'        => 'MS Office Expert',
                'category'    => 'office',
                'badge'       => 'popular',
                'short_desc'  => 'Word, Excel, PowerPoint — office job ke liye must-have skills.',
                'full_desc'   => 'MS Office course mein Word, Excel aur PowerPoint ka in-depth training diya jata hai. Sarkari aur private dono sectors mein ye skills compulsory hain.',
                'duration'    => '3 Months',
                'eligibility' => '10th Pass',
                'fee'         => '₹3,000',
                'tags'        => ['Office Skills', 'Essential', 'Govt Jobs'],
                'syllabus'    => [
                    ['section' => 'MS Word Advanced', 'topics' => [
                        'Document Formatting & Styles',
                        'Mail Merge',
                        'Tables & Charts',
                        'Headers, Footers & Page Numbering',
                    ]],
                    ['section' => 'MS Excel Advanced', 'topics' => [
                        'Advanced Formulas (VLOOKUP, IF, etc.)',
                        'Pivot Tables & Charts',
                        'Data Validation & Conditional Formatting',
                        'Macros Introduction',
                    ]],
                    ['section' => 'MS PowerPoint', 'topics' => [
                        'Professional Slide Design',
                        'Animations & Transitions',
                        'Presentation Skills',
                    ]],
                ],
            ],

            // ── WEB & DESIGN ──
            [
                'name'        => 'Web Design (HTML/CSS)',
                'category'    => 'web',
                'badge'       => 'new',
                'short_desc'  => 'Website banana seekho — HTML, CSS aur basic JavaScript.',
                'full_desc'   => 'Is course mein aap modern websites design karna seekhenge. HTML structure, CSS styling aur basic JavaScript se aap apni pehli website banayenge.',
                'duration'    => '3 Months',
                'eligibility' => '12th Pass',
                'fee'         => '₹5,000',
                'tags'        => ['Web', 'Freelance', 'Creative'],
                'syllabus'    => [
                    ['section' => 'HTML5', 'topics' => [
                        'HTML Structure & Tags',
                        'Forms & Tables',
                        'Semantic HTML',
                        'HTML Media Elements',
                    ]],
                    ['section' => 'CSS3', 'topics' => [
                        'Selectors & Properties',
                        'Flexbox & Grid Layout',
                        'Responsive Design',
                        'Animations & Transitions',
                    ]],
                    ['section' => 'JavaScript Basics', 'topics' => [
                        'JS Syntax & Variables',
                        'DOM Manipulation',
                        'Events & Functions',
                        'Basic Form Validation',
                    ]],
                ],
            ],

            [
                'name'        => 'Graphic Design (Photoshop)',
                'category'    => 'web',
                'badge'       => 'popular',
                'short_desc'  => 'Adobe Photoshop se professional graphics design karo.',
                'full_desc'   => 'Photoshop course mein aap photo editing, logo design, social media graphics aur print design seekhenge. Freelance aur creative jobs ke liye best course.',
                'duration'    => '2 Months',
                'eligibility' => '10th Pass',
                'fee'         => '₹3,500',
                'tags'        => ['Design', 'Freelance', 'Creative'],
                'syllabus'    => [
                    ['section' => 'Photoshop Basics', 'topics' => [
                        'Interface & Tools Overview',
                        'Layers & Masks',
                        'Selection & Cropping',
                        'Color Correction',
                    ]],
                    ['section' => 'Design Projects', 'topics' => [
                        'Logo & Banner Design',
                        'Social Media Posts',
                        'Photo Retouching',
                        'Print Ready Graphics',
                    ]],
                ],
            ],

            // ── PROGRAMMING ──
            [
                'name'        => 'Python Programming',
                'category'    => 'language',
                'badge'       => 'hot',
                'short_desc'  => 'Most popular programming language — data, AI aur web ke liye.',
                'full_desc'   => 'Python aaj ke time ka sabse popular programming language hai. Is course mein aap Python basics se leke mini projects tak seekhenge.',
                'duration'    => '4 Months',
                'eligibility' => '12th Pass',
                'fee'         => '₹6,000',
                'tags'        => ['Programming', 'AI Ready', 'High Demand'],
                'syllabus'    => [
                    ['section' => 'Python Fundamentals', 'topics' => [
                        'Variables, Data Types & Operators',
                        'Conditionals & Loops',
                        'Functions & Modules',
                        'Lists, Tuples & Dictionaries',
                    ]],
                    ['section' => 'Intermediate Python', 'topics' => [
                        'File Handling',
                        'OOP — Classes & Objects',
                        'Exception Handling',
                        'Library Usage (os, math, random)',
                    ]],
                    ['section' => 'Projects', 'topics' => [
                        'Calculator App',
                        'Student Management System',
                        'Web Scraping Basics',
                    ]],
                ],
            ],

        ];
    }
}