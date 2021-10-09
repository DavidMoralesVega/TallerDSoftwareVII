<?php

date_default_timezone_set('America/La_Paz');

require_once '../../../models/sale.model.php';

class Report
{

    public $IdSale;

    public function Data()
    {

        $IdSale = $this->IdSale;

        $DataSale = SaleModels::GetDataSaleWhereModel($IdSale);
        $DataSaleDetaill = SaleModels::GetDataSaleDetaillWhereModel($IdSale);


        // Estilos
        $colordmv = '#2E2E2E';
        $colorlight = '#F8F9FA';
        $styleth = 'padding: 18px; text-align: center; border: 1px solid ' . $colordmv . '; background-color:' . $colordmv . '; font-weight: bold; color:white;';
        $styletd = 'padding: 18px; text-align: center; border: 1px solid ' . $colordmv . '; background-color:' . $colorlight . '; font-weight: bold; color:black;';

        // Incluir la libreria

        require_once('tcpdf_include.php');

        // Configuracion del papel
        $width = 215.9;
        $height = 279.4;
        $pageLayout = array($width, $height);

        // Crear pagina con la libreria
        $pdf = new TCPDF('p', 'mm', $pageLayout, true, 'UTF-8', false);
        $pdf->startPageGroup();
        $pdf->AddPage();

        $BloqueHeader = <<<EOF
		<table><tr><td style="height:10px"></td></tr></table>
		<table>
			<tr>
				<td style="width:100px"><img style="height:70px;" src="images/logo_white.png"></td>
				<td style="width:345px; color:white;">
					<div style="color: #212121; font-weight: bold; font-size:15px; text-align:center; line-height:20px;">NOMBRE DE LA INSTITUCION</div>
					<div style="color: #212121; font-weight: bold; font-size:15px; text-align:center; line-height:8px;">"LUGAR"</div>
					<div style="color: #212121; font-weight: bold; font-size:15px; text-align:center; line-height:8px;">"NUMEROS DE CONTACTO"</div>
					<div style="color: #212121; font-weight: bold; font-size:10px; text-align:center; line-height:8px;">ORURO - BOLIVIA</div>
				</td>
				<td style="width:100px;"><img style="height:70px;" src="images/logo_white.png"></td>
			</tr>
		</table>
		<table>
			<tr>
				<td style="width:545px; text-align: center;">_________________________________________________________________________________</td>
			</tr>
		</table>
		<table><tr><td style="height:10px"></td></tr></table>
		<table style="font-size:10px; padding:5px 10px;"><tr><td width:540px; text-align:center;"></td></tr></table>
EOF;
        $pdf->writeHTML($BloqueHeader, false, false, false, false, '');



        $BloqueSale = <<<EOF
		<table><tr><td style="height:20px"></td></tr></table>
		<table style="font-size:10px; padding:5px 10px;">
			<tr>
				<td style="font-weight:bold; color:$colordmv; font-size: 1.5em; width:540px; text-align:center;">VENTA Nro $IdSale</td>
			</tr>
		</table>
		<table><tr><td style="width:540px"><img src="images/back.jpg"></td></tr></table>
		<table style="font-size:10px; padding:5px 10px; border-collapse: collapse; border-radius:10px;">
			<tr style="padding: 18px; border: 1px solid $colordmv;">
				<th style="$styleth width:200px;">Cliente</th>
				<th style="$styletd width:345px;">$DataSale[0]['CName']</th>
			</tr>
			<tr style="padding: 18px; border: 1px solid $colordmv;">
				<th style="$styleth width:200px;">Usuario</th>
				<th style="$styletd width:345px;">$DataSale[0]['UName']</th>
			</tr>
		</table>
EOF;
        $pdf->writeHTML($BloqueSale, false, false, false, false, '');



        $BloqueHeaderProducts = <<<EOF
		<table><tr><td style="height:20px"></td></tr></table>
		<table style="font-size:10px; padding:5px 10px; border-collapse: collapse; border-radius:10px;">
			<tr style="padding: 18px; border: 1px solid $colordmv;">
				<th style="$styleth width:60px;">Nº</th>
                <th style="$styleth width:290px;">Producto</th>
                <th style="$styleth width:195px;">Cantidad</th>
			</tr>
		</table>
EOF;
        $pdf->writeHTML($BloqueHeaderProducts, false, false, false, false, '');


        foreach ($DataSaleDetaill as $key => $value) {
            $i = $key + 1;
            $BloqueDetalleProductos = <<<EOF
			<table style="font-size:6px; padding:5px 10px; border-collapse: collapse; border-radius:10px;">
				<tr style="padding: 18px; border: 1px solid #F8F9FA;">
					<td style="$styletd width:60px;">$i</td>
                    <td style="$styletd width:290px;">$value[PDescription]</td>
                    <td style="$styletd width:195px;">$value[SDAmount]</td>
				</tr>
			</table>
EOF;
        $pdf->writeHTML($BloqueDetalleProductos, false, false, false, false, '');
        }

        // Salida del documento
        $pdf->Output('Venta-' . $IdSale . '.pdf');
    }
}


if (isset($_GET['IdSale'])) {
    $Execute = new Report();
    $Execute->IdSale = $_GET['IdSale'];
    $Execute->Data();
}
