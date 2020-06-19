

<?php
function GetPostValue($field) {
    if (isset($_POST[$field]))
        return $_POST[$field];

    return "";
}


require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/autoload.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/vendor/phpoffice/phpword/tests/bootstrap.php';

$phpWord = new \PhpOffice\PhpWord\PhpWord();

$rowsize1 = 000;
$orderdetailscell = 100;
$orderdetailscell1 = 5000;
$orderdetailscell2 = 5000;
$orderdetailscell3 = 100;

$properties = $phpWord->getDocInfo();
$properties->setCreator('Rajas');
$properties->setCompany('Rajas');
$properties->setTitle('Rajas');
$properties->setDescription('Rajas');
$properties->setCategory('Rajas');
$properties->setLastModifiedBy('Rajas');
$properties->setCreated(mktime(0, 0, 0, 3, 12, 2014));
$properties->setModified(mktime(0, 0, 0, 3, 14, 2014));
$properties->setSubject('Rajas');
$properties->setKeywords('clothes, suits, fancy');


$section = $phpWord->addSection();
//$section->addImage('logo.png', array('width' => 328, 'height' => 82, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));

//$section->addTextBreak(5);
$titletext = 'rStyle';
//26
$phpWord->addFontStyle($titletext, array('bold' => true, 'color' => 'cc9900', 'italic' => false, 'size' => 12, 'allCaps' => false, 'doubleStrikethrough' => false));
$subtitletext = 'bStyle';
//18
$phpWord->addFontStyle($subtitletext, array('bold' => true, 'color' => 'cc9900', 'italic' => false, 'size' => 12, 'allCaps' => false, 'doubleStrikethrough' => false));
$left = 'pStyle';
$phpWord->addParagraphStyle($left, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::LEFT, 'spaceAfter' => 100));
$centered = 'tStyle';
$phpWord->addParagraphStyle($centered, array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
$section->addText('Order Details', $titletext, $centered);
//$section->addTextBreak(1);



$fancyTableStyleName = 'Order Details';
$fancyTableStyle = array('borderSize' => 6, 'borderColor' => 'cc9900', 'cellMargin' => 80, 'alignment' => \PhpOffice\PhpWord\SimpleType\JcTable::CENTER);
$fancyTableFirstRowStyle = array('borderBottomSize' => 18, 'borderBottomColor' => '0000FF', 'bgColor' => 'FFFFFF');
$fancyTableCellStyle = array('valign' => 'center');
$fancyTableCellBtlrStyle = array('valign' => 'center', 'textDirection' => \PhpOffice\PhpWord\Style\Cell::TEXT_DIR_BTLR);
$fancyTableFontStyle = array('bold' => true, 'color' => 'cc9900', 'size' => 12);
$red = array('bold' => true, 'color' => 'ff0000', 'size' => 12);
$blue = array('bold' => true, 'color' => '0000ff', 'size' => 12);
$commentFontStyle = array('bold' => true, 'color' => 'ff0000', 'size' => 12);






$table = $section->addTable($fancyTableStyleName);
$table->addRow($rowsize1);
//8000
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Order ID', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ' . GetPostValue("id"));

//$table->addRow($rowsize1);
//$table->addCell(2000, $fancyTableCellStyle)->addText('Customer IP address', $fancyTableFontStyle, $left);
//$table->addCell(2000, $fancyTableCellStyle)->addText('  ' . GetPostValue("customer_ip_address"));
//$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Date and time submitted:', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . GetPostValue("date"));
$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Name', $fancyTableFontStyle, $left);
$result = htmlspecialchars(GetPostValue("first_name")) . ' ' . htmlspecialchars(GetPostValue("last_name"));
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText('  ' . $result);
//$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Email', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . htmlspecialchars(GetPostValue("email")));
$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Have you shopped with us before?', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . GetPostValue("existingcustomer"));
//$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Would you like to use your existing measurements on file for this order?', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . GetPostValue("use_same_measurements"));
$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Phone', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText('  ' . GetPostValue("phone"));
//$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Company', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . htmlspecialchars(GetPostValue("company")));
$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Postcode', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText('  ' . GetPostValue("postcode"));
//$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Country', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText('  ' . htmlspecialchars(GetPostValue("country")));
$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('City', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . htmlspecialchars(GetPostValue("city")));
//$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('State', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell2, $fancyTableCellStyle)->addText('  ' . htmlspecialchars(GetPostValue("state")));
$table->addRow($rowsize1);
$table->addCell($orderdetailscell3, $fancyTableCellStyle)->addText('Address', $fancyTableFontStyle, $left);
$cellColSpan = array('gridSpan' => 3, 'valign' => 'center');
$cell2 = $table->addCell(35000, $cellColSpan)->addText('  ' . htmlspecialchars(GetPostValue("address_1")) . ' ' . htmlspecialchars(GetPostValue("address_2")));

