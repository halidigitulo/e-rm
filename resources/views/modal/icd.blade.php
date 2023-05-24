{{-- ICD Noreg --}}
<div class="modal fade" id="icdModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Cari Data ICD</h1>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body table-responsive">
                <table class="table table-hover table-striped table-sm" id="icd">
                    <thead>
                        <tr>
                            <th>Kode Diagnosa</th>
                            <th>Nama Diagnosa</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($icd as $item)
                            <tr>
                                <td>{{ $item->kddiagnosa }}</a>
                                </td>
                                <td><a class="pilihicd btn btn-link" data-kddiagnosa="{{ $item->kddiagnosa }}"
                                    data-namadiagnosa="{{ $item->namadiagnosa }}">{{ $item->namadiagnosa }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@push('script')
    <script>
        $(document).ready(function() {
            $(document).on('click', '.pilihicd', function() {
                var kddiagnosa = $(this).data('kddiagnosa');
                var namadiagnosa = $(this).data('namadiagnosa');
                $('.kode_diagnosa_utama').val(kddiagnosa);
                $('.diagnosa').val(namadiagnosa);
                $('#icdModal').modal('hide');
            });
        });
    </script>

    <script>
        $(function() {
            $('#icd').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": true,
                "rowGroup": true,
            });
        });
    </script>
@endpush
