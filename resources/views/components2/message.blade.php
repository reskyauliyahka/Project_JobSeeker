<!-- Modal for Success -->
@if (Session::has('success'))
<div class="modal fade" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-green-500 text-white">
                <h5 class="modal-title" id="successModalLabel">Success</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                {{ Session::get('success') }}
            </div>
        </div>
    </div>
</div>
@endif

<!-- Modal for Errors -->
@if ($errors->any())
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="errorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header bg-red-500 text-white">
                <h5 class="modal-title" id="errorModalLabel">Errors</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <ul>
                    @foreach ($errors->all() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endif

<script>
    document.addEventListener('DOMContentLoaded', function () {
        @if(Session::has('success'))
            new bootstrap.Modal(document.getElementById('successModal')).show();
        @endif
        @if($errors->any())
            new bootstrap.Modal(document.getElementById('errorModal')).show();
        @endif
    });
</script>