// Order Details Products
// Products

$section->addTextBreak(1);
$section->addText('Products', $subtitletext, $centered);
$phpWord->addTableStyle($fancyTableStyleName, $fancyTableStyle, $fancyTableFirstRowStyle);
$products_received = GetPostValue("product"); // $built_array = http_build_query($order_array);
$decoded_orders = json_decode($products_received);

//$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText(print_r($decoded_orders, true));

foreach ($decoded_orders as $each){

    $table = $section->addTable($fancyTableStyleName);
    $table->addRow($rowsize1);


    $table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Name', $fancyTableFontStyle, $left);
    $table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ' .  print_r($each->name, true));
    $table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Quantity', $fancyTableFontStyle, $left);
    $table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ' .  print_r($each->quantity, true));
    $table->addRow($rowsize1);
//    ^ THIS CAUSES ACCESSORY PRODUCTS TO ERROR IF COUNT BREAK ISNT COMMENTED

    $rowCount = 0;
    $rowCount2 = 0;
    $count = count($each->meta_data);

    $newcount = count($each->meta_data);
    $i = 0;

//    $table->addCell($orderdetailscell, $fancyTableCellStyle)->addText(print_r($each, true), $fancyTableFontStyle, $left);

    foreach ($each->meta_data as $meta){
        if (--$count <= 0) {
//            break;
        }

        $rowCount2++;
        if ($rowCount2 > 1){
            if ($rowCount++ % 2 == 1 ){
                $table->addRow($rowsize1);
            }
        }

        $key = print_r($meta->key, true);
        $key_formatted = str_replace('pa_', '', $key);
        $key_formatted2 = str_replace('-', ' ', $key_formatted);
        $value = print_r($meta->value, true);
        $value_formatted = str_replace('-', ' ', $value);

        if ($key_formatted2 === "_wcj_product_input_fields_local_2"){
            $key_formatted2 = 'Name to add inside product';
        }
        elseif ($key_formatted2 === "_wcj_product_input_fields_local_1"){
            $key_formatted2 = 'Comments';
        }
        elseif ($key_formatted2 === "Name"){
            $key_formatted2 = 'Product';
        }
        else{}

//        $table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ' .  print_r($meta, true));
        $table->addCell($orderdetailscell, $fancyTableCellStyle)->addText(ucfirst($key_formatted2), $fancyTableFontStyle, $left);
        $table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ' .  ucfirst($value_formatted));

//        if ($i == $newcount - 2) {
        if ($i == $newcount - 1) {
//            $table->addRow($rowsize1);
//            $table->addCell(1000, $fancyTableCellStyle)->addText('Price: ');
//            $table->addCell(9000, $fancyTableCellStyle)->addText(' ');


            $table->addRow($rowsize1);
            $table->addCell($orderdetailscell3, $fancyTableCellStyle)->addText('Price', $fancyTableFontStyle, $left);
            $cellColSpan = array('gridSpan' => 3, 'valign' => 'center');
            $cell2 = $table->addCell(35000, $cellColSpan)->addText('  ');
//            $section->addText('*Price does not include duties, if any, on the package.', $subtitletext, $centered);

        }
        $i++;
    }
    $section->addTextBreak(1);
}

$products_images = GetPostValue("product_images");
$decoded_images = json_decode($products_images);

$section->addTextBreak(2);
$section->addText('Fabrics and Linings', $subtitletext, $centered);

