<?php

namespace Master;

use Config\Query_builder;

class Cabor
{
    private $db;

    public function __construct($con)
    {
        $this->db = new Query_builder($con);
    }

    public function index()
    {
        $data = $this->db->table('cabor')->get()->resultArray();
        $res = '<a href="?target=cabor&act=tambah_cabor" class="btn btn-info btn-sm">Tambah Cabor</a><br><br>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>Id Cabor</th>
                            <th>Nama Cabor</th>
                            <th>Organisasi</th>
                            <th>Jumlah Club</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>';

        $no = 1;
        foreach ($data as $r) {
            $res .= '<tr>
                        <td>' . $no . '</td>
                        <td>' . $r['id_cabor'] . '</td>
                        <td>' . $r['nama_cabor'] . '</td>
                        <td>' . $r['organisasi'] . '</td>
                        <td>' . $r['jumlah_club'] . '</td>
                        <td>
                            <a href="?target=cabor&act=edit_cabor&id=' . $r['id_cabor'] . '" class="btn btn-success btn-sm">Edit</a>
                            <a href="?target=pelatih&act=delete_pelatih&id=' . $r['id_cabor'] . '" class="btn btn-danger btn-sm">Hapus</a>
                        </td>
                    </tr>';
            $no++;
        }

        $res .= '</tbody></table></div>';
        return $res;
    }

    public function tambah()
    {
        $res = '<a href="?target=cabor" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=cabor&act=simpan_cabor">
                    <div class="mb-3">
                        <label for="npm" class="form-label">Id_Cabor</label>
                        <input type="text" class="form-control" id="npm" name="id_cabor">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama_cabor</label>
                        <input type="text" class="form-control" id="nama" name="nama_cabor">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Organisasi</label>
                        <input type="text" class="form-control" id="nama" name="organisasi">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Jumlah_Club</label>
                        <input type="text" class="form-control" id="nama" name="jumlah_club">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>';

        return $res;
    }

    public function simpan()
    {
        $id_cabor = $_POST['id_cabor'];
        $nama_cabor = $_POST['nama_cabor'];
        $organisasi = $_POST['organisasi'];
        $jumlah_club = $_POST['jumlah_club'];
    
        $data = array(
            'id_cabor' => $id_cabor,
            'nama_cabor' => $nama_cabor,
            'organisasi' => $organisasi,
            'jumlah_club' => $jumlah_club,
        );
        return $this->db->table('cabor')->insert($data);
    }
    public function edit($id){
        // get data cabor
        $r = $this->db->table(' cabor ')->where(" id_cabor='$id' ")->get()->rowArray();
        // cek radio

        $res = '<a href="?target=cabor" class="btn btn-danger btn-sm">Kembali</a><br><br>';
        $res .= '<form method="post" action="?target=cabor&act=update_cabor">
            <input type="hidden" class="form-control" id="param" name="param" value="'.$r['id_cabor'].'">
            
            <div class="mb-3">
                <label for="npm" class="form-label">Id_Cabor</label>
                <input type="text" class="form-control id="npm" name="id_cabor" value="'.$r['id_cabor'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama_Cabor</label>
                <input type="text" class="form-control id="nama" name="nama_cabor" value="'.$r['nama_cabor'].'">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Organisasi</label>
                <input type="text" class="form-control id="nama" name="organisasi" value="'.$r['organisasi'].'">
            </div>
            <div class="mb-3">
                <label for="npm" class="form-label">Jumlah_Club</label>
                <input type="text" class="form-control id="npm" name="jumlah_club" value="'.$r['jumlah_club'].'">
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
        $id_cabor = $_POST['id_cabor'];
        $nama_cabor = $_POST['nama_cabor'];
        $organisasi = $_POST['organisasi'];
        $jumlah_club = $_POST['jumlah_club'];
        
        $data = array(
            'id_cabor' => $id_cabor,
            'nama' => $nama_cabor,
            'organisasi' => $organisasi,
            'jumlah_club' => $jumlah_club,
        );
        return $this->db->table(' cabor ')->where(" id_cabor='$param' ")->update($data);
    }

    public function delete($id)
    {
        return $this->db->table('cabor')->where("id_cabor='$id'")->delete();
    }
}
