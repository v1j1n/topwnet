@props(['title', 'breadcrumbs' => [], 'imageKey' => null])

@php
    use Illuminate\Support\Facades\Storage;

    // Get background image from siteSettings or use default
    $backgroundImage = asset('images/bg/page-title-bg.jpg');

    // Check if siteSettings exists and has the banner image
    if ($imageKey && isset($siteSettings) && isset($siteSettings->$imageKey) && !empty($siteSettings->$imageKey)) {
        $bannerPath = $siteSettings->$imageKey;

        // Verify the file actually exists in storage before using it
        if (Storage::disk('public')->exists($bannerPath)) {
            $backgroundImage = Storage::url($bannerPath);
        }
    }
@endphp

<section class="page-title" style="background-image: url({{ $backgroundImage }});">
    <div class="auto-container">
        <div class="title-outer">
            @if(!empty($breadcrumbs))
                <ul class="page-breadcrumb">
                    @foreach($breadcrumbs as $label => $url)
                        <li>
                            @if($url)
                                <a href="{{ $url }}">{{ $label }}</a>
                            @else
                                {{ $label }}
                            @endif
                        </li>
                    @endforeach
                </ul>
            @endif
            <h1 class="title">{{ $title }}</h1>
        </div>
    </div>
</section>

