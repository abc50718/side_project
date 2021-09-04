@extends('layouts.app')

@section('do_css')
{{--    <link rel="stylesheet" href="css/create_content/create_content.css">--}}
@endsection

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
                                   id="item"></table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('set_day')
    <div class="modal fade" id="set_day_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
         aria-hidden="fa">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">到期前通知天數設定</h5>
                </div>
                <div class="modal-body">
                    <input type="text" class="form-control" onkeyup="this.value=this.value.replace(/\D/g,'')"
                           id="day"
                           value="3"
                           data-toggle="tooltip" data-html="true">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" id="cancel" data-bs-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="set_day">儲存變更</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('do_js')
    <script src="/js/create_content/index.js"></script>
@endsection
