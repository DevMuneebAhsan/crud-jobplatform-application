@props(['tag', 'size' => 'base'])
@php
    $class = 'bg-white/10 hover:bg-white/25 rounded-xl transition-colors duration-300';
    if ($size === 'base') {
        $class .= ' px-5 py-1 text-sm';
    }
    if ($size === 'small') {
        $class .= ' px-2 py-1 text-[0.625rem]';
    } 
@endphp
<a href="/tags/{{ strtolower($tag->name) }}" class=" {{ $class }}" href="#">{{ $tag->name }}</a>