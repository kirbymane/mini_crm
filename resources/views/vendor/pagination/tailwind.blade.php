@if ($paginator->hasPages())
    @if ($paginator->hasPages())
        <nav>
            <div class="flex ">
                <div class="row">
                    <div class="col">
                        @if ($paginator->onFirstPage())
                            <p class="disabled" aria-disabled="true"><span>@lang('pagination.previous')</span></p>
                        @else
                            <p><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></p>
                        @endif
                    </div>

                    <div class="col">
                        <div class="float-right">
                            @if ($paginator->hasMorePages())
                                <p><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></p>
                            @else
                                <p class="disabled" aria-disabled="true"><span>@lang('pagination.next')</span></p>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </nav>
    @endif
@endif
