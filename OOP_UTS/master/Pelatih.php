<?php

namespace Master;

use Config\Query_builder;

class Pelatih
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('pelatih')->get()->resultArray();
        $res = '<a href="?target=pelatih&act=tambah_pelatih" class="btn btn-info btn-sm">Tambah Pelatih</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Id Pelatih</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Jenis Kelamin</th>
                            <th>Tgl Lahir</th>
                            <th>Tpt Lahir</th>
                            <th>Cabor Id Cabor</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>';

        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                        <td>' . $no . '</td>
                        <td>' . $r['id_pelatih'] . '</td>
                        <td>' . $r['nama'] . '</td>
                        <td>' . $r['alamat'] . '</td>
                        <td>' . $r['jenis_kelamin'] . '</td>
                        <td>' . $r['tgl_lahir'] . '</td>
                        <td>' . $r['tpt_lahir'] . '</td>
                        <td>' . $r['cabor_id_cabor'] . '</td>
                        <td>
                            <a href="?target=pelatih&act=edit_pelatih&id=' . $r['id_pelatih'] . '" class="btn btn-success btn-sm">Edit</a>
                            <a href="?target=pelatih&act=delete_pelatih&id=' . $r['id_pelatih'] . '" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>';
            $no++;
        }

        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=pelatih" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pelatih&act=simpan_pelatih">
                    <div class="mb-3">
                        <label for="npm" class="form-label">Id_Pelatih</label>
                        <input type="text" class="form-control" id="npm" name="id_pelatih">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Alamat</label>
                        <input type="text" class="form-control" id="nama" name="alamat">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Jenis Kelamin</label>
                        <input type="text" class="form-control" id="nama" name="jenis_kelamin">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tgl Lahir</label>
                        <input type="text" class="form-control" id="nama" name="tgl_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Tpt Lahir</label>
                        <input type="text" class="form-control" id="nama" name="tpt_lahir">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Cabor Id Cabor</label>
                        <input type="text" class="form-control" id="nama" name="cabor_id_cabor">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';

        return $res;
    }

    public function simpan()
    {
        $id_pelatih = $_POST['id_pelatih'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tpt_lahir = $_POST['tpt_lahir'];
        $cabor_id_cabor = $_POST['cabor_id_cabor'];

        $data = array(
            'id_pelatih' => $id_pelatih,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $tgl_lahir,
            'tpt_lahir' => $tpt_lahir,
            'cabor_id_cabor' => $cabor_id_cabor
        );
        return $this->db->table('pelatih')->insert($data);
    }
    public function edit($id){
        // get data pelatih
        $r = $this->db->table(' pelatih ')->where(" id_pelatih='$id' ")->get()->rowArray();
        // cek radio

        $res = '<a href="?target=pelatih" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=pelatih&act=update_pelatih">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_pelatih'].'">
            
            <div class="mb-3">
                <label for="npm" class="form-label">Id_Pelatih</label>
                <input type="text" class="form-control id="npm" name="id_pelatih" value="'.$r['id_pelatih'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control id="nama" name="nama" value="'.$r['nama'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Alamat</label>
                <input type="text" class="form-control id="nama" name="alamat" value="'.$r['alamat'].'">
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Jenis_kelamin</label>
                <input type="text" class="form-control id="npm" name="jenis_kelamin" value="'.$r['jenis_kelamin'].'">
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Tgl_lahir</label>
                <input type="text" class="form-control id="npm" name="tgl_lahir" value="'.$r['tgl_lahir'].'">
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Tpt_Lahir</label>
                <input type="text" class="form-control id="npm" name="tpt_lahir" value="'.$r['tpt_lahir'].'">
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Cabor-Id_Cabor</label>
                <input type="text" class="form-control id="npm" name="cabor_id_cabor" value="'.$r['cabor_id_cabor'].'">
            </div>
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
        $id_pelatih = $_POST['id_pelatih'];
        $nama = $_POST['nama'];
        $alamat = $_POST['alamat'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $tgl_lahir = $_POST['tgl_lahir'];
        $tpt_lahir = $_POST['alamat'];
        $cabor_id_cabor = $_POST['cabor_id_cabor'];

        $data = array(
            'id_pelatih' => $id_pelatih,
            'nama' => $nama,
            'alamat' => $alamat,
            'jenis_kelamin' => $jenis_kelamin,
            'tgl_lahir' => $tgl_lahir,
            'tpt_lahir' => $tpt_lahir,
            'cabor_id_cabor' => $cabor_id_cabor
        );
        return $this->db->table(' pelatih ')->where(" id_pelatih='$param' ")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('pelatih')->where("id_pelatih='$id'")->delete();
    }
}
