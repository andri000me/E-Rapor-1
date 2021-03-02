<script>
    $(document).ready(function() {
        var id_siswa = $('[name="id_siswa"]').val();

        $.ajax({
            url: "<?= site_url('/Rapot/get_rapot') ?>",
            type: 'post',
            data: {
                id_siswa: id_siswa
            },
            success: function(e) {
                var r = JSON.parse(e);
                var htm = "";
                var st = '';
                console.log(r);
                for (var i = 0; i < r.length; i++) {
                    var no = i + 1;
                    var nilaiku;
                    // total nilai di bagi banyaknya nilai
                    nilaiku = r[i].jumlah / r[i].nilai;
                    if (nilaiku > r[i].kkm_mapel) {
                        var st = '<p>Lulus</p>';
                    } else {
                        var st = '<p>Tidak Lulus</p>';
                    }
                    htm += `<tr>
                            <th>${no}</th>
                            <td>${r[i].nama_mapel}</td>
                            <td>${nilaiku}</td>
                            <td>${st}</td>
                        </tr>`
                }
                $('#bd-rapot').html(htm);
                $('#tbl-rapot').DataTable({
                    dom: 'Brt',
                    buttons: [{
                            extend: 'print',
                            messageTop: '<h1 align="center" style="margin-bottom:2em;">Rapot Siswa</h1>',
                            title: ''
                        },
                        {
                            extend: 'pdfHtml5',
                            title: 'Rapot Siswa',
                            download: 'open',
                            pageSize: 'A4'
                        }
                    ]
                });
            }
        })
    });
</script>

</body>

</html>