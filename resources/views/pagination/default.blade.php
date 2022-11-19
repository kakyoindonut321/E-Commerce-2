<?php
// config
$link_limit = 5; // maximum number of links (a little bit inaccurate, but will be ok for now)
?>

@if ($paginator->lastPage() > 1)
<div class="d-flex p-5" >
    <div class="mx-auto p-0 rounded  bg-lime pagination a" style="">
        @if ($paginator->currentPage() > 1)
        <a href="{{ $paginator->url(1) }}" style="display:inline-block;" class="btn btnh">First ></a>
        @endif
        @for($i = 1; $i <= $paginator->lastPage(); $i++)
            <?php
                $half_total_links = floor($link_limit / 2);
                $from = $paginator->currentPage() - $half_total_links;
                $to = $paginator->currentPage() + $half_total_links;
                if ($paginator->currentPage() < $half_total_links) {
                    $to += $half_total_links - $paginator->currentPage();
                }
                if ($paginator->lastPage() - $paginator->currentPage() < $half_total_links) {
                    $from -= $half_total_links - ($paginator->lastPage() - $paginator->currentPage()) - 1;
                }
            ?>
            @if ($from < $i && $i < $to)
                <a href="{{ $paginator->url($i) }}" style="display:inline-block;" class="btn btnh {{ ($paginator->currentPage() == $i) ? ' bg-darklime' : '' }}">{{ $i }}</a>
            @endif
        @endfor

        @if($paginator->currentPage() != $paginator->lastPage())
        <a href="{{ $paginator->url($paginator->lastPage()) }}" style="display:inline-block;" class="btn btnh">< Last</a>
        @endif
      </div>  
    </div> 
</div>
@endif