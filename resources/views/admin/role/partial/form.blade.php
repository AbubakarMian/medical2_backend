<style>
    label.drupdown {
        font-size: 18px !important;
        font-weight: 500 !important;
        color: #59595a !important;
        margin-top: -2px !important;
        /* margin-bottom: 30px !important; */
    }

    .drupdownpslec {
        font-size: 14px !important;
        border-radius: 0px !important;
        /* height: 30px !important; */
        /* padding-bottom: 1px !important; */
        width: 100% !important;
    }

    .dashtab {
        /* background: #1582dc; */
        width: 50%;
        height: 50px;
        padding: 3px 3px;
    }

    .dashclicksmall {
        color: #424242;
        font-size: 16px;
        font-weight: 600;
    }

    .tabonweback {
        margin-top: 27px;
        margin-bottom: 45px;
    }

    .saacha tr th {
        font-size: 15px;
        font-weight: 500;
        color: black;
    }

    .checkheading {
        font-size: 16px;
        font-weight: 600;
        color: #000000b3;
    }

    .chechkareadata h4 {
        font-size: 20px;
        font-weight: bold;
        color: #4f5061;
    }

    .chechkareadata label {
        font-size: 15px;
        font-weight: 500;
        margin-bottom: 20px;
        color: gray;
    }

    .tuik {
        margin: 0px 7px !important;
    }

    .rolabel {
        font-size: 14px !important;
        margin-bottom: 5px !important;
        font-weight: 600 !important;
    }

    .tablu {
        margin-bottom: -500px;
    }

    .tabludata thead {
        background: #1582dc;
        border: 1px solid #1582dc;
    }

    .tabludata thead tr th {
        font-size: 15px;
        text-align: center;
        color: white;
        font-weight: 500;
    }

    .tabludata tbody tr {
        background: white;
        border: 1px solid #e3e6f3;
    }

    .tabludata tbody tr th {
        font-size: 15px;
        text-align: center;
        font-weight: 500;
        background: #8080800f;
    }

    .tabludata tbody tr td {
        font-size: 15px;
        text-align: center;
        font-weight: 500;
        background: #8080800f;
        border: 1px solid #e3e6f3;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 34px;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 4px;
        left: 4px;
        right: 18px;
        bottom: 18px;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 12px;
        width: 12px;
        left: -2px;
        bottom: 0px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
        margin: 0px 1px;
    }

    .miud {
        margin-bottom: -11px !IMPORTANT;
    }

    input:checked+.slider {
        background-color: #2196F3;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    /* Rounded sliders */
    .slider.round {
        border-radius: 34px;
    }

    .slider.round:before {
        border-radius: 50%;
    }
</style>

<?php
$permission_modules = $permissions->where('section', 'module');
$permission_reports = $permissions->where('section', 'report');
?>

<div class="chechkarea">
    <div class="row">
        <div class="col-sm-12">
            <div class="chechkareadata">
                <label for="exampleInputtext1" class="rolabel drupdown">Enter Your Role :</label>
                <input type="text" name="role" value="{!! $role->name !!}" class="form-control drupdownpslec"
                    id="exampleInputtext1" aria-describedby="textHelp" placeholder="Enter Role" required><br>
                {{-- <div class="container tablu">
                    <div class="row">
                        <div class="col-sm-12">
                            @foreach ($permissions as $p_key => $p)
                                <td>{!! ucwords($p->heading) !!} </td>
                                <?php $details = json_decode($p->details); ?>
                                <table width="400px" style="table-layout:fixed;" id="index-table" class="table table-bordered table-striped mg-t editable-datatable">
                                <thead>
                                    <tr>
                                        @foreach ($details as $key => $d)
                                            <?php
                                            if (!$d->need_permission) {
                                                continue;
                                            }
                                            $is_checked = '';

                                            if (isset($d->permission_granted)) {
                                                $is_checked = $d->permission_granted ? 'checked' : '';
                                            }

                                            ?>
                                            <th >{!!ucwords($d->heading) !!}
                                                <input type="checkbox" {!!$is_checked!!} name="permissions[{!!$p->id!!}][]" value="{!!$d->id!!}"></th>
                                        @endforeach
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                </table>

                            @endforeach
                        </div>
                    </div>
                </div> --}}

                <div class="container-fluid">
                    <ul class="nav nav-tabs dashtabarea">
                        <li class="active dashtab">
                            <a data-toggle="tab" href="#home">
                                <span class="dashclicksmall">Modules</span></a>
                        </li>

                        <li class="dashtab">
                            <a data-toggle="tab" href="#menu3">
                                <span class="dashclicksmall">Reports</span></a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div id="home" class="tab-pane fade in active tabonweback">

                            @foreach ($permission_modules as $p_key => $p)
                                <td>{!! ucwords($p->heading) !!} </td>
                                <?php $details = json_decode($p->details); ?>
                                <table width="400px" style="table-layout:fixed;" id="index-table"
                                    class="table table-bordered table-striped mg-t editable-datatable">
                                    <thead>
                                        <tr>
                                            @foreach ($details as $key => $d)
                                                <?php
                                                if (!$d->need_permission) {
                                                    continue;
                                                }
                                                $is_checked = '';

                                                if (isset($d->permission_granted)) {
                                                    $is_checked = $d->permission_granted ? 'checked' : '';
                                                }

                                                ?>
                                                <th>{!! ucwords($d->heading) !!}
                                                    <input type="checkbox" {!! $is_checked !!}
                                                        name="permissions[{!! $p->id !!}][]"
                                                        value="{!! $d->id !!}">
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            @endforeach

                        </div>

                        <div id="menu3" class="tab-pane fade tabonweback">

                            @foreach ($permission_reports as $p_key => $p)
                                <td>{!! ucwords($p->heading) !!} </td>
                                <?php $details = json_decode($p->details); ?>
                                <table width="400px" style="table-layout:fixed;" id="index-table"
                                    class="table table-bordered table-striped mg-t editable-datatable">
                                    <thead>
                                        <tr>
                                            @foreach ($details as $key => $d)
                                                <?php
                                                if (!$d->need_permission) {
                                                    continue;
                                                }
                                                $is_checked = '';

                                                if (isset($d->permission_granted)) {
                                                    $is_checked = $d->permission_granted ? 'checked' : '';
                                                }

                                                ?>
                                                <th>{!! ucwords($d->heading) !!}
                                                    <input type="checkbox" {!! $is_checked !!}
                                                        name="permissions[{!! $p->id !!}][]"
                                                        value="{!! $d->id !!}">
                                                </th>
                                            @endforeach
                                        </tr>
                                    </thead>
                                    <tbody></tbody>
                                </table>
                            @endforeach

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>



<div class="col-sm-6">
    <div class="form-group">
        <div class="col-md-5 pull-left">
            <div class="form-group text-center">
                <div>
                    {!! Form::submit('Save', [
                        'class' => 'btn btn-primary btn-block btn-lg btn-parsley medsaveclick',
                        'onblur' => 'return validateForm();',
                    ]) !!}
                </div>
            </div>
        </div>
