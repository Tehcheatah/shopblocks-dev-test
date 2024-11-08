@extends('layouts.app')

@section('title', 'Home')

@push('style')
    <style>
        #searchInput {
            padding: 10px 22px;
            border-color: var(--primary-bg-color-dark);
            min-width: 350px;
        }

        .searchInput-icon {
            right: 22px;
            top: 50%;
            transform: translateY(-50%);
        }
    </style>
@endpush

@section('content')
    <h3 class="typewriter mb-4">
        <span id="typewriterText">What pet are you looking for?</span>
    </h3>

    <form class="d-flex justify-content-center w-100" style="max-width: 800px;" action="{{ route('search') }}" method="get">
        <div class="position-relative w-100">
            <input id="searchInput" name="searchInput" class="form-control me-2 rounded-5 form-control-lg" type="search" placeholder="Search" aria-label="Search">
            <i class="ph ph-magnifying-glass position-absolute searchInput-icon"></i>
        </div>
    </form>
    <div class="row mt-5 p-2">
        @if(isset($breedDataRows))
            @if(!$breedDataRows)
                <div class="col-12 text-center">
                    There are no matches for your search result
                    <a href="{{ route('dashboard') }}">Go Back Home</a>
                </div>
            @else
                @foreach($breedDataRows AS $breedDataRow)
                    <div class="col-6 col-md-4 col-lg-3">
                        <a href='{{ route('view-breed', ['breedID' => $breedDataRow->id]) }}'>
                            <img src="{{ $breedDataRow->image->url }}" style="max-width: 100%; height: auto;">
                            <span class="mt-3">{{ $breedDataRow->name }}</span>
                        </a>
                    </div>
                @endforeach
            @endif
        @endif
        @if(isset($catDataRows))
            @foreach($catDataRows as $catDataRow)
                <div class="col-6 col-md-4 col-lg-3">
                    <a href='{{ route('view-breed', ['breedID' => $catDataRow->breeds[0]->id]) }}'>
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
