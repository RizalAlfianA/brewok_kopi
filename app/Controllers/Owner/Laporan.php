<?php

namespace App\Controllers\Owner;

use App\Controllers\BaseController;
use App\Models\PesananModel;
use Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporan extends BaseController
{
    protected $pesanan;

    public function __construct()
    {
        $this->pesanan = new PesananModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Laporan Bisnis'
        ];

        $tanggal_awal = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {
            $data['laporan'] = $this->pesanan
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir)
                ->findAll();
        } else {
            $data['laporan'] = $this->pesanan
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }

        $data['total'] = array_sum(array_column($data['laporan'], 'total'));

        return view('owner/laporan/index', $data);
    }

    public function exportPdf()
    {
        $tanggal_awal  = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {

            $laporan = $this->pesanan
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir)
                ->findAll();

        } else {

            $laporan = $this->pesanan
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }

        $data['laporan'] = $laporan;
        $data['total']   = array_sum(array_column($laporan, 'total'));

        $html = view('owner/laporan/pdf', $data);

        $dompdf = new \Dompdf\Dompdf();
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();
        $dompdf->stream("laporan.pdf", ["Attachment" => false]);
    }

    public function exportExcel()
    {
        $tanggal_awal  = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {

            $laporan = $this->pesanan
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir)
                ->findAll();

        } else {

            $laporan = $this->pesanan
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }

        $spreadsheet = new \PhpOffice\PhpSpreadsheet\Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Total');

        $row = 2;
        $no = 1;

        foreach ($laporan as $l) {
            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $l['tanggal']);
            $sheet->setCellValue('C' . $row, $l['total']);
            $row++;
        }

        $writer = new \PhpOffice\PhpSpreadsheet\Writer\Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="laporan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }
}