<?php

namespace App\Controllers;

use App\Models\FilmModel; 

class Film extends BaseController
{
    protected $komikModel;
    public function __construct(){
        $this->filmModel = new FilmModel();
    }
	public function index()
	{
        $data = [
            'title' => 'Daftar Film',
            'komik' => $this->filmModel->getFilm()
        ];

		return view('film/index', $data);		
	}
    public function detail($slug){
        $komik = $this->filmModel->getFilm($slug);
        $data = [
            'title' => 'Detail Film',
            'film' => $this->filmModel->getFilm($slug)
        ];
        // jika komik tidak ada
        if(empty($data['film'])){
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul film '. $slug . ' tidak ditemukan.');
        }
        return view('film/detail', $data);
    }
    public function create(){        
        $data = [
            'title' => 'Form Tambah Data Film',
            'validation' => \Config\Services::validation()
        ];
        return view('film/create', $data);
    }
    public function save(){
        // validasi input
        if(!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[film.judul]',
                'errors' => [
                    'required' => '{field} film harus diisi.',
                    'is_unique' => '{field} film sudah terdaftar.'
                ]
            ],
            'sutradara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film harus diisi.',
                ]
            ],
            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film harus diisi.',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])){
            // $validation = \Config\Services::validation();
            // return redirect()->to('/film/create')->withInput()->with('validation', $validation);    
            return redirect()->to('/film/create')->withInput();    
        }
        // Ambil gambar
        $fileSampul = $this->request->getFile('sampul');
        // apakah tidak ada gambar yang diupload
        if($fileSampul->getError() == 4){
            $namaSampul = 'default.jpg';
        }else{
            // generate file ke folder img
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan file ke img
            $fileSampul->move('img', $namaSampul);
        }
        
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->filmModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sutradara' => $this->request->getVar('sutradara'),
            'genre' => $this->request->getVar('genre'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan.');

        return redirect()->to('/film');
    }
    public function delete($id){
        // Cari gambar berdasarkan id
        $film = $this->filmModel->find($id);
        // cek jika file gambarnya default.jpg
        if($film['sampul'] != 'default.jpg'){
            // Hapus gambar
            unlink('img/'. $film['sampul']);
        }

        $this->filmModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus.');
        return redirect()->to('/film');
    }
    public function edit($slug){
        $data = [
            'title' => 'Form Ubah Data Film',
            'validation' => \Config\Services::validation(),
            'film' => $this->filmModel->getFilm($slug)
        ];
        return view('film/edit', $data);
    }
    public function update($id){
        // cek judul
        $filmLama = $this->filmModel->getFilm($this->request->getVar('slug'));
        if($filmLama['judul'] == $this->request->getVar('judul')){
            $rule_judul = 'required';
        }else{
            $rule_judul = 'required|is_unique[film.judul]';
        }
        // validasi input
        if(!$this->validate([
            'judul' => [
                'rules' => $rule_judul,
                'errors' => [
                    'required' => '{field} film harus diisi.',
                    'is_unique' => '{field} film sudah terdaftar.'
                ]
            ],
            'sutradara' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film harus diisi.',
                ]
            ],
            'genre' => [
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} film harus diisi.',
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])){
            return redirect()->to('/film/edit/'. $this->request->getVar('slug'))->withInput();
        }
        $fileSampul = $this->request->getFile('sampul');

        //cek gambar apakah tetap gambar lama
        if($fileSampul->getError() == 4){
            $namaSampul = $this->request->getVar('sampulLama');
        }else{
            //generate nama file random
            $namaSampul = $fileSampul->getRandomName();
            // pindahkan gambar
            $fileSampul->move('img', $namaSampul);
            // hapus file yg lama
            $film = $this->filmModel->find($id);
            if($film['sampul'] != 'default.jpg'){
                // Hapus gambar
                unlink('img/'. $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->filmModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'sutradara' => $this->request->getVar('sutradara'),
            'genre' => $this->request->getVar('genre'),
            'sampul' => $namaSampul
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah.');

        return redirect()->to('/film');
    }
}
