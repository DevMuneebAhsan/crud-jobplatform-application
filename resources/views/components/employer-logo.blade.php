@props(['employer', 'width' => 90])
<img src="{{ asset(optional($employer)->logo) }}" class="rounded-xl" alt="" width="{{ $width }}">