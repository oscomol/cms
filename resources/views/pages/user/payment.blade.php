<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Reservation payment page</title>

    @vite(['resources/css/app.css'])

</head>

<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">

    <div class="modal fade" id="reservation-payment" tabindex="-1" role="dialog" aria-labelledby="modal-default-label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-default-label">Confirm payment</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Your reservation <strong>{{$reservation->name}}</strong> on {{$reservation->functionDate}} has been approved, with a total amount of {{ ($reservation->initPayment ?? 0) + ($reservation->additionalPayment ?? 0) }}
                    . Click continue to proceed to the billing process, so we can start preparing your menus and theme. Thank you!
                </div>                
                <div class="modal-footer">
                    <a href="{{route('payment.page', [
                    "reservationId" => $reservation->id])}}" class="btn btn-primary btn-sm" id="addAdminBtn">
                        Continue
                    </a>
                    <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    @vite(['resources/js/app.js'])
    
</body>

</html>
<script type="module">
    $(function() {
        $('#reservation-payment').modal('show');
    })
</script>

