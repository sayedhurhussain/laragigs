<x-layout>
@include('partials._hero')
@include('partials._search')

{{-- <h1>{{$heading}}</h1> --}}
{{-- h1 replace with div --}}
<div class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4">

{{-- * php code in blade --- --}}
{{-- @php
 $test = 1;
@endphp
{{$test}} --}}

{{-- *  if listing is not found code --- --}}
{{-- @if(count($listings) == 0) 
<p>No listing found</p> --}}

@unless (count($listings) == 0)
 
@foreach($listings as $listing)
    {{-- <h2>
        {{$listing['title']}}
    </h2>
    <a href="/listings/{{$listing['id']}}">{{$listing
    ['title']}}</a>
    <p>
        {{$listing['description']}}
    </p> --}}
    <x-listing-card :listing="$listing" />
@endforeach

@else
    <p>No listing found</p>
@endunless
</div>
</x-layout>