<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
    <link href="<?php echo base_url('assets/css/design.css'); ?>" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body>

<div class="container ">
    <div class="form" id="form">
        <div class="logo">
            <a href="#">
                <img src="<?php echo base_url('assets/images/logo.png'); ?>" class="img" alt="img">
            </a>
        </div>
        <div class="text">
            <p>
                Welcome to Capital S.M.A.R.T.
                Providing us with the below information help us prepare for your arrival at one of our sites and get
                your car back to you ASAP!
            </p>
        </div>
        <div class="alert alert-success alert-dismissable hide" id="msg-s">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success !</strong> Your application has been submitted successfully.
        </div>

        <div class="alert alert-danger alert-dismissable hide" id="msg-r">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Error !</strong> There was an error in submitting the form.
        </div>
        <div class="topbar">
            Contact Details
        </div>
        <form id="customer_form" method="post" autocomplete="off">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="first_name">First Name</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="first_name" name="first_name"
                                   type="text"
                                   placeholder="Enter First Name * "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-name.png'); ?>" alt="img"/>
                            </i>
                        </div>
                        <span class="validation">
<!--                            <i class="fa fa-times-circle"></i> Invalid Username-->
                        </span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="surname">Surname</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="surname" name="surname" type="text"
                                   placeholder="Enter Surname * "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-name.png'); ?>" alt="img"/>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="email" name="email" type="text"
                                   placeholder="Enter Email Address * "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-email.png'); ?>" alt="img"/>
                            </i>
                        </div>
                        <span class="validation">
<!--                            <i class="fa fa-info-circle"></i> Please enter email address-->
                        </span>

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="phone">Phone</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="phone" name="phone" type="text"
                                   placeholder="Enter Phone Number * "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-phone.png'); ?>" alt="img"/>
                            </i>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="topbar">
                Add photos of the damage to your vehicle <span class="hind small">(max 5)</span>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group icon  ">
                        <div class="photos">
                            <!--                                                    <form>-->
                            <input place_error="mov_err1" type="file" id="photos" name="photos"
                                   accept="image/*"
                                   multiple>
                            <!--                                                    </form>-->
                        </div>
                    </div>
                    <div id="msg" class="error text-center">
                    </div>
                </div>
            </div>
            <br/>
            <div class="topbar">
                Vehicle Details
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="car_make">Car Make</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="car_make" name="car_make" type="text"
                                   placeholder="Enter Car Make * "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-make.png'); ?>" alt="img"/>
                            </i>
                        </div>
                        <div id="suggestions" class="suggestions-box hide"></div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="vehicle_registration">Vehicle Registration</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="vehicle_registration"
                                   name="vehicle_registration" type="text"
                                   placeholder="Enter Vehicle Registration "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-registeration.png'); ?>"
                                              alt="img"/>
                            </i>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="car_model">Car Model</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" place_error="mov_err" class="form-control" id="car_model"
                                   name="car_model" type="text"
                                   placeholder="Enter Car Model * "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-model.png'); ?>" alt="img"/>
                            </i>
                        </div>
                        <div id="suggestions2" class="suggestions-box hide"></div>
                    </div>
                    <!--                    <div class="form-group">-->
                    <!--                        <label for="car_model">Car Model</label>-->
                    <!--                        <div class="form-group icon">-->
                    <!--                            <select class="form-control" place_error="mov_err">-->
                    <!--                                <option>Accord</option>-->
                    <!--                                <option>Civic</option>-->
                    <!--                            </select>-->
                    <!--                            <i class=""> <img src="-->
                    <?php //echo base_url('assets/images/icon-model.png'); ?><!--" alt="img"/>-->
                    <!--                            </i>-->
                    <!--                        </div>-->
                    <!--                    </div>-->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="car_year">Car Year</label>
                        <div class="form-group icon">
                            <input place_error="mov_err" class="form-control" id="car_year" name="car_year" type="text"
                                   placeholder="Enter Car Year "/>
                            <i class=""> <img src="<?php echo base_url('assets/images/icon-year.png'); ?>" alt="img"/>
                            </i>
                        </div>
                    </div>
                </div>
            </div>

            <br/>
            <div class="topbar">
                Further Details
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <div class="form-group icon">
                            <textarea place_error="mov_err" class="form-control comments" id="comments" name="comments"
                                      rows="5"
                                      placeholder="Comments"></textarea>
                        </div>
                    </div>
                </div>
            </div>
            <br/>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group1">
                        <input type="submit" id="form_submit" name="form_submit" value="Submit Details"
                               class="btn btn-1 btn-block"/>
                    </div>
                </div>
            </div>
        </form>

    </div>

    <footer class="footer">
        <div class="copy">
            <span> © 2017 Capital S.M.A.R.T Repairs    </span>
        </div>
    </footer>

</div>


