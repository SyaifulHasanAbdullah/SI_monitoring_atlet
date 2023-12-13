<?php

namespace Master;

class Menu
{
    public function topMenu()
    {
        $base = "http://localhost/OOP_UTS/index.php?target=";
        $data = [
            ['Text' => 'Home', 'Link' => $base . 'home'],
            ['Text' => 'Pelatih', 'Link' => $base . 'pelatih'],
            ['Text' => 'Atlet', 'Link' => $base . 'tb_atlet'],
            ['Text' => 'Cabor', 'Link' => $base . 'cabor']
        ];
        return $data;
    }
}
