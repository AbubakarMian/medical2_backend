@extends('user.layout.header_footer')
@section('content')


    <link href="{!! asset('theme/user_theme/css/courses_payment.css') !!}" rel="stylesheet">

    <div class="bgareaa">
        <div class="page-header text-center dubhead">
            <h1>Select Payment Details</h1>
        </div>
        <div class="container">

            @if ($message = Session::get('error'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $message }}</strong>
                </div>
            @endif

            <div class="row">
                <div class="col-xs-6">

                    <div class="form-group lube"> <label> Course Name:</label>
                        <div class="input-group">
                            <input type="text" name="Course" class="lubin" disabled value="{{ $course->full_name }}"
                                class="form-control" placeholder="Enter Amount" />
                            <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>

                <div class="col-xs-6">
                    <div class="form-group lube"> <label> Group Name:</label>
                        <div class="input-group">
                            <input type="text" name="Group" class="lubin" disabled value="{{ $course->group->name }}"
                                class="form-control" placeholder="Enter Amount" />
                            <span class="input-group-addon"></span>
                        </div>
                    </div>
                </div>
            </div>

            <?php            
            ?>
            <?php
            
            $user_id = '';
            $new_user_id = 0;
            $fees_key = 0;
            $student_id = 0;
            ?>

            <form role="form" method="post" action="{{ action('User\CoursesController@group_payment_finalize') }}">
                @csrf
                @foreach ($studen_array_id as $key_c_r => $c_r)
                    <?php                                    
                    $user_id = $c_r->user->id;
                    $student_id = $c_r->id;                   
                    ?>
                    @if ($c_r->user->id != $new_user_id)
                        <div class="new_user">
                    @endif

                    <div class="row">
                        <div class="col-xs-6">
                            @if ($c_r->user->id == $new_user_id)
                                <?php $fees_key = $fees_key + 1;
                                $uniq_user_fees_class = 'user_' . $user_id . '_fees_' . $fees_key;
                                ?>
                            @else
                                <?php
                                $fees_key = 0;
                                $new_user_id = $user_id;
                                $uniq_user_fees_class = 'user_' . $user_id . '_fees_' . $fees_key;
                                ?>
                                <div class="form-group lube"> <label> User Name:</label>
                                    <div class="input-group">
                                        <input type="text" name="user" class="lubin lbtext" disabled
                                            value="{{ $c_r->user->name }}" class="form-control" placeholder="Enter User" />
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            @endif
                            <?php                            
                            ?>
                        </div>
                    </div>

                    <div class="amount_due_date_div_{{ $c_r->user_id }} " fees_id="{{ $c_r->id }}">
                        <div class="row my_amount_date_{{ $c_r->user_id }}_{{ $c_r->id }}">
                            <div class="col-xs-6">
                                <div class="form-group lube"> <label
                                        class="changetextcolor_{{ $c_r->user_id }}_{{ $c_r->id }}"> Amount:</label>
                                    <div class="input-group">
                                        <input type="text" name="amount"
                                            class="lubin lbtext changetextcolor_{{ $c_r->user_id }}_{{ $c_r->id }}"
                                            disabled value="{{ $c_r->amount }}" class="form-control"
                                            placeholder="Enter Amount" />
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-6">
                                <div class="form-group lube"> <label
                                        class="changetextcolor_{{ $c_r->user_id }}_{{ $c_r->id }}"> Due Date:</label>
                                    <div class="input-group">
                                        <input type="text" name="amount"
                                            class="lubin lbtext changetextcolor_{{ $c_r->user_id }}_{{ $c_r->id }}"
                                            disabled value="{{ date('d-m-Y', $c_r->due_date) }}" class="form-control"
                                            placeholder="Enter Amount" />
                                        <span class="input-group-addon"></span>
                                    </div>
                                </div>
                            </div>
                          
                            <label class="switch grouswitch">
                                <input type="checkbox"
                                    class="highlight_class_{{ $c_r->user_id }}_{{ $c_r->id }} {!! $uniq_user_fees_class !!}"
                                    onchange="highlight_div('{{ $fees_key }}','{{ $c_r->id }}','{{ $c_r->user_id }}','{{ $c_r->amount }}')"
                                    name="student_id[]" value="{{ $c_r->id }}">
                                <span class="slider round"></span>
                            </label>
                        </div>
                    </div>

                    <?php
                    if (isset($studen_array_id[$key_c_r + 1])) {
                        if ($studen_array_id[$key_c_r + 1]->user->id != $new_user_id) {
                            echo '</div>';
                        }
                    } else {
                        echo '</div>';
                    }                
                    ?>
                @endforeach

                <div class="row">
                    <input hidden name="total_amount" class="payment_show_hidden">

                    <div class="col-xs-12 myy" style="text-align:center;">
                        <button type="submit" class="btn btn-info myy lubclick payment_show" onclick="pay_form()">PAY
                        </button>
                    </div>
                </div>
            </form>

            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Payment Modal</h4>
                        </div>
                        <div class="modal-body">
                            <p>Please Choose the Amount.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <div id="my_fees_Modal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Payment</h4>
                        </div>
                        <div class="modal-body">
                            <p>Please Select Previous Fess.</p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection

    @section('app_jquery')
        <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
        <script>
            $(function() {
                var $form = $(".require-validation");

                $('form.require-validation').bind('submit', function(e) {
                    var $form = $(".require-validation"),
                        inputSelector = ['input[type=email]', 'input[type=password]',
                            'input[type=text]', 'input[type=file]',
                            'textarea'
                        ].join(', '),
                        $inputs = $form.find('.required').find(inputSelector),
                        $errorMessage = $form.find('div.error'),
                        valid = true;
                    $errorMessage.addClass('hide');

                    $('.has-error').removeClass('has-error');
                    $inputs.each(function(i, el) {
                        var $input = $(el);
                        if ($input.val() === '') {
                            $input.parent().addClass('has-error');
                            $errorMessage.removeClass('hide');
                            e.preventDefault();
                        }
                    });

                    if (!$form.data('cc-on-file')) {
                        e.preventDefault();
                        Stripe.setPublishableKey($form.data('stripe-publishable-key'));
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            //    amount: $('.amount').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                    }
                });

                function stripeResponseHandler(status, response) {
                    if (response.error) {
                        $('.error')
                            .removeClass('hide')
                            .find('.alert')
                            .text(response.error.message);
                    } else {
                        / token contains id, last4, and card type /
                        var token = response['id'];
                        $form.find('input[type=text]').empty();
                        $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                        $form.get(0).submit();
                    }
                }
            })

            var all_amount = 0;

            function pay_form() {
                var payment_show = $('.payment_show_hidden').val();
                if (payment_show == 0) {
                    $('#myModal').modal('show');
                    var payment_show_btn = $('.payment_show').prop("type", "button");
                } else {
                    var payment_show_btn = $('.payment_show').prop("type", "submit");
                }
            }

            function highlight_div_dell(fees_key, group_fess_id, user, group_fees_amount) {
                console.log('all_amount', all_amount);

            }

            function highlight_div(fees_key, group_fess_id, user, group_fees_amount) {
                console.log('all_amount', all_amount);

                var valid_fees_selection = true;
                var my_amount_date = '.my_amount_date_' + user + '_' + group_fess_id;
                var my_amount_dat = '.my_amount_date_' + user + '_' + group_fess_id;
                for (var i = 0; i < fees_key; i++) {
                    // $('.'user_'.$user_id.'_fees_'.$fees_key')
                    if ($('.user_' + user + '_fees_' + i).is(':checked')) {
                        valid_fees_selection = true;
                    } else {
                        valid_fees_selection = false;
                        break
                    }
                }
                console.log('rrrrrrrr', valid_fees_selection);

                if (valid_fees_selection) {
                    console.log('iffffffffffffffffff', '.user_' + user + '_fees_' + fees_key);

                    var highlight_class = $('.highlight_class_' + user + '_' + group_fess_id);
                    if ($(highlight_class).is(':checked')) {
                        console.log('eeeeeeeeeeeeee', group_fess_id)

                        $(my_amount_date).addClass('onfeetoggle');
                        $(my_amount_dat).addClass('onfeetoggl');

                        all_amount = parseFloat(all_amount) + parseFloat(group_fees_amount);
                    } else if (!$(highlight_class).is(':checked')) {
                        console.log('all_amount_minusss', all_amount);

                        $(my_amount_date).removeClass('onfeetoggle');
                        $(my_amount_dat).removeClass('onfeetoggl');

                        all_amount = parseFloat(all_amount) - parseFloat(group_fees_amount);
                    }
                    var amount_div = $('.payment_show').html('Pay ' + all_amount);
                    if (all_amount == 0) {}
                    var payment_show_hidden = $('.payment_show_hidden').val(all_amount);
                } else {
                    setTimeout(() => {
                        console.log('ssssssssssssssssssss', '.user_' + user + '_fees_' + fees_key);
                        $('.user_' + user + '_fees_' + fees_key).prop("checked", false);
                    }, 1000);
                    $('#my_fees_Modal').modal('show');
                    return false;
                }

                console.log('group_fess_id still working', group_fess_id);
                console.log('group_fees_amount', group_fees_amount);
                console.log('user', user);
            }

            function amount_due_date_div(e, u) {
                var group_fess_id = e;
                var user = u;
                console.log('group_fess_id', group_fess_id);
                console.log('user', user);
                var highlight_class = $('.highlight_class_' + user + '_' + group_fess_id).prop('checked', true);
                var my_amount_date = $('.my_amount_date_' + user + '_' + group_fess_id).css("background-color", "#e5e5e5");

            }

            function openpaymentdiv() {
                var x = document.getElementById("myDIV");
                if (x.style.display === "none") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }
        </script>
    @endsection
