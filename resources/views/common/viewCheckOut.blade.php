<div class="modal fade" id="view-checkout" tabindex="-1" role="dialog" aria-labelledby="modal-default-label"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modal-default-label">Viewing checkout</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                        <div class="card-body p-0">   
                            <div class="table-responsive">
                                <table class="table m-0">
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td id="name"></td>
                                        </tr>
                                        <tr>
                                            <td>Contact person</td>
                                            <td id="contactPerson"></td>
                                        </tr>
                                        <tr>
                                            <td>Email</td>
                                            <td id="emailInfo"></td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td id="phoneInfo"></td>
                                        </tr>
                                        <tr>
                                            <td>Function type</td>
                                            <td id="functionType"></td>
                                        </tr>
                                        <tr>
                                            <td>Function date</td>
                                            <td id="functionDate"></td>
                                        </tr>
                                        <tr>
                                            <td>Start time</td>
                                            <td id="startTime"></td>
                                        </tr>
                                        <tr>
                                            <td>Food time</td>
                                            <td id="foodTime"></td>
                                        </tr>
                                        <tr>
                                            <td>End time</td>
                                            <td id="endTime"></td>
                                        </tr>
                                        <tr>
                                            <td>Number of guests</td>
                                            <td id="guestsNumber"></td>
                                        </tr>
                                        <tr>
                                            <td>Initial payment</td>
                                            <td id="initPayment"></td>
                                        </tr>
                                        <tr>
                                            <td>Additional payment</td>
                                            <td id="additionalPayment"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    
                    <div class="container px-3">
                        <div class="regular d-none">
                            <h6>Regular menus</h6>
                            <div class="row regularMenu">
                                
                            </div>
                        </div>

                        <div class="package d-none">
                            <h6>Package menus</h6>
                            <div class="row packageMenu">

                            </div>
                        </div>

                        <div class="theme d-none">
                            <h6>Theme</h6>
                            <div class="row themeBody">

                            </div>
                        </div>
                    </div>

            <div class="modal-footer">
                
                <span id="manageCheckoutBtn"></span>
                <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
