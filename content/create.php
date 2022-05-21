<?php

if(@$_GET['action'])
{
    if($_GET['action'] == "edit")
    {  
        $tampil = mysqli_query($connection, "SELECT 
                    *
                FROM 
                    tb_karyawan
                WHERE 
                    id = $_GET[id]");

        $data = mysqli_fetch_array($tampil);
        
        if($data){
            $id = $data['id'];
            $nip = $data['nip'];
            $nama = $data['nama'];
            $tgl_lahir = date("Y-m-d", strtotime($data['tgl_lahir']));
            $departemen = $data['departemen'];
        }
    }
    elseif($_GET['action'] == 'delete')
    {
        $hapus = mysqli_query($connection, "DELETE FROM tb_karyawan WHERE id=$_GET[id]");
        if($hapus){
            echo "<script>
                    alert('Data Berhasil Dihapus');
                    document.location='" . base_url . "';
                </script>";
        }
}
}

if(isset($_POST['bsimpan']))
{
    if($_GET['action'] == "edit")
    {   
        $id = $_POST['id'];
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $tgl_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
        $departemen = $_POST['departemen'];
     
        $simpan = mysqli_query($connection,  "UPDATE tb_karyawan SET 
                                                nip = '$nip',
                                                nama = '$nama', 
                                                tgl_lahir = '$tgl_lahir',
                                                departemen = '$departemen'
                                                WHERE
                                                id = $id
                                                ");
    }else{
        $id='';
        $nip = $_POST['nip'];
        $nama = $_POST['nama'];
        $tgl_lahir = date("Y-m-d", strtotime($_POST['tgl_lahir']));
        $departemen = $_POST['departemen'];
    
        $simpan = mysqli_query($connection,  "INSERT INTO tb_karyawan 
                                                VALUES (	'', 
                                                            '$nip',
                                                            '$nama', 
                                                            '$tgl_lahir',
                                                            '$departemen'
                                                        )");
    }

    if($simpan)
    {
        echo "<script>
                alert('Data berhasil di simpan');
                document.location='" . base_url . "';
            </script>";
    }else
    {
        echo "<script>
                alert('Simpan Data GAGAL!!');
                </script>";
    } 
}
?>
<div class="p-2">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="col-3">
                    <h3>Form Input</h3>
                    <form action="" method="post" action="./_input_data.php">
                        <input required type="text" id="id" name="id" value="<?= @$id ?>" style="display:none;">
                        <div class="row">
                            <div class="col-5">
                                <label for="">NIP</label>
                            </div>
                            <div class="col-7">
                                <input required type="text" id="nip" name="nip" value="<?= @$nip ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="">Nama</label>
                            </div>
                            <div class="col-7">
                                <input required type="text" id="nama" name="nama" value="<?= @$nama ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="">Tgl Lahir</label>
                            </div>
                            <div class="col-7">
                                <input required type="date" id="tgl_lahir" name="tgl_lahir" value="<?= @$tgl_lahir ?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5">
                                <label for="">Departemen</label>
                            </div>
                            <div class="col-7">
                                <input required type="text" id="departemen" name="departemen" value="<?= @$departemen ?>">
                            </div>
                        </div>
                        <div class="row justift-content-arround mt-2">
                            <div class="col-5 text-align-left">
                                <button type="submit"><a class="text-decoration-none text-dark" href="<?= base_url ?>">Keluar</a></button>
                            </div>
                            <div class="col-7">
                                <div class="row">
                                    <button name="bsimpan" type="submit">Simpan</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>