<div class="modal popup fade" id="1x" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog " role="document" id="m">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">×</span></button>
                <h4>Confirm your information</h4>
            </div>
            <div class="modal-body">
                <div class="overlay" id="overlay">
                    <div id="loading-img"></div>
                </div>
                <div class="wrap confirm-box">

                    <div class="row">
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item text-left"><span class="lbl">Name: </span> <span class=" badge value text-left"
                                                                                                            id="m_fname"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Surname: </span> <span class="badge value"
                                                                                                     id="m_surname"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Email: </span> <span class="badge value"
                                                                                                   id="m_email"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Phone: </span> <span class="badge value"
                                                                                                   id="m_phone"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">
                                <li class="list-group-item"><span class="lbl">Car Make: </span> <span
                                            class="badge value" id="m_carmake"></span></li>
                                <li class="list-group-item"><span class="lbl">Registration #: </span> <span
                                            class="badge value" id="m_vehicleregistration"></span></li>
                                <li class="list-group-item"><span class="lbl">Car Model: </span> <span
                                            class="badge value" id="m_carmodel"></span></li>
                                <li class="list-group-item"><span class="lbl">Car Year </span> <span class="badge value"
                                                                                                     id="m_caryear"></span>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <ul class="list-group">
                                <li class="list-group-item" id="m_comments">
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4>Photos</h4>
                            <table class="table table-images">
                                <tbody>
                                <tr id="tr_photos">
                                    <!--<td align="center">
                                        <img src="<?php /*echo base_url('assets/images/damage1.jpg'); */ ?>" width="100" alt="img" class="img-responsive">
                                    </td>-->
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" id="edit" name="edit" value="Edit Details"
                                   class="btn btn-2 pull-left "/>

                            <input type="submit" id="confirm" name="confirm" value="Confirm Details"
                                   class="btn btn-1 pull-right"/>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/imageuploadify.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/imagePreview.js'); ?>"></script>

<!--<script src="--><?php //echo base_url('assets/js/jquery.tokeninput'); ?><!--"></script>-->
<!-- Jquery Validate -->


