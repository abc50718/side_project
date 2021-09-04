@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">新增代辦事項</div>

                    <div class="panel-body">
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="form-group">
                            <label>項目分類</label>

                            <select class="form-control" name="sort" id="sort" data-toggle="tooltip" data-html="true"
                                    title="項目分類">
                                <option value="1">第一類</option>
                                <option value="2">第二類</option>
                                <option value="3">第三類</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>項目名稱</label>
                            <input type="text" class="form-control" name="title" id="title" data-toggle="tooltip"
                                   data-html="true" value="測試1" title="項目名稱">
                        </div>
                        <div class="form-group">
                            <label>內容描述</label>
                            <input type="text" class="form-control" name="content" id="content" data-toggle="tooltip"
                                   data-html="true" value="測試1" title="內容描述">
                        </div>
                        <div class="form-group">
                            <label>截止日期</label>
                            <input type="text" class="form-control  datetimepicker" name="deadline" id="deadline"
                                   data-toggle="tooltip"
                                   data-html="true" title="截止日期">
                        </div>
                        <div class="form-group">

                            <button type="button" class="btn btn-lg btn-block btn-outline-dark" id="create_title"
                                    data-toggle="tooltip" data-html="true" title="新增代辦事項">
                                新增代辦事項
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('do_js')
    <script src="/js/create_content/create_content.js"></script>
@endsection
