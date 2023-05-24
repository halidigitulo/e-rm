<div class="table-responsive">
    <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
        <thead>
            <tr>
                <th>No. RM</th>
                <th>Nama Pasien</th>
                <th>L/P</th>
                <th>Tgl. Lahir</th>
                <th>Alamat</th>
                <th>Telp</th>
                <th>Agama</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($pasien as $result)
                <tr>
                    <td><a href="{{ url('pasien/' . $result->NOPASIEN) }}">{{ substr($result->NOPASIEN,2) }}</a></td>
                    <td>{{ $result->NAMAPASIEN }}</td>
                    <td>
                        @if ($result->JNSKELAMIN)
                            {{ $result->JNSKELAMIN == 'L' ? 'Laki-laki' : 'Perempuan' }}
                        @endif
                    </td>
                    <td>
                        @if ($result->TGLLAHIR)
                            {{ date('d-M-Y', strtotime($result->TGLLAHIR)) }}
                        @endif
                    </td>
                    <td>{{ $result->ALM1PASIEN }}</td>
                    <td>{{ $result->TLPPASIEN }}</td>
                    <td>
                        @if ($result->agama)
                            {{ $result->agama->NAMAAGAMA }}
                        @endif
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="7" class="text-center">Data pasien tidak ditemukan</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>