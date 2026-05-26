<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
require_once dirname(__DIR__) . '/config.php';

$db = db();

$site = $db->query("SELECT site_name, logo FROM db_sitesettings LIMIT 1")->fetch_assoc();
$company = $db->query("SELECT company_name, mobile, phone, address, website, company_logo FROM db_company LIMIT 1")->fetch_assoc();

$logo = !empty($site['logo'])
    ? POS_BASE . '/uploads/' . $site['logo']
    : POS_BASE . '/theme/images/dua-logo.jpeg';

$company_logo = !empty($company['company_logo'])
    ? POS_BASE . '/uploads/company/' . $company['company_logo']
    : $logo;

echo json_encode([
    'site_name'    => $site['site_name'] ?? "DU'A Fashion",
    'logo'         => $logo,
    'company_logo' => $company_logo,
    'company_name' => $company['company_name'] ?? "DU'A Fashion",
    'mobile'       => $company['mobile'] ?? '2348160327173',
    'phone'        => $company['phone'] ?? '',
    'address'      => $company['address'] ?? '',
    'website'      => $company['website'] ?? '',
]);
