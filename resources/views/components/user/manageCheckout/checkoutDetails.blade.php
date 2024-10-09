<form action="{{route('client-info-update', ['checkoutId' => $checkout->id])}}" method="POST" class="checkoutDetailsFormUpdate">
    @csrf
    @method('put')
    <div class="card">
        <div class="card-header">
            <div class="card-title">
                <h6>Client details</h6>
            </div>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div>           
                <div class="row">
            
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="client-name">Name</label>
                            <input type="text" class="form-control" id="client-name" name="name" value="{{$checkout->name}}" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="contactPerson">Contact Person</label>
                            <input type="text" class="form-control" value="{{$checkout->contactPerson}}" id="contactPerson" name="contactPerson" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="client-phone">Phone</label>
                            <input type="number" class="form-control" id="client-phone" name="phone" value="{{$checkout->phone}}" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="client-email">Email</label>
                            <input type="email" class="form-control" id="client-email" name="email" value="{{$checkout->email}}" required>
                        </div>
                    </div>
                 </div>
            </div>
            <div class="mt-2">
                <h6>Event details</h6>
                <div class="row">
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="functionDate">Date of function</label>
                            <input type="date" class="form-control" id="functionDate" name="functionDate" value="{{$checkout->functionDate}}" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="startTime">Start time</label>
                            <input type="time" class="form-control" id="startTime" name="startTime" value="{{$checkout->startTime}}" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="foodTime">Food time</label>
                            <input type="time" class="form-control" id="foodTime" name="foodTime" value="{{$checkout->foodTime}}" required>
                        </div>
                    </div>
                    <div class="col-6 col-md-3">
                        <div class="form-group">
                            <label for="endTime">End time</label>
                            <input type="time" class="form-control" id="endTime" name="endTime" value="{{$checkout->endTime}}" required>
                        </div>
                    </div>
            
                    <div class="col-6">
                        <div class="form-group">
                            <label for="functionType">Type of function</label>
                            <input type="text" class="form-control" id="functionType" name="functionType" value="{{$checkout->functionType}}" required>
                        </div>
                        <div class="form-group">
                            <label for="numOfGuests">Number of Guests</label>
                            <input type="number" class="form-control" id="numOfGuests" name="numOfGuests" value="{{$checkout->numOfGuests}}" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="suggestion">Suggestion box</label>
                            <textarea class="form-control" id="suggestion" name="suggestion" required style="height: 125px;">{{$checkout->suggestion}}</textarea>
                        </div>
                    </div>
                    <div class="form-group ml-2">
                        <label class="mr-5">Is this event to be surprise?</label>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isSurprised" value="Yes" id="Yes" {{$checkout->isSurprised === 'Yes' ? 'checked':''}} required>
                            <label class="form-check-label" for="Yes">
                                Yes
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="isSurprised" value="No" id="No" {{$checkout->isSurprised === 'No' ? 'checked':''}} required>
                            <label class="form-check-label" for="No">
                                No
                            </label>
                        </div>
                    </div>
                 </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="button" class="float-right btn btn-sm btn-success" id="confirmCheckoutUpdateBtn">
                Save changes
            </button>
        </div>
    </div>
    @include('components.user.manageCheckout.confirmUpdate')
</form>