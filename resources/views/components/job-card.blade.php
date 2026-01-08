@props(['job'])
<x-panel class="flex flex-col text-center">
    <div class="self-start"><a href="/employers/{{ $job->employer->name }}">{{ $job->employer->name }}</a></div>
    <div class="py-8 ">
        <h3 class="text-lg font-bold group-hover:text-blue-600 transition-colors duration-300">
            <a href="{{ $job->url }}" target="_blank">
                {{ $job->title }}
            </a>
        </h3>
        <p class="mt-4 text-xs">{{ $job->schedule }} - {{ $job->salary }}</p>
    </div>
    <div class="flex justify-between mt-auto items-center">
        <div>
            @foreach ($job->tags as $tag)
                <x-tag :$tag size='small' />
            @endforeach
        </div>
        <x-employer-logo :employer="$job->employer" :width="42" />
    </div>
</x-panel>