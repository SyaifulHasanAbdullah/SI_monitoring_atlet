<?php

namespace Master;

use Config\Query_builder;

class Atlet
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('tb_atlet')->get()->resultArray();
        $res = '<a href="?target=tb_atlet&act=tambah_tb_atlet" class="btn btn-info btn-sm">Tambah Atlet</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                        <th>No</th>
                        <th>Id Atlet</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Jenis Kelamin</th>
                        <th>Tgl Lahir</th>
                        <th>Tpt Lahir</th>
                        <th>Cabor</th>
                        <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>';

        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
            <td>' . $no . '</td>
            <td>' . $r['id_atlet'] . '</td>
            <td>' . $r['nama'] . '</td>
            <td>' . $r['alamat'] . '</td>
            <td>' . $r['jenis_kelamin'] . '</td>
            <td>' . $r['tgl_lahir'] . '</td>
            <td>' . $r['tpt_lahir'] . '</td>
            <td>' . $r['cabor'] . '</td>
            <td>
                            <a href="?target=tb_atlet&act=edit_tb_atlet&id=' . $r['id_atlet'] . '" class="btn btn-success btn-sm">Edit</a>
                            <a href="?target=tb_atlet&act=delete_tb_atlet&id=' . $r['id_atlet'] . '" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>';
            $no++;
        }

        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=atlet" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=atlet&act=simpan_atlet">
                    <div class="mb-3">
                        <label for="id_atlet" class="form-label">Id_atlet</label>
                        <input type="text" class="form-control" id="id_atlet" name="id_atlet">
                    </div>
                    <div class="mb-3">
                        <label for="Nama_Atlet" class="form-label">Nama_Atlet</label>
                        <input type="text" class="form-control" id="nama" name="nama_atlet">
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="jenis_kelamin" class="form-label">Jenis_kelamin</label>
                        <input type="text" class="form-control" id="jenis_kelamin" name="jenis_kelamin">
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tgl_lahir</label>
                        <input type="text" class="form-control" id="tgl_lahir" name="tgl_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="tpt_lahir" class="form-label">Tpt_lahir</label>
                        <input type="text" class="form-control" id="tpt_lahir" name="tpt_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="cabor" class="form-label">cabor</label>
                        <input type="text" class="form-control" id="cabor" name="cabor">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';

        return $res;
    }

    public function simpan()
    {
        $id_atlet = $_POST['id_atlet'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tpt_lahir = $_POST['tpt_lahir'];
        $cabor = $_POST['cabor'];

    
        $data = array(
            'id_atlet' => $id_atlet,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $tgl_lahir,
            'tpt_lahir' => $tpt_lahir,
            'cabor' => $cabor,

        );
        return $this->db->table('atlet')->insert($data);
    }
    public function edit($id){
        // get data atlet
        $r = $this->db->table(' atlet ')->where(" id_atlet='$id' ")->get()->rowArray();
        // cek radio

        $res = '<a href="?target=atlet" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=atlet&act=update_atlet">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_atlet'].'">
            
            <div class="mb-3">
                <label for="id_atlet" class="form-label">id_atlet</label>
                <input type="text" class="form-control id="id_atlet" name="id_atlet" value="'.$r['id_atlet'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama_atlet</label>
                <input type="text" class="form-control id="nama" name="nama" value="'.$r['nama'].'">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">alamat</label>
                <input type="text" class="form-control id="alamat" name="alamat" value="'.$r['alamat'].'">
            </div>
            <div class="mb-3">
                <label for="jenis_kelamin" class="form-label">jenis_kelamin</label>
                <input type="text" class="form-control id="jenis_kelamin" name="jenis_kelamin" value="'.$r['jenis_kelamin'].'">
            </div>
            <div class="mb-3">
                <label for="tgl_lahir" class="form-label">tgl_lahir_atlet</label>
                <input type="text" class="form-control id="tgl_lahir" name="tgl_lahir" value="'.$r['tgl_lahir'].'">
            </div>
            <div class="mb-3">
                <label for="tpt_lahir" class="form-label">tpt_lahir</label>
                <input type="text" class="form-control id="tpt_lahir" name="tpt_lahir" value="'.$r['tpt_lahir'].'">
            </div>
            <div class="mb-3">
                <label for="cabor" class="form-label">cabor</label>
                <input type="text" class="form-control id="cabor" name="cabor" value="'.$r['cabor'].'">
            </div>
            <button type="submit" class="btn btn-primary">Ubah</button>
        </form>';
        return $res;
    
}
public function cekRadio($val, $val2){
    if ($val==$val2) {
        return "checked";
    }
    return "";
}

    public function update()
    {
        $param = $_POST['param'];
        $id_atlet = $_POST['id_atlet'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tpt_lahir = $_POST['tpt_lahir'];
        $cabor = $_POST['cabor'];

        
        $data = array(
            'id_atlet' => $id_atlet,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $tgl_lahir,
            'tpt_lahir' => $tpt_lahir,
            'cabor' => $cabor,

        );
        return $this->db->table(' atlet ')->where(" id_atlet='$param' ")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('atlet')->where("id_atlet='$id'")->delete();
    }
}
