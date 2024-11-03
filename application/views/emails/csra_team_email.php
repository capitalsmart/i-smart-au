<!DOCTYPE html>
<html lang="en">
    <head>
        <title>New Car Damage Email</title>
        <style>
            ul.photos {
                list-style: none;
            }
            .photos li{
                float:left;
                margin-right: 10px;
                margin-bottom: 10px;
            }
        </style>
    </head>
    <body style="background:#fff;">
        <div style="max-width:650px; margin:auto; font-family:Arial; background:#ffffff; padding:30px; font-size:14px;">
            <div class="form">
                <div style="margin-bottom:30px; text-align:center; border-bottom:1px solid #ccc; padding-bottom:10px;">
                    <a href="#">
                        <img src="<?= base_url("assets/images/logo.png") ?>" class="img" alt="img">
                    </a>
                </div>
                <div style="margin-bottom:30px; text-align:left; border-bottom:0px solid #ccc; padding-bottom:10px;">
                    <p><b> Dear CSRA Team,</b></p>
                    <p>A new vehicle damage enquiry has been submitted by <b> <?= $first_name . " " . $surname ?></b></p>

                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%;  margin-top:15px; font-family:Arial;">
                        <thead>
                            <tr>
                                <th colspan="2" style="font-weight:normal; height:30px; text-decoration: underline;" align="left">Form Data</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($forminputs as $key => $value): ?>
                               <tr>
                                <td style="font-weight:bold; width:150px; height:30px;"><?=$key ?>:</td>
                                <td><?= $value ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <!--
                    <table cellpadding="0" cellspacing="0" border="0" style="width:100%;  margin-top:30px;">
                        <tbody>
                            <tr>                      
                        <p> <b> Damaged vehicle photo(s): </b> </p>
                        </tr>
                        </tbody>
                    </table>-->
                    
                    <!--<ul class="photos">
                        <?php /*foreach ($photos as $key => $photo): */?>
                                <li>
                                    <img src="<?/*= base_url(str_replace(" ", "%20", $photo))*/?>" width="100" height="100" alt="img">
                                </li>
                        <?php /*endforeach;*/?>
                    </ul>-->
                    <div style="clear:both"></div>
                    <p>Thank You</p>
                    <br />
                </div>
            </div>
        </div>
    </body>
</html>
