<script>
    $(document).ready(function(){
    $("#txtkey").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $("#list_karyawan tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
    });
</script>
<div class="p-2">
    <div class="container">
        <button class="mb-1"><a class="text-decoration-none text-dark" href="<?= base_url . '?page_id=1' ?>">Input</a></button>
        <input id="txtkey" type="text" placeholder="Search..">
        <div class="row">
            <div class="col-12">
                <table class="table table-striped" width="100%" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Tgl Lahir</th>
                            <th>Departemen</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="list_karyawan">
                        <?php
                        $result = mysqli_query($connection, "SELECT * FROM tb_karyawan");
                        $no = 1;
                        while($data = mysqli_fetch_array($result)) :
                            ?>
                        <tr>
                            <td><?= $no++?></td>
                            <td><?= $data['nip']?></td>
                            <td><?= $data['nama']?></td>
                            <td><?= $data['tgl_lahir']?></td>
                            <td><?= $data['departemen']?></td>
                            <td>
                                <button>
                                    <a class="text-decoration-none text-dark" href="<?= base_url . "?page_id=1&id=$data[id]&action=edit" ?>">Edit</a>
                                </button>
                                <button>
                                    <a class="text-decoration-none text-dark" href="<?= base_url . "?page_id=1&id=$data[id]&action=delete" ?>">Delete</a>
                                </button>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> 
</div>