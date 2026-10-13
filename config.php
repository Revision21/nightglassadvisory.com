<?php

/*
 * Page copy that is ALSO structured data lives here, so the page and the
 * JSON-LD entity graph (source/_partials/schema.blade.php) can never drift.
 * House rules for copy: no em dashes, no nautical imagery, no client names.
 */

return [
    'baseUrl' => '',
    'production' => false,
    'siteName' => 'Nightglass Advisory',
    'siteDescription' => 'Fractional CTO and CISO for founder-led companies between $2.5M and $25M. Technology decisions and security answers, without a full-time executive.',
    'siteAuthor' => 'Mike Faas',
    'email' => 'mike@nightglassadvisory.com',
    'linkedin' => 'https://www.linkedin.com/in/mfaas',

    // Home page path (Studio became the home page 2026-10-12).
    'homeUrl' => '/',

    // Cloudflare Web Analytics beacon token (public; no cookies). '' = off. Setting it also turns on the
    // analytics line on /privacy, so the policy always matches the site.
    'cfAnalyticsToken' => '',

    // Cloudflare Turnstile site key (public) for the newsletter form. Leave '' until the widget's
    // Hostnames list includes nightglassadvisory.com + nightglassadvisory.netlify.app; then set it
    // (echocyber.io uses 0x4AAAAAADG_poOR76T-jTV5) and set TURNSTILE_SECRET_KEY in Netlify env.
    'turnstileSiteKey' => '',

    // Commercial lane (Mike, 2026-10-12): every booking CTA goes to /schedule.
    'bookingUrl' => '/schedule',

    // Hero line (2026-10-12, Mike: "I need both CTO and CISO"). Balanced on purpose.
    // Hero lede, cut 55 -> 27 words (review 10/12). H1 already says 'fractional CTO and CISO' and 'founder-led'.
    'tagline' => 'For companies between $2.5M and $25M: I help you decide what to build, buy and stop, and answer the security questions holding up your deals and renewals.',

    // The declaration (Mike, 2026-10-12, option A): CTO + CISO balanced. Not rendered on the page; the source line for outreach and bios.
    'declaration' => 'I help founder-led companies between $2.5M and $25M answer the technology and security questions they can\'t answer in-house, in three weeks, without hiring a full-time CTO or CISO.',

    // /infosecon slides gate (Mike 10/12: post AFTER the talk, Fri 10/30 3:35pm). To publish: copy the deck PDF to
    // source/assets/downloads/when-everything-depends-on-everything-infosecon-2026.pdf, set true, push.
    'talkSlidesLive' => false,

    'diagnostic' => [
        'name' => 'The Diagnostic',
        // DECIDED (Mike 10/12): $7,500 shown publicly. Fixed price only reassures if it's visible. The retainer stays
        // unpriced (value-priced, per CTOx); the partner sheet stays priceless (partners introduce, the site prices).
        'price' => 7500,
        'priceLabel' => '$7,500',
        'weeks' => 3,
    ],

    // Verbatim from the CTOx referral one-pager, "The problems I solve" (echo-cyber/partners/ctox-referral-one-pager-copy.md, printed 2026-09-14).
    // This is the list partners already hand out; keep the site and the sheet saying the same thing.
    'problems' => [
        ['role' => 'ciso', 'icon' => 'question-mark-circle', 'text' => 'A customer, insurer, or board member asked a security question nobody can answer.'],
        ['role' => 'ciso', 'icon' => 'shield-check', 'text' => 'SOC 2 or HIPAA showed up in a contract and the deal is waiting on it.'],
        ['role' => 'cto', 'icon' => 'user', 'text' => 'Nobody owns technology decisions, and how things run lives in one person\'s head.'],
        ['role' => 'both', 'icon' => 'exclamation-triangle', 'text' => 'Your IT guy handles security too, and you hear about problems once they\'re incidents.'],
    ],

    'steps' => [
        ['week' => 'Week 1', 'title' => 'Listen', 'body' => 'Conversations with you and the people who actually run things. We gather what exists: systems, contracts, vendors, policies, and the question in front of you.'],
        ['week' => 'Week 2', 'title' => 'Map', 'body' => 'I map how your technology and security depend on each other, then find the gap that shows up in the most places.'],
        ['week' => 'Week 3', 'title' => 'Readout', 'body' => 'An answer to the question that started it, a short list of what to build, buy and stop, and a plan your team can run, in order.'],
    ],

    // Council 10/08: retainer offered ONLY at the readout, no on-call. Mike 10/12: named on the site, NO price, 3-month minimum.
    'retainer' => [
        'name' => 'Ongoing advisory',
        'body' => 'Most clients run the plan themselves. If you\'d rather have me in the room while you do, I stay on as your part-time CTO and CISO: a monthly retainer with a three-month minimum and no on-call promise. I only offer it at the readout, once we both know what the job is.',
    ],

    'included' => [
        'An answer to the question that started it, technology or security',
        'A map of how your systems, vendors and security depend on each other',
        'What to build, what to buy, and what to stop',
        'A plan your team can run, in order',
        'A readout with you, and your board if you want one',
        'Fixed price, agreed up front',
    ],

    // Verbatim from echocyber.io (_partials/home/trust-bar + testimonials), 2026-10-12. Never paraphrase a quote.
    // Colleague references, not clients: the section says so. Vosburgh dropped 10/12 (Tego is a partial competitor).
    // Next: a client quote (engineering firm owner, Mike asking) takes 'featured'; JD moves into 'more'.
    'testimonials' => [
        'featured' => ['initials' => 'JD', 'name' => 'JD Helms', 'title' => 'Technology Executive', 'quote' => 'Mike has the ability to communicate technical concepts to a non-technical audience. When assigned a task, you can trust it will be done with the same level of attention to detail as if you had done it yourself.'],
        'more' => [
            ['initials' => 'JJ', 'name' => 'James L. Jackson', 'title' => 'Cybersecurity Leader', 'tag' => '', 'quote' => 'A key contributor to both strategic direction and client engagement. Exceptional at building authentic, trust-based relationships with customers.'],
            ['initials' => 'KS', 'name' => 'Karan Sorensen', 'title' => 'Innovation & Technology Executive', 'tag' => '', 'quote' => 'Strategic leader who builds trust with customers, vendors, and direct reports alike. One of the good guys.'],
        ],
    ],

    // Verbatim from echocyber.io (_partials/home/track-record), 2026-10-12. Anonymized; never add names.
    // Attorney-hour item: confirm none breaches Crayon/SWO confidentiality (severance §10).
    'cases' => [
        ['sector' => 'Pharma sciences CRO &middot; regulated data', 'title' => 'Growing Life-Sciences CRO', 'tags' => ['GxP-validated tools', 'Per-seat licensing', 'Acquired'],
         'challenge' => 'No security program, thin validation documentation, outdated servers, and a critical per-seat analysis tool whose licenses had drifted away from who actually used it.',
         'outcome' => 'Security program built from the ground up. An access review turned license sprawl into savings. At acquisition, the buyer called IT and security one of the easiest they\'d ever done.',
         'stats' => [['0&rarr;1', 'security program'], ['1', 'easy acquisition'], ['$500K', 'saved per year']]],
        // Echo client work (Mike 10/12), not Crayon/SWO: no §10 question. Savings were real but fuzzy, so no number. Replaced the 893-user ecommerce migration (enterprise IT-project shape).
        ['sector' => 'Engineering services &middot; professional firm', 'title' => 'Engineering Firm', 'tags' => ['50 users', 'Google Workspace → Microsoft 365', 'Security-first'],
         'challenge' => 'The security controls the firm needed weren\'t in place, and its collaboration tools didn\'t fit how the team actually worked.',
         'outcome' => 'Moved all 50 users to Microsoft 365 with MFA, Conditional Access and Defender on from day one. Tools matched to the work, a lower monthly bill, and nobody lost a day.',
         'stats' => [['50', 'users moved'], ['3', 'controls on day one'], ['0', 'downtime']]],
        ['sector' => 'National retail chain &middot; brick-and-mortar', 'title' => 'Fortune 500 Retailer', 'tags' => ['5,000+ employees', 'Hundreds of locations', 'Edge POS'],
         'challenge' => 'Security enforcement was nonexistent at the edge. POS systems across stores required manual intervention with no centralized governance.',
         'outcome' => 'Cloud-native device governance framework. Enforceable, auditable security posture for the first time.',
         'stats' => [['15', 'policies migrated'], ['4', 'platforms automated'], ['0', 'store outages']]],
    ],

    // Questions 1, 2, 5: verbatim from the CTOx referral one-pager (3 replaced, 4 reworded 10/12), "Questions to ask me" (2026-09-14).
    // Answers: Jane drafts, REVIEWED AND EDITED BY MIKE one by one 2026-10-12. No em dashes. Feeds the FAQPage schema too.
    'faqs' => [
        ['q' => 'Our cyber insurance premium just doubled. Is that about us or about everyone?', 'a' => 'Usually some of both. Part of it is the market. The rest is your application: insurers price what you tell them about MFA, backups and incident planning. I\'ll read it with you and tell you which answers are costing you money, and what it takes to change them.'],
        ['q' => 'We\'ve got two technical recommendations and can\'t tell which is right. How do you decide?', 'a' => 'I start with the decision, not the technology: what it has to do, what it costs to run for the life of the contract, who owns it when the person who proposed it leaves, and what it changes about your security. Usually one option falls out quickly. Sometimes the answer is neither.'],
        // Replaced 10/12 (Mike: 'I don't love this question'): the partner-sheet 'We're doing well... how exposed' Q. Site no longer mirrors the sheet exactly.
        ['q' => 'We already have an IT provider. Why would we need you?', 'a' => 'Keep them. They run your systems; I make the calls they\'re waiting on someone to make: what to buy, what to stop, what "secure enough" means for a company like yours, and whether the contract covers what you think it covers. The good ones are glad to have someone on your side who speaks both languages.'],
        // Rewritten 10/12 (Mike): most of the ICP has no board, so 'someone we answer to' (investors, lender, co-owner, big customer).
        ['q' => 'Someone we answer to asked what we\'re doing about cybersecurity. What do I tell them on Monday?', 'a' => 'Three things, in plain language: what\'s protected and what isn\'t, what you\'ve decided to accept and why, and what happens next, with dates. That fits on one page. They aren\'t asking for a list of tools; they\'re asking whether anyone owns the risk. If the honest answer is "not yet," say so and show them the plan. That beats a page full of logos.'],
        ['q' => 'Be honest: will you tell me if we don\'t actually need you yet?', 'a' => 'Yes. If a good IT provider and a few decisions will cover you for now, I\'ll say so on the first call and point you to who can help. That\'s better for both of us than paying for work you don\'t need.'],
        ['q' => 'Are you a CTO or a CISO?', 'a' => 'Both. At a company your size the questions overlap: the app, the IT contract and the insurance form are one conversation. Splitting them across two part-time people is how gaps happen. When a question needs a deep specialist, a pen tester or a senior developer, I\'ll say so and help you find the right one.'],
        ['q' => 'Why "Nightglass"?', 'a' => 'A night glass is a telescope built for seeing in the dark: a wide field of view at low magnification. That\'s the job. Look across the whole company, find what\'s hard to see, and tell you what to fix first.'],
    ],
];
