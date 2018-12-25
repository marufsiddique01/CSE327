<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] 	= 'Admin';
$route['404_override'] 			= 'Error_404';
$route['translate_uri_dashes'] 	= FALSE;

/*=======================	MY ROUTES	=======================*/

/* SECURITY ROUTES */
$route['adminlogin'] 			= 'A_login/index';
$route['adminlogout'] 			= 'A_login/admin_logout';
$route['loginverify'] 			= 'A_login/login_verify';

/* DASHBOARD ROUTES */
$route['dashboard'] 			= 'Admin/index';
$route['dashboardpdetails'] 	= 'Admin/dashboard_p_details';

/* ORDER ROUTES */
$route['neworder'] 				= 'A_neworder/index';
$route['findcustomerphone']		= 'A_neworder/customer_phone';
$route['findcustomerdetails']	= 'A_neworder/customer_details';
$route['findproductdetails']	= 'A_neworder/product_details';
$route['orderreceived'] 		= 'A_neworder/order_received';
//$route['orderedit'] 			= 'A_orderedit/index';
//$route['customer'] 				= 'A_customer/index';

/* PRODUCT ROUTES */
$route['itemlist']				= 'products/A_product/item_list';
$route['productreports']		= 'products/A_product/product_reports';
$route['productreportdetails']	= 'products/A_product/product_report_details';
$route['productupload'] 		= 'products/A_product/insert_index';
$route['productuploaded'] 		= 'products/A_product/product_uploaded';
$route['productedit'] 			= 'products/A_product/update_index';
$route['getproductdetails']		= 'products/A_product/product_details';
$route['productedited'] 		= 'products/A_product/product_edited';
$route['productinactive'] 		= 'products/A_product/product_inactive';


//$route['finditemcode']		= 'products/A_product/get_item_code';
//$route['finditemdetails']		= 'products/A_product/get_item_details';


/* PRODUCT SETUP ROUTES */

// COLOR SETUP //
$route['colorlist'] 			= 'products/A_product/color_list';
$route['colorinsert'] 			= 'products/A_product/color_insert_index';
$route['coloruploaded'] 		= 'products/A_product/color_uploaded';

$route['categorylist'] 			= 'products/A_product/category_list';
$route['categoryinsert'] 		= 'products/A_product/category_insert_index';
$route['categoryuploaded'] 		= 'products/A_product/category_uploaded';

$route['sizecodelist'] 			= 'products/A_product/sizecode_list';
$route['sizecodeinsert'] 		= 'products/A_product/sizecode_insert_index';
$route['sizecodeuploaded'] 		= 'products/A_product/sizecode_uploaded';

$route['dimensionlist'] 		= 'products/A_product/dimension_list';
$route['dimensioninsert'] 		= 'products/A_product/dimension_insert_index';
$route['dimensionuploaded']		= 'products/A_product/dimension_uploaded';

$route['itemsize'] 				= 'products/A_product/itemsize_index';
$route['itemsizeupload']		= 'products/A_product/itemsize_upload';
$route['itemsizeuploaded']		= 'products/A_product/itemsize_uploaded';

$route['manufacturecostlist'] 	= 'products/A_product/manufacturecost_index';
$route['manufacturecostuploaded']= 'products/A_product/manufacturecost_uploaded';

/* STATUS SETUP ROUTES */
$route['statuslist'] 			= 'A_status/status_list';
$route['statusinsert']			= 'A_status/status_insert_index';
$route['statusuploaded']		= 'A_status/status_uploaded';
/* STORE SETUP ROUTES */
$route['storelist'] 			= 'A_store/store_list';
$route['storeinsert']			= 'A_store/store_insert_index';
$route['storeuploaded']			= 'A_store/store_uploaded';
/* SUPPLIER SETUP ROUTES */
$route['supplierlist'] 			= 'A_supplier/supplier_list';
$route['supplierinsert']		= 'A_supplier/supplier_insert_index';
$route['supplieruploaded']		= 'A_supplier/supplier_uploaded';

/* EXPENSES ROUTES */
$route['covincelist'] 			= 'A_bills/covince_list';
$route['covinceinsert']			= 'A_bills/covince_insert_index';
$route['covinceuploaded'] 		= 'A_bills/covince_uploaded';

$route['purchaselist'] 			= 'A_bills/purchase_list';
$route['purchaseupload']		= 'A_bills/purchase_insert_index';
$route['purchaseuploaded'] 		= 'A_bills/purchase_uploaded';

/* RECORDS ROUTES */
//$route['neworderrecorded'] 	= 'A_orderrecord/order_recorded';

$route['orderrecord'] 			= 'reports/A_orderrecord/index';
$route['customerrecord'] 		= 'reports/A_customerrecord/index';

/* REPORTS ROUTES */
$route['productreports']		= 'products/A_product/product_reports';
$route['productreportdetails']	= 'products/A_product/product_report_details';

/* SECURITY ROUTES */
//$route['deliverylogin'] 		= 'deliveryportal/Login/index';
//$route['deliverylogout'] 		= 'deliveryportal/Login/admin_logout';
//$route['deliveryloginverify'] 	= 'deliveryportal/Login/login_verify';

/* COMING SOON ROUTES */
$route['comingsoon']			= 'A_comingsoon/index';
$route['testid']				= 'A_comingsoon/test';
$route['testedid']				= 'A_comingsoon/tested';

/* LOGO ROUTES */
$route['lockscreenlogolist'] 	= 'A_logos/lockscreenlogo_list';
$route['lockscreenlogoupload']	= 'A_logos/lockscreenlogo_insert_index';
$route['lockscreenlogouploaded']= 'A_logos/lockscreenlogo_uploaded';


/* DELIVERY SETTINGS ROUTES */
$route['deliverylogin'] 		= 'deliveryportal/D_login/index';
$route['deliverylogout'] 		= 'deliveryportal/D_login/logout';
$route['profile'] 				= 'deliveryportal/D_login/profile';
//$route['dinvoice'] 				= 'deliveryportal/D_invoice/index';