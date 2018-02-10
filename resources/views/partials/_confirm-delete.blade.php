<!-- Modal -->
<div class="modal fade" id="confirmDelete{{ $idSuffex }}" tabindex="-1" role="dialog" aria-labelledby="modalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header d-flex justify-content-between">
                <h5 class="modal-title" id="modalTitle">{{ $title }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="margin: -0.5rem auto -1rem 1rem;">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
            {{ $question }}
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary ml-1" data-dismiss="modal">إلغاء الأمر</button>
            {!! Form::submit('حذف', ['class' => 'btn btn-danger']) !!}
            </div>
        </div>
    </div>
</div>