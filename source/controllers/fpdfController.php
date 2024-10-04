<?php
require_once 'source/models/MYSQL.php';
require_once 'source/models/reportModel.php';
require('libraries/fpdf/fpdf.php');
date_default_timezone_set('America/Bogota');

class PDF extends FPDF {
    function Footer() {
        $this->SetY(-15);
        $this->SetFont('Arial', 'I', 8);
        $fecha_generacion = date('Y-m-d H:i:s');
        $this->Cell(0, 10, utf8_decode('Fecha de generación: ') . $fecha_generacion, 0, 0, 'L');
        $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . ' de {nb}', 0, 0, 'R');
    }
}

class FpdfController{
    private $reportModel;

    function __construct(){
        $this->reportModel = new ReportModel();
    }
///////////////////////////////////////////////////////////////////////////////////////
    function reportAprendiz(){

    $consulta = $this->reportModel->aprendizReport();
    // Reiniciar el puntero de la consulta para poder leer nuevamente los estudiantes
    mysqli_data_seek($consulta, 0);

    $pdf = new PDF('P', 'mm', 'Letter');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', 'B', 16);
    $pdf->Cell(0, 10, utf8_decode('Reporte'), 0, 1, 'C');
    $pdf->Cell(0, 10, utf8_decode('Reporte de aprendices'), 0, 1, 'C');
    $pdf->SetFont('Arial', '', 10);

    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetFillColor(144, 238, 144);

    // Ancho de columnas
    $ancho_columna_documento = 60;
    $ancho_columna_nombre = 40;
    $ancho_columna_apellido = 40;
    $ancho_columna_genero = 40;
    $ancho_columna_curso = 40;
    $ancho_columna_nacimiento = 60;
    $ancho_columna_telefono = 40;
    $ancho_columna_correo = 40;
    $ancho_columna_creación = 60;

    // Ajustar el ancho total de las columnas para que se ajuste al ancho de la página
    $ancho_total = $ancho_columna_documento + $ancho_columna_nombre + $ancho_columna_apellido + $ancho_columna_genero + $ancho_columna_curso + $ancho_columna_nacimiento + $ancho_columna_telefono + $ancho_columna_correo + $ancho_columna_creación;
    $margen_izquierdo = 10;
    $margen_derecho = 10;
    $ancho_pagina = 210; // Ancho de la hoja tamaño carta en mm
    $ancho_disponible = $ancho_pagina - $margen_izquierdo - $margen_derecho;

    // Calcular el factor de escala
    $factor_escala = $ancho_disponible / $ancho_total;

    // Aplicar el factor de escala
    $ancho_columna_documento *= $factor_escala;
    $ancho_columna_nombre *= $factor_escala;
    $ancho_columna_apellido *= $factor_escala;
    $ancho_columna_genero *= $factor_escala;
    $ancho_columna_curso *= $factor_escala;
    $ancho_columna_nacimiento *= $factor_escala;
    $ancho_columna_telefono *= $factor_escala;
    $ancho_columna_correo *= $factor_escala;
    $ancho_columna_creación *= $factor_escala;

    // Imprimir encabezados
    $pdf->Cell($ancho_columna_documento, 10, 'Numero documento', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_nombre, 10, 'nombre', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_apellido, 10, 'apellido', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_genero, 10, 'genero', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_curso, 10, 'curso', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_nacimiento, 10, 'fecha nacimiento', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_telefono, 10, 'telefono', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_correo, 10, 'correo', 1, 0, 'C', true);
    $pdf->Cell($ancho_columna_creación, 10, 'fecha de creacion', 1, 1, 'C', true);

    // Rellenar datos
   $color_bandera = true;  // Bandera para alternar colores

while ($row = mysqli_fetch_array($consulta)) {
    // Alternar entre blanco y gris claro
    if ($color_bandera) {
        $pdf->SetFillColor(255, 255, 255);  // Blanco
    } else {
        $pdf->SetFillColor(211, 211, 211);  // Gris claro (Light Gray)
    }

    // Cambiar la fuente y rellenar con el color actual
    $pdf->SetFont('Arial', '', 10);

    // Imprimir celdas con el color de fondo
    $pdf->Cell($ancho_columna_documento, 10, utf8_decode($row['documento']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_nombre, 10, utf8_decode($row['nombre']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_apellido, 10, utf8_decode($row['apellido']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_genero, 10, utf8_decode($row['genero']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_curso, 10, utf8_decode($row['curso']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_nacimiento, 10, utf8_decode($row['fecha de nacimiento']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_telefono, 10, utf8_decode($row['telefono']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_correo, 10, utf8_decode($row['correo']), 1, 0, 'L', true);
    $pdf->Cell($ancho_columna_creación, 10, utf8_decode($row['fecha de creacion']), 1, 0, 'L', true);
    

    // Salto de línea
    $pdf->Ln();

    // Alternar la bandera para cambiar el color en la siguiente fila
    $color_bandera = !$color_bandera;
}

    $nombreArchivo = 'reporte_Curso_' . date('Y-m-d_H-i-s') . '.pdf';
    $pdf->Output($nombreArchivo, 'D');
    exit;
        }

///////////////////////////////////////////////////////////////////////////////////////

        function reportAdmins(){
            $consulta = $this->reportModel->adminReport();
            // Reiniciar el puntero de la consulta para poder leer nuevamente los estudiantes
mysqli_data_seek($consulta, 0);

$pdf = new PDF('P', 'mm', 'Letter');
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 16);
$pdf->Cell(0, 10, utf8_decode('Reporte'), 0, 1, 'C');
$pdf->Cell(0, 10, utf8_decode('Reporte de admins'), 0, 1, 'C');
$pdf->SetFont('Arial', '', 12);

$pdf->SetFont('Arial', 'B', 10);
$pdf->SetFillColor(144, 238, 144);

// Ancho de columnas
    $ancho_columna_id = 10;
    $ancho_columna_usuario = 80;
    $ancho_columna_nombre = 40;
    $ancho_columna_apellido = 40;
    $ancho_columna_contrasena = 40;
    $ancho_columna_correo = 40;
  

    // Ajustar el ancho total de las columnas para que se ajuste al ancho de la página
    $ancho_total = $ancho_columna_id + $ancho_columna_nombre + $ancho_columna_usuario + $ancho_columna_apellido + $ancho_columna_contrasena + $ancho_columna_correo;
    $margen_izquierdo = 10;
    $margen_derecho = 10;
    $ancho_pagina = 210; // Ancho de la hoja tamaño carta en mm
    $ancho_disponible = $ancho_pagina - $margen_izquierdo - $margen_derecho;

    // Calcular el factor de escala
    $factor_escala = $ancho_disponible / $ancho_total;

    // Aplicar el factor de escala
    $ancho_columna_id *= $factor_escala;
    $ancho_columna_usuario *= $factor_escala;
    $ancho_columna_nombre *= $factor_escala;
    $ancho_columna_apellido *= $factor_escala;
    $ancho_columna_contrasena *= $factor_escala;
    $ancho_columna_correo *= $factor_escala;


// Imprimir encabezados
$pdf->Cell($ancho_columna_id, 10, 'ID', 1, 0, 'C', true);
$pdf->Cell($ancho_columna_usuario, 10, 'nombre usuario', 1, 0, 'C', true);
$pdf->Cell($ancho_columna_nombre, 10, 'nombre', 1, 0, 'C', true);
$pdf->Cell($ancho_columna_apellido, 10, 'apellido', 1, 0, 'C', true);
$pdf->Cell($ancho_columna_contrasena, 10, 'contrasena', 1, 0, 'C', true);
$pdf->Cell($ancho_columna_correo, 10, 'correo', 1, 1, 'C', true);

// Rellenar datos
$color_bandera = true;  // Bandera para alternar colores

while ($row = mysqli_fetch_array($consulta)) {
// Alternar entre blanco y gris claro
if ($color_bandera) {
$pdf->SetFillColor(255, 255, 255);  // Blanco
} else {
$pdf->SetFillColor(211, 211, 211);  // Gris claro (Light Gray)
}

// Cambiar la fuente y rellenar con el color actual
$pdf->SetFont('Arial', '', 10);

// Imprimir celdas con el color de fondo
$pdf->Cell($ancho_columna_id, 10, utf8_decode($row['ID']), 1, 0, 'L', true);
$pdf->Cell($ancho_columna_usuario, 10, utf8_decode($row['usuario']), 1, 0, 'L', true);
$pdf->Cell($ancho_columna_nombre, 10, utf8_decode($row['nombre']), 1, 0, 'L', true);
$pdf->Cell($ancho_columna_apellido, 10, utf8_decode($row['apellido']), 1, 0, 'L', true);
$pdf->Cell($ancho_columna_contrasena, 10, utf8_decode($row['contraseña']), 1, 0, 'L', true);
$pdf->Cell($ancho_columna_correo, 10, utf8_decode($row['correo']), 1, 0, 'L', true);


// Salto de línea
$pdf->Ln();

// Alternar la bandera para cambiar el color en la siguiente fila
$color_bandera = !$color_bandera;
}

$nombreArchivo = 'reporte_Curso_' . date('Y-m-d_H-i-s') . '.pdf';
$pdf->Output($nombreArchivo, 'D');
exit;
        }
    }


