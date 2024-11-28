<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>i-S.M.A.R.T</title>
        <link rel="shortcut icon" type="image/png" href="<?= base_url("assets/images/favicon.ico"); ?>"/>
		<link rel="apple-touch-icon" sizes="57x57" href="<?= base_url("assets/images/apple-icon-57x57.png"); ?>" />
		<link rel="apple-touch-icon" sizes="72x72" href="<?= base_url("assets/images/apple-icon-72x72.png"); ?>" />
		<link rel="apple-touch-icon" sizes="114x114" href="<?= base_url("assets/images/apple-icon-114x114.png"); ?>" />
		<link rel="apple-touch-icon" sizes="144x144" href="<?= base_url("assets/images/apple-icon-144x144.png"); ?>" />
        <link href="<?php echo base_url('assets/fonts/font-awesome/css/font-awesome.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url("assets/fine-uploader/fine-uploader-new.css"); ?>" rel="stylesheet"
              type="text/css"/>
        <link href="<?php echo base_url('assets/css/design.css'); ?>" rel="stylesheet">
        <link href="<?php echo base_url('assets/css/app.css'); ?>" rel="stylesheet">

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif
        <!--[if IE]>
            <link rel="stylesheet" type="text/css" href= "<?php echo base_url('assets/css/app-ie.css'); ?>" />
        <![endif]-->

    </head>
    <body>
	
        <div class="container ">
            <div class="form" id="form">
                <?php $this->load->view('partials/header'); ?>
                <?php $this->load->view("partials/csra-form"); ?>
            </div>

            <?php $this->load->view("partials/footer"); ?>

        </div>

        <?php $this->load->view('partials/confirm-box'); ?>

        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/fine-uploader/jquery.fine-uploader.js'); ?>" type="text/javascript"></script>

        <script type="text/javascript" src="<?php echo base_url('assets/js/d3.v4.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/toolbar.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/app.js'); ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/js/canvg.js'); ?>"></script>
        <!--<script src="--><?php //echo base_url('assets/js/jquery.tokeninput');  ?><!--"></script>-->
        <!-- Jquery Validate -->


        <script type="text/javascript">
            var toolbar = null;
            var car = null;
            var fineUpload = null;
            $(document).ready(function () {

                toolbar = new toolBar("car-app-tools");
                car = new carApp(toolbar).init('car-app-container', '<?php echo 'assets/svg/car-parts.svg'; ?>');

                var fname = "<?php echo $first_name; ?>";
                var sname = "<?php echo $sur_name; ?>";
                var email = "<?php echo $email; ?>";
                var phone = "<?php echo $phone; ?>";
                var carmake = "<?php echo $car_make; ?>";
                var carreg = "<?php echo $car_reg; ?>";
                var carmodel = "<?php echo $car_model; ?>";
                var caryear = "<?php echo $car_year; ?>";

                if (fname !== "") {
                    $('#first_name').val(fname);
                }
                if (sname !== "") {
                    $('#surname').val(sname);
                }
                if (email !== "") {
                    $('#email').val(email);
                }
                if (phone !== "") {
                    $('#phone').val(phone);
                }
                if (carmake !== "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Customer_Facing/get_car/'); ?>",
                        data: {"car_make": carmake},
                        success: function (data) {
                            _data = JSON.parse(data);
                            if (_data[0].name) {
                                $('#car_make').val(_data[0].name);
                            }
                        }
                    });
                }
                if (carreg !== "") {
                    $('#vehicle_registration').val(carreg);
                }
                if (carmodel !== "") {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Customer_Facing/get_model/'); ?>",
                        data: {"car_make": carmake, car_model: carmodel},
                        success: function (data) {
                            _data = JSON.parse(data);
                            if (_data[0].model) {
                                $('#car_model').val(_data[0].model);
                            }
                        }
                    });
                }
                if (caryear !== "") {
                    $('#car_year').val(caryear);
                }
                
               /* 27112024 Remove login check
				// Check If session is expired automatically redirect to login page
                var timerID = setInterval(function() {
                    $.ajax({
                        type: "GET",
                        url: "<?php echo base_url('UserSession/check'); ?>",
                        success: function (data) {
                            if(data.message == "unauthorized" && data.status == '403') {
                                window.location = "<?= base_url("Login/index") ?>";
                            }    
                        }
                    });
                }, 60 * 5 * 1000); // request per 10 min 
				*/

            });

            // Car make auto suggest
            $("#car_make").keyup(function () {

                var value = $(this).val();
                var suggestions = $('#suggestions');

                if (value.length >= 1) {
                    $.ajax({
                        type: "POST",
                        url: "<?php echo base_url('Customer_Facing/load_cars/'); ?>",
                        data: 'keyword=' + $(this).val() + "&isAjax=1",
                        success: function (data) {
                            if (value != '') {
                                _data = JSON.parse(data);
                                if (_data.message == 'unauthorized' && _data.status == 403) {
                                    alert("Your Session is expired! Please Try Again.");
                                    window.location = "<?= base_url("Login/index"); ?>"
                                }
                                if (!$.trim(_data)) {
                                    suggestions.removeClass('suggestions-box');
                                    suggestions.addClass('hide');
                                } else {
                                    var htmlTxt = '';
                                    for (var i = 0; i < _data.length; i++) {
                                        htmlTxt += '<li class="make-name" id="' + _data[i].id + '" onclick="addMake(this)">' + _data[i].name + '</li>';
                                    }
                                    suggestions.html(htmlTxt);
                                    suggestions.addClass('suggestions-box');
                                    suggestions.removeClass('hide');
                                }
                            } else {
                                suggestions.html('');
                            }
                        }
                    });
                } else {
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
                        data: {keyword: value, car_id: car, isAjax : 1},
                        success: function (data) {
                            if (value != '') {
                                _data = JSON.parse(data);
                                if (_data.message == 'unauthorized' && _data.status == 403) {
                                    alert("Your Session is expired! Please Try Again.");
                                    window.location = "<?= base_url("Login/index"); ?>"
                                }
                                if (!$.trim(_data)) {
                                    suggestions.removeClass('suggestions-box');
                                    suggestions.addClass('hide');
                                } else {
                                    var htmlTxt = '';
                                    for (var i = 0; i < _data.length; i++) {
                                        htmlTxt += '<li class="model-name" id="' + _data[i].id + '" onclick="addModel(this)">' + _data[i].model + '</li>';
                                    }
                                    suggestions.html(htmlTxt);
                                    suggestions.addClass('suggestions-box');
                                    suggestions.removeClass('hide');
                                }
                            } else {
                                suggestions.html('');
                            }
                        }
                    });
                } else {
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
                preparesvgForConversion();
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
                        /*first_name: {
                         required: true,
                         lettersonly: true,
                         minlength: 3,
                         },
                         surname: {
                         required: true,
                         lettersonly: true,
                         minlength: 3
                         },*/
                        email: {
                            required: true,
                            email: true
                        },
                        /*  phone: {
                         required: true,
                         phone_number: true,
                         },*/
                        /* order_number: {
                            required: true,
                        }, */
                        csra_site: {
                            required: true,
                        },
                        photos: {
                            required: true,
                        },
                      
						  /* car_make: {
                            required: true,
                            /*   remote: {
                             url: "Customer_Facing/validate_car_make",
                             type: "post",
                             data: {
                             car_make: function () {
                             return $("#car_make").val();
                             },
                             }
                             }, */
                        //},
						

                        /*car_model: {
                            required: true,
                            /* remote: {
                             url: "Customer_Facing/validate_car_model",
                             type: "POST",
                             data: {
                             car_make: function () {
                             return $("#car_make").val();
                             },
                             car_model: function () {
                             return $("#car_model").val();
                             }
                             }
                             } */
                        //},
                        vehicle_registration: {
                            required: true,
                        },
                        /*car_year: {
                         required: true,
                         },
                         car_type: {
                         required: true,
                         },
                         vin_number: {
                         required: true,
                         },
                         car_color: {
                         required: true,
                         },
                         comments: {
                         required: true,
                         }, */
                    },
                    messages: {
                        /*   first_name: {
                         required: "First Name is required.",
                         lettersonly: "First Name may only contain alphabetical characters.",
                         minlength: "First Name must be at least 3 characters in length.",
                         },
                         surname: {
                         required: "Surname is required.",
                         lettersonly: "Surname may only contain alphabetical characters.",
                         minlength: "Surname must be at least 3 characters in length.",
                         }, */
                        email: {
                            required: "Email is required.",
                            email: "Email must be a valid email address.",
                        },
                        /* phone: {
                         required: "Phone is required.",
                         phone_number: "Valid phone number like (+1234567890 or 1234567890).",
                         },*/
                       // order_number: {
                       //     required: "Order number is required.",
                       // },
                        csra_site: {
                            required: "Site is required.",
                        },
                        photos: {
                            required: "Photos are required.",
                        },
                       // car_make: {
                       //     required: "Car make is required.",
                       // },
                       // car_model: {
                       //    required: "Car Model is required.",
                       // },
                        vehicle_registration: {
                            required: "Vehicle Registration is required.",
                        },
                        /* car_year: {
                         required: "Car Year is required.",
                         },
                         car_type: {
                         required: "Car Type is required.",
                         },
                         vin_number: {
                         required: "VIN Number is required.",
                         },
                         car_color: {
                         required: "Car Colour is required.",
                         },
                         comments: {
                         required: "Comments are required.",
                         },*/
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
                        var uploaded = fineUpload.fineUploader("getUploads", {status: qq.status.UPLOAD_SUCCESSFUL}).length;
                        var submitted = fineUpload.fineUploader("getUploads", {status: qq.status.SUBMITTED}).length;
                        var queued = fineUpload.fineUploader("getUploads", {status: qq.status.QUEUED}).length;
                        var uploading = fineUpload.fineUploader("getUploads", {status: qq.status.UPLOADING}).length;
                        
                        if ( uploaded == 0 && submitted == 0 && queued == 0 && uploading == 0) {
                            alert('Alert! Photos of damaged vehicle are required.');
                            return;
                        }

                        if (fineUpload.fineUploader("getUploads", {status: qq.status.UPLOAD_FAILED}).length != 0) {
                            alert('Alert! Some of the files are not uploaded. please retry upload or remove them.');
                            return;
                        }
                        
                        if ( submitted || queued || uploading) {
                             alert('Please Wait! Images are uploading');
                            return;
                        }
                        $('#m_fname').html('');
                        $('#m_surname').html('');
                        $('#m_email').html('');
                        $('#m_phone').html('');
                      //  $('#m_order_number').html('');
                        $('#m_site').html('');
                        $('#m_vehicleregistration').html('');
                       // $('#m_carmake').html('');
                       // $('#m_carmodel').html('');
                       // $('#m_caryear').html('');
                       // $('#m_cartype').html('');
                        $('#m_carvin').html('');
                      //  $('#m_carcolor').html('');
                        $('#m_comments').html('');


                        var firstname = $('#first_name').val();
                        var surname = $('#surname').val();
                        var email = $('#email').val();
                        var phone = $('#phone').val();
                     //  var order_number = $('#order_number').val();
                        var site = $('#csra_site').val();
                        var vehicleregistration = $('#vehicle_registration').val();
                     //   var carmake = $('#car_make').val();
                     //   var carmodel = $('#car_model').val();
                     //   var caryear = $('#car_year').val();
                     //   var cartype = $('#car_type').val();
                        var vin = $('#vin_number').val();
                      //  var carcolor = $('#car_color').val();
                        var comments = $('#comments').val();


                        $('#m_fname').html(firstname);
                        $('#m_surname').html(surname);
                        $('#m_email').html(email);
                        $('#m_phone').html(phone);
                       // $('#m_order_number').html(order_number);
                        $('#m_site').html(site);
                        $('#m_vehicleregistration').html(vehicleregistration);
                       // $('#m_carmake').html(carmake);
                       // $('#m_carmodel').html(carmodel);
                       // $('#m_caryear').html(caryear);
                       // $('#m_cartype').html(cartype);
                        $('#m_carvin').html(vin);
                    //   $('#m_carcolor').html(carcolor);
                        $('#m_comments').html(comments);

                        toolbar.reset();
                        car.reset();
                        $("#tr_photos").html("");
                        $(".qq-thumbnail-selector").each(function () {
                            $("#tr_photos").append("<img src='" + $(this).attr("src") + "'/>");
                        });
                        $('#1x').modal('show');
                        $('#status').html('');
                    }
                });

            });

            function preparesvgForConversion() {
                if (car.exportToJSON() === false) {
                    $("#image-annottated").val("");
                    saveFormData();
                    return;
                }

                var svgString = new XMLSerializer().serializeToString(document.querySelector('svg'));
                var canvas = document.getElementById("canvas-svg");
                var ctx = canvas.getContext("2d");
                ctx.clearRect(0, 0, canvas.width, canvas.height);
                canvg(canvas, svgString, {
                    renderCallback: function () {
                        png = canvas.toDataURL("image/png");
                        $("#image-annottated").val(png);
                        saveFormData();
                    }
                });
            }

            function saveFormData() {
                var image = "<?php echo base_url() . 'assets/images/loading.gif'; ?>";
                $(".overlay").addClass('text-center');
                $('#1x').animate({scrollTop: $('#overlay').position().top}, 'slow');
                $(".overlay").html("<div class='box'> <img src='" + image + "' /> </div>");

                var formdata = new FormData();

                formdata.append("first_name", $("#first_name").val());
                formdata.append("surname", $("#surname").val());
                formdata.append("email", $("#email").val());
                formdata.append("phone", $("#phone").val());
              //  formdata.append("order_number", $("#order_number").val());
                formdata.append("csra_site", $("#csra_site").val());
                formdata.append("vehicle_registration", $("#vehicle_registration").val());
              //  formdata.append("car_make", $("#car_make").val());
              //  formdata.append("car_model", $("#car_model").val());
              //  formdata.append("car_year", $("#car_year").val());
              //  formdata.append("car_type", $("#car_type").val());
                formdata.append("vin_number", $("#vin_number").val());
              //  formdata.append("car_color", $("#car_color").val());
                formdata.append("comments", $("#comments").val());
             //   formdata.append("annotated-image", $("#image-annottated").val());
                formdata.append("isAjax",1);
                jQuery.ajax({
                    type: 'POST',
                    url: "<?php echo base_url('Customer_Facing/Submit/'); ?>",
                    data: formdata,
                    processData: false,
                    contentType: false,

					  
                    success: function (obj) {
                        var response = jQuery.parseJSON(obj);
                          console.log(response);
						  echo response.message;
						  echo response.status; 

						if (response.message == 'unauthorized' && response.status == 403) {
                            alert("Your Session is expired! Please Try Again.");
                            window.location = "<?= base_url("Login/index"); ?>"
                        } else if (response.message === 'success' && response.status === 200) {
                            $(".overlay").html("");
                            jQuery('#1x').modal('hide');
                            $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
                            $('#customer_form').each(function () {
                                this.reset();
                            });

                            var msg = "<div class=\"alert alert-success alert-dismissable text-center \" id=\"msg-s\">\n" +
                                    "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                                    "<strong>Success !</strong> Your application has been submitted successfully.\n" +
                                    "</div>";
                            $('#status').html(msg);
                            car.clearDrawing();
                            $("#tr_photos").html("");
                            fineUpload.fineUploader("reset");
                            setTimeout(function () {
                                //window.location.reload(1);
                            }, 5000);
                        } else if (response.message === 'error' && response.status === 400) {
                            $(".overlay").html("");
                            $('#1x').modal('hide');
                            $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
                            var msg = " <div class=\"alert alert-danger alert-dismissable text-center \" id=\"msg-z\">\n" +
                                    "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                                    "<strong>Error !</strong> Following fields are required.\n" +
                                    "</div>";
                            $('#status').html(msg);
                        } else {
                            $(".overlay").html("");
                            $('#1x').modal('hide');
                            $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
                            var msg = "   <div class=\"alert alert-danger alert-dismissable text-center \" id=\"msg-x\">\n" +
                                    "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                                    "<strong>Error !</strong> Following fields are required.\n" +
                                    "</div>\n";
                            $('#status').html(msg);
                            $.each(response, function (key, data) {
                                var error = '<label id= "' + key + '-error" class="error" for="' + key + '">' + data + '</label>';
                                $("#" + key + '-error').append(error);
                            });
                        }
                    },
                    error: function (response) {
                        $(".overlay").html("");
                        $('#1x').modal('hide');
                        $('html, body').animate({scrollTop: $('#form').position().top}, 'slow');
                        var status = "   <div class=\"alert alert-danger alert-dismissable text-center \" id=\"msg-x\">\n" +
                                "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>\n" +
                                "<strong>Error !</strong>  There was an error in submitting the form.\n" +
                                "</div>\n";
                        $('#msg').html(msg);
                    }
                });

            }
        </script>
        <script type="text/template" id="qq-template-gallery">
            <?php $this->load->view("partials/fine-uploader-template"); ?>
        </script>
        <script>
            var totalSubmitedFiles = 0;
            var totalUploadedFiles = 0;
            fineUpload = $('#fine-uploader-gallery').fineUploader({
                template: 'qq-template-gallery',
                request: {
                    endpoint: '/FileUploader/index'
                },
                deleteFile: {
                    enabled: true,
                    endpoint: "/FileUploader/index"
                },
                thumbnails: {
                    placeholders: {
                        waitingPath: '<?= base_url("assets/fine-uploader/placeholders/waiting-generic.png"); ?>',
                        notAvailablePath: '<?= base_url("assets/fine-uploader/placeholders/not_available-generic.png"); ?>'
                    }
                },
                validation: {
                    allowedExtensions: ['jpeg', 'jpg', 'png'],
                    itemLimit: 20,
                    sizeLimit: 15000000 // 5 mb
                },
                scaling: {
                    includeExif: true,
                    sendOriginal: false,
                    sizes: [
                        {name: "medium", maxSize: 1024}
                    ]
                },
                callbacks: {
                    onSubmit: function(id, name){
                        totalSubmitedFiles++;
                    },
                    onComplete: function(id, name, responseJSON, xhr) {
                        totalUploadedFiles++;
                        progressbarUpdate();
                    }
                }
            });
            function progressbarUpdate()
            {
                if (totalSubmitedFiles == totalUploadedFiles) {
                    //hide progress bar
                    $("#toalProgress").hide();
                    totalSubmitedFiles = totalUploadedFiles = 0;
                } else {
                    $("#toalProgress").show();
                    progress = (totalUploadedFiles / totalSubmitedFiles) * 100;
                    $("#toalProgress .progress-bar").css("width",progress+'%');
                }
            }
        </script>
    </body>
</html>
