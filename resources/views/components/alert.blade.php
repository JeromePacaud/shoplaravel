@if($message)
    <div class="alert alert-{{ $type }} alert-dismissible fade show mt-5" role="alert">
        {{ $message }}
        {{ $slot }}

        <button type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close">
        </button>
    </div>
@endif

