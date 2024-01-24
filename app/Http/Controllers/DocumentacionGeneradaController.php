<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\CatalogoMunicipio;
use PDF;
use App\Models\IntegrantesComite;

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
            '</font><br><font style="color:#B38E5D;">Región de ' .
            $datos[0]->region .
            ' / Distrito de ' .
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

        PDF::SetAuthor('CS');
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
        PDF::Output('Constancia de municipio.pdf', 'D');
    }

    public function constanciaIntegrante($id)
    {
        $datos = IntegrantesComite::IntegranteComiteMunicipio($id)->get();
        
        $meses3 = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
        $fecha3 = Carbon::parse($datos[0]->fecha_validado);
        $mes3 = $meses3[$fecha3->format('n') - 1];
        $input3 = $fecha3->format('d') . ' de ' . $mes3 . ' de ' . $fecha3->format('Y');

        $tbl =
        '<br><br><div align="center">
               <font style="color:#616161;"> La Secretaría de Honestidad, Transparencia y Función Pública del
Poder Ejecutivo del Estado de Oaxaca, con fundamento en el Título II,
Capítulo I, Apartado séptimo de los Lineamientos para la Integración,
Funcionamiento y Promoción de la Contraloría Social en el Estado de
Oaxaca, expide con carácter honorífico la presente:
</font><br><br><br>
<strong><font size="30" style="color:#9D2449;">CONSTANCIA DE
ACREDITACIÓN</font><br><br>';
if ($datos[0]->sexo=='HOMBRE') {
            $tbl .= ' al contralor social<br><br><font size="20" style="color:#9D2449;">C. '. $datos[0]->nombre_completo. '</font>';
} else {
            $tbl .=
            ' a la contralora social<br><br><font size="20" style="color:#9D2449;">C. ' . $datos[0]->nombre_completo . '</font>';
}
        $tbl .= '
</strong><br>
<br><font style="color:#616161;">Integrante al Comité de Contraloría Social del Municipio </font><br><br><font size="20" style="color:#9D2449;">' .
            $datos[0]->nombre .
            '</font><br><font style="color:#616161;">Folio comite: ' . $datos[0]->folio_comite . ' <br><br><br>
            Quien se desempeñará por el período de gestión de enero a diciembre
de 2023. Lo anterior, para realizar actividades de vigilancia, verificación,
seguimiento, evaluación de las obras programadas, proyectos y
acciones que se ejecuten con recursos públicos federales, estatales y
municipales.</font><br><br><br><br><br><br><br>
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
            $pdf->Image('lcs.png', 15, 10, 180, 28, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('abajo.jpg', -8, 270, 0, 8, '', '', '', false, 300, '', false, false, 0);
        });

        PDF::SetAuthor('CS');
        PDF::SetTitle('Constancia de integrante');
        PDF::SetSubject('SERAP');
        PDF::SetMargins(20, 30, 25);
        PDF::SetFontSubsetting(false);
        PDF::SetAutoPageBreak(true, 10);
        PDF::AddPage('P', 'LETTER');
        // PDF::SetFont('Montserrat-Regular', '', 14);
        PDF::SetFont('times', '', '13');
        PDF::writeHTML($tbl, true, false, true, false, '');
        //PDF::AddPage();
        PDF::Output('Constancia de integrante.pdf', 'D');
    }

    public function credencialIntegrante($id)
    {
        $datos = IntegrantesComite::IntegranteComiteMunicipio($id)->get();
        $imageUrl = 'storage/' . $datos[0]->archivo_fotografia;
        $ano= now()->year;
        
        $tbl ='
        <table cellspacing="0" cellpadding="1" border="1">
        <tr>
            <td width="200">
                <div align="center"><strong>
                <br><br>
                        <font style="color:#616161;" size="14"> '.$datos[0]->nombre_completo . '</font><br><br>
                        <img src="' . $imageUrl . '" alt="foto"
                            style="width: 70px; height: 70px; margin-top: 10mm;"><br>';
                        if ($datos[0]->sexo == 'HOMBRE') {
                        $tbl .=
                        '<font style="color:#B38E5D;">CONTRALOR SOCIAL</font><br>
                        <font style="color:#9D2449;" size="12">' . $datos[0]->nombre . '</font><br>';
                        } else {
                        $tbl .=
                        '<font style="color:#B38E5D;">CONTRALORA SOCIAL</font><br>
                        <font style="color:#9D2449;" size="12">' . $datos[0]->nombre . '</font><br>';
                        }
                        $tbl .= '
                        <br>
                        <br>
                        <br>
                        Lic. María Teresa Jiménez Martínez<br>
                    </strong>
                    Directora de Contraloría Social<br><br><br><br>
                    Folio comite: <font style="color:#9D2449;" size="14"><strong>' . $datos[0]->folio_comite . '</strong>
                    </font> <br><br><br>
                    Lada sin costo:<br>
                    <font style="color:#9D2449;">01 951 50 15000 <br>Ext. 11704, 11705, 10192 y 104772 </font><br><br>
                    Personalmente
                    <br>
                    <font style="color:#9D2449;">Ciudad Administrativa, Edificio 2 "Rufino Tamayo", Planta baja, Carretera
                        Internacional Oaxaca-Istmo Km 11.5, Tlalixtac de Cabrera, Oaxaca.</font><br><br>
                    <strong>Vigencia al 31 de diciembre del ' . $ano . '</strong>
                </div>
                <div align="center"><strong>
                        <font style="color:#B38E5D;">www.oaxaca.gob.mx/</font>
                        <font style="color:#9D2449;">honestidad</font>
                    </strong></div>
            </td>
            <td width="200">Hola 2</td>
            <td width="200">Hola 3</td>
        </tr>
        </table>
';

        PDF::setHeaderCallback(function ($pdf) use ($tbl){
            // Agregar la imagen a la página
            $pdf->Image('grecas.jpg', 70, 22, null, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('grecas.jpg', 140, 22, null, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('grecas.jpg', 210, 22, null, null, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('cs.png', 17, 25, 75, 12, '', '', '', false, 100, '', false, false, 0);
            $pdf->Image('abajo1.png', 20, 113, 0, 5, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('abajo1.png', 20, 108, 0, 5, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('abajo1.png', 55, 108, 0, 5, '', '', '', false, 300, '', false, false, 0);
            $pdf->Image('abajo1.png', 55, 113, 0, 5, '', '', '', false, 300, '', false, false, 0);
            $pdf->StartTransform();
            
            $pdf->Rotate(180, 50, 50);
            $pdf->writeHTMLCell(100, 100, 50, 50, $tbl, 1, 0, 0, true, '', true);
            //$pdf->Text(0,22, 'MirrorP');
            $pdf->StopTransform(); 
            


            

        });

        PDF::SetAuthor('CS');
        PDF::SetTitle('Constancia de municipio');
        PDF::SetSubject('SERAP');
        PDF::SetMargins(20, 22, 25);
        PDF::SetFontSubsetting(false);
        PDF::SetAutoPageBreak(true, 10);
        PDF::AddPage('L', 'LETTER');
        // PDF::SetFont('Montserrat-Regular', '', 14);
        PDF::SetFont('times', '', '11');
        PDF::writeHTML($tbl, true, false, true, false, '');
        
        //PDF::AddPage();
        PDF::Output('Constancia de municipio.pdf', 'I');
    }
}
