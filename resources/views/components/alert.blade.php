@php
    $colors = [
        'info' => 'bg-info',
        'success' => 'bg-success',
        'warning' => 'bg-warning',
        'error' => 'bg-error',
    ];
@endphp

<div class="alert alert-{{ $colors[$type] ?? $colors['info'] }}">
    {{ $message }}
    {{ $slot }}
</div>
