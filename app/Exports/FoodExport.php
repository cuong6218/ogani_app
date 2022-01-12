<?php
namespace App\Exports;

use App\Http\Services\FoodService;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class FoodExport implements FromCollection, WithHeadings{
    public function __construct(FoodService $foodService) {
        $this->foodService = $foodService;
    }
    public function headings():array {
        return ['name', 'category', 'price', 'create day'];
    }
    public function collection () {
        return $this->foodService->getExportData();
    }
    public function columnFormats(): array{
        return [
            'D' => NumberFormat::FORMAT_DATE_DDMMYYYY
        ];
    }
}