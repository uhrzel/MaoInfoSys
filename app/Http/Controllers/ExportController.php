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
    public function excel()
    {
        // Fetch reports from the database along with user information
        $reports = Report::with('user')->get();

        // Create a new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Add headers
        $sheet->setCellValue('A1', 'User Name');
        $sheet->setCellValue('B1', 'User Email');
        $sheet->setCellValue('C1', 'Report Title');
        $sheet->setCellValue('D1', 'Report Description');
        $sheet->setCellValue('E1', 'Status');
        $sheet->setCellValue('F1', 'Created At');

        // Add data from the reports
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

        // Create a new Excel writer object
        $writer = new Xlsx($spreadsheet);

        // Set headers for download
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="reports.xlsx"');
        header('Cache-Control: max-age=0');

        // Write the spreadsheet to the response
        $writer->save('php://output');
    }


    public function pdf()
    {
        // Fetch reports from the database along with user information
        $reports = Report::with('user')->get();

        // Create new PDF document
        $pdf = new TCPDF();

        // Set document information
        $pdf->SetCreator('uhrzel');
        $pdf->SetAuthor('Muslim Affairs Administrator');
        $pdf->SetTitle('Reports PDF');
        $pdf->SetSubject('Reports PDF');

        // Add a page
        $pdf->AddPage();

        // Start building the HTML content for the PDF
        $html = '<h1>Reports</h1>';
        $html .= '<table class="table">';
        $html .= '<thead><tr><th>User Name</th><th>User Email</th><th>Report Title</th><th>Report Description</th><th>Status</th><th>Created At</th></tr></thead>';
        $html .= '<tbody>';

        // Loop through each report and add it to the HTML content
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

        // Output the HTML content to the PDF
        $pdf->writeHTML($html);

        // Close and output PDF
        $pdfContent = $pdf->Output('reports.pdf', 'S');

        // Return the PDF as a response
        return response($pdfContent)
            ->header('Content-Type', 'application/pdf')
            ->header('Content-Disposition', 'attachment; filename="reports.pdf"');
    }
    public function word()
    {
        // Fetch reports from the database along with user information
        $reports = Report::with('user')->get();

        // Create a new PhpWord object
        $phpWord = new PhpWord();

        // Set document properties
        $phpWord->getDocInfo()->setCreator('uhrzel');
        $phpWord->getDocInfo()->setCompany('Muslim Affairs Administration');
        $phpWord->getDocInfo()->setTitle('Reports Word');
        $phpWord->getDocInfo()->setDescription('Reports exported as Word document');
        $phpWord->getDocInfo()->setSubject('Reports');

        // Add a section
        $section = $phpWord->addSection();

        // Add a title
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

        // Save the document
        $objWriter = IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save(storage_path('app/reports.docx'));

        // Download the document
        return response()->download(storage_path('app/reports.docx'));
    }
}
