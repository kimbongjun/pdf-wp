<?php
add_action( 'wp_ajax_nopriv_load_pdf', 'load_manager_by_ajax' );
add_action( 'wp_ajax_load_pdf', 'load_manager_by_ajax' );

	function load_manager_by_ajax() { 
		$pages = $_POST['pages'];		  
		$price = get_field('field_5e9e7ca0bf275');
		$total = $pages * $price;
		
		echo $pages;
		
		wp_die();
    }
        

add_action('acf/save_post', 'my_acf_save_post', 5);
function my_acf_save_post( $post_id ) {
    global $post;
    
    $prev_values = get_fields( $post_id );        
    // Get submitted values.
    $values = $_POST['acf'];
    var_dump($prev_values);
    // $groups = $_POST['acf']['field_5e9e52b053f20'];
    // // Check if a specific value was updated.    
    // if( isset($groups) ) {		        
    // $logo = get_fields('site_logo','option')['url'];
    // $f_name = $groups['field_5e9e52c153f21'];
    // $f_phone = $groups['field_5e9e52d153f22'];
    // $f_company = $groups['field_5e9e52d953f23'];
    // $f_pages = $groups['field_5e9e52e453f24'];

    // require_once __DIR__ . '/tcpdf/tcpdf_import.php';		    
    // $html =  "<img src=".$logo."/>";
	// $html .= "<h1>".$f_name."</h1><hr/>";
	// $html .= "<p style='color:#CC0000;'>".$f_phone."</p>";
	// $html .= $f_company;
	// $html .= $f_pages;

	// $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, "UTF-8", false);

	// $pdf -> SetCreator(PDF_CREATOR);

    // $pdf->SetFont('nanumbarungothicyethangul', '', 12);
    // $pdf -> SetDefaultMonospacedFont("nanumbarungothicyethangul");


	// $pdf -> AddPage();	
	// $pdf -> writeHTMLCell(0, 0, "", "", $html, 0, 1, 0, true, "", true);
    // ob_get_clean();
	// $pdf -> Output();

    // }else{
	// 	var_dump($values);
	// }
    // Check if a specific value was updated.	  	  
}

