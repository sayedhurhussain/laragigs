<h1>{{$heading}}</h1>

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
    <h2>
        {{$listing['title']}}
    </h2>
    <p>
        {{$listing['description']}}
    </p>
@endforeach

@else
    <p>No listing found</p>
@endunless