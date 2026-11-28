<?php

return [

    // Main address of the site, used for canonical links and the sitemap.
    'url' => rtrim(env('SITE_URL', 'https://fu.edu.sd'), '/'),

    'site_name' => 'The Future University',
    'share_image' => 'client/img/share.jpg',

    // Google Search Console > Ownership verification > HTML tag: the "content" value.
    'google_verification' => env('GOOGLE_SITE_VERIFICATION'),
    // Google Search Console, HTML file method: names of our own files, without
    // ".html". Served by a route. Each one also needs its line in .htaccess.
    'google_files' => ['googleafbc0ccb2ebc472f'],

    'bing_verification' => env('BING_SITE_VERIFICATION'),

    // Page cache: on in production, off while developing.
    'page_cache' => env('PAGE_CACHE', env('APP_ENV') === 'production'),
    // Long on purpose: every admin change and every deploy clears it at once, and a
    // short life meant most visitors of a quiet hour waited for a fresh page (slow TTFB).
    'page_cache_seconds' => 21600,
    'hosts' => ['fu.edu.sd', 'www.fu.edu.sd', 'localhost', '127.0.0.1'],

    'default_description' => 'The Future University, Khartoum, Sudan: bachelor, diploma and master programs in engineering, computer science, IT, telecommunication, architecture, design and business.',

    // Path => [title, description]. Every path here is also listed in sitemap.xml.
    'pages' => [
        '/' => ['The Future University Sudan | جامعة المستقبل', 'The Future University (جامعة المستقبل) in Khartoum, Sudan. Bachelor, diploma and master programs in engineering, computing, design and business.'],
        'About-FU' => ['About us: history, mission and vision', 'From Computer Man College to The Future University: our history, mission, vision and Board of Trustees in Khartoum, Sudan.'],
        'Facts-Figures' => ['Facts and figures', 'New intake, total enrollment and student nationalities at The Future University, Sudan, in charts.'],
        'Fu-Linkages' => ['International and local linkages', 'Universities and institutions that work with The Future University on exchange, research and shared knowledge.'],
        'Fu-Historical-Gallery' => ['Historical gallery', 'Photos of open days, festivals and visits from the history of The Future University, Sudan.'],
        'Undergraduate-Programs' => ['Undergraduate programs: bachelor and diploma', 'Bachelor and diploma programs at The Future University: engineering, computer science, IT, telecommunication, architecture, arts, geoinformatics and business.'],
        'Postgraduates-Programs' => ['Postgraduate and master programs', 'Master programs at The Future University, Sudan: MBA, information systems, computer engineering, networks, computer science and landscape architecture.'],
        'Undergraduate-Admission' => ['Undergraduate admission: how to apply', 'Eight steps to join The Future University as an undergraduate, from the Ministry application to your student ID.'],
        'Postgraduate-Admission' => ['Postgraduate admission: how to apply', 'Steps to apply for a master program at the Faculty of Postgraduate Studies, The Future University, Sudan.'],
        'External-Transfer' => ['Transfer and bridging', 'How to transfer to The Future University from another university, change program or bridge from a diploma.'],
        'Fee-Structure' => ['Fee structure', 'Tuition and registration fees for programs at The Future University, Sudan.'],
        'Scholarships' => ['Scholarships', 'Scholarship procedure and requirements at The Future University, Sudan.'],
        'Student-Affairs' => ['Student affairs', 'Student services and activities at The Future University, Khartoum, Sudan.'],
        'Students-Gallery' => ['Students gallery', 'Photos of student life, activities and projects at The Future University, Sudan.'],
        'Fu-Journal' => ['University journal', 'Research publications and journals of The Future University, Sudan.'],
        'CESD' => ['Center of E-Learning and Software Development (CESD)', 'CESD develops e-learning platforms and software solutions at The Future University, Sudan.'],
        'CTS' => ['Center of Technical Services (CTS)', 'CTS provides computing infrastructure and technical support to students, faculty and researchers at The Future University.'],
        'IRDC' => ['Innovation Research and Development Center (IRDC)', 'IRDC brings researchers and innovators together across disciplines at The Future University, Sudan.'],
        'UNESCO' => ['UNESCO', 'UNESCO cooperation in education, sciences, culture and communication at The Future University, Sudan.'],
        'Space-Technology-Center' => ['Space Technology Research Center (STRC)', 'STRC organizes and supports space technology research at The Future University, Sudan.'],
        'ICDL' => ['ICDL training and test center', 'Authorized ICDL test center for digital skills training and certification at The Future University, Sudan.'],
        'News-and-Events' => ['News and events', 'Latest news, announcements and events from The Future University, Sudan. أخبار جامعة المستقبل'],
    ],
];
