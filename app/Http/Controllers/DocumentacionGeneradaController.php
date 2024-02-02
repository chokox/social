<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CatalogoMunicipio;
use App\Models\Buzone;
use PDF;
use App\Models\IntegrantesComite;
use QrCode;

class DocumentacionGeneradaController extends Controller
{
    public function constanciaMunicipio($id)
    {
        $datos = CatalogoMunicipio::MunicipioYAcreditacion($id)->get();
        $meses3 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $fecha3 = Carbon::parse($datos[0]->fecha_validado);
        $mes3 = $meses3[$fecha3->format('n') - 1];
        $input3 = $fecha3->format('d') . ' de ' . $mes3 . ' de ' . $fecha3->format('Y');

        $tbl =
            '<br><br><br><div align="center">
               <font style="color:#616161;"> El Gobierno Constitucional del Estado de Oaxaca a través de la
Secretaría de Honestidad, Transparencia y Función Pública del
Poder Ejecutivo del Estado de Oaxaca, expide con carácter
honorífico la presente:</font><br><br><br>
<strong><font size="50" style="color:#9D2449;">CONSTANCIA</font><br><br><br><br>
al municipio de:</strong><br><br><br><font size="35" style="color:#9D2449;">
' .
            $datos[0]->nombre .
            '</font><br><font style="color:#B38E5D;">REGIÓN ' .
            $datos[0]->region .
            ' / DISTRITO ' .
            $datos[0]->distrito .
            '</font><br><br><br>
            Por su participación y contribución en el Taller de<br>
<strong>Capacitación en Materia de Contraloría Social.<br><br><br><br><br><br><br>

Lic. María Teresa Jiménez Martínez<br>
Directora de Contraloría Social</strong><br><br><br><br></div>
<table >
  <tr>
    <td><font style="color:#616161;">Tlalixtac de Cabrera, ' .
            $input3 .
            '</font></td>
    <td align="right"><strong><font style="color:#B38E5D;">www.oaxaca.gob.mx/</font><font style="color:#9D2449;">honestidad</font></strong></td>
  </tr>
</table>
';

        PDF::setHeaderCallback(function ($pdf) {
            // Agregar la imagen a la página
            $pdf->Image('grecas.jpg', 185, 0, 50, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('grecas.jpg', 185, 240, 50, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('cs.png', 15, 10, 180, 28, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('abajo.jpg', -8, 270, 0, 8, '', '', '', false, 300, '', false, false, 0);
        });

        PDF::SetAuthor('Contraloria Social');
        PDF::SetTitle('Constancia de municipio');
        PDF::SetSubject('SERAP');
        PDF::SetMargins(20, 30, 25);
        PDF::SetFontSubsetting(false);
        PDF::SetAutoPageBreak(true, 10);
        PDF::AddPage('P', 'LETTER');
        // PDF::SetFont('Montserrat-Regular', '', 14);
        PDF::SetFont('times', '', '13');
        PDF::writeHTML($tbl, true, false, true, false, '');
        //PDF::AddPage();
        PDF::Output('Constancia de municipio.pdf', 'I');
    }

    public function constanciaIntegrante($id)
    {
        $datos = IntegrantesComite::IntegranteComiteMunicipio($id)->get();

        $meses3 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $fecha3 = Carbon::parse($datos[0]->fecha_validado);
        $mes3 = $meses3[$fecha3->format('n') - 1];
        $input3 = $fecha3->format('d') . ' de ' . $mes3 . ' de ' . $fecha3->format('Y');

        $tbl = '<br><br><div align="center">
               <font style="color:#616161;"> La Secretaría de Honestidad, Transparencia y Función Pública del
Poder Ejecutivo del Estado de Oaxaca, con fundamento en el Título II,
Capítulo I, Apartado séptimo de los Lineamientos para la Integración,
Funcionamiento y Promoción de la Contraloría Social en el Estado de
Oaxaca, expide con carácter honorífico la presente:
</font><br><br><br>
<strong><font size="30" style="color:#9D2449;">CONSTANCIA DE
ACREDITACIÓN</font><br><br>';
        if ($datos[0]->sexo == 'HOMBRE') {
            $tbl .= ' al contralor social<br><br><font size="20" style="color:#9D2449;">C. ' . $datos[0]->nombre_completo . '</font>';
        } else {
            $tbl .= ' a la contralora social<br><br><font size="20" style="color:#9D2449;">C. ' . $datos[0]->nombre_completo . '</font>';
        }
        $tbl .=
            '
</strong><br>
<br><font style="color:#616161;">Integrante al Comité de Contraloría Social del Municipio </font><br><br><font size="20" style="color:#9D2449;">' .
            $datos[0]->nombre .
            '</font><br><font style="color:#616161;">Folio comite: ' .
            $datos[0]->folio_comite .
            ' <br><br><br>
            Quien se desempeñará por el período de gestión de enero a diciembre del 2024.
Lo anterior, para realizar actividades y funciones de vigilancia, verificación, seguimiento, 
y evaluación de las obras y programas sociales que se ejecuten con 
recursos públicos federales, estatales y municipales.</font><br><br><br><br><br><br><br>
<strong>
Lic. María Teresa Jiménez Martínez<br>
Directora de Contraloría Social</strong><br><br></div>
<table >
  <tr>
    <td><font style="color:#616161;">Tlalixtac de Cabrera, ' .
            $input3 .
            '</font></td>
    <td align="right"><strong><font style="color:#B38E5D;">www.oaxaca.gob.mx/</font><font style="color:#9D2449;">honestidad</font></strong></td>
  </tr>
</table>
';

        PDF::setHeaderCallback(function ($pdf) {
            // Agregar la imagen a la página
            $pdf->Image('grecas.jpg', 185, 0, 50, null, '', '', '', false, 500, '', false, false, 0);
            $pdf->Image('grecas.jpg', 185, 240, 50, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('grecas.jpg', 185, 240, 50, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('cs.png', 15, 10, 180, 28, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('abajo.jpg', -8, 270, 0, 8, '', '', '', false, 300, '', false, false, 0);
        });

        PDF::SetAuthor('Contraloria Social');
        PDF::SetTitle('Constancia de integrante');
        PDF::SetSubject('Contraloria Social');
        PDF::SetMargins(20, 30, 25);
        PDF::SetFontSubsetting(false);
        PDF::SetAutoPageBreak(true, 10);
        PDF::AddPage('P', 'LETTER');
        // PDF::SetFont('Montserrat-Regular', '', 14);
        PDF::SetFont('times', '', '13');
        PDF::writeHTML($tbl, true, false, true, false, '');
        //PDF::AddPage();
        PDF::Output('Constancia de integrante.pdf', 'I');
    }

    public function credencialIntegrante($id)
    {
        $dat = IntegrantesComite::TodosIntegranteComite($id)->get();
        $ano = now()->year;
        $arrayDatos = $dat->toArray();
        $grupos = array_chunk($arrayDatos, 3);

        PDF::SetAuthor('Contraloria Social');
        PDF::SetTitle('Credenciales');
        PDF::SetSubject('Contraloria Social');
        PDF::SetMargins(20, 15, 25);
        PDF::SetFontSubsetting(false);
        PDF::SetAutoPageBreak(true, 10);

        PDF::setHeaderCallback(function ($pdf) use ($ano) {
            // Agregar la imagen a la página
            $pdf->Image('credencial.png', 20, 15, null, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('credencial.png', 90, 15, null, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('credencial.png', 160, 15, null, null, '', '', '', false, 300, '', false, false, 0);
            // Texto volteado
            $pdf->StartTransform();
            $pdf->SetFont('times', 'B', 11);
            $pdf->Rotate(180, 43, 80);
            $pdf->Text(50, 26, $ano);
            $pdf->StopTransform();

            $pdf->StartTransform();
            $pdf->SetFont('times', 'B', 11);
            $pdf->Rotate(180, 78, 92);
            $pdf->Text(50, 50, $ano);
            $pdf->StopTransform();

            $pdf->StartTransform();
            $pdf->SetFont('times', 'B', 11);
            $pdf->Rotate(180, 113, 102);
            $pdf->Text(50, 70, $ano);
            $pdf->StopTransform();
        });

        for ($i = 0; $i < count($grupos); $i++) {
            $tbl = '<table><tr>';

            foreach ($grupos[$i] as $datos) {
                // Construye la tabla para cada elemento del grupo actual
                $tbl .=
                    '
            <td width="198">
                <div align="center"><strong>
                <br><br>
                        <font style="color:#285C4D;" size="11"> ' .
                    $datos['nombre_completo'] .
                    '</font><br><br>';
                $imageUrl = 'storage/' . $datos['archivo_fotografia'];
                if ($imageUrl == 'storage/') {
                    $tbl .= '
                        <img src="perfil.jpg" alt="foto" style="width: 60px; height: 60px; margin-top: 10mm;"><br>';
                } else {
                    $tbl .=
                        '
                        <img src="' .
                        $imageUrl .
                        '" alt="foto"
                            style="width: 70px; height: 70px; margin-top: 10mm;"><br>';
                }
                if ($datos['sexo'] == 'HOMBRE') {
                    $tbl .=
                        '<font style="color:#B38E5D;" size="11">CONTRALOR SOCIAL</font><br>
                        <font style="color:#9D2449;" size="11">' .
                        $datos['nombre'] .
                        '</font><br>
                         <font style="color:#9D2449;" size="11"><strong>' .
                        $datos['folio_comite'] .
                        '</strong>
                    </font>';
                } else {
                    $tbl .=
                        '<font style="color:#B38E5D;">CONTRALORA SOCIAL</font><br>
                        <font style="color:#9D2449;">' .
                        $datos['nombre'] .
                        '</font><br>
                         <font style="color:#9D2449;" ><strong>' .
                        $datos['folio_comite'] .
                        '</strong>
                    </font>';
                }
                $tbl .= '
                       <br><br><br>
                        Lic. María Teresa Jiménez Martínez<br>
                    </strong>
                    Directora de Contraloría Social<br>
                </div>
                
            </td>
            ';
            }

            $tbl .= '</tr></table>';

            PDF::AddPage('L', 'LETTER');
            PDF::SetFont('times', '', '11');
            PDF::writeHTML($tbl, true, false, true, false, '');
        }

        //PDF::AddPage();
        PDF::Output('Credenciales.pdf', 'I');
    }


}
