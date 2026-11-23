<?php

/*
| Settings the admin panel can change (Admin > Site Settings).
| The values here are only the defaults, used until an admin saves a change.
*/
return [

    // Admin > Database Backups lists, downloads and deletes the files in this folder.
    // Default: public_html/databases, two levels above this app
    // (/home/fuedusd/public_html/repositories/the_future_uni_web_site -> /home/fuedusd/public_html/databases).
    'db_backups_path' => env('DB_BACKUPS_PATH', dirname(base_path(), 2) . DIRECTORY_SEPARATOR . 'databases'),

    'defaults' => [
        // Contact
        'contact_email' => 'info@fu.edu.sd',
        'contact_phone' => '(+249) 183 411 818',
        'address' => 'Africa Street - Khartoum, Sudan',
        'map_url' => 'https://maps.app.goo.gl/7HzpquiBAVvo6RBt7',

        // Social media
        'facebook_url' => 'https://www.facebook.com/TheFutureUniversity/',
        'linkedin_url' => 'https://www.linkedin.com/school/sudan-civil-aviation-authority',

        // Portals
        'admission_url' => 'https://odms.fu.edu.sd/',
        'elearning_url' => 'https://elearning.fu.edu.sd/',
        'helpdesk_url' => 'https://hdesk.fu.edu.sd/',
        'students_portal_url' => 'https://result.fu.edu.sd/',
        'support_url' => 'https://fu-edu-sd.zoom.us/my/thefutureuniversity',

        // Footer
        'footer_about' => 'The Future University is an institution of higher learning committed in producing well - rounded professionals who will be responsible in providing quality of life in the society.',

        // Announcement bar at the top of every public page
        'announcement_enabled' => '0',
        'announcement_text' => '',
        'announcement_url' => '',

        // Fee Structure page
        'fees_note' => '',

        // Maintenance mode
        'maintenance_enabled' => '0',
        'maintenance_message' => 'The website is being updated. Please come back soon.',
        'maintenance_token' => '',
    ],

];
