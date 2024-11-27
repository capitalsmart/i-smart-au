<!DOCTYPE html>
<html lang="en">
<head>
    <title>CSRA Mini App</title>
    <meta charset="UTF-8">
    <meta name=description content="">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"/>
    <link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet"/>

    <!--		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" media="screen">-->
</head>
<body>

<div class="container">
    <h2 class="text-center">CSRA Mini App </h2>
    <hr>
    <div class="">

        <?php
        $attributes = array('class' => 'form-horizontal', 'id' => 'mini_app_form', 'method' => "post");
        echo form_open_multipart(base_url('Welcome/form_data/'), $attributes);
        ?>

        <!--        <form class="form-horizontal" method="post" action="/action_page.php">-->

        <div>
            <h4 class="text-center"> Contact Details </h4>
            <hr>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="first_name">First Name:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" place_error="mov_err1">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="surname">Surname:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" name="surname" id="surname" placeholder="Enter Surname" place_error="mov_err1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="email">Email:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="email" class="form-control"  name="email" id="email" placeholder="Enter email" place_error="mov_err1">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="phone">Phone:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" name="phone" id="phone" placeholder="Enter Phone Number" place_error="mov_err1">
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <h4 class="text-center"> Add Photos of damage to your vehicle </h4>
            <hr>
            <div class="col-md-6">
                <div class="form-group ">
                    <label class="control-label col-sm-2 col-md-4" for="photos">Photos:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="file" class="form-control" name="photos" id="photos" placeholder="Select Your Images" multiple place_error="mov_err1">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h4 class="text-center"> Vehicle Details </h4>
            <hr>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="car_make">Car Make:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" id="car_make" placeholder="Enter email" name="car_make" place_error="mov_err1">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="car_model">Car Model:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" id="car_model" placeholder="Enter Car Model" name="car_model" place_error="mov_err1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="vehicle_registration">Vehicle Registration :</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" id="vehicle_registration" placeholder="Enter Vehicle Registration" name="vehicle_registration" place_error="mov_err1">
                    </div>
                </div>
                <div class="form-group col-md-6">
                    <label class="control-label col-sm-2 col-md-4" for="car_year">Car Year:</label>
                    <div class="col-sm-10 col-md-8">
                        <input type="text" class="form-control" id="car_year" placeholder="Enter Car Year" name="car_year" place_error="mov_err1">
                    </div>
                </div>
            </div>
        </div>

        <div>
            <h4 class="text-center"> Further Details </h4>
            <hr>
            <div class="row">
                <div class="form-group col-md-12">
                    <label class="control-label col-sm-2 col-md-4" for="comments">Comments</label>
                    <div class="col-sm-10 col-md-8">
                        <textarea class="form-control" rows="5" name="comments" id="comments" place_error="mov_err1"></textarea>
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group text-center">
            <div class="col-sm-offset-2 col-sm-10 col-md-12 ">
                <button type="submit" class="btn btn-danger btn-lg">Submit</button>
            </div>
        </div>
        <?php form_close(); ?>
        <!--        </form>-->

    </div>
</div>


<!-- jQuery -->
<script src="<?php echo base_url('assets/js/jquery-1.11.1.js'); ?>"></script>
<!-- Bootstrap JavaScript -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<!-- Jquery Validate -->
<script src="<?php echo base_url('assets/js/jquery.validate.min.js'); ?>"></script>

<script>

    //.................................   Jquery validations ..........................................//


    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-z' '\s]+$/i.test(value);
    }, "Only alphabetical characters");

    jQuery.validator.addMethod("phone_number", function (value, element) {
        return this.optional(element) || /^(?:\+)?[0-9]{7,18}$/.test(value);
    }, "Please enter valid phone number like (+1234567890 or 1234567890).");

    jQuery("#mini_app_form").validate({
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
         //   car_make: {
         //       required: true,
         //   },
          //  car_model: {
          //      required: true,
          //  },
            vehicle_registration: {
                required: true,
            },
          //  car_year: {
          //      required: true,
          //  },
            comments: {
                required: true,
            },
        },
        messages: {
            first_name: {
                required: "The First Name is required.",
                lettersonly: "The First Name may only contain alphabetical characters.",
                minlength: "The First Name must be at least 3 characters in length.",
            },
            surname: {
                required: "The Surname is required.",
                lettersonly: "The Surname may only contain alphabetical characters.",
                minlength: "The Surname must be at least 3 characters in length.",
            },
            email: {
                required: "The Email is required.",
                email: "The Email must be a valid email address.",
            },
            phone: {
                required: "The Phone is required.",
                phone_number: "Please enter valid phone number like (+1234567890 or 1234567890).",
            },
            photos: {
                required: "The Photos are required.",
            },
            //car_make: {
            //    required: "The Car make is required.",
           // },
           // car_model: {
           //     required: "The Car Model is required.",
           // },
            vehicle_registration: {
                required: "The Vehicle Registration is required.",
            },
            //car_year: {
            //    required: "The Car Year is required.",
            //},
            comments: {
                required: "The Comments are required.",
            },
        },
        errorPlacement: function (error, element) {
            if (element.attr("place_error") == "mov_err") {
                error.insertAfter($(element).parent('div'));
            }

            if (element.attr("place_error") == "mov_err1") {
                error.insertAfter($(element));
            }
        }

    });
</script>




</body>
</html>
