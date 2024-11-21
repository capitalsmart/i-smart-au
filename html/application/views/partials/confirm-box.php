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
                                <li class="list-group-item text-left"><span class="lbl">Name: </span> <span
                                        class=" badge value text-left"
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
                                <li class="list-group-item"><span class="lbl">Order #: </span> <span class="badge value"
                                                                                                     id="m_order_number"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Site: </span> <span class="badge value"
                                                                                                  id="m_site"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Car Make: </span> <span
                                        class="badge value" id="m_carmake"></span>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="list-group">

                                <li class="list-group-item"><span class="lbl">Registration: </span> <span
                                        class="badge value"
                                        id="m_vehicleregistration"></span></li>
                                <li class="list-group-item"><span class="lbl">Car Model: </span> <span
                                        class="badge value"
                                        id="m_carmodel"></span></li>
                                <li class="list-group-item"><span class="lbl">Car Year: </span> <span
                                        class="badge value"
                                        id="m_caryear"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Body Type: </span> <span
                                        class="badge value"
                                        id="m_cartype"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">VIN Number: </span> <span
                                        class="badge value"
                                        id="m_carvin"></span>
                                </li>
                                <li class="list-group-item"><span class="lbl">Car Colour: </span> <span
                                        class="badge value"
                                        id="m_carcolor"></span>
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
                            <div class="photo-scroll">
                                <table class="table table-images">
                                    <tbody>
                                        <tr id="tr_photos">
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <input type="submit" id="edit" name="edit" value="Edit Details"
                                   class="cbtn btn-2 pull-left "/>

                            <input type="submit" id="confirm" name="confirm" value="Confirm Details"
                                   class="cbtn btn-1 pull-right"/>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>