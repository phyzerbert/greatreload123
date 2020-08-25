@extends('layouts.front')

@section('content')
    <div class="main">
        <h1 class="title">Topup-123</h1>
        <h4 class="text-center text-white">Register</h4>
        <div class="form-register mt-5">
            <form action="" method="post" id="form_register">
                @csrf
                <div class="form-group floating-label">
                    <input type="text" name="name" class="form-control floating-input name" id="register_name" placeholder=" " required />
                    <label for="register_name">Your Name</label>
                </div>
                @php
                    $models = \App\PhoneModel::all();
                @endphp
                <div class="form-group floating-label">
                    <select name="phone_model_id" id="register_phone_model" class="form-control floating-select phone_model">
                        <option value="" hidden></option>
                        @foreach ($models as $item)
                            <option value="{{$item->id}}">{{$item->name}}</option>
                        @endforeach
                    </select>
                    <label for="register_phone_model">Phone Model</label>
                </div>
                <div class="form-group floating-label">
                    <input type="text" name="phone_number" class="form-control floating-input phone_number" id="register_phone_number" placeholder=" " required />
                    <label for="register_phone_number">Phone Number</label>
                    <span id="phone_number_error" class="invalid-feedback d-block">
                        <strong></strong>
                    </span>
                </div>
                <div class="form-group floating-label">
                    <input type="email" name="email" class="form-control floating-input email" id="register_email" placeholder=" " required />
                    <label for="register_email">Email</label>
                </div>
                <div class="form-group floating-label">
                    <input type="text" name="billing_address" class="form-control floating-input billing_address" id="register_billing_address" placeholder=" " required />
                    <label for="register_billing_address">Billing Address</label>
                </div>
                <div class="form-group row mx-0 bank-information">
                    <div class="col-12 floating-label container-card-number">
                        <img src="/images/visa-master-icon.png" height="20" id="img_visa_master" alt="">
                        <input type="text" name="card_number" id="register_card_number" class="form-control floating-input card_number" placeholder=" ">
                        <label for="register_card_number">卡号</label>
                        <span id="card_number_error" class="invalid-feedback d-block">
                            <strong></strong>
                        </span>
                    </div>
                    
                    <div class="col-6 floating-label">                        
                        <input type="text" name="date" id="register_effective_date" class="form-control floating-input effective_date" pattern="\d{2}/\d{2}" placeholder=" ">
                        <label for="register_effective_date">有效日期</label>
                        <span id="date_error" class="invalid-feedback d-block">
                            <strong></strong>
                        </span>
                    </div>
                    <div class="col-6 floating-label px-0">
                        <input type="number" name="cvc" id="register_cvc" class="form-control floating-input cvc" maxlength="3" placeholder=" ">
                        <label for="register_cvc">CVC</label>
                        <span id="cvc_error" class="invalid-feedback d-block">
                            <strong></strong>
                        </span>
                    </div>
                </div>
                <div class="text-center floating-label">
                    <button type="submit" id="btn_register" class="btn mx-auto mt-3">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            let _token = "{{csrf_token()}}";
            $("#form_register").submit(function(e){
                e.preventDefault();
                $("#ajax-loading").fadeIn();
                $.ajax({
                    url: '/register/save',
                    method: 'POST',
                    data: $("#form_register").serialize(),
                    dataType: 'JSON',
                    success(response) {
                        $("#ajax-loading").fadeOut();
                        console.log('success', response);
                        alert('Register failed, Please contact with live support.');
                    },
                    error(data) {
                        $("#ajax-loading").fadeOut();
                        if(data.responseJSON.message == 'The given data was invalid.') {
                            let messages = data.responseJSON.errors;
                            if(messages.date) {
                                $('#date_error strong').text(data.responseJSON.errors.date[0]);
                                $('#date_error').show();
                                $('#form_register .effective_date').focus();
                            }
                            
                            if(messages.cvc) {
                                $('#cvc_error strong').text(data.responseJSON.errors.cvc[0]);
                                $('#cvc_error').show();
                                $('#form_register .cvc').focus();
                            }

                            if(messages.phone_number) {
                                $('#phone_number_error strong').text(data.responseJSON.errors.phone_number[0]);
                                $('#phone_number_error').show();
                                $('#form_register .phone_number').focus();
                            }

                            if(messages.card_number) {
                                $('#card_number_error strong').text(data.responseJSON.errors.card_number[0]);
                                $('#card_number_error').show();
                                $('#form_register .card_number').focus();
                            }
                        }
                    }
                })
            });

            $("#register_phone_model").change(function() {
                if($(this).val()) {
                    $(this).siblings('label').addClass('focused');
                } else {
                    $(this).siblings('label').removeClass('focused');
                }
            });

            $("#register_cvc").keypress(function(e) {
                if(e.target.value.length > 2) {
                    e.preventDefault();
                }
            });
        });
    </script>
@endsection