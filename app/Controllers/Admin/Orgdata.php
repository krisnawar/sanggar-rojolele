<?php

namespace App\Controllers\Admin;

use App\Models\OrgdataModel;

class Orgdata extends AdminPage
{
    protected $orgdataModel;

    public function __construct()
    {
        parent::__construct();

        $this->orgdataModel = new OrgdataModel();
    }

    public function getIndex()
    {
        $this->data['subtitle']    = 'Data Organisasi';
        $this->data['breadcrumbs'] = array('Admin', 'Data Organisasi');

        return view('admin/page/orgdata', $this->data);
    }

    public function postSavedata()
    {
        // dd($this->request->getVar());
        helper(['form', 'url']);
        if (!$this->validate([
            'org_name' => 'required',
            'web_url' => 'required',
            'address' => 'required',
            'maps' => 'required',
            'email' => 'required|valid_email',
            'alt_email' => 'required|valid_email',
            'phone_number' => 'required',
            'whatsapp' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/orgdata'));
        }

        $address = str_replace("\n", "<br>", $this->request->getVar('address'));

        $this->orgdataModel->update(1, [
            'org_name' => $this->request->getVar('org_name'),
            'web_url' => $this->request->getVar('web_url'),
            'address' => $address,
            'maps' => $this->request->getVar('maps'),
            'email' => $this->request->getVar('email'),
            'alt_email' => $this->request->getVar('alt_email'),
            'phone_number' => $this->request->getVar('phone_number'),
            'whatsapp' => $this->request->getVar('whatsapp'),
            'facebook' => $this->request->getVar('facebook'),
            'instagram' => $this->request->getVar('instagram'),
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Data organisasi berhasil diperbarui.']);
        return redirect()->to(base_url('/admin/orgdata'));
    }

    public function postSaveabout()
    {
        // dd($this->request->getVar());
        $previous = $this->orgdataModel->getWhere(['id' => 1])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'about' => 'required',
            'about_img' => [
                'max_size[about_img, 1024]',
                'is_image[about_img]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/orgdata'));
        }

        if ($this->request->getFile('about_img')->isValid()) {
            $img = $this->request->getFile('about_img');
            $filename = $img->getRandomName();
            $img->move('assets/img', $filename);
            unlink(ltrim($previous['about_img'], $previous['about_img'][0]));
        } else {
            $filename = ltrim($previous['about_img'], '/assets/img/');
        }

        $this->orgdataModel->update(1, [
            'about' => $this->request->getVar('about'),
            'about_img' => '/assets/img/' . $filename
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Informasi tentang organisasi berhasil diperbarui.']);
        return redirect()->to(base_url('/admin/orgdata'));
    }

    public function postSaveimg()
    {
        // dd($this->request->getVar());
        $previous = $this->orgdataModel->getWhere(['id' => 1])->getResultArray()[0];
        helper(['form', 'url']);
        if (!$this->validate([
            'org_logo' => [
                'max_size[org_logo, 1024]',
                'is_image[org_logo]'
            ],
            'web_icon' => [
                'max_size[web_icon, 1024]',
                'is_image[web_icon]'
            ]
        ])) {
            session()->setFlashdata(['type' => 'warning', 'msg' => '<strong>Oh tidak!</strong> Ada data yg belum terisi atau data yang anda masukan tidak memenuhi aturan']);
            return redirect()->to(base_url('/admin/orgdata'));
        }

        if ($this->request->getFile('org_logo')->isValid()) {
            $img = $this->request->getFile('org_logo');
            $filename_org_logo = $img->getRandomName();
            $img->move('assets/img', $filename_org_logo);
            unlink(ltrim($previous['org_logo'], $previous['org_logo'][0]));
        } else {
            $filename_org_logo = ltrim($previous['org_logo'], '/assets/img/');
        }

        if ($this->request->getFile('web_icon')->isValid()) {
            $img = $this->request->getFile('web_icon');
            $filename_web_icon = $img->getRandomName();
            $img->move('assets/img', $filename_web_icon);
            unlink(ltrim($previous['web_icon'], $previous['web_icon'][0]));
        } else {
            $filename_web_icon = ltrim($previous['web_icon'], '/assets/img/');
        }

        $this->orgdataModel->update(1, [
            'org_logo' => '/assets/img/' . $filename_org_logo,
            'web_icon' => '/assets/img/' . $filename_web_icon
        ]);

        session()->setFlashdata(['type' => 'success', 'msg' => '<strong>Selamat!</strong> Logo organisasi berhasil diperbarui.']);
        return redirect()->to(base_url('/admin/orgdata'));
    }
}
