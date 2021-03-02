<script>
    $(document).ready(function() {
        get_jadwal()

        function get_jadwal() {
            var id_guru = "<?= $guru->id_guru; ?>";

            $.ajax({
                url: "<?= site_url('/Jurnal/get_jadwal') ?>",
                type: 'POST',
                data: {
                    id_guru: id_guru
                },
                async: true,
                success: function(r) {
                    var e = JSON.parse(r);
                    var htm = "";
                    for (var i = 0; i < e.length; i++) {
                        var no = i + 1;
                        htm += `<tr>
                                    <th>${no}</th>
                                    <td>${e[i].hari}</td>
                                    <td>${e[i].nm_kelas}</td>
                                    <td>${e[i].jam}</td>
                                    <td><button class="btn btn-flat btn-danger btn-hapus btn-sm"  data-idjadwal="${e[i].id}"><i class="fa fa-trash"></i> Hapus</button></td>
                                    </tr>`;
                    }
                    $('#bd-jadwal').html(htm);
                }
            });
        }

        $('#bd-jadwal').on('click', '.btn-hapus', function() {
            var id = $(this).data('idjadwal');

            if (confirm('Apakah yakin di hapus?')) {
                $.ajax({
                    type: 'POST',
                    url: "<?= site_url('/Jurnal/hapus') ?>",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        get_jadwal();
                        $('#message_success').html("<div class='alert alert-info'>Data Berhasil Di Hapus !</div>");
                        setTimeout(function() {
                            $('#message_success').html('');
                        }, 5000);
                    }
                })
            }
        });

        $('#tbh-jadwal').on('click', function() {
            $('#modal-tambah').modal('show');
        });
        $('#modal-tambah').on('click', '#simpan', function() {
            var count_error = 0;
            var id_guru = $('[name="id_guru"]').val();
            var id_mapel = $('[name="id_mapel"]').val();
            var hari = $('[name="hari"]').val();
            var kelas = $('[name="kelas"]').val();
            var jam = $('[name="jam"]').val();

            if (hari == 0) {
                $('.fr-hari').addClass('has-error').append('<span class="help-block">Hari harus di isi</span>');
                count_error++;
            } else {
                $('.fr-hari').removeClass('has-error');
                $('.help-block').hide();
            }
            if (kelas == 0) {
                $('.fr-kelas').addClass('has-error').append('<span class="help-block">Kelas harus di isi</span>');
                count_error++;
            } else {
                $('.fr-kelas').removeClass('has-error');
                $('.help-block').hide();
            }
            if (jam == 0) {
                $('.fr-jam').addClass('has-error').append('<span class="help-block">Jam harus di isi</span>');
                count_error++;
            } else {
                $('.fr-jam').removeClass('has-error');
                $('.help-block').hide();
            }

            if (count_error == 0) {
                $.ajax({
                    type: 'POST',
                    url: "<?= site_url('/Jurnal/simpan') ?>",
                    data: {
                        id_guru: id_guru,
                        id_mapel: id_mapel,
                        hari: hari,
                        kelas: kelas,
                        jam: jam
                    },
                    beforeSend: function() {
                        $('.progress').css('display', 'block');
                        $('.msg-prog').css('display', 'block');
                    },
                    success: function(data) {
                        var percentage = 0;
                        var timer = setInterval(function() {
                            percentage = percentage + 20;
                            progress_bar_process(percentage, timer);
                        }, 1000);
                    }
                });
            }

            function progress_bar_process(percentage, timer) {
                $('.progress-bar').css('width', percentage + '%');
                $('.msg-prog').html(percentage + '%');
                if (percentage > 100) {
                    get_jadwal();
                    clearInterval(timer);
                    $('#form-tambah')[0].reset();
                    $('.fr-hari').removeClass('.has-success');
                    $('.fr-kelas').removeClass('.has-success');
                    $('.fr-jam').removeClass('.has-success');
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


        });
    });
</script>
</body>

</html>