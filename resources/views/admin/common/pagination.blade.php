@if ($result->appends(['search_key' => $search_key, 'page_limit' => $page_limit])->lastPage() > 1)
  <div class="paginate">
    <ul class="crumbs">
      <li class="{{$result->currentPage() === 1 ? 'disabled-paginate' : ''}}">
          <a href="{{$result->url(1)}}">&laquo;</a>
      </li>
      @for ($i = 1; $i <= $result->lastPage(); $i++)
        <?php
          $pageLimit = 7;
          $halfTotalLinks = floor($pageLimit / 2);
          $from = $result->currentPage() - $halfTotalLinks;
          $to = $result->currentPage() + $halfTotalLinks;
          if ($result->currentPage() < $halfTotalLinks) {
            $to +=$halfTotalLinks - $result->currentPage();
          }
          if ($result->lastPage() - $result->currentPage() < $halfTotalLinks) {
            $from -= $halfTotalLinks - ($result->lastPage() - $result->currentPage()) - 1;
          }
        ?>
        @if ($from < $i && $i < $to)
          <li class="{{$result->currentPage() === $i ? ' active-paginate' : ''}}">
            <a href="{{$result->url($i)}}">{{$i}}</a>
          </li>
        @endif
      @endfor
      <li class="{{$result->currentPage() === $result->lastPage() ? 'disabled-paginate' : ''}}">
          <a href="{{$result->url($result->lastPage())}}">&raquo;</a>
      </li>
    </ul>
  </div>
@endif
