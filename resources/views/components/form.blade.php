<div class="form-wrap mt-4">
    <form  
        @if (isset($method) && $method != 'GET')
            ja-type="{{ isset($method) ? $method : "POST" }}" ja-ajax ja-request="{{ $action }}"
        @else
            method="GET"
        @endif
        class="form-horizontal row m-0" 
        enctype="multipart/form-data"
    >
        @csrf
        {{ $slot }}
        
        @if (isset($button))
        <div class="col-12 mt-4">
            <button class="btn btn-primary save-button float-right" ja-send>{{ $button }}</button>
            @if (isset($appendButton))
                {{ $appendButton }}
            @endif
        </div>
        @endif
    </form>
</div>