@extends('layouts.app')

@section('title', 'Our Clients - Top World Networks')

@section('description', 'Discover the trusted organizations we serve across government, corporate, and education sectors in Kuwait.')

@section('content')
    <!-- Start main-content -->
    <section class="page-title" style="background-image: url({{ asset('images/bg/page-title-bg.jpg') }});">
        <div class="auto-container">
            <div class="title-outer">
                <ul class="page-breadcrumb">
                    <li><a href="{{ route('home') }}">Home</a></li>
                    <li><a href="{{ route('clients') }}#clients">Clients</a></li>
                </ul>
                <h1 class="title">Our Clients</h1>
            </div>
        </div>
    </section>
    <!-- end main-content -->



    <section class="feature-section pt-80 pb-80">

        <div class="shape">
            <img src="images/shape/feature-shape.png" alt="Image">
        </div>


        <div class="container">



            <section class="clients-intro">
                <p class="wow splt-txt" data-splitting>With over 15 years of experience, we've built lasting relationships with government entities, private corporations, and educational institutions who trust us with their IT infrastructure and security needs.</p>
            </section>

            @forelse ($clients as $clientCategory)
                <section class="client-category">
                    <h2 class="category-title">{{ $clientCategory->name }}</h2>
                    <div class="clients-grid">
                        @if ($clientCategory->clients_list && is_array($clientCategory->clients_list))
                            @foreach ($clientCategory->clients_list as $index => $client)
                                <div class="client-card">
                                    <div class="client-name wow fadeInUp" data-wow-delay="{{ 200 + ($index * 50) }}ms" data-wow-duration="1500ms">
                                        {{ $client['client_name'] ?? '' }}
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </section>
            @empty
                <section class="client-category">
                    <p class="text-center">No clients to display at this time.</p>
                </section>
            @endforelse
        </div>
    </section>


@endsection
