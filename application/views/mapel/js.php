<script>
    $(document).ready(function() {
        $.fn.dataTableExt.oApi.fnPagingInfo = function(oSettings) {
            return {
                "iStart": oSettings._iDisplayStart,
                "iEnd": oSettings.fnDisplayEnd(),
                "iLength": oSettings._iDisplayLength,
                "iTotal": oSettings.fnRecordsTotal(),
                "iFilteredTotal": oSettings.fnRecordsDisplay(),
                "iPage": Math.ceil(oSettings._iDisplayStart / oSettings._iDisplayLength),
                "iTotalPages": Math.ceil(oSettings.fnRecordsDisplay() / oSettings._iDisplayLength)
            };
        };
        var table = $("#tbl-mapel").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#tbl-mapel_filter input')
                    .off('.DT')
                    .on('input.DT', function() {
                        api.search(this.value).draw();
                    });
            },
            oLanguage: {
                sProcessing: "Tunggu Bentar"
            },
            processing: true,
            serverSide: true,
            ajax: {
                "url": "<?= site_url('/Mapel/get_mapel_json'); ?>",
                "type": "POST"
            },
            columns: [{
                    "data": "id_mapel",
                    "orderable": false
                },
                {
                    "data": "nama_mapel"
                },
                {
                    "data": "kkm_mapel"
                },
                {
                    "data": "option"
                }
            ],
            order: [
                [1, 'asc']
            ],
            rowCallback: function(row, data, iDisplayIndex) {
                var info = this.fnPagingInfo();
                var page = info.iPage;
                var length = info.iLength;
                var index = page * length + (iDisplayIndex + 1);
                $('td:eq(0)', row).html(index);
            }

        });

        $('#tbl-mapel').on('click', '.btn-edit', function() {
            var id = $(this).data('id_mapel');
            var nama = $(this).data('nama');
            var kkm = $(this).data('kkm');

            $('[name="id_mapel"]').val(id);
            $('[name="nama"]').val(nama);
            $('[name="kkm"]').val(kkm);

            $('#modal-edit').modal('show');
        });

        $('#tbl-mapel').on('click', '.btn-hapus', function() {
            var id = $(this).data('id');

            $('[name="id_mapel"]').val(id);

            $('#modal-hapus').modal('show');
        });
        $('#mapel-tambah').on('click', function() {
            $('#modal-tambah').modal('show');
        });

    });
</script>
</body>

</html>