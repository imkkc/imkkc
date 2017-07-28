<div class="row">
    <div class="col-sm-2">
        <div class="dataTables_length" id="example1_length">
            <label>每页 <select name="perPage" aria-controls="example1" class="form-control input-sm"
                              onchange="window.location.href='{{url()->current()}}?perPage='+this.value">
                    <option value="10" @if($paginator->perPage() == 10) selected @endif>10</option>
                    <option value="25" @if($paginator->perPage() == 25) selected @endif>25</option>
                    <option value="50" @if($paginator->perPage() == 50) selected @endif>50</option>
                    <option value="100" @if($paginator->perPage() == 100) selected @endif>100</option>
                </select> 条</label></div>
    </div>
    <div class="col-sm-2">
        <div class="dataTables_info" role="status" aria-live="polite">
            showing {{$paginator->firstItem()}} to {{$paginator->lastItem()}} of {{$paginator->total()}} entries
        </div>
    </div>
    <div class="col-sm-8">
        <div class="dataTables_paginate paging_simple_numbers">
            <ul class="pagination">
                <!-- Previous Page Link -->
                @if ($paginator->onFirstPage())
                    <li class="disabled"><span>&laquo;</span></li>
                @else
                    <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">&laquo;</a></li>
                @endif

            <!-- Pagination Elements -->
                @foreach ($elements as $element)
                <!-- "Three Dots" Separator -->
                    @if (is_string($element))
                        <li class="disabled"><span>{{ $element }}</span></li>
                    @endif

                <!-- Array Of Links -->
                    @if (is_array($element))
                        @foreach ($element as $page => $url)
                            @if ($page == $paginator->currentPage())
                                <li class="active"><span>{{ $page }}</span></li>
                            @else
                                <li><a href="{{ $url }}">{{ $page }}</a></li>
                            @endif
                        @endforeach
                    @endif
                @endforeach

            <!-- Next Page Link -->
                @if ($paginator->hasMorePages())
                    <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">&raquo;</a></li>
                @else
                    <li class="disabled"><span>&raquo;</span></li>
                @endif
            </ul>
        </div>
    </div>
</div>