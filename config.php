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
    'siteDescription' => 'Fractional CTO and CISO for founder-led companies between $2.5M and $25M. Get through your first security questionnaire, SOC 2 ask or insurance renewal in three weeks, without hiring a full-time security exec.',
    'siteAuthor' => 'Mike Faas',
    'email' => 'mike@nightglassadvisory.com',
    'linkedin' => 'https://www.linkedin.com/in/mfaas',

    // DECISION (Mike): booking. Interim = email. Options: embed a GHL calendar
    // here (new neutral calendar, or the existing Strategy Session one once
    // BR #226 'You're booked' workflow is fixed).
    'bookingUrl' => 'mailto:mike@nightglassadvisory.com?subject=Security%20question',

    // The declaration (locked 2026-10-09). Every headline starts from this.
    'declaration' => 'I help founder-led companies between $2.5M and $25M get through their first security questionnaire, SOC 2 ask or insurance renewal in three weeks, without hiring a full-time security exec.',

    'diagnostic' => [
        'name' => 'The Diagnostic',
        // DECISION (Mike): show the price publicly? Council converged on $7,500 fixed.
        'price' => 7500,
        'priceLabel' => '$7,500',
        'weeks' => 3,
    ],

    'triggers' => [
        ['icon' => 'document-check', 'title' => 'A security questionnaire from a big customer', 'body' => 'The deal is real, the questionnaire is long, and nobody inside can answer half of it with a straight face.'],
        ['icon' => 'shield-check', 'title' => 'A SOC 2 ask', 'body' => 'A prospect wants a report you don\'t have, and you can\'t tell whether you need the audit or just a credible plan.'],
        ['icon' => 'clipboard-document-list', 'title' => 'A cyber insurance renewal', 'body' => 'The application asks questions your IT provider won\'t sign their name to, and the premium depends on the answers.'],
        ['icon' => 'presentation-chart-line', 'title' => '"Are we secure?"', 'body' => 'The board, an investor or a buyer asks, and the honest answer is "I think so."'],
        ['icon' => 'user-plus', 'title' => 'A first security hire', 'body' => 'You know you need someone. You don\'t know what to hire for, or whether it\'s a full-time job yet.'],
        ['icon' => 'scale', 'title' => 'A technology bet', 'body' => 'An AI tool, a platform switch or an acquisition needs a decision, and nobody on the team has the time or the context to make it.'],
    ],

    'steps' => [
        ['week' => 'Week 1', 'title' => 'Listen', 'body' => 'Conversations with you and the people who actually run things. We gather what exists: policies, tools, vendors, and the questionnaire or application in front of you.'],
        ['week' => 'Week 2', 'title' => 'Map', 'body' => 'I map how your security and technology depend on each other, then find the gap that shows up in the most places.'],
        ['week' => 'Week 3', 'title' => 'Readout', 'body' => 'Answers to the question that started it, a short list of what to build, buy and stop, and a plan your team can run, in order.'],
    ],

    'included' => [
        'Answers to the questionnaire, SOC 2 ask or application in front of you',
        'A map of how your security and technology depend on each other',
        'What to build, what to buy, and what to stop',
        'A plan your team can run, in order',
        'A readout with you, and your board if you want one',
        'Fixed price, agreed up front',
    ],

    'faqs' => [
        ['q' => 'Do we actually need SOC 2?', 'a' => 'Maybe not yet. Plenty of customers will accept a completed questionnaire and a credible plan instead. Part of the diagnostic is finding out what the person asking actually needs, so you don\'t buy an audit before you need one.'],
        ['q' => 'We already have an IT provider. Is this a replacement?', 'a' => 'No. Your IT provider keeps running the tools. I help you decide what the tools are for, answer the questions they can\'t sign their name to, and hand them a plan they can execute.'],
        ['q' => 'What happens after the three weeks?', 'a' => 'You leave with the answers and a plan you can run yourself. If you want help running it, I offer a monthly advisory retainer at the readout. It\'s offered once, with no pressure to take it.'],
        ['q' => 'Who is this for?', 'a' => 'Founder-led companies between $2.5M and $25M in revenue that don\'t have a full-time security or technology executive. If you already have a CISO, you probably don\'t need me.'],
        ['q' => 'Do you work remotely?', 'a' => 'Mostly. I\'m based in Raleigh, North Carolina, and most of the work happens remotely. In the Triangle, I\'m glad to meet in person.'],
        ['q' => 'Why "Nightglass"?', 'a' => 'A night glass is a telescope built for seeing in the dark: a wide field of view at low magnification. That\'s the job. Look across the whole company, find what\'s hard to see, and point at it.'],
    ],
];
