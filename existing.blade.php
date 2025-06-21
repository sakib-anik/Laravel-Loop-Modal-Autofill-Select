@extends('layouts.backend.app')
@section('title', 'Existing Qard Hasanas')
@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card">
    <div class="card-header border-bottom">
        <div class="row">
            <div class="col-md-10">
                <h3 class="card-title">Qard Hasana Documents</h3>
            </div>
        </div>
    </div>
    <br/>
    <div class="container">
        <div class="table-responsive">
        <table class="table zero-configuration">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Ref No</th>
                    <th>Created On</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php($i = 1)
                    @foreach($qardHasanas as $key => $qardHasana)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ 
                                $qardHasana->lender_fname 
                                . ($qardHasana->lender_mname ? '_' . $qardHasana->lender_mname : '') 
                                . '_' . $qardHasana->lender_surname 
                                . '_' . $qardHasana->ref_no 
                            }}.pdf</td>
                            <td>{{ $qardHasana->created_at }}</td>
                            <td>
                                <a href="{{ url('pdf-qard-download',$qardHasana->ref_no) }}" class="btn btn-warning btn-sm">
                                    <li class="fas fa-download mr-1"></li> Download
                                </a>
                                <a href="{{ url('pdf-qard-view',$qardHasana->ref_no) }}" target="_blank" class="btn btn-info btn-sm">
                                    <li class="fas fa-eye mr-2"></li> Preview
                                </a>
                                <button 
                                    data-bs-toggle="modal" 
                                    data-bs-target="#exampleModal{{ $qardHasana->id }}" 
                                    class="btn btn-success btn-sm openRefundModal" 
                                    data-due-pound="{{ $qardHasana->due_pound }}" 
                                    data-due-pence="{{ $qardHasana->due_pence }}">
                                    <li class="fa-solid fa-sack-dollar mr-2"></li> Refund
                                </button>
                            </td>
                        </tr>
                        @include('qard.modal', ['qardHasana' => $qardHasana])
                    @endforeach
            </tbody>
            </table>
        </div>
    </div>
    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        &nbsp;
    </div>
    <div class="d-flex justify-content-between align-items-center row py-3 gap-3 gap-md-0">
        &nbsp;
    </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$(document).ready(function () {
    // Initialize datepickers
    var currentDate = new Date();
    var day = ("0" + currentDate.getDate()).slice(-2);
    var month = ("0" + (currentDate.getMonth() + 1)).slice(-2);
    var year = currentDate.getFullYear();
    var formattedDate = day + '/' + month + '/' + year;

    $('.datepicker').datepicker({
        format: 'dd/mm/yyyy',
        autoclose: true,
        todayHighlight: true,
        endDate: new Date()
    }).datepicker('setDate', formattedDate);

    // When modal is shown
    $('.modal').on('shown.bs.modal', function (event) {
        const button = $(event.relatedTarget); // get the button that triggered modal
        const duePound = button.data('due-pound');
        const duePence = button.data('due-pence');

        const modal = $(this);
        modal.find('.refundPound').val(duePound);
        modal.find('.refundPence').val(duePence.toString().padStart(2, '0'));

        // Refund type select
        modal.find('.refundType').off('change').on('change', function () {
            if ($(this).val() === 'full') {
                modal.find('.refundPound').val(duePound);
                modal.find('.refundPence').val(duePence.toString().padStart(2, '0'));
            } else {
                modal.find('.refundPound').val('');
                modal.find('.refundPence').val('');
            }
        });
    });
});
</script>

@endsection