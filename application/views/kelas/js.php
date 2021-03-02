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
        var table = $("#tbl-kelas").dataTable({
            initComplete: function() {
                var api = this.api();
                $('#tbl-kelas_filter input')
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
                "url": "<?= site_url('/Kelas/get_kelas_json'); ?>",
                "type": "POST"
            },
            columns: [{
                    "data": "id_kelas",
                    "orderable": false
                },
                {
                    "data": "nm_kelas"
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

        $('#tbl-kelas').on('click', '.btn-edit', function() {
            var id = $(this).data('id_kelas');
            var nama = $(this).data('nama_kelas');

            $('[name="id_kelas"]').val(id);
            $('[name="nama_kelas"]').val(nama);

            $('#modal-edit').modal('show');
        });

        $('#tbl-kelas').on('click', '.btn-hapus', function() {
            var id = $(this).data('id');

            $('[name="id_kelas"]').val(id);

            $('#modal-hapus').modal('show');
        });
        $('#kelas-tambah').on('click', function() {
            $('#modal-tambah').modal('show');
        });

    });
</script>
</body>

</html>