<div>
    @include('livewire.f2.resume.modal-form')
    <div class="col-md-12">
        @if (session('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{ session('message') }}
                <button type="button" class="btn-close" data-dismiss="alert" aria-label="Close">x</button>
            </div>
        @endif
        <div class="card">
            <div class="card-header d-flex align-item-center justify-content-between">
                <h5 class="text-gray-800">F2.1 Resume Rawat Jalan</h5>
                <a href="#" class="float-end btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#addResumeRajal"><i class="fas fa-plus"></i> Tambah
                    Data</a>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-hover table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Noreg</th>
                            <th>Tanggal Resume</th>
                            <th>Nama Dokter</th>
                            <th>Diagnosis</th>
                            <th>User</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
