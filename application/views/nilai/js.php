<script>
    $(document).ready(function() {
        var kl = $('[name="kdkelas"]').val();
        tampilkan_nilai(kl);

        $('#ipt-nilai').on('click', function() {
            var id_guru = $('[name="id_guru"]').val();
            $('#modal-tambah').modal('toggle');
            $.ajax({
                type: 'POST',
                url: "<?= site_url('/Nilai/get_kelas_guru') ?>",
                data: {
                    id_guru: id_guru
                },
                success: function(e) {
                    var respon = JSON.parse(e);
                    var idkelas = respon[0].id_kelas;
                    $.ajax({
                        url: "<?= site_url('/Siswa/get_dtkelas') ?>",
                        type: "POST",
                        data: {
                            kelas: idkelas
                        },
                        async: true,
                        success: function(r) {
                            var htm = "";
                            var respon = JSON.parse(r);
                            for (var i = 0; i < respon.length; i++) {
                                htm += `<option value="${respon[i].id_siswa}">${respon[i].nama}</option>`;
                            }
                            $('#nama').html(htm);
                        }
                    });
                    var htm = "";
                    if (respon !== "") {
                        for (var i = 0; i < respon.length; i++) {
                            htm += `<option value="${respon[i].id_kelas}">${respon[i].nm_kelas}</option>`;
                        }
                        $('#idkelas').html(htm);
                    }
                }
            });
        });
        $('#modal-tambah').on('click', '.btl', function() {
            $('#form-tambah')[0].reset();
        });

        // simpan nilai
        $('#modal-tambah').on('click', '#simpan_nilai', function() {
            var count_error = 0;
            var id_guru = $('[name="id_guru"]').val();
            var id_mapel = $('[name="id_mapel"]').val();
            var semester = $('[name="semester"]').val();
            var kelas = $('[name="kelas"]').val();
            var jenis = $('[name="jenis"]').val();
            var nilai = $('[name="nilai"]').val();
            var nama = $('[name="nama"]').val();

            if (jenis == 0) {
                $('.fr-jenis').addClass('has-error').append('<span class="help-block">Jenis Nilai harus di isi</span>');
                count_error++;
            } else {
                $('.fr-jenis').removeClass('has-error');
                $('.help-block').hide();
            }
            if (count_error == 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?= site_url('/Nilai/simpan') ?>",
                    data: {
                        id_guru: id_guru,
                        semester: semester,
                        id_mapel: id_mapel,
                        jenis_nilai: jenis,
                        nilai: nilai,
                        id_kelas: kelas,
                        id_siswa: nama
                    },
                    beforeSend: function() {
                        $('.progress').css('display', 'block');
                        $('.msg-prog').css('display', 'block');
                    },
                    success: function(data) {

                        tampilkan_nilai(kelas);
                        var percentage = 0;
                        var timer = setInterval(function() {
                            percentage = percentage + 20;
                            progress_bar_process(percentage, timer);
                        }, 1000);
                    }
                });

                function progress_bar_process(percentage, timer, kl) {
                    $('.progress-bar').css('width', percentage + '%');
                    $('.msg-prog').html(percentage + '%');
                    if (percentage > 100) {
                        clearInterval(timer);
                        $('#form-tambah')[0].reset();
                        $('#process').css('display', 'none');
                        $('.msg-prog').css('display', 'none');
                        $('.progress-bar').css('width', '0%');
                        $('#modal-tambah').modal('hide');
                        $('#message_success').html("<div class='alert alert-info'>Data Berhasil Di Simpan !</div>");
                        setTimeout(function() {
                            $('#message_success').html('');
                        }, 5000);
                    }
                }
            }

        });

        function tampilkan_nilai(kl) {
            $.ajax({
                url: "<?= site_url('/Nilai/get_nilai_kelas') ?>",
                type: 'POST',
                data: {
                    kelas: kl
                },
                async: true,
                success: function(respon) {
                    var e = JSON.parse(respon);
                    var htm = "";

                    for (var i = 0; i < e.length; i++) {
                        var no = i + 1;
                        htm += `<tr>
                                        <th>${no}</th>
                                        <td>${e[i].nama}</td>
                                        <td>${e[i].semester}</td>
                                        <td>${e[i].jenis_nilai}</td>
                                        <td>${e[i].nilai}</td>
                                        <td><button data-id_rekap="${e[i].id_rekap}" class="btn btn-flat btn-danger btn-delete">Hapus</td>
                                        </tr>`;
                    }
                    $('#tbl-nilai').DataTable().destroy();
                    $('#bd-nilai').html(htm);
                    $('#tbl-nilai').DataTable({
                        dom: 'Bfrtip',
                        buttons: [{
                            extend: 'print',
                            messageTop: '<h1 align="center" style="margin-bottom:2em;">Data Nilai Siswa</h1>',
                            title: '',
                            exportOptions: {
                                columns: [0, 1, 2, 3]
                            }
                        }]
                    });
                }
            });
        }

        // membuat hapus 
        $('#tbl-nilai').on('click', '.btn-delete', function() {
            var id_rekap = $(this).data('id_rekap');
            if (confirm('Apakah yakin?')) {
                $.ajax({
                    url: "<?= site_url('/Nilai/hapus') ?>",
                    type: 'POST',
                    data: {
                        id_rekap: id_rekap
                    },
                    success: function(respon) {
                        alert('berhasil menghapus');
                        tampilkan_nilai(kl);
                    }
                });
            }
        });
    });
</script>
</body>

</htm>