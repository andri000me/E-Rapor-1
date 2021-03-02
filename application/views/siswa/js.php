<script>
    $(document).ready(function() {
        tampil_data();

        function tampil_data() {
            var buttonCommon = {
                exportOptions: {
                    format: {
                        body: function(data, row, column, node) {
                            // Strip $ from salary column to make it numeric
                            return column === 5 ?
                                data.replace(/[$,]/g, '') :
                                data;
                        }
                    }
                }
            };
            $('#tbl-siswa').dataTable({
                dom: 'Bfrtip',
                buttons: [
                    $.extend(true, {}, buttonCommon, {
                        extend: 'copyHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'excelHtml5'
                    }),
                    $.extend(true, {}, buttonCommon, {
                        extend: 'pdfHtml5'
                    })
                ]
            });
        }

        // get kelas ajax
        $('#kelas').on('change', function() {
            var kelas = $(this).val();
            if (kelas !== 0) {
                $.ajax({
                    type: 'post',
                    url: "<?= site_url('/Siswa/get_dtkelas'); ?>",
                    data: {
                        kelas: kelas
                    },
                    async: true,
                    success: function(e) {
                        var r = JSON.parse(e);
                        var htm = "";
                        $('#tbl-siswa').DataTable().clear().destroy();
                        for (var i = 0; i < r.length; i++) {
                            var no = i + 1;
                            htm += `<tr>
                                    <th>` + no + `</th>
                                    <td>` + r[i].nis + `</td>
                                    <td>` + r[i].nama + `</td>
                                    <td>` + r[i].jk + `</td>
                                    <td>` + r[i].nm_kelas + `</td>
                                    <td> <a href="<?= site_url('/Siswa/edit') ?>/` + r[i].id_siswa + `" class="btn btn-sm btn-warning btn-flat"><i class="fa fa-edit"></i> Edit</a> <button class="btn btn-del btn-danger btn-sm btn-flat" data-id="` + r[i].id_siswa + `"><i class="fa fa-trash"></i> Hapus</button></td>
                                    </tr>`;
                        }
                        $('#bd-siswa').html(htm);
                        tampil_data();
                    }
                });
            }
        });
        $('#tbl-siswa').on('click', '.btn-del', function() {
            var id = $(this).data('id');
            if (confirm('Apakah yakin ingin menghapus data?')) {

                $.ajax({
                    type: 'post',
                    url: "<?= site_url('/Siswa/hapus'); ?>",
                    data: {
                        id: id
                    },
                    success: function(e) {
                        location.reload()
                    }
                });
            }
        });
    });
</script>
</body>

</html>