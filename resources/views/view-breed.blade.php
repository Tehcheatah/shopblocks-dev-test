@extends('layouts.app')
@section('title', $breedData->name)

@section('content')
{{--    @dd($breedData)--}}
    <div class="row mt-5 p-2">
        @if(isset($breedDataRows))
            {{--            @dd($breedDataRows)--}}
            @foreach($breedDataRows AS $breedDataRow)
                <div class="col-3">
                    <a href='{{ route('view-breed', ['breedID' => $breedDataRow->id]) }}'>
                        <img src="{{ $breedDataRow->image->url }}" style="max-width: 100%; height: auto;">
                        <span class="mt-3">{{ $breedDataRow->name }}</span>
                    </a>
                </div>
            @endforeach
        @endif
        @if(isset($catDataRows))
            @foreach($catDataRows as $catDataRow)
                {{--            @dd($catDataRow->breeds[0]->name)--}}
                <div class="col-3">
                    <a href='#'>
                        <img src="{{ $catDataRow->url }}" style="max-width: 100%; height: auto;">
                        <span class="mt-3">{{ $catDataRow->breeds[0]->name }}</span>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
@endsection

@push('scripts')
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            document.getElementById('searchInput').focus();

            const titles = [
                "Looking for a Cat Breed?",
                "Searching for a Cat Breed?",
                "What Cat Breed Fits You?",
                "Find Your Perfect Feline Companion",
                "Explore Cat Breeds by Trait",
                "Discover Rare Cat Breeds",
                "Which Breed is Right for Your Family?",
                "Find Cat Breeds with Unique Traits",
                "Discover Cats by Size and Temperament"
            ];

            const randomTitle = titles[Math.floor(Math.random() * titles.length)];
            document.getElementById('typewriterText').textContent = randomTitle;
        });
    </script>
@endpush
