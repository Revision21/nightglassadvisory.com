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
    // 'dark' or 'light' (P7 Twilight on cream). Preview the other with ?theme=light.
    'theme' => 'dark',
    // Decorative starfield behind the hero and /schedule. Off (Mike, 2026-10-12).
    'stars' => false,
    // Hero variant: 'lens' (option B, the night glass) or 'portrait' (option A).
    'hero' => 'portrait',
    'email' => 'mike@nightglassadvisory.com',
    'linkedin' => 'https://www.linkedin.com/in/mfaas',

    // Commercial lane (Mike, 2026-10-12): every booking CTA goes to /schedule.
    'bookingUrl' => '/schedule',

    // Hero line (2026-10-12, Mike: "I need both CTO and CISO"). Balanced on purpose.
    'tagline' => 'I\'m a fractional CTO and CISO for founder-led companies between $2.5M and $25M. I help you decide what to build, buy and stop, get through the security questionnaire or insurance renewal in front of you, and work out who to hire next, without a full-time executive.',

    // The declaration (locked 2026-10-09) is security-only. Kept for reference;
    // the site no longer leads with it. Revisit with Mike.
    'declaration' => 'I help founder-led companies between $2.5M and $25M get through their first security questionnaire, SOC 2 ask or insurance renewal in three weeks, without hiring a full-time security exec.',

    'diagnostic' => [
        'name' => 'The Diagnostic',
        // DECISION (Mike): show the price publicly? Council converged on $7,500 fixed.
        'price' => 7500,
        'priceLabel' => '$7,500',
        'weeks' => 3,
    ],

    // role: 'cto' | 'ciso' | 'both' (renders a badge). Keep it balanced.
    'triggers' => [
        ['role' => 'cto', 'icon' => 'scale', 'title' => 'A technology bet', 'body' => 'An AI tool, a platform switch or a build-versus-buy call needs a decision, and nobody on the team has the time or the context to make it.'],
        ['role' => 'ciso', 'icon' => 'document-check', 'title' => 'A security questionnaire from a big customer', 'body' => 'The deal is real, the questionnaire is long, and nobody inside can answer half of it with a straight face.'],
        ['role' => 'cto', 'icon' => 'clipboard-document-list', 'title' => 'An IT contract up for renewal', 'body' => 'It lists what your provider does. Nobody has read it for what it doesn\'t. Renewal is the one day a year you have leverage.'],
        ['role' => 'ciso', 'icon' => 'shield-check', 'title' => 'A SOC 2 ask or an insurance renewal', 'body' => 'A prospect wants a report you don\'t have, or the insurance application asks questions your IT provider won\'t sign their name to.'],
        ['role' => 'cto', 'icon' => 'code-bracket', 'title' => 'An app that "works"', 'body' => 'Someone built it. It logs in and sends the email. Nobody has checked what a stranger can see, or what it will cost to run next year.'],
        ['role' => 'both', 'icon' => 'user-plus', 'title' => 'A first senior hire', 'body' => 'You know you need someone in technology or security. You don\'t know what to hire for, or whether it\'s a full-time job yet.'],
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

    'included' => [
        'An answer to the question that started it, technology or security',
        'A map of how your systems, vendors and security depend on each other',
        'What to build, what to buy, and what to stop',
        'A plan your team can run, in order',
        'A readout with you, and your board if you want one',
        'Fixed price, agreed up front',
    ],

    // Verbatim from echocyber.io (_partials/home/trust-bar + testimonials), 2026-10-12. Never paraphrase a quote.
    'testimonials' => [
        'featured' => ['initials' => 'JD', 'name' => 'JD Helms', 'title' => 'Technology Executive', 'quote' => 'Mike has the ability to communicate technical concepts to a non-technical audience. When assigned a task, you can trust it will be done with the same level of attention to detail as if you had done it yourself.'],
        'more' => [
            ['initials' => 'JJ', 'name' => 'James L. Jackson', 'title' => 'Cybersecurity Leader', 'tag' => '', 'quote' => 'A key contributor to both strategic direction and client engagement. Exceptional at building authentic, trust-based relationships with customers.'],
            ['initials' => 'JV', 'name' => 'Jennifer Vosburgh', 'title' => 'B2B Marketing Executive, Tego', 'tag' => 'Colleague', 'quote' => 'A natural problem-solver who remains cool under pressure. A born leader who continuously takes on more responsibility.'],
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
        ['sector' => 'National retail chain &middot; brick-and-mortar', 'title' => 'Fortune 500 Retailer', 'tags' => ['5,000+ employees', 'Hundreds of locations', 'Edge POS'],
         'challenge' => 'Security enforcement was nonexistent at the edge. POS systems across stores required manual intervention with no centralized governance.',
         'outcome' => 'Cloud-native device governance framework. Enforceable, auditable security posture for the first time.',
         'stats' => [['15', 'policies migrated'], ['4', 'platforms automated'], ['0', 'store outages']]],
        ['sector' => 'DTC ecommerce &middot; rapid scale', 'title' => 'High-Growth Ecommerce Brand', 'tags' => ['900+ users', '32TB data', '40 sites'],
         'challenge' => 'Outgrew their collaboration platform but couldn\'t afford downtime during a migration touching every employee and every business-critical site.',
         'outcome' => 'Zero-disruption platform migration. Identity sync, policy-driven device reconfiguration, legacy infrastructure eliminated.',
         'stats' => [['893', 'active users moved'], ['1,200+', 'accounts archived'], ['0', 'downtime']]],
    ],

    'faqs' => [
        ['q' => 'Are you a CTO or a CISO?', 'a' => 'Both. At a company your size the questions overlap: the app, the IT contract and the insurance form are one conversation. Splitting them across two part-time people is how gaps happen.'],
        ['q' => 'Do we actually need SOC 2?', 'a' => 'Maybe not yet. Plenty of customers will accept a completed questionnaire and a credible plan instead. Part of the diagnostic is finding out what the person asking actually needs, so you don\'t buy an audit before you need one.'],
        ['q' => 'We already have an IT provider. Is this a replacement?', 'a' => 'No. Your IT provider keeps running the tools. I help you decide what the tools are for, answer the questions they can\'t sign their name to, and hand them a plan they can execute.'],
        ['q' => 'What happens after the three weeks?', 'a' => 'You leave with the answers and a plan you can run yourself. If you want help running it, I offer a monthly advisory retainer at the readout. It\'s offered once, with no pressure to take it.'],
        ['q' => 'Who is this for?', 'a' => 'Founder-led companies between $2.5M and $25M in revenue that don\'t have a full-time technology or security executive. If you already have a CTO and a CISO, you probably don\'t need me.'],
        ['q' => 'Do you work remotely?', 'a' => 'Mostly. I\'m based in Raleigh, North Carolina, and most of the work happens remotely. In the Triangle, I\'m glad to meet in person.'],
        ['q' => 'Why "Nightglass"?', 'a' => 'A night glass is a telescope built for seeing in the dark: a wide field of view at low magnification. That\'s the job. Look across the whole company, find what\'s hard to see, and point at it.'],
    ],
];
