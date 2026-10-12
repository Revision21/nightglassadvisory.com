@php
    // One JSON-LD @graph: the business, the person, the offer, the vocabulary,
    // and the FAQ. Copy comes from config.php so it always matches the page.
    $base = rtrim($page->baseUrl, '/');
    $graph = [
        [
            '@type' => 'ProfessionalService',
            '@id' => $base . '/#organization',
            'name' => $page->siteName,
            'url' => $base . '/',
            'description' => $page->siteDescription,
            'slogan' => 'Security doesn\'t fail in silos. It fails in cascades.',
            'email' => $page->email,
            'founder' => ['@id' => $base . '/#mike-faas'],
            'areaServed' => ['@type' => 'Country', 'name' => 'United States'],
            'address' => [
                '@type' => 'PostalAddress',
                'addressLocality' => 'Raleigh',
                'addressRegion' => 'NC',
                'addressCountry' => 'US',
            ],
            'knowsAbout' => [
                'Fractional CISO', 'Virtual CISO', 'Fractional CTO', 'Security questionnaires',
                'SOC 2 readiness', 'Cyber insurance', 'Security governance', 'Technology strategy',
                'Cascade failure',
            ],
            'makesOffer' => ['@id' => $base . '/#diagnostic-offer'],
            'sameAs' => [$page->linkedin],
        ],
        [
            '@type' => 'Person',
            '@id' => $base . '/#mike-faas',
            'name' => 'Mike Faas',
            'givenName' => 'Michael',
            'familyName' => 'Faas',
            'jobTitle' => 'Fractional CTO and CISO',
            'worksFor' => ['@id' => $base . '/#organization'],
            'image' => $base . '/assets/img/mike-faas-square.jpg',
            'url' => $base . '/#about',
            'sameAs' => [$page->linkedin],
            'hasCredential' => [
                '@type' => 'EducationalOccupationalCredential',
                'name' => 'CISSP',
                'credentialCategory' => 'certification',
                'recognizedBy' => ['@type' => 'Organization', 'name' => 'ISC2'],
            ],
            'homeLocation' => ['@type' => 'Place', 'name' => 'Raleigh, North Carolina'],
        ],
        [
            '@type' => 'Service',
            '@id' => $base . '/#diagnostic',
            'name' => $page->diagnostic['name'],
            'serviceType' => 'Security and technology diagnostic',
            'description' => $page->declaration,
            'provider' => ['@id' => $base . '/#organization'],
            'audience' => [
                '@type' => 'BusinessAudience',
                'audienceType' => 'Founder-led companies between $2.5M and $25M in revenue',
            ],
            'hasOfferCatalog' => [
                '@type' => 'OfferCatalog',
                'name' => 'What\'s included',
                'itemListElement' => collect($page->included)->map(fn ($i) => ['@type' => 'Offer', 'itemOffered' => ['@type' => 'Service', 'name' => $i]])->values()->all(),
            ],
        ],
        [
            '@type' => 'Offer',
            '@id' => $base . '/#diagnostic-offer',
            'name' => $page->diagnostic['name'] . ': ' . $page->diagnostic['weeks'] . ' weeks, fixed price',
            'itemOffered' => ['@id' => $base . '/#diagnostic'],
            'price' => (string) $page->diagnostic['price'],
            'priceCurrency' => 'USD',
            'seller' => ['@id' => $base . '/#organization'],
        ],
        [
            '@type' => 'DefinedTermSet',
            '@id' => $base . '/#vocabulary',
            'name' => 'Nightglass vocabulary',
            'description' => 'How Nightglass Advisory describes the way security and technology failures move through a company.',
            'hasDefinedTerm' => [
                [
                    '@type' => 'DefinedTerm',
                    '@id' => $base . '/#term-cascade-failure',
                    'name' => 'Cascade failure',
                    'description' => 'A failure that starts in one area of a company\'s security or technology and travels along dependencies into others, so one gap shows up as several unrelated-looking problems.',
                    'inDefinedTermSet' => ['@id' => $base . '/#vocabulary'],
                ],
                [
                    '@type' => 'DefinedTerm',
                    '@id' => $base . '/#term-root-gap',
                    'name' => 'Root gap',
                    'description' => 'The single missing capability, often an unwritten policy, whose absence surfaces as findings in several areas at once. Fixing it first makes the other findings easier or makes them disappear.',
                    'inDefinedTermSet' => ['@id' => $base . '/#vocabulary'],
                ],
            ],
        ],
        [
            '@type' => 'FAQPage',
            '@id' => $base . '/#faq',
            'mainEntity' => collect($page->faqs)->map(fn ($f) => [
                '@type' => 'Question',
                'name' => $f['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']],
            ])->values()->all(),
        ],
        [
            '@type' => 'WebSite',
            '@id' => $base . '/#website',
            'name' => $page->siteName,
            'url' => $base . '/',
            'publisher' => ['@id' => $base . '/#organization'],
        ],
    ];
@endphp
<script type="application/ld+json">{!! json_encode(['@context' => 'https://schema.org', '@graph' => $graph], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}</script>