<script type="text/javascript">

    $(document).ready(function (e) {
        $('#photos').imageuploadify({
            uploadLimit: 5
        });
        $('#photos').imagePreview({
            tableRowId: 'tr_photos',
            previewImageLimit: 5
        });
    });

    // Car make auto suggest
    $("#car_make").keyup(function () {

        var value = $(this).val();
        var suggestions = $('#suggestions');

        if (value.length >= 1) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Customer_Facing/load_cars/'); ?>",
                data: 'keyword=' + $(this).val(),
                success: function (data) {
                    if (value != '') {
                        _data = JSON.parse(data);
                        var htmlTxt = '';
                        for (var i = 0; i < _data.length; i++) {
                            htmlTxt += '<li class="make-name" id="' + _data[i].id + '" onclick="addMake(this)">' + _data[i].name + '</li>';
                        }
                        suggestions.html(htmlTxt);
                        suggestions.removeClass('hide');
                    }
                    else {
                        suggestions.html('');
                    }
                }
            });
        }
        else {
            suggestions.addClass('hide');
        }
    });

    // car Models auto Suggest ...
    $("#car_model").keyup(function () {

        var value = $(this).val();
        var car = $('#car_make').val();
        var suggestions = $('#suggestions2');

        if (value.length >= 1) {
            $.ajax({
                type: "POST",
                url: "<?php echo base_url('Customer_Facing/load_car_models/'); ?>",
                data: {keyword: value, car_id: car},
                success: function (data) {
                    if (value != '') {
                        _data = JSON.parse(data);
                        var htmlTxt = '';
                        for (var i = 0; i < _data.length; i++) {
                            htmlTxt += '<li class="model-name" id="' + _data[i].id + '" onclick="addModel(this)">' + _data[i].model + '</li>';
                        }
                        suggestions.html(htmlTxt);
                        suggestions.removeClass('hide');
                    }
                    else {
                        suggestions.html('');
                    }
                }
            });
        }
        else {
            suggestions.addClass('hide');
        }
    });

    function addMake(_this) {
        $('#car_make').val($(_this).text());
        $('#suggestions').addClass('hide');
    }

    function addModel(_this) {
        $('#car_model').val($(_this).text());
        $('#suggestions2').addClass('hide');
    }



    // edit button
    $("#edit").click(function (e) {
        jQuery('#1x').modal('hide');
        $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
        $("#first_name").focus();
    });


    $("#confirm").click(function (e) {

        var image = "<?php echo base_url() . 'assets/images/loading.gif'; ?>";
        $(".overlay").addClass('text-center');
        $('#1x').animate({scrollTop: $('#overlay').position().top}, 'slow');
        $(".overlay").html("<img src='" + image + "' />");

        var files = $("[type='file']")[0].files;
        var formdata = new FormData();

        $.each(files, function (key, value) {
            formdata.append("file-" + key, value);
//            console.log(formdata.get("file-"+key));
        });

        formdata.append("first_name", $("#first_name").val());
        formdata.append("surname", $("#surname").val());
        formdata.append("email", $("#email").val());
        formdata.append("phone", $("#phone").val());
        formdata.append("car_make", $("#car_make").val());
        formdata.append("vehicle_registration", $("#vehicle_registration").val());
        formdata.append("car_model", $("#car_model").val());
        formdata.append("car_year", $("#car_year").val());
        formdata.append("comments", $("#comments").val());

        var params = jQuery('#customer_form').serialize();

        jQuery.ajax({
            type: 'POST',
            url: "<?php echo base_url('Customer_Facing/Submit/'); ?>",
            data: formdata,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response);
				echo (response);
                if (response) {
                    $(".overlay").html("");
                    jQuery('#1x').modal('hide');
                    $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
                    $('#customer_form').each(function(){
                        this.reset();
                    });
                    $('.imageuploadify-container').hide();
                    $('#msg-s').removeClass('hide');
                    setTimeout(function(){
                        window.location.reload(1);
                    }, 5000);
                } else {
                    $(".overlay").html("");
                    jQuery('#1x').modal('hide');
                    $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
                    $('#msg-r').removeClass('hide');
                }
            }
        });


    });


    //.................................   Jquery validations ..........................................//

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z' '\s]+$/i.test(value);
    }, "Only alphabetical characters");

    jQuery.validator.addMethod("phone_number", function (value, element) {
        return this.optional(element) || /^(?:\+)?[0-9]{7,18}$/.test(value);
    }, "Please enter valid phone number like (+1234567890 or 1234567890).");


    $("#form_submit").click(function (e) {

        jQuery("#customer_form").validate({

            rules: {
                first_name: {
                    required: true,
                    lettersonly: true,
                    minlength: 3,
                },
                surname: {
                    required: true,
                    lettersonly: true,
                    minlength: 3,
                },
                email: {
                    required: true,
                    email: true,
                },
                phone: {
                    required: true,
                    phone_number: true,
                },
                photos: {
                    required: true,
                },
                car_make: {
                    required: true,
                },
                car_model: {
                    required: true,
                },
                vehicle_registration: {
                    required: true,
                },
                car_year: {
                    required: true,
                },
                comments: {
                    required: true,
                },
            },
            messages: {
                first_name: {
                    required: "First Name is required.",
                    lettersonly: "First Name may only contain alphabetical characters.",
                    minlength: "First Name must be at least 3 characters in length.",
                },
                surname: {
                    required: "Surname is required.",
                    lettersonly: "Surname may only contain alphabetical characters.",
                    minlength: "Surname must be at least 3 characters in length.",
                },
                email: {
                    required: "Email is required.",
                    email: "Email must be a valid email address.",
                },
                phone: {
                    required: "Phone is required.",
                    phone_number: "Valid phone number like (+1234567890 or 1234567890).",
                },
                photos: {
                    required: "Photos are required.",
                },
                car_make: {
                    required: "Car make is required.",
                },
                car_model: {
                    required: "Car Model is required.",
                },
                vehicle_registration: {
                    required: "Vehicle Registration is required.",
                },
                car_year: {
                    required: "Car Year is required.",
                },
                comments: {
                    required: "Comments are required.",
                },
            },
            errorPlacement: function (error, element) {
                if (element.attr("place_error") == "mov_err") {
                    error.insertAfter($(element).parent('div'));
                }

                if (element.attr("place_error") == "mov_err1") {
                    error.insertAfter($(element));
                }
            },

            submitHandler: function (form) {

                if( document.getElementById("photos").files.length == 0 ){
                    alert('Alert! Photos of damaged vehicle are required.');
                    return;
                }

                $('#m_fname').html('');
                $('#m_surname').html('');
                $('#m_email').html('');
                $('#m_phone').html('');
                $('#m_carmake').html('');
                $('#m_vehicleregistration').html('');
                $('#m_carmodel').html('');
                $('#m_caryear').html('');
                $('#m_comments').html('');


                var firstname = $('#first_name').val();
                var surname = $('#surname').val();
                var email = $('#email').val();
                var phone = $('#phone').val();
                var carmake = $('#car_make').val();
                var vehicleregistration = $('#vehicle_registration').val();
                var carmodel = $('#car_model').val();
                var caryear = $('#car_year').val();
                var comments = $('#comments').val();


                $('#m_fname').html(firstname);
                $('#m_surname').html(surname);
                $('#m_email').html(email);
                $('#m_phone').html(phone);
                $('#m_carmake').html(carmake);
                $('#m_vehicleregistration').html(vehicleregistration);
                $('#m_carmodel').html(carmodel);
                $('#m_caryear').html(caryear);
                $('#m_comments').html(comments);


                jQuery('#1x').modal('show');
            }
        });

    });

</script>

</body>
</html>