foreach ($decoded_images as $product_each){
    //$section->addText(print_r('2:::'.$product_each, true), $subtitletext, $centered);
    $image = print_r($product_each, true);
    $section->addImage(str_replace('https:', 'http:', $image), array('width' => 150, 'height' => 150, 'alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
}
$section->addTextBreak(1);
//Measurement Form
$measurementcheck = GetPostValue("back") . GetPostValue("crotch") . GetPostValue("cuff") . GetPostValue("extra") . GetPostValue("front") . GetPostValue("hips") . GetPostValue("hips_trouser") . GetPostValue("inseam") . GetPostValue("length") . GetPostValue("length_trouser") . GetPostValue("neck") . GetPostValue("shoulders") . GetPostValue("sleeves") . GetPostValue("stomach") . GetPostValue("waist");

if (!empty($measurementcheck)) {

    $measurementcell = 5000;

    $section->addTextBreak(2);
    $section->addText('  Measurement Form', $titletext, $centered);
    $table = $section->addTable($fancyTableStyleName);

    $shirtcheck =  GetPostValue("neck") . GetPostValue("chest_shirt") . GetPostValue("stomach_shirt") . GetPostValue("back_shirt") . GetPostValue("hips_shirt") . GetPostValue("sleeves_shirt") . GetPostValue("length_shirt") . GetPostValue("shoulders_shirt"). GetPostValue("bicep");

    $jacketcheck = GetPostValue("chest_jacket") . GetPostValue("stomach_jacket") . GetPostValue("hips_jacket") . GetPostValue("length_jacket") . GetPostValue("front") . GetPostValue("back_jacket") . GetPostValue("sleeves_jacket") . GetPostValue("shoulders_jacket");

    $trousercheck = GetPostValue("waist") . GetPostValue("hips_trouser") . GetPostValue("length_trouser") . GetPostValue("inseam") . GetPostValue("cuff") . GetPostValue("crotch");

    if (!empty($shirtcheck)) {

        $section->addTextBreak(1);
        $section->addText('  Shirt', $subtitletext, $centered);
        $section->addTextBreak(1);
        $table = $section->addTable($fancyTableStyleName);

        // ============================================================================================================
        // Shirt
        // ============================================================================================================
        if (!empty(GetPostValue("neck"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Neck', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("neck"));
        }
        if (!empty(GetPostValue("chest_shirt"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Chest', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("chest_shirt"));
        }
        if (!empty(GetPostValue("stomach_shirt"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Stomach', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("stomach_shirt"));
        }
        if (!empty(GetPostValue("back_shirt"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Back', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("back_shirt"));
        }
        if (!empty(GetPostValue("hips_shirt"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Hips', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("hips_shirt"));
        }
        if (!empty(GetPostValue("sleeves_shirt"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Sleeves', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("sleeves_shirt"));
        }
        if (!empty(GetPostValue("length_shirt"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Length', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("length_shirt"));
        }
        if (!empty(GetPostValue("shoulders_shirt"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Shoulders', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("shoulders_shirt"));
        }
        if (!empty(GetPostValue("bicep"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText(  'Bicep', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("bicep"));
        }

    }

    if (!empty($jacketcheck)) {

        $section->addTextBreak(1);
        $section->addText('  Jacket', $subtitletext, $centered);
        $section->addTextBreak(1);
        $table = $section->addTable($fancyTableStyleName);

        // ============================================================================================================
        // Jacket
        // ============================================================================================================

        if (!empty(GetPostValue("chest_jacket"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Chest', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("chest_jacket"));
        }
        if (!empty(GetPostValue("stomach_jacket"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Stomach', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("stomach_jacket"));
        }
        if (!empty(GetPostValue("hips_jacket"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Hips', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("hips_jacket"));
        }
        if (!empty(GetPostValue("length_jacket"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Length', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("length_jacket"));
        }
        if (!empty(GetPostValue("front"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Front', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("front"));
        }
        if (!empty(GetPostValue("back_jacket"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Back', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("back_jacket"));
        }
        if (!empty(GetPostValue("sleeves_jacket"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Sleeves', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("sleeves_jacket"));
        }
        if (!empty(GetPostValue("shoulders_jacket"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Shoulders', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("shoulders_jacket"));
        }

    }


    if (!empty($trousercheck)) {

        $section->addTextBreak(1);
        $section->addText('  Trousers', $subtitletext, $centered);
        $section->addTextBreak(1);
        $table = $section->addTable($fancyTableStyleName);

        // ============================================================================================================
        // Trousers
        // ============================================================================================================

        if (!empty(GetPostValue("waist"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Waist', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("waist"));
        }
        if (!empty(GetPostValue("hips_trouser"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Hips', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("hips_trouser"));
        }
        if (!empty(GetPostValue("length_trouser"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Length', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("length_trouser"));
        }
        if (!empty(GetPostValue("inseam"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Inseam', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("inseam"));
        }
        if (!empty(GetPostValue("cuff"))) {
            $table->addRow($rowsize1);
            $table->addCell(2000, $fancyTableCellStyle)->addText('Cuff', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("cuff"));
        }
        if (!empty(GetPostValue("crotch"))) {
            $table->addCell(2000, $fancyTableCellStyle)->addText('Crotch', $fancyTableFontStyle, $left);
            $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue("crotch"));
        }



    }
    if (!empty(GetPostValue("extra"))) {

        $section->addTextBreak(1);
        $section->addText('  Extra Note', $subtitletext, $centered);
        $section->addTextBreak(1);
        $table = $section->addTable($fancyTableStyleName);

        $table->addRow(2000);
        $table->addCell(2000, $fancyTableCellStyle)->addText('Extra', $fancyTableFontStyle, $left);
        $table->addCell(8000, $fancyTableCellStyle)->addText('  ' . GetPostValue("extra"), $commentFontStyle);
    }

    $misccheck = GetPostValue("fit") . GetPostValue("height") . GetPostValue("weight") . GetPostValue("age") . GetPostValue("posture") . GetPostValue("shoulders");

    if (!empty($misccheck)) {
        $section->addTextBreak(1);
        $section->addText('  Miscellaneous', $subtitletext, $centered);
        $section->addTextBreak(1);
        $table = $section->addTable($fancyTableStyleName);

        $tableAndRowAdded = false;
        $parameters = [ ['fit', true], ['height', false], ['weight', false], ['age', false], ['posture', true], ['shoulders', false] ];

        $oldRowAdded = true;
        foreach ($parameters as $parameter) {
            $name = $parameter[0];
            $addNewRow = $parameter[1];

            if (!$oldRowAdded) {
                $addNewRow = true;
            }

            $niceName = ucfirst($name);

            if (!empty(GetPostValue($name))) {
                if ($addNewRow) {
                    $table->addRow($rowsize1);
                    $oldRowAdded = true;
                }

                $table->addCell(2000, $fancyTableCellStyle)->addText($niceName, $fancyTableFontStyle, $left);
                $table->addCell($measurementcell, $fancyTableCellStyle)->addText('  ' . GetPostValue($name));
            } else {
                if ($addNewRow) {
                    $oldRowAdded = false;
                }
            }
        }
    }

}



$section->addPageBreak();
$section->addText('Price', $subtitletext, $centered);
$table = $section->addTable($fancyTableStyleName);
$table->addRow($rowsize1);
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Product Price Total', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ');
$table->addCell($orderdetailscell, $fancyTableCellStyle)->addText('Mailing Price', $fancyTableFontStyle, $left);
$table->addCell($orderdetailscell1, $fancyTableCellStyle)->addText(' ');
$table->addRow($rowsize1);
$table->addCell($orderdetailscell3, $fancyTableCellStyle)->addText('Total', $fancyTableFontStyle, $left);
$cellColSpan = array('gridSpan' => 3, 'valign' => 'center');
$cell2 = $table->addCell(35000, $cellColSpan)->addText('  ');

$section->addText('*Price does not include duties, if any, on the package.', $red, $centered);
$section->addText('Once payment is received, you can expect your package to arrive within 20 days from the date of payment. Once the package has been shipped, a tracking number will be emailed to you.', $subtitletext, $centered);

$textrun = $section->addTextRun($centered);
$textrun->addText('Payment for paypal is here: ', $subtitletext, $centered);
$textrun->addLink('https://www.paypal.me/dressmesharp', 'https://www.paypal.me/dressmesharp', $blue, $centered);

$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');

$filename = 'order_list.docx';

if (file_exists($filename))
{
    unlink($filename);
}

$objWriter->save($filename);
