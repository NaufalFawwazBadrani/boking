@extends('home')
@section('content')
<form action="{{ route('jadwals.update', $jadwal->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>No Boking:</strong>
                <input type="text" name="no_boking" class="form-control" placeholder="No Boking" value="{{ $jadwal->no_boking }}">
                @error('no_boking')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Tribun</strong>
                <input type="text" name="tribun" class="form-control" placeholder="tribun" value="{{ $jadwal->tribun }}">
                @error('tribun')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>kelas</strong>
                <input type="text" name="kelas" class="form-control" placeholder="kelas" value="{{ $jadwal->kelas }}">
                @error('kelas')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
     
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>tanggal:</strong>
                <input type="date" name="tanggal" class="form-control" placeholder="tanggal" value="{{ $jadwal->tanggal }}">
                @error('tanggal')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
        </div>
        <div class="row col-xs-12 col-sm-12 col-md-12 mt-3">
            <div class="col-md-10 form-group">
                <input type="text" name="search" id="search" class="form-control" placeholder="Masukan Nama Penonton">
                @error('name')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>
            <div class="col-md-2 form-group text-center">
                <button class="btn btn-success" type="button" name="btnAdd" id="btnAdd"><i class="fa fa-plus"></i>Tambah</button>
</div>
        
        </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-3">
            <table id="example" class="table table-striped table-success" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Nama Penonton</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Sub Total</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="detail">

                </tbody>
            </table>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <input type="text" name="jml" class="form-control">
                <div class="form-group">
                    <strong>Grand Total:</strong>
                    <input type="text" name="total" class="form-control" placeholder="0">
                    @error('kelas')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3 ml-3">Submit</button>
    </div>
</form>
@endsection
@section('js')
<script type="text/javascript">
    var path = "{{ route('search.penonton') }}";

    $("#search").autocomplete({
        source: function(request, response) {
            $.ajax({
                url: path,
                type: 'GET',
                dataType: "json",
                data: {
                    search: request.term
                },
                success: function(data) {
                    response(data);
                }
            });
        },
        select: function(event, ui) {
            $('#search').val(ui.item.label);
            console.log($("input[name=jml]").val());
            if ($("input[name=jml]").val() > 0) {
                for (let i = 1; i <= $("input[name=jml]").val(); i++) {
                    id = $("input[name=id_penonton" + i + "]").val();
                    if (id == ui.item.id) {
                        alert(ui.item.value + ' sudah ada!');
                        break;
                    } else {
                        add(ui.item.id);
                    }
                }
            } else {
                add(ui.item.id);
            }
            return false;
        }
    });

    


    function add(id) {
        const path = "{{ route('penontons.index') }}/" + id;
        var html = "";
        var no = 0;
        if ($('#detail tr').length > no) {
            html = $('#detail').html();
            no = no + $('#detail tr').length;
        }
        $.ajax({
            url: path,
            type: 'GET',
            dataType: "json",
            success: function(data) {
                console.log(data);
                no++;
                html += '<tr>' +
                    '<td>' + no + '<input type="hidden" name="id_penonton' + no + '" class="form-control" value="' + data.id + '"></td>' +
                    '<td><input type="text" name="nama_penonton' + no + '" class="form-control" value="' + data.nama_penonton + '"></td>' +
                    '<td><input type="text" name="jumlah' + no + '" class="form-control" oninput="sumJumlah(' + no + ', this.value)" value="1"></td>' +
                    '<td><input type="text" name="sub_total' + no + '" class="form-control"></td>' +
                    '<td><a href="#" class="btn btn-sm btn-danger">X</a></td>' +
                    '</tr>';
                $('#detail').html(html);
                $("input[name=jml]").val(no);
                sumJumlah(no, 1);
            }
        });
    }

    function sumJumlah(no, q) {
        var jumlah = $("input[name=jumlah" + no + "]").val();
        var subtotal = jumlah;
        $("input[name=sub_total" + no + "]").val(subtotal);
        console.log(q + "*" + jumlah + "=" + subtotal);
        sumTotal();
    }

    function sumTotal() {
        var total = 0;
        for (let i = 1; i <= $("input[name=jml]").val(); i++) {
            var sub = $("input[name=sub_total" + i + "]").val();
            total = total + parseInt(sub);
        }
        $("input[name=total]").val(total);
    }
</script>
@endsection