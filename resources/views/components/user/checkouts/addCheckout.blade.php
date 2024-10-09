<form class="checkoutForm" action="{{route('new-checkout')}}" method="POST">
    @csrf
    @method('post')
<div class="card">
    <div class="card-header">
        <h6 class="card-title">Contract form</h6>
    </div>
    <div class="card-body">
        <div>
          @include('components.user.checkouts.inputForm')
          @include('components.user.checkouts.regularMenus')
            <div class="mt-2">
                @include('components.user.checkouts.packages.selectPackage')
            </div>
            <div class="mt-2">
                @include('components.user.checkouts.themes.selectTheme')
            </div>
        </div>
        <label for="policy">
            <input type="checkbox" name="policy" id="policy">
            Read and agree to <span class="text-info" data-toggle="modal" data-target="#terms-conditions">terms and conditions</span>.
        </label>
    </div>
    <div class="card-footer">
        <div class="d-flex justify-content-end g-3">
            <button type="button" class="btn btn-success btn btn-sm mx-2" id="submitFormCheck" disabled>
                Submit
            </button>
            <button type="button" class="btn btn-danger btn btn-sm" id="clearForm">
                Clear
            </button>
        </div>
    </div>
</div>
@include('components.user.checkouts.confirmCheckout')
</form>



