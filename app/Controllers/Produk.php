<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelProduct;
use App\Models\ModelCat;

class Produk extends BaseController
{
    public function __construct()
    {
        $this->ModelProduct = new ModelProduct();
        $this->ModelCat = new ModelCat();
    }

    public function index(): string
    {
        $data = [
            'judul' => 'Product',
            'subjudul' => '',
            'menu' => 'product',
            'submenu' => '',
            'page' => 'v_product',
            'product' => $this->ModelProduct->AllData(),
        ];
        return view('v_template', $data);
    }

    public function create()
    {
        $cat = $this->ModelCat->AllData();
        $data = [
            'judul' => 'Product',
            'subjudul' => '',
            'menu' => 'product',
            'submenu' => '',
            'category' => $cat,
            'page' => 'v_tambahproduk',
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        return view('v_template', $data);
    }

    public function save()
    {
        //validasi input
        if (!$this->validate([
            'namabarang' => [
                'rules' => 'required|is_unique[t_produk.nama_barang]',
                'errors' => [
                    'required' => 'Nama Barang Harus Diisi!',
                    'is_unique' => 'Nama Barang Sudah Terdaftar!'
                ]
            ],
            'hargabeli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Beli Harus Diisi!'
                ]
            ],
            'hargajual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Jual Harus Diisi!'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok Harus Diisi!'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Harus dipilih!'
                ]
            ] //,
            //'sampul' => [
            //  'rules' => 'uploaded[sampul]|max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg, image/jpeg, image/png]'
            //]
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('Produk/create')->withInput();
        }


        $foto_barang = $this->request->getFile('sampul');
        if ($foto_barang->getError() == 4) {
            $namapoto = '';
        } else {
            $namapoto = $foto_barang->getRandomName();
            $foto_barang->move('img', $namapoto);
        }

        $this->ModelProduct->save([
            'nama_barang' => $this->request->getVar('namabarang'),
            'harga_beli' => $this->request->getVar('hargabeli'),
            'harga_jual' => $this->request->getVar('hargajual'),
            'stok_barang' => $this->request->getVar('stok'),
            'foto_barang' => $namapoto,
            'kategori_produk' => $this->request->getVar('kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan');

        return redirect()->to('Produk');
        //dd($this->request->getVar());
    }

    public function Edit($id_produk)
    {
        $prod = $this->ModelProduct->where(['id_produk' => $id_produk])->first();
        $cat = $this->ModelCat->AllData();
        $data = [
            'judul' => 'Product',
            'menu' => 'product',
            'page' => 'v_editproduk',
            'product' => $prod,
            'category' => $cat,
            'validation' => session()->getFlashdata('validation') ?? \Config\Services::validation()
        ];
        //dd($data);
        return view('v_template', $data);
    }

    public function Delete($id_produk)
    {
        $getprod = $this->ModelProduct->where(['id_produk' => $id_produk])->first();
        unlink('img/' . $getprod['foto_barang']);
        $data = [
            'id_produk' => $id_produk,
        ];
        $this->ModelProduct->DeleteData($data);
        session()->setFlashdata('pesan', 'Data Berhasil Dihapus !!');
        return redirect()->to('Produk');
    }

    public function Update($id_produk)
    {
        //validasi input
        $cekprod = $this->ModelProduct->where(['id_produk' => $id_produk])->first();
        if ($cekprod['nama_barang'] == $this->request->getVar('namabarang')) {
            $rule_barang = 'required';
        } else {
            $rule_barang = 'required|is_unique[t_produk.nama_barang]';
        }

        if (!$this->validate([
            'namabarang' => [
                'rules' => $rule_barang,
                'errors' => [
                    'required' => 'Nama Barang Harus Diisi!',
                    'is_unique' => 'Nama Barang Sudah Terdaftar!'
                ]
            ],
            'hargabeli' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Beli Harus Diisi!'
                ]
            ],
            'hargajual' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Harga Jual Harus Diisi!'
                ]
            ],
            'stok' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Stok Harus Diisi!'
                ]
            ],
            'kategori' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Kategori Harus dipilih!'
                ]
            ]
        ])) {
            session()->setFlashdata('validation', \Config\Services::validation());
            return redirect()->to('Produk/edit/' . $id_produk)->withInput();
        }

        $fileSampul = $this->request->getFile('sampul');
        //cek gambar
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('img', $namaSampul);
            unlink('img/' . $this->request->getVar('sampulLama'));
        }

        $this->ModelProduct->UpdateData([
            'id_produk' => $id_produk,
            'nama_barang' => $this->request->getVar('namabarang'),
            'harga_beli' => $this->request->getVar('hargabeli'),
            'harga_jual' => $this->request->getVar('hargajual'),
            'stok_barang' => $this->request->getVar('stok'),
            'foto_barang' => $namaSampul,
            'kategori_produk' => $this->request->getVar('kategori'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Di Ubah');

        return redirect()->to('Produk');
    }

    /*    public function export()
    {
        echo "export";
    }*/
}
