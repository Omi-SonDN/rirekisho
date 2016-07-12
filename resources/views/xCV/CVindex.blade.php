@extends('xCV.template')
<title>Danh sách</title>
@section('content')

<div id="list_table" data-table="table-resume">
  <div class="table_action">
    <div class="top_action"> </div>
    <div class="bottom_action">
      <ul class="tabs">
        <li class="tab">
          ソート:
        </li>
        <li class="tab select oldest"  data-field="Birth_date" data-sort="desc" data-keyword="">
          <a>年齢</a>
        </li>
        <li class="tab select women" data-field="Gender" data-sort="desc" data-keyword="">
          <a>女性</a>
        </li>
        <li class="tab select" data-field="updated_at" data-sort="desc" data-keyword="">
          <a>更新日</a>
        </li>
      </ul>

      <div class="search">
        <div class="search-forms" >
          <label class="search_icon" for="text">
            <i class="fa fa-search"></i>
          </label>
          <input id="table-search" class="list_search " placeholder="Search " type="text">
        </div>
      </div>
    </div>
    <div class="clear-fix"></div>
  </div>
  <table id="the_list" >
  <thead>
    <tr>
      <th></th>
      <th data-field=""><a></a></th>
      <th data-field="name" style="width: 20%;"><a>名前</a></th>
      <th data-field="kana" style="width: 25%;"><a>名前</a></th>
      <th data-field="worth" style="width: 15%;"><a>性別</a></th>
      <th data-field="age"><a>年齢</a></th>
      <th data-field="country"><a></a></th>
      @can('Admin')
      <th ></th>
      @endcan
    </tr>
  </thead>
  <tbody id="list-table-body" data-reload="true" >
    @include('includes.table-result')

  </tbody>
</table>

<?php echo $CVs->render(); ?>
</div>

@stop

