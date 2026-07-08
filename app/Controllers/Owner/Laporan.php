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
        $laporan = $this->getLaporanPaginate();

        $tanggal_awal  = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        $totalBuilder = clone $this->pesanan;

        if ($tanggal_awal && $tanggal_akhir) {

            $totalBuilder
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir);

        }

        $total = array_sum(array_column($totalBuilder->findAll(), 'total'));

        $data = [
            'title'          => 'Laporan Bisnis',
            'laporan'        => $laporan,
            'pager'          => $this->pesanan->pager,
            'total'          => $total,
            'tanggal_awal'   => $tanggal_awal,
            'tanggal_akhir'  => $tanggal_akhir
        ];

        return view('owner/laporan/index', $data);
    }

    public function exportPdf()
    {
        $laporan = $this->getLaporan();

        $data = [
            'laporan' => $laporan,
            'total'   => array_sum(array_column($laporan, 'total'))
        ];

        $html = view('owner/laporan/pdf', $data);

        // ================= GENERATE PDF =================

        $dompdf = new Dompdf();

        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'portrait');
        $dompdf->render();

        $dompdf->stream('laporan.pdf', [
            'Attachment' => false
        ]);
    }

    public function exportExcel()
    {
        $laporan = $this->getLaporan();

        // ================= SPREADSHEET =================

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // ================= HEADER =================

        $sheet->setCellValue('A1', 'No');
        $sheet->setCellValue('B1', 'Tanggal');
        $sheet->setCellValue('C1', 'Total');

        // ================= DATA =================

        $row = 2;
        $no  = 1;

        foreach ($laporan as $l) {

            $sheet->setCellValue('A' . $row, $no++);
            $sheet->setCellValue('B' . $row, $l['tanggal']);
            $sheet->setCellValue('C' . $row, $l['total']);

            $row++;
        }

        // ================= EXPORT EXCEL =================

        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="laporan.xlsx"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }

    // ================= FUNCTION FILTER LAPORAN =================

    private function getLaporan()
    {
        $tanggal_awal  = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        if ($tanggal_awal && $tanggal_akhir) {

            return $this->pesanan
                ->where('DATE(tanggal) >=', $tanggal_awal)
                ->where('DATE(tanggal) <=', $tanggal_akhir)
                ->orderBy('tanggal', 'DESC')
                ->findAll();
        }

        return $this->pesanan
            ->orderBy('tanggal', 'DESC')
            ->findAll();
    }

    private function getLaporanPaginate()
    {
        $tanggal_awal  = $this->request->getGet('tanggal_awal');
        $tanggal_akhir = $this->request->getGet('tanggal_akhir');

        $builder = $this->pesanan->orderBy('tanggal', 'DESC');

        if ($tanggal_awal && $tanggal_akhir) {

            $builder->where('DATE(tanggal) >=', $tanggal_awal)
                    ->where('DATE(tanggal) <=', $tanggal_akhir);

        }

        return $builder->paginate(100);
    }
}