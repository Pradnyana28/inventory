<div class="card">
    <div class="card-body panel-wrapper">
        <div class="d-flex m-b-10 no-block">
            @if (isset($title))
                <h5 class="card-title m-b-0 align-self-center">{{ $title }}</h5>
            @endif
            
            @if (isset($button))
            <div class="ml-auto text-light-blue">
                <ul class="nav nav-tabs customtab default-customtab list-inline text-uppercase lp-5 font-medium font-12" role="tablist">
                    <li>
                        <a href="{{ $button['link'] }}" class="btn waves-effect waves-light btn-rounded btn-primary">{{ $button['text'] }}</a>
                    </li>
                </ul>
            </div>
            @endif
        </div>

        {{ $slot }}
    </div>
</div>