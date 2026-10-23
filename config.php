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
    // D1-A (Mike 10/23): the 'fractional CTO and CISO' label stays HERE (search, schema), leads with the problem.
    'siteDescription' => 'Answers to the technology and security questions holding up your deals and renewals. Fractional CTO and CISO for founder-led companies between $2.5M and $25M.',
    'siteAuthor' => 'Mike Faas',
    'email' => 'mike@nightglassadvisory.com',
    'linkedin' => 'https://www.linkedin.com/in/mfaas',

    // Home page path (Studio became the home page 2026-10-12).
    'homeUrl' => '/',

    // Cloudflare Web Analytics beacon token (public; no cookies). '' = off. Setting it also turns on the
    // analytics line on /privacy, so the policy always matches the site.
    'cfAnalyticsToken' => 'a9dc7591da6147458f18c4643c4b4486',

    // Cloudflare Turnstile site key (public) for the newsletter form. Leave '' until the widget's
    // Hostnames list includes nightglassadvisory.com + nightglassadvisory.netlify.app; then set it
    // (echocyber.io uses 0x4AAAAAADG_poOR76T-jTV5) and set TURNSTILE_SECRET_KEY in Netlify env.
    'turnstileSiteKey' => '',

    // Commercial lane (Mike, 2026-10-12): every booking CTA goes to /schedule.
    'bookingUrl' => '/schedule',

    // Hero lede (10/23, Abbi + Todd plan W4): why now + the follow-through. The H1 carries the questions, so the lede doesn't repeat them.
    // Mike 10/23: never claim hands-on-keyboard work ('I fix'); he makes sure it gets fixed.
    'tagline' => 'Winging it worked at 20 people. At 60, with an enterprise customer asking and one person holding everything together, you can\'t. I get you the answers, then make sure what they expose actually gets fixed.',

    // The declaration (Mike, 10/12, CTO + CISO balanced; reworded 10/23, D1-A): no 'three weeks' (reads as 'you only need me for
    // three weeks') and no 'CTO or CISO' label. Not rendered on the page; the source line for outreach and bios.
    'declaration' => 'I help founder-led companies between $2.5M and $25M answer the technology and security questions holding up their deals, renewals and growth, and then make sure what the answers expose actually gets fixed.',

    // /infosecon slides gate (Mike 10/12: post AFTER the talk, Fri 10/30 3:35pm). To publish: copy the deck PDF to
    // source/assets/downloads/when-everything-depends-on-everything-infosecon-2026.pdf, set true, push.
    'talkSlidesLive' => false,

    // Offer name (Mike 10/12, 'for now'): The Intensive, CTOx's term for the one-time $7.5K-20K gateway slot.
    // Config key stays 'diagnostic' (internal only); the page anchor is #how-it-works.
    'diagnostic' => [
        'name' => 'The Intensive',
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
        ['week' => 'Week 1', 'title' => 'Listen', 'body' => 'Conversations with you and the people who actually run things. I collect what exists: systems, contracts, vendors, policies, and the question in front of you.'],
        ['week' => 'Week 2', 'title' => 'Map', 'body' => 'I map how your technology and security depend on each other, then find the gap that shows up in the most places.'],
        ['week' => 'Week 3', 'title' => 'Readout', 'body' => 'An answer to the question that started it, a short list of what to build, buy and stop, and a plan your team can run, in order.'],
    ],

    // Council 10/08: retainer offered ONLY at the readout, no on-call. Mike 10/12: named on the site, NO price, 3-month minimum.
    // 10/23 (plan W9): 'After the readout' is three paths; path 3 is Todd's 'I'll hire my replacement'. 'help you hire' leaves room to price it.
    'retainer' => [
        'name' => 'Ongoing advisory',
        // Plain text for the Service schema only; the page renders 'lead' + 'paths'.
        'body' => 'After the Intensive, I stay in it with your team as your part-time CTO and CISO until the plan is done: a monthly retainer with a three-month minimum and no on-call promise. When you are ready for a full-time leader, I help you hire them.',
        'lead' => 'Three weeks is how it starts. After the readout, you pick how it goes from there.',
        'paths' => [
            ['You run the plan.', 'Most teams do. You leave with the answer, the order to do things in, and nothing left waiting on me.'],
            ['I stay in it.', 'A monthly retainer, three-month minimum. I stay in it with your team until it\'s done, not as a to-do list left on your desk.'],
            ['You&rsquo;re ready for a full-time leader.', 'I help you define the role, find the person and hand them the keys. Then I&rsquo;m out of a job, on purpose.'],
        ],
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
    // JD trimmed to his first sentence 10/22: 'when assigned a task...' read as 'give me tasks' (Abbi Perets review).
    // 10/22: the featured band is now PROOF (see 'proof' below), not a colleague quote; JD moved into 'more'.
    // Next: a client quote (engineering firm owner, Mike asking) can take the band back.
    // Featured band, 10/22 (Mike: the JD quote was 'blah'). A RESULT, not praise. Paraphrase of the CRO case below,
    // so it renders WITHOUT quote marks. Keep it anonymized like 'cases' (never add names).
    'proof' => [
        'statement' => '$500K a year saved. And when the company was acquired, the buyer called IT and security one of the easiest they&rsquo;d ever done.',
        'source' => 'Growing life-sciences CRO &middot; regulated data',
        'link' => ['href' => '#track-record', 'label' => 'See the track record'],
    ],

    'testimonials' => [
        'more' => [
            ['initials' => 'JD', 'name' => 'JD Helms', 'title' => 'Technology Executive', 'tag' => '', 'quote' => 'Mike has the ability to communicate technical concepts to a non-technical audience.'],
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
    ],

    // PULLED 2026-10-13 (Mike): Fortune 500 retailer case, likely Crayon-era work. Off the site until the severance is signed
    // (by 11/23) and Mike has read his offer-letter confidentiality terms (BR #233). To restore, move back into 'cases':
    //         ['sector' => 'National retail chain &middot; brick-and-mortar', 'title' => 'Fortune 500 Retailer', 'tags' => ['5,000+ employees', 'Hundreds of locations', 'Edge POS'],
    //          'challenge' => 'Security enforcement was nonexistent at the edge. POS systems across stores required manual intervention with no centralized governance.',
    //          'outcome' => 'Cloud-native device governance framework. Enforceable, auditable security posture for the first time.',
    //          'stats' => [['15', 'policies migrated'], ['4', 'platforms automated'], ['0', 'store outages']]],

    // FAQ rebuilt 10/23 around OBJECTIONS (Abbi review 10/21 + Todd call). Echo draft, decisions by Mike 10/23. Feeds the FAQPage schema.
    // Dropped: 'Are you a CTO or a CISO?', 'Why Nightglass?' (Abbi: important to you, not them), insurance premium + 'someone we
    // answer to' (questions, not objections; one question kept: two-recommendations, the technology half).
    // Kept verbatim (Mike-reviewed 10/12): IT provider, don't-need-you-yet. Trust answer cites only what's checkable on the page
    // (Mike 10/23: not many references yet, so don't offer them). Never claim hands-on-keyboard work. No em dashes.
    'faqs' => [
        ['q' => 'Will you just hand us a to-do list?', 'a' => 'No. A list nobody owns is usually how the question got this big in the first place. The Intensive ends with a plan your team can run, in order. Then I stay in it with your team until it\'s done, not as a to-do list left on your desk: the decisions, the vendor calls and the follow-through.'],
        ['q' => 'How do we know we can trust you?', 'a' => 'Don\'t take my word for it. The price is fixed and it\'s on this page before we ever talk. The track record shows what changed, in numbers. And the Intensive ends at the readout, so you find out what working with me is like before you commit to anything longer.'],
        ['q' => 'Are we signing up for you forever?', 'a' => 'No. The Intensive is three weeks at a fixed price, and it stands on its own. If you keep me on after, it\'s a monthly retainer with a three-month minimum. And when you\'re ready for a full-time CTO or CISO, I\'ll help you hire them. My job is to get you to the point where you don\'t need me.'],
        ['q' => 'We already have an IT provider. Why would we need you?', 'a' => 'Keep them. They run your systems; I make the calls they\'re waiting on someone to make: what to buy, what to stop, what "secure enough" means for a company like yours, and whether the contract covers what you think it covers. The good ones are glad to have someone on your side who speaks both languages.'],
        // Added 10/23 (Segment A, Avatar 3: the technical cofounder/CTO as ally or blocker). Peer, not auditor; no hands-on claim.
        ['q' => 'Our CTO built everything. Won\'t you step on them?', 'a' => 'No. They own the product; I take the security half off their plate so they can get back to building it. Security decisions, the conversations with your customers\' security teams, and the insurer come to me. The architecture stays theirs. If something in the product needs to change, we decide it together, as peers, not as an auditor checking their work.'],
        ['q' => 'Be honest: will you tell me if we don\'t actually need you yet?', 'a' => 'Yes. If a good IT provider and a few decisions will cover you for now, I\'ll say so on the first call and point you to who can help. That\'s better for both of us than paying for work you don\'t need.'],
        ['q' => 'We\'ve got two technical recommendations and can\'t tell which is right. How do you decide?', 'a' => 'I start with the decision, not the technology: what it has to do, what it costs to run for the life of the contract, who owns it when the person who proposed it leaves, and what it changes about your security. Usually one option falls out quickly. Sometimes the answer is neither.'],
    ],
];
