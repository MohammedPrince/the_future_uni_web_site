{{-- Title, description, canonical, sharing tags and structured data of a public page.
     News and event pages pass $seo = ['title', 'description', 'image', 'type', 'date', 'modified']. --}}
@php
    $path = trim(request()->path(), '/');
    $known = config('seo.pages.' . ($path === '' ? '/' : $path));
    $siteName = config('seo.site_name');
    $seo = $seo ?? [];

    $pageTitle = $seo['title'] ?? ($known[0] ?? $siteName);
    $title = $path === '' ? $pageTitle : \Illuminate\Support\Str::limit($pageTitle, 70) . ' | ' . $siteName;
    $description = \Illuminate\Support\Str::limit(
        trim(preg_replace('/\s+/u', ' ', html_entity_decode(strip_tags($seo['description'] ?? ($known[1] ?? config('seo.default_description')))))),
        158,
    );

    $canonical = config('seo.url') . ($path === '' ? '/' : '/' . $path);
    $pageNumber = (int) request()->query('page', 1);
    if ($pageNumber > 1) {
        $canonical .= '?page=' . $pageNumber;
    }

    $image = config('seo.url') . '/public/' . ($seo['image'] ?? config('seo.share_image'));
    $isArticle = ($seo['type'] ?? '') === 'article';

    // Contact details and social links come from Admin > Site Settings.
    $contact = \App\Models\Setting::allValues();
    $organization = array_filter([
        '@type' => 'CollegeOrUniversity',
        '@id' => config('seo.url') . '/#organization',
        'name' => $siteName,
        'alternateName' => ['جامعة المستقبل', 'Future University Sudan', 'Computer Man College'],
        'url' => config('seo.url') . '/',
        'logo' => config('seo.url') . '/public/client/img/fu_logo.png',
        'image' => config('seo.url') . '/public/' . config('seo.share_image'),
        'email' => $contact['contact_email'] ?? '',
        'telephone' => preg_replace('/[^0-9+]/', '', (string) ($contact['contact_phone'] ?? '')),
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => 'Africa Street',
            'addressLocality' => 'Khartoum',
            'addressCountry' => 'SD',
        ],
        'hasMap' => $contact['map_url'] ?? '',
        'sameAs' => array_values(array_filter([$contact['facebook_url'] ?? ''])),
    ]);

    $graph = [$organization];

    if ($path === '') {
        $graph[] = [
            '@type' => 'WebSite',
            '@id' => config('seo.url') . '/#website',
            'name' => $siteName,
            'alternateName' => 'جامعة المستقبل',
            'url' => config('seo.url') . '/',
            'inLanguage' => ['en', 'ar'],
            'publisher' => ['@id' => config('seo.url') . '/#organization'],
        ];
    } else {
        $crumbs = [['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => config('seo.url') . '/']];
        if (isset($seo['title'])) {
            $crumbs[] = ['@type' => 'ListItem', 'position' => 2, 'name' => 'News and events', 'item' => config('seo.url') . '/News-and-Events'];
        }
        $crumbs[] = ['@type' => 'ListItem', 'position' => count($crumbs) + 1, 'name' => $pageTitle, 'item' => $canonical];
        $graph[] = ['@type' => 'BreadcrumbList', 'itemListElement' => $crumbs];
    }

    if ($isArticle) {
        $graph[] = array_filter([
            '@type' => 'NewsArticle',
            'headline' => \Illuminate\Support\Str::limit($pageTitle, 107),
            'description' => $description,
            'image' => [$image],
            'datePublished' => $seo['date'] ?? null,
            'dateModified' => $seo['modified'] ?? null,
            'mainEntityOfPage' => $canonical,
            'author' => ['@id' => config('seo.url') . '/#organization'],
            'publisher' => ['@id' => config('seo.url') . '/#organization'],
        ]);
    }
@endphp
<title>{{ $title }}</title>
<meta name="description" content="{{ $description }}">
<link rel="canonical" href="{{ $canonical }}">
<meta name="robots" content="index, follow, max-image-preview:large">
@if (config('seo.google_verification'))
    <meta name="google-site-verification" content="{{ config('seo.google_verification') }}">
@endif
@if (config('seo.bing_verification'))
    <meta name="msvalidate.01" content="{{ config('seo.bing_verification') }}">
@endif
<meta property="og:type" content="{{ $isArticle ? 'article' : 'website' }}">
<meta property="og:site_name" content="{{ $siteName }}">
<meta property="og:title" content="{{ $title }}">
<meta property="og:description" content="{{ $description }}">
<meta property="og:url" content="{{ $canonical }}">
<meta property="og:image" content="{{ $image }}">
<meta property="og:locale" content="en_US">
<meta property="og:locale:alternate" content="ar_AR">
<meta name="twitter:card" content="summary_large_image">
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_HEX_TAG) !!}</script>
