<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        // cek session yang login, jika session status tidak sama dengan session admin_login,maka halaman akan di alihkan kembali ke halaman login.
        if ($this->session->userdata('status') != "admin_login") {
            redirect(base_url() . 'login?alert=belum_login');
        }
    }
    function index()
    {
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_index');
        $this->load->view('admin/v_footer');
    }
    function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url() . 'login/?alert=logout');
    }

    function ganti_password()
    {
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_ganti_password');
        $this->load->view('admin/v_footer');
    }

    function ganti_password_aksi()
    {
        $baru = $this->input->post('password_baru');
        $ulang = $this->input->post('password_ulang');

        $this->form_validation->set_rules('password_baru', 'Password Baru', 'required|matches[password_ulang]');
        $this->form_validation->set_rules('password_ulang', 'Ulangi Password', 'required');

        if ($this->form_validation->run() != false) {
            $id = $this->session->userdata('id');
            $where = array('id' => $id);
            $data = array('password' => md5($baru));
            $this->m_perpus->update_data($where, $data, 'admin');
            redirect(base_url() . 'admin/ganti_password/?alert=sukses');
        } else {
            $this->load->view('admin/v_header');
            $this->load->view('admin/v_ganti_password');
            $this->load->view('admin/v_footer');
        }
    }
    // CRUD Petugas
    function petugas()
    {
        // mengambbil data dari databse
        $data['petugas'] = $this->m_perpus->get_data('petugas')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas', $data);
        $this->load->view('admin/v_footer');
    }
    function petugas_tambah()
    {
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas_tambah');
        $this->load->view('admin/v_footer');
    }
    function petugas_tambah_aksi()
    {
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $data = array(
            'nama' => $nama,
            'username' => $username,
            'password' => md5($password)
        );
        // insert data ke database
        $this->m_perpus->insert_data($data, 'petugas');

        // alihkan halaman ke database petugas
        redirect(base_url() . 'admin/petugas');
    }

    function petugas_edit($id)
    {
        $where = array('id' => $id);
        // mengambil data dari database sesuai id
        $data['petugas'] = $this->m_perpus->edit_data($where, 'petugas')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_petugas_edit', $data);
        $this->load->view('admin/v_footer');
    }

    function petugas_update()
    {
        $id = $this->input->post('id');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $where = array(
            'id' => $id
        );
        // cek apakah form password di isi atau tidak
        if ($password == "") {
            $data = array(
                'nama' => $nama,
                'username' => $username
            );

            // update data ke database
            $this->m_perpus->update_data($where, $data, 'petugas');
        } else {
            $data = array(
                'nama' => $nama,
                'username' => $username,
                'password' => md5($password)
            );

            // update data ke database
            $this->m_perpus->update_data($where, $data, 'petugas');

            // alihkan halaman ke data petugas
            redirect(base_url() . 'admin/petugas');
        }
    }

    function petugas_hapus($id)
    {
        $where = array(
            'id' => $id
        );
        // menghapus data petugas dari database sesuai id 
        $this->m_perpus->delete_data($where, 'petugas');

        // alihkan halaman ke halaman data petugas
        redirect(base_url() . 'admin/petugas');
    }
    // akhir crud petugas

    //anggota
    function anggota()
    {
        //ambil data dari database
        // mengambbil data dari databse
        $data['anggota'] = $this->m_perpus->get_data('anggota')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_anggota', $data);
        $this->load->view('admin/v_footer');
    }
    function anggota_kartu($id)
    {
        $where = array('id' => $id);
        //ambil data dari database sesuai id
        $data['anggota'] = $this->m_perpus->edit_data($where, 'anggota')->result();
        $this->load->view('admin/v_anggota_kartu', $data);
    }
    // akhir anggota

    // buku
    function buku()
    {
        //ambil data buku dari database
        $data['buku'] = $this->m_perpus->get_data('buku')->result();
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_buku', $data);
        $this->load->view('admin/v_footer');
    }
    //peminjaman
    function peminjaman_laporan()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // ambil data peminjaman berdasarkan tanggal muali sampai tanggal sampai
            $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman,buku,anggota WHERE  peminjaman.peminjaman_buku=buku.id AND peminjaman.peminjaman_anggota=anggota.id AND date(peminjaman_tanggal_mulai) >= '$mulai' AND date(peminjaman_tanggal_mulai) <= '$sampai' ORDER BY peminjaman_id desc")->result();
        } else {
            // mengambil data peminjaman buku dari database | dan mengurutkan data dari id peminjaman terbesar ke terkecil (desc)
            $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman,buku,anggota WHERE peminjaman.peminjaman_buku=buku.id AND peminjaman.peminjaman_anggota=anggota.id ORDER BY peminjaman_id desc")->result();
        }
        $this->load->view('admin/v_header');
        $this->load->view('admin/v_peminjaman_laporan', $data);
        $this->load->view('admin/v_footer');
    }

    function peminjaman_cetak()
    {
        if (isset($_GET['tanggal_mulai']) && isset($_GET['tanggal_sampai'])) {
            $mulai = $this->input->get('tanggal_mulai');
            $sampai = $this->input->get('tanggal_sampai');
            // ambil data peminjaman berdasarkan tanggal muali sampai tanggal sampai
            $data['peminjaman'] = $this->db->query("SELECT * FROM peminjaman,buku,anggota WHERE  peminjaman.peminjaman_buku=buku.id AND peminjaman.peminjaman_anggota=anggota.id AND date(peminjaman_tanggal_mulai) >= '$mulai' AND date(peminjaman_tanggal_mulai) <= '$sampai' ORDER BY peminjaman_id desc")->result();
            $this->load->view('admin/v_peminjaman_cetak', $data);
        } else {
            redirect(base_url() . 'admin/peminjam');
        }
    }
}
