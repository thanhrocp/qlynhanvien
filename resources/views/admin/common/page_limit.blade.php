<div class="select-record">
  <select name="page_limit" class="form-control">
    @foreach (Lang::get('resource.common.page_parts.page_row') as $key => $val)
      <option value="{{ $key }}" @if ((string) $page_limit == (string) $key) selected @endif>{{ Lang::get('resource.common.page_parts.page_row.' . $key) }}</option>
    @endforeach
  </select>
</div>
