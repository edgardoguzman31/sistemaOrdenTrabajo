<?php 

namespace App\Models;
use CodeIgniter\Model;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Alignment;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Fill;

class Ssm extends Model
{
    protected $table = 'ssmoperacion';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'id',
        'area',
        'fecha',
        'linea',
        'autor',
        'no_empl',
        'sintoma_averia',
        'descripcion_trabajo',
        'departamento',
        'prioridad',
        'no_ot',
        'no_st',
        'created_at'
    ];

    public function obtenerDatos()
    {
        $data = $this->findAll(); // Obtiene todos los registros de la tabla
        //var_dump($data); // Verifica los datos recuperados
        return $data;
    }

    public function obtenerPorId($id)
    {
        return $this->find($id);
    }

    public function updateDash($id, $data) {
        $this->db->table('ssmoperacion')->where('id', $id)->update($data);
    }

    public function deleteDash($id) {
        $result= $this->db->table('ssmoperacion')->where('id', $id)->delete();
    }
    
    public function obtenerDatosSinNoOTNoST()
    {
        return $this->where('(no_ot = "" OR no_st = "")')->findAll();
    }


    public function obtenerDatosConNoOTNoST()
    {
        return $this->where('no_ot !=', '')->where('no_st !=', '')->findAll();
    }

    public function contarEnviados()
    {
        return $this->where('no_ot !=', '')->where('no_st !=', '')->countAllResults();
    }

    public function contarEnEspera()
    {
        return $this->where('(no_ot = "" OR no_st = "")')->countAllResults();
    }



    public function exportarExcel($filename = 'ssm_data.xlsx')
    {
        $data = $this->findAll(); // Obtiene todos los registros de la tabla

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Aplicar estilos al encabezado
        $headerStyle = [
            'font' => [
                'bold' => true,
                'color' => ['rgb' => 'FFFFFF'],
                'name' => 'Times New Roman',
                'size' => 16,
            ],
            'fill' => [
                'fillType' => Fill::FILL_SOLID,
                'startColor' => ['rgb' => '0067B3'],
            ],
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];

        $sheet->getStyle('A1:N1')->applyFromArray($headerStyle); // Aplicar estilo desde A1 hasta O1

        // Aplicar estilos a las celdas de datos
        $dataStyle = [
            'borders' => [
                'allBorders' => [
                    'borderStyle' => Border::BORDER_THIN,
                    'color' => ['rgb' => '000000'],
                ],
            ],
        ];

        $sheet->getStyle('A2:' . $sheet->getHighestColumn() . $sheet->getHighestRow())->applyFromArray($dataStyle);

        // Encabezados de columna
        $headers = array_keys($data[0]);
        $sheet->fromArray($headers, null, 'A1');

        // Datos
        $sheet->fromArray($data, null, 'A2');

        // Ajustar automáticamente el ancho de las columnas
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        // Aplicar bordes a las filas de datos
        foreach (range(2, $sheet->getHighestRow()) as $row) {
            $sheet->getStyle('A' . $row . ':' . $sheet->getHighestColumn() . $row)->applyFromArray([
                'borders' => [
                    'allBorders' => [
                        'borderStyle' => Border::BORDER_THIN,
                        'color' => ['rgb' => '000000'],
                    ],
                ],
            ]);
        }

        // Guardar el archivo
        $writer = new Xlsx($spreadsheet);
        $path = WRITEPATH . 'uploads/' . $filename;
        $writer->save($path);

        return $path;
    }
}
