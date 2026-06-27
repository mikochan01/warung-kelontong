<?php

namespace App\Controllers;

use App\Models\ProdukModel;
use App\Models\KategoriModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

class Produk extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        $keyword = $this->request->getGet('keyword');

        $query = $model
            ->select('produk.*, kategori.nama_kategori')
            ->join('kategori', 'kategori.id = produk.kategori_id', 'left');

        if ($keyword) {
            $query->like('nama_produk', $keyword);
        }

            $perPage = 5;

            $data['produk'] = $query->paginate($perPage);
            $data['pager'] = $model->pager;
            $data['perPage'] = $perPage;
            $data['currentPage'] =
                $this->request->getVar('page') ?? 1;
            return view('produk/index', $data);
        }

    public function tambah()
    {
        $kategoriModel = new KategoriModel();
        $data['kategori'] = $kategoriModel->findAll();
        return view('produk/tambah', $data);
    }

    public function simpan()
    {
        $model = new ProdukModel();

        $model->save([
            'nama_produk' => $this->request->getPost('nama_produk'),
            'kategori_id' => $this->request->getPost('kategori_id'),
            'harga_beli' => $this->request->getPost('harga_beli'),
            'harga_jual' => $this->request->getPost('harga_jual'),
            'stok' => $this->request->getPost('stok')
        ]);

        return redirect()->to('/produk');
    }

    public function edit($id)
{
    $model = new ProdukModel();

    $data['produk'] = $model->find($id);

    return view('produk/edit', $data);
}

public function update($id)
{
    $model = new ProdukModel();

    $model->update($id, [
        'nama_produk' => $this->request->getPost('nama_produk'),
        'harga_beli' => $this->request->getPost('harga_beli'),
        'harga_jual' => $this->request->getPost('harga_jual'),
        'stok' => $this->request->getPost('stok')
    ]);

    return redirect()->to('/produk');
}

public function hapus($id)
{
    $model = new ProdukModel();

    $model->delete($id);

    return redirect()->to('/produk');
}

public function export()
{
    $model = new ProdukModel();
    $produk = $model->findAll();

    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();

    $sheet->setCellValue('A1', 'No');
    $sheet->setCellValue('B1', 'Nama Produk');
    $sheet->setCellValue('C1', 'Harga Beli');
    $sheet->setCellValue('D1', 'Harga Jual');
    $sheet->setCellValue('E1', 'Stok');

    $row = 2;
    $no = 1;

    foreach ($produk as $p) {
        $sheet->setCellValue('A' . $row, $no++);
        $sheet->setCellValue('B' . $row, $p['nama_produk']);
        $sheet->setCellValue('C' . $row, $p['harga_beli']);
        $sheet->setCellValue('D' . $row, $p['harga_jual']);
        $sheet->setCellValue('E' . $row, $p['stok']);
        $row++;
    }

    $writer = new Xlsx($spreadsheet);

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="laporan_produk.xlsx"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
    exit;
}

public function importForm()
{
    return view('produk/import');
}

public function import()
{
    $file = $this->request->getFile('file_excel');

    if ($file->isValid() && !$file->hasMoved()) {
        $spreadsheet = IOFactory::load($file->getTempName());
        $sheetData = $spreadsheet->getActiveSheet()->toArray();

        $model = new ProdukModel();

        foreach ($sheetData as $index => $row) {
            if ($index === 0) {
                continue; // Skip header row
            }

            $data = [
                'nama_produk' => $row[0],
                'harga_beli' => $row[1],
                'harga_jual' => $row[2],
                'stok' => $row[3],
            ];

            $model->insert($data);
        }

session()->setFlashdata(
    'success',
    'Import produk berhasil!'
);
session()->setFlashdata('success', 'Produk berhasil ditambahkan!');
session()->setFlashdata('success', 'Produk berhasil diupdate!');
session()->setFlashdata('success', 'Produk berhasil dihapus!');

return redirect()->to('/produk');    } else {
        return redirect()->back()->with('error', 'File upload failed.');
    }
}
}