@extends("layout/master")
@section('content')

@push('css')
<style>    
    .cursor-hands {
        cursor: pointer;
    } 
</style>
@endpush



<div class="row">
    <div class="col-md-12">
        <div class="panel-group" id="panel-435337">

            <div class="panel panel-default">
                <div class="panel-heading panel-title collapsed cursor-hands" data-toggle="collapse" data-parent="#panel-435337" data-target="#panel-element-01">
                    <span>Register Users</span>
                </div>
                <div id="panel-element-01" class="panel-collapse collapse">
                    <div class="panel-body">
                        @include('users')

                    </div>
                </div>
            </div>


            <div class="panel panel-default">
                <div class="panel-heading panel-title collapsed cursor-hands" data-toggle="collapse" data-parent="#panel-435337" data-target="#panel-element-02">
                    <span>Collapsible Group Item #1</span>
                </div>
                <div id="panel-element-02" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading panel-title collapsed cursor-hands" data-toggle="collapse" data-parent="#panel-435337" data-target="#panel-element-03">
                    <span>Collapsible Group Item #1</span>
                </div>
                <div id="panel-element-03" class="panel-collapse collapse">
                    <div class="panel-body">
                        Anim pariatur cliche...
                    </div>
                </div>
            </div>                

        </div>
    </div>
</div>
<script>
var token= '{{ Session::token() }}'; 
</script>


@endsection
