@extends('layouts.app')
@section('title', $breedData->name)

@section('content')
    <a href="{{ url()->previous() }}">Go Back To Search</a>
    @if(isset($imageData))
        <img class="w-25" src="{{ $imageData->url }}">
    @endif
    <h2>{{ $breedData->name }}</h2>
    <div class="row mt-5 p-2">
        <div class="col-12 col-md-6">
            <div class="w-100">
                <p>Description: {{ $breedData->description }}</p>
                <p>Temperament: {{ $breedData->temperament }}</p>
                <p>Origin: {{ $breedData->origin }}</p>
                <p>Lifepan: {{ $breedData->life_span }} years</p>
            </div>
        </div>
        <div class="col-12 col-md-6">
            <div>
                <p>Adaptability: {{ $breedData->adaptability }}/5</p>
                <p>Affectionate: {{ $breedData->affection_level }}/5</p>
                <p>Child Friendly: {{ $breedData->child_friendly }}/5</p>
                <p>Dog Friendly: {{ $breedData->dog_friendly }}/5</p>
                <p>Energy: {{ $breedData->energy_level }}/5</p>
                <p>Grooming: {{ $breedData->grooming }}/5</p>
                <p>Health Issues: {{ $breedData->health_issues }}/5</p>
                <p>Intelligence: {{ $breedData->intelligence }}/5</p>
                <p>Shedding Level: {{ $breedData->shedding_level }}/5</p>
                <p>Social Needs: {{ $breedData->social_needs }}/5</p>
                <p>Stranger Friendly: {{ $breedData->stranger_friendly }}/5</p>
                <p>Vocalisation: {{ $breedData->vocalisation }}/5</p>
                <p>Hairless: {{ $breedData->hairless }}/5</p>
                <p>Rarity: {{ $breedData->rare }}/5</p>
                <p>Hypoallergenic: {{ $breedData->hypoallergenic }}/5</p>
            </div>

        </div>
    </div>
@endsection
