<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use App\Exports\ReportsExport;
use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\IOFactory;
use PhpOffice\PhpWord\Settings;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Collection;
use TCPDF;

class ExportController extends Controller
{
    public function excel(Request $request)
    {

        $dateRangeExcell = $request->input('dateRangeExcell');


        if ($dateRangeExcell) {

            [$startDate, $endDate] = explode(' to ', $dateRangeExcell);


            $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));


            $reports = Report::with('user')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();
        } else {

            $reports = Report::with('user')->get();
        }


        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();


        $sheet->setCellValue('A1', 'User Name');
        $sheet->setCellValue('B1', 'User Email');
        $sheet->setCellValue('C1', 'Report Title');
        $sheet->setCellValue('D1', 'Report Description');
        $sheet->setCellValue('E1', 'Status');
        $sheet->setCellValue('F1', 'Created At');


        $row = 2;
        foreach ($reports as $report) {
            $sheet->setCellValue('A' . $row, $report->user->name);
            $sheet->setCellValue('B' . $row, $report->user->email);
            $sheet->setCellValue('C' . $row, $report->report_title);
            $sheet->setCellValue('D' . $row, $report->report_description);
            $sheet->setCellValue('E' . $row, $report->status);
            $sheet->setCellValue('F' . $row, $report->created_at);
            $row++;
        }


        $writer = new Xlsx($spreadsheet);

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="reports.xlsx"');
        header('Cache-Control: max-age=0');


        $writer->save('php://output');
    }



    public function pdf(Request $request)
    {

        $dateRange = $request->input('dateRangePdf');


        if ($dateRange) {

            [$startDate, $endDate] = explode(' to ', $dateRange);


            $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));


            $reports = Report::with('user')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();
        } else {

            $reports = Report::with('user')->get();
        }


        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator('uhrzel');
        $pdf->SetAuthor('Muslim Affairs Administrator');
        $pdf->SetTitle('Reports PDF');
        $pdf->SetSubject('Reports PDF');


        $pdf->AddPage();


        $html = '<h1>Reports</h1>';
        $html .= '<table class="table">';
        $html .= '<thead><tr><th>User Name</th><th>User Email</th><th>Report Title</th><th>Report Description</th><th>Status</th><th>Created At</th></tr></thead>';
        $html .= '<tbody>';


        foreach ($reports as $report) {
            $html .= '<tr>';
            $html .= '<td>' . $report->user->name . '</td>';
            $html .= '<td>' . $report->user->email . '</td>';
            $html .= '<td>' . $report->report_title . '</td>';
            $html .= '<td>' . $report->report_description . '</td>';
            $html .= '<td>' . $report->status . '</td>';
            $html .= '<td>' . $report->created_at . '</td>';
            $html .= '</tr>';
        }

        $html .= '</tbody></table>';
        $pdf->writeHTML($html);


        $pdfContent = $pdf->Output('reports.pdf', 'S');

        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="reports.pdf"');
    }

    public function word(Request $request)
    {

        $dateRange = $request->input('dateRangeWord');


        if ($dateRange) {

            [$startDate, $endDate] = explode(' to ', $dateRange);


            $endDate = date('Y-m-d', strtotime($endDate . ' +1 day'));


            $reports = Report::with('user')
                ->whereBetween('created_at', [$startDate, $endDate])
                ->get();
        } else {

            $reports = Report::with('user')->get();
        }


        $phpWord = new PhpWord();

        // Set document properties
        $phpWord->getDocInfo()->setCreator('uhrzel');
        $phpWord->getDocInfo()->setCompany('Muslim Affairs Administration');
        $phpWord->getDocInfo()->setTitle('Reports Word');
        $phpWord->getDocInfo()->setDescription('Reports exported as Word document');
        $phpWord->getDocInfo()->setSubject('Reports');


        $section = $phpWord->addSection();


        $section->addTitle('Reports', 1);

        // Add a table
        $table = $section->addTable();
        $table->addRow();
        $table->addCell(2000)->addText('User Name');
        $table->addCell(2000)->addText('User Email');
        $table->addCell(2000)->addText('Report Title');
        $table->addCell(2000)->addText('Report Description');
        $table->addCell(1000)->addText('Status');
        $table->addCell(1500)->addText('Created At');

        foreach ($reports as $report) {
            $table->addRow();
            $table->addCell()->addText($report->user->name);
            $table->addCell()->addText($report->user->email);
            $table->addCell()->addText($report->report_title);
            $table->addCell()->addText($report->report_description);
            $table->addCell()->addText($report->status);
            $table->addCell()->addText($report->created_at);
        }


        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('app/reports.docx'));


        return response()->download(storage_path('app/reports.docx'));
    }
}
