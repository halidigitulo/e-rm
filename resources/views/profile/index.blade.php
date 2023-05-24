@extends('template.home')
@section('judul', 'Profile Rumah Sakit')
@section('content')

    <div class="row">
        <div class="col">
            <div class="card">
                
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        var sign = $('#sign').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sign.signature('clear');
            $("#signature64").val('');
        });
    </script>
@endpush
