@php
    // Inline a Heroicon at build time. $name, optional $set ('24/outline'), $class.
    $set = $set ?? '24/outline';
    $svg = file_get_contents(getcwd() . "/node_modules/heroicons/{$set}/{$name}.svg");
    $svg = preg_replace('/<svg /', '<svg class="' . ($class ?? 'size-6') . '" aria-hidden="true" ', $svg, 1);
@endphp
{!! $svg !!}
