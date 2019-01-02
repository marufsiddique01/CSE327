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
$route['404_override'] 			= '';
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
$route['orderreceived'] 		= 'A_neworder/order_received';
$route['findproductdetails']	= 'A_neworder/product_details';
$route['findcustomerphone']		= 'A_neworder/customer_phone';
$route['findcustomerdetails']	= 'A_neworder/customer_details';
$route['orderedit'] 			= 'A_orderedit/index';
$route['customer'] 				= 'A_customer/index';

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


//$route['finditemcode']			= 'products/A_product/get_item_code';
//$route['finditemdetails']		= 'products/A_product/get_item_details';


/* PRODUCT SETUP ROUTES */
$route['productcolor'] 			= 'products/A_product/color_index';
$route['coloruploaded'] 		= 'products/A_product/color_uploaded';
$route['productcategory'] 		= 'products/A_product/category_index';
$route['categoryuploaded'] 		= 'products/A_product/category_uploaded';
$route['productsizecode'] 		= 'products/A_product/sizecode_index';
$route['sizecodeuploaded'] 		= 'products/A_product/sizecode_uploaded';
$route['productsizedimension'] 	= 'products/A_product/dimension_index';
$route['dimensionuploaded']		= 'products/A_product/dimension_uploaded';
$route['itemsize'] 				= 'products/A_product/itemsize_index';
$route['itemsizeupload']		= 'products/A_product/itemsize_upload';
$route['itemsizeuploaded']		= 'products/A_product/itemsize_uploaded';
$route['manufacturecost'] 		= 'products/A_product/manufacturecost_index';
$route['manufacturecostuploaded']= 'products/A_product/manufacturecost_uploaded';
/* STATUS SETUP ROUTES */
$route['status'] 				= 'A_status/status_index';
$route['statusuploaded']		= 'A_status/status_uploaded';
/* STORE SETUP ROUTES */
$route['store'] 				= 'A_store/store_index';
$route['storeuploaded']			= 'A_store/store_uploaded';
/* SUPPLIER SETUP ROUTES */
$route['supplier'] 				= 'A_supplier/supplier_index';
$route['supplieruploaded']		= 'A_supplier/supplier_uploaded';

/* EXPENSES ROUTES */
$route['covinceupload'] 		= 'A_bills/covince_index';
$route['covinceuploaded'] 		= 'A_bills/covince_uploaded';

$route['purchase'] 				= 'A_bills/purchase_index';
$route['purchaseuploaded'] 		= 'A_bills/purchase_uploaded';

/* RECORDS ROUTES */
//$route['neworderrecorded'] 		= 'A_orderrecord/order_recorded';

$route['orderrecord'] 			= 'reports/A_orderrecord/index';
$route['customerrecord'] 		= 'reports/A_customerrecord/index';

/* REPORTS ROUTES */
$route['productreports']		= 'products/A_product/product_reports';
$route['productreportdetails']	= 'products/A_product/product_report_details';

/* DELIVERY SETTINGS ROUTES */

/* COMING SOON ROUTES */
$route['comingsoon']			= 'A_comingsoon/index';
$route['testid']				= 'A_comingsoon/test';
$route['testedid']				= 'A_comingsoon/tested';
