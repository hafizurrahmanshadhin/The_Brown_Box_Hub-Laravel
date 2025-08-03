@php
    $systemSetting = App\Models\SystemSetting::first();
@endphp

{{-- App favicon --}}
<link rel="shortcut icon" type="image/x-icon"
    href="{{ isset($systemSetting->favicon) && !empty($systemSetting->favicon) ? asset($systemSetting->favicon) : asset('frontend/images/success.png') }}" />

{{-- ==== All Css Links ==== --}}
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/bootstrap.min.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/plugins/nice-select.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/plugins/all.min.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/plugins/fontawesome.min.css') }}" />

{{-- All custom CSS Links --}}
<link rel="stylesheet" type="text/css" href="{{ asset('frontend/css/common.css') }}" />
<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}" />
