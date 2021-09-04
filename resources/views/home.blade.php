@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">代辦事項</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif

                        <!-- 卡片的身體 -->
                        <div class="card-body">
                            <table class="table table-hover" style="margin-bottom:5px;width:100%;" border="0"
                                   id="all_prediction"></table>
                            1
{{--                            <div class="card-body" style="text-align:center;">--}}
{{--                                共有 <label id="all_data"></label> 筆資料　|　每頁 <label id="every_page"></label> 筆　|　--}}
{{--                                第<select id="select_page" onchange="select_page()">--}}
{{--                                </select>頁 / 共 <label id="all_page"></label> 頁--}}
{{--                            </div>--}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('do_js')
    <script src="/js/Integration_new/time_range_prediction.js"></script>
@endsection
