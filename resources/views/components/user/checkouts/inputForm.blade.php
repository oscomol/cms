<div>
    <h6>Client details</h6>
    <div class="row">

        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="client-name">Name</label>
                <input type="text" class="form-control" id="client-name" name="name" required>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="contactPerson">Contact Person</label>
                <input type="text" class="form-control" id="contactPerson" name="contactPerson" required>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="client-phone">Phone (e.g, 639126129921)</label>
                <input type="number" class="form-control" id="client-phone" name="phone" required>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="client-email">Email</label>
                <input type="email" class="form-control" id="client-email" name="email" required>
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
                <input type="date" class="form-control" id="functionDate" name="functionDate" required>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="startTime">Start time</label>
                <input type="time" class="form-control" id="startTime" name="startTime" required>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="foodTime">Food time</label>
                <input type="time" class="form-control" id="foodTime" name="foodTime" required>
            </div>
        </div>
        <div class="col-6 col-md-3">
            <div class="form-group">
                <label for="endTime">End time</label>
                <input type="time" class="form-control" id="endTime" name="endTime" required>
            </div>
        </div>

        <div class="col-6">
            <div class="form-group">
                <label for="functionType">Type of function</label>
                <input type="text" class="form-control" id="functionType" name="functionType" required>
            </div>
            <div class="form-group">
                <label for="numOfGuests">Number of Guests</label>
                <input type="number" class="form-control" id="numOfGuests" name="numOfGuests" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group">
                <label for="suggestion">Suggestion box</label>
                <textarea class="form-control" id="suggestion" name="suggestion" required style="height: 125px;"></textarea>
            </div>
        </div>
        <div class="form-group ml-2">
            <label class="mr-5">Is this event to be surprise?</label>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="isSurprised" value="Yes" id="Yes" required>
                <label class="form-check-label" for="Yes">
                    Yes
                </label>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="isSurprised" value="No" id="No" required>
                <label class="form-check-label" for="No">
                    No
                </label>
            </div>
        </div>
     </div>
</div>