<?php

use App\Models\Extension;
use App\Models\GeneralSetting;
use App\Models\Nav;
use App\Models\NavKey;
use App\Models\NavPermission;
use App\Models\User;
use PHPMailer\PHPMailer\Exception;
use PHPMailer\PHPMailer\PHPMailer;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

function sidebarVariation()
{

    $variation['sidebar'] = 'bg_img';

    //for selector
    $variation['selector'] = 'capsule--rounded';

    //for overlay
    $variation['overlay'] = 'overlay--indigo';
    //Opacity
    $variation['opacity'] = 'overlay--opacity-9'; // 1-10

    return $variation;
}


function slug($string)
{
    return Illuminate\Support\Str::slug($string);
}


function shortDescription($string, $length = 120)
{
    return Illuminate\Support\Str::limit($string, $length);
}


function shortCodeReplacer($shortCode, $replace_with, $template_string)
{
    return str_replace($shortCode, $replace_with, $template_string);
}


function verificationCode($length)
{
    if ($length == 0) return 0;
    $min = pow(10, $length - 1);
    $max = 0;
    while ($length > 0 && $length--) {
        $max = ($max * 10) + 9;
    }
    return random_int($min, $max);
}

function getNumber($length = 8)
{
    $characters = '1234567890';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

// function uploadImage($file, $location, $size = null, $old = null, $thumb = null)
// {
//     $path = makeDirectory($location);
//     if (!$path) throw new Exception('File could not been created.');

//     if (!empty($old)) {
//         removeFile($location . '/' . $old);
//         removeFile($location . '/thumb_' . $old);
//     }
//     $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
//     $image = Image::make($file);
//     if (!empty($size)) {
//         $size = explode('x', strtolower($size));
//         $image->resize($size[0], $size[1]);
//     }
//     $image->save($location . '/' . $filename);

//     if (!empty($thumb)) {
//         $thumb = explode('x', $thumb);
//         Image::make($file)->resize($thumb[0], $thumb[1])->save($location . '/thumb_' . $filename);
//     }

//     return $filename;
// }

// function uploadFile($file, $location, $size = null, $old = null)
// {
//     $path = makeDirectory($location);
//     if (!$path) throw new Exception('File could not been created.');

//     if (!empty($old)) {
//         removeFile($location . '/' . $old);
//     }

//     $filename = uniqid() . time() . '.' . $file->getClientOriginalExtension();
//     $file->move($location, $filename);
//     return $filename;
// }

function makeDirectory($path)
{
    if (file_exists($path)) return true;
    return mkdir($path, 0755, true);
}


function removeFile($path)
{
    return file_exists($path) && is_file($path) ? @unlink($path) : false;
}

// function reCaptcha()
// {
//     $reCaptcha = Extension::where('act', 'google-recaptcha2')->where('status', 1)->first();
//     return $reCaptcha ? $reCaptcha->generateScript() : '';
// }

// function analytics()
// {
//     $analytics = Extension::where('act', 'google-analytics')->where('status', 1)->first();
//     return $analytics ? $analytics->generateScript() : '';
// }

// function tawkto()
// {
//     $tawkto = Extension::where('act', 'tawk-chat')->where('status', 1)->first();
//     return $tawkto ? $tawkto->generateScript() : '';
// }

// function fbcomment()
// {
//     $comment = Extension::where('act', 'fb-comment')->where('status', 1)->first();
//     return  $comment ? $comment->generateScript() : '';
// }

// function getCustomCaptcha($height = 46, $width = '300px', $bgcolor = '#003', $textcolor = '#abc')
// {
//     $textcolor = '#' . GeneralSetting::first()->base_color;
//     $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
//     if ($captcha) {
//         $code = rand(100000, 999999);
//         $char = str_split($code);
//         $ret = '<link href="https://fonts.googleapis.com/css?family=Henny+Penny&display=swap" rel="stylesheet">';
//         $ret .= '<div style="height: ' . $height . 'px; line-height: ' . $height . 'px; width:' . $width . '; text-align: center; background-color: ' . $bgcolor . '; color: ' . $textcolor . '; font-size: ' . ($height - 20) . 'px; font-weight: bold; letter-spacing: 20px; font-family: \'Henny Penny\', cursive;  -webkit-user-select: none; -moz-user-select: none;-ms-user-select: none;user-select: none;  display: flex; justify-content: center;">';
//         foreach ($char as $value) {
//             $ret .= '<span style="    float:left;     -webkit-transform: rotate(' . rand(-60, 60) . 'deg);">' . $value . '</span>';
//         }
//         $ret .= '</div>';
//         $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
//         $ret .= '<input type="hidden" name="captcha_secret" value="' . $captchaSecret . '">';
//         return $ret;
//     } else {
//         return false;
//     }
// }


// function captchaVerify($code, $secret)
// {
//     $captcha = Extension::where('act', 'custom-captcha')->where('status', 1)->first();
//     $captchaSecret = hash_hmac('sha256', $code, $captcha->shortcode->random_key->value);
//     if ($captchaSecret == $secret) {
//         return true;
//     }
//     return false;
// }

function getTrx($length = 12)
{
    $characters = 'ABCDEFGHJKMNOPQRSTUVWXYZ123456789';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}


function getAmount($amount, $length = 0)
{
    if (0 < $length) {
        return round($amount + 0, $length);
    }
    return $amount + 0;
}

function removeElement($array, $value)
{
    return array_diff($array, (is_array($value) ? $value : array($value)));
}

function inputTitle($text)
{
    return ucfirst(preg_replace("/[^A-Za-z0-9 ]/", ' ', $text));
}


function titleToKey($text)
{
    return strtolower(str_replace(' ', '_', $text));
}


function str_slug($title = null)
{
    return \Illuminate\Support\Str::slug($title);
}

function str_limit($title = null, $length = 10)
{
    return \Illuminate\Support\Str::limit($title, $length);
}

//moveable
function getIpInfo()
{
    $ip = null;
    $deep_detect = TRUE;

    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }


    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);


    $country = @$xml->geoplugin_countryName;
    $city = @$xml->geoplugin_city;
    $area = @$xml->geoplugin_areaCode;
    $code = @$xml->geoplugin_countryCode;
    $long = @$xml->geoplugin_longitude;
    $lat = @$xml->geoplugin_latitude;

    $data['country'] = $country;
    $data['city'] = $city;
    $data['area'] = $area;
    $data['code'] = $code;
    $data['long'] = $long;
    $data['lat'] = $lat;
    $data['ip'] = request()->ip();
    $data['time'] = date('d-m-Y h:i:s A');


    return $data;
}
function getGeoLocationData()
{
    $ip = request()->ip();
    $deep_detect = true;

    if (filter_var($ip, FILTER_VALIDATE_IP) === false) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            elseif (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }

    $xml = @simplexml_load_file("http://www.geoplugin.net/xml.gp?ip=" . $ip);

    if ($xml === false) {
        return null; // Failed to fetch geolocation data
    }

    $country = (string) $xml->geoplugin_countryName;
    $city = (string) $xml->geoplugin_city;
    $area = (string) $xml->geoplugin_areaCode;
    $code = (string) $xml->geoplugin_countryCode;
    $long = (float) $xml->geoplugin_longitude;
    $lat = (float) $xml->geoplugin_latitude;

    $data = [
        'country' => $country,
        'city' => $city,
        'area' => $area,
        'code' => $code,
        'long' => $long,
        'lat' => $lat,
        'ip' => $ip,
        'time' => date('d-m-Y h:i:s A')
    ];

    return $data;
}

//moveable
function osBrowser()
{
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $os_platform = "Unknown OS Platform";
    $os_array = array(
        '/windows nt 10/i' => 'Windows 10',
        '/windows nt 6.3/i' => 'Windows 8.1',
        '/windows nt 6.2/i' => 'Windows 8',
        '/windows nt 6.1/i' => 'Windows 7',
        '/windows nt 6.0/i' => 'Windows Vista',
        '/windows nt 5.2/i' => 'Windows Server 2003/XP x64',
        '/windows nt 5.1/i' => 'Windows XP',
        '/windows xp/i' => 'Windows XP',
        '/windows nt 5.0/i' => 'Windows 2000',
        '/windows me/i' => 'Windows ME',
        '/win98/i' => 'Windows 98',
        '/win95/i' => 'Windows 95',
        '/win16/i' => 'Windows 3.11',
        '/macintosh|mac os x/i' => 'Mac OS X',
        '/mac_powerpc/i' => 'Mac OS 9',
        '/linux/i' => 'Linux',
        '/ubuntu/i' => 'Ubuntu',
        '/iphone/i' => 'iPhone',
        '/ipod/i' => 'iPod',
        '/ipad/i' => 'iPad',
        '/android/i' => 'Android',
        '/blackberry/i' => 'BlackBerry',
        '/webos/i' => 'Mobile'
    );
    foreach ($os_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $os_platform = $value;
        }
    }
    $browser = "Unknown Browser";
    $browser_array = array(
        '/msie/i' => 'Internet Explorer',
        '/firefox/i' => 'Firefox',
        '/safari/i' => 'Safari',
        '/chrome/i' => 'Chrome',
        '/edge/i' => 'Edge',
        '/opera/i' => 'Opera',
        '/netscape/i' => 'Netscape',
        '/maxthon/i' => 'Maxthon',
        '/konqueror/i' => 'Konqueror',
        '/mobile/i' => 'Handheld Browser'
    );
    foreach ($browser_array as $regex => $value) {
        if (preg_match($regex, $user_agent)) {
            $browser = $value;
        }
    }

    $data['os_platform'] = $os_platform;
    $data['browser'] = $browser;

    return $data;
}

function siteName()
{
    $general = GeneralSetting::first();
    $sitname = str_word_count($general->sitename);
    $sitnameArr = explode(' ', $general->sitename);
    if ($sitname > 1) {
        $title = "<span>$sitnameArr[0] </span> " . str_replace($sitnameArr[0], '', $general->sitename);
    } else {
        $title = "<span>$general->sitename</span>";
    }

    return $title;
}

function getImage($image, $size = null)
{
    $clean = '';
    $size = $size ? $size : 'undefined';
    if (file_exists($image) && is_file($image)) {
        return asset($image) . $clean;
    } else {
        return route('placeholderImage', $size);
    }
}

// function notify($user, $type, $shortCodes = null)
// {

//     sendEmail($user, $type, $shortCodes);
//     sendSms($user, $type, $shortCodes);
// }


/*SMS EMIL moveable*/

// function sendSms($user, $type, $shortCodes = [])
// {
//     $general = GeneralSetting::first(['sn', 'sms_api']);
//     $sms_template = SmsTemplate::where('act', $type)->where('sms_status', 1)->first();
//     if ($general->sn == 1 && $sms_template) {

//         $template = $sms_template->sms_body;

//         foreach ($shortCodes as $code => $value) {
//             $template = shortCodeReplacer('{{' . $code . '}}', $value, $template);
//         }
//         $template = urlencode($template);

//         $message = shortCodeReplacer("{{number}}", $user->mobile, $general->sms_api);
//         $message = shortCodeReplacer("{{message}}", $template, $message);
//         $result = @file_get_contents($message);
//     }
// }

// function sendEmail($user, $type = null, $shortCodes = [])
// {
//     $general = GeneralSetting::first();

//     $email_template = EmailTemplate::where('act', $type)->where('email_status', 1)->first();
//     if ($general->en != 1 || !$email_template) {
//         return;
//     }

//     $message = shortCodeReplacer("{{name}}", $user->username, $general->email_template);
//     $message = shortCodeReplacer("{{message}}", $email_template->email_body, $message);

//     if (empty($message)) {
//         $message = $email_template->email_body;
//     }

//     foreach ($shortCodes as $code => $value) {
//         $message = shortCodeReplacer('{{' . $code . '}}', $value, $message);
//     }
//     $config = $general->mail_config;

//     if ($config->name == 'php') {
//         sendPhpMail($user->email, $user->username,$email_template->subj, $message);
//     } else if ($config->name == 'smtp') {
//         sendSmtpMail($config, $user->email, $user->username, $email_template->subj, $message,$general);
//     } else if ($config->name == 'sendgrid') {
//         sendSendGridMail($config, $user->email, $user->username, $email_template->subj, $message,$general);
//     } else if ($config->name == 'mailjet') {
//         sendMailjetMail($config, $user->email, $user->username, $email_template->subj, $message,$general);
//     }
// }


function sendPhpMail($receiver_email, $receiver_name, $subject, $message)
{
    $gnl = GeneralSetting::first();
    $headers = "From: $gnl->sitename <$gnl->email_from> \r\n";
    $headers .= "Reply-To: $gnl->sitename <$gnl->email_from> \r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=utf-8\r\n";
    @mail($receiver_email, $subject, $message, $headers);
}


function sendSmtpMail($config, $receiver_email, $receiver_name, $subject, $message, $gnl)
{
    // $mail = new PHPMailer(true);

    // try {
    //     //Server settings
    //     $mail->isSMTP();
    //     $mail->Host       = $config->host;
    //     $mail->SMTPAuth   = true;
    //     $mail->Username   = $config->username;
    //     $mail->Password   = $config->password;
    //     if ($config->enc == 'ssl') {
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
    //     } else {
    //         $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    //     }
    //     $mail->Port       = $config->port;
    //     $mail->CharSet = 'UTF-8';
    //     //Recipients
    //     $mail->setFrom($gnl->email_from, $gnl->sitetitle);
    //     $mail->addAddress($receiver_email, $receiver_name);
    //     $mail->addReplyTo($gnl->email_from, $gnl->sitename);
    //     // Content
    //     $mail->isHTML(true);
    //     $mail->Subject = $subject;
    //     $mail->Body    = $message;
    //     $mail->send();
    // } catch (Exception $e) {
    //     throw new Exception($e);
    // }
}

function getPaginate($paginate = 20)
{
    return $paginate;
}


function menuActive($routeName, $type = null)
{
    if ($type == 3) {
        $class = 'side-menu--open';
    } elseif ($type == 2) {
        $class = 'sidebar-submenu__open';
    } else {
        $class = 'active';
    }
    if (is_array($routeName)) {
        foreach ($routeName as $key => $value) {
            if (request()->routeIs($value)) {
                return $class;
            }
        }
    } elseif (request()->routeIs($routeName)) {
        return $class;
    }
}


// function imagePath()
// {
//     $data['gateway'] = [
//         'path' => 'assets/images/gateway',
//         'size' => '800x800',
//     ];
//     $data['verify'] = [
//         'withdraw'=>[
//             'path'=>'assets/images/verify/withdraw'
//         ],
//         'deposit'=>[
//             'path'=>'assets/images/verify/deposit'
//         ]
//     ];
//     $data['image'] = [
//         'default' => 'assets/images/default.png',
//     ];
//     $data['withdraw'] = [
//         'method' => [
//             'path' => 'assets/images/withdraw/method',
//             'size' => '800x800',
//         ]
//     ];
//     $data['ticket'] = [
//         'path' => 'assets/images/support',
//     ];
//     $data['language'] = [
//         'path' => 'assets/images/lang',
//         'size' => '64x64'
//     ];
//     $data['logoIcon'] = [
//         'path' => 'assets/images/logoIcon',
//     ];
//     $data['favicon'] = [
//         'size' => '128x128',
//     ];
//     $data['extensions'] = [
//         'path' => 'assets/images/extensions',
//     ];
//     $data['seo'] = [
//         'path' => 'assets/images/seo',
//         'size' => '600x315'
//     ];
//     $data['profile'] = [
//         'user'=> [
//             'path'=>'assets/images/user/profile',
//             'size'=>'350x300'
//         ],
//         'admin'=> [
//             'path'=>'assets/admin/images/profile',
//             'size'=>'400x400'
//         ]
//     ];
//     return $data;
// }

function diffForHumans($date)
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->diffForHumans();
}

function showDateTime($date, $format = 'd M, Y h:i A')
{
    $lang = session()->get('lang');
    Carbon::setlocale($lang);
    return Carbon::parse($date)->translatedFormat($format);
}

//moveable
function sendGeneralEmail($email, $subject, $message, $receiver_name = '')
{

    $general = GeneralSetting::first();

    if ($general->en != 1 || !$general->email_from) {
        return;
    }

    $message = shortCodeReplacer("{{message}}", $message, $general->email_template);
    $message = shortCodeReplacer("{{name}}", $receiver_name, $message);
    $config  = $general->mail_config;

    if ($config->name == 'php') {
        sendPhpMail($email, $receiver_name, $subject, $message);
    } else if ($config->name == 'smtp') {
        sendSmtpMail($config, $email, $receiver_name, $subject, $message, $general);
    }
}


function paginateLinks($data, $design = 'admin.partials.paginate')
{
    return $data->appends(request()->all())->links($design);
}

function printEmail($email)
{
    $beforeAt = strstr($email, '@', true);
    $withStar = substr($beforeAt, 0, 2) . str_repeat("**", 5) . substr($beforeAt, -2) . strstr($email, '@');
    return $withStar;
}

/* MLM FUNCTION  */

function getUserById($id)
{
    return User::find($id);
}

function isUserExists($id)
{
    $user = User::find($id);
    if ($user) {
        return true;
    } else {
        return false;
    }
}

// function referralComission($user_id, $details)
// {

//     $user = User::find($user_id);
//     $refer = User::find($user->ref_id);
//     if ($refer) {
//         $plan = Plan::find($refer->plan_id);
//         if ($plan) {
//             $amount = $plan->ref_com;
//             $refer->balance += $amount;
//             $refer->total_ref_com += $amount;
//             $refer->save();

//             $trx = $refer->transactions()->create([
//                 'amount' => $amount,
//                 'charge' => 0,
//                 'trx_type' => '+',
//                 'details' => $details,
//                 'remark' => 'referral_commission',
//                 'trx' => getTrx(),
//                 'post_balance' => getAmount($refer->balance),

//             ]);

//             $gnl = GeneralSetting::first();

//             notify($refer, 'referral_commission', [
//                 'trx' => $trx->trx,
//                 'amount' => getAmount($amount),
//                 'currency' => $gnl->cur_text,
//                 'username' => $user->username,
//                 'post_balance' => getAmount($refer->balance),
//             ]);

//         }

//     }


// }

function displayRating($val)
{
    $result = '';
    for ($i = 0; $i < intval($val); $i++) {
        $result .= '<i class="la la-star text--warning"></i>';
    }
    if (fmod($val, 1) == 0.5) {
        $i++;
        $result .= '<i class="las la-star-half-alt text--warning"></i>';
    }
    for ($k = 0; $k < 5 - $i; $k++) {
        $result .= '<i class="lar la-star text--warning"></i>';
    }
    return $result;
}


function GeneralSetting()
{
    return GeneralSetting::first();
}

function GenerateSlug($value)
{
    $value = str_replace(",", " ", $value);
    $value = str_replace("_", " ", $value);
    $value = str_replace("-", " ", $value);
    $value = str_replace("!", "", $value);
    $value = str_replace("?", "", $value);
    $value = str_replace("&", "and", $value);
    $value = str_replace(" ", "-", $value);
    $value = strtolower($value);
    return $value;
}


function fetchAccounts()
{
    $data = \App\Models\ChartAccount::select('id', 'parent_acc', 'title')->get();
    $accounts = [];
    foreach ($data as $d) {
        $accounts[] = $d;
    }
    return $accounts;
}

function buildTree(array &$elements, $parentId = 0)
{
    $branch = [];

    foreach ($elements as &$element) {
        if ($element['parent_acc'] == $parentId) {
            $children = buildTree($elements, $element['id']);
            if ($children) {
                $element['children'] = $children;
            }
            $branch[] = $element;
            unset($element);
        }
    }
    return $branch;
}

function renderTree($tree)
{
    $html = '<ul>';
    foreach ($tree as $branch) {
        $html .= '<li>';
        if (isset($branch['children'])) {
            $html .= '<span class="toggle">[+]</span>';
        }
        $html .= '<span class="acc_list" data-id="' . $branch["id"] . '">' . $branch['title'] . '</span>';
        if (isset($branch['children'])) {
            $html .= renderTree($branch['children']);
        }
        $html .= '</li>';
    }
    $html .= '</ul>';

    return $html;
}


function getNav($parent, $type)
{
    return Nav::where('parent', $parent)->where('type', $type)->get();
}

function Get_Sidebar()
{
    $Nav = DB::table('navs')->get();
    return $Nav;
}

function get_navkey_by_nav_id($nav_id)
{
    $Permisions = DB::table('nav_keys')->where('nav_id', $nav_id)->get();
    return $Permisions;
}

function get_user_permissions($role_id, $nav_id, $nav_key_id)
{
    $Permisions = NavPermission::where('role_id', $role_id)->where('nav_id', $nav_id)->where('nav_key_id', $nav_key_id)->get();
    return $Permisions;
}

function Get_Permission($nav_id, $role_id)
{
    $arr = [];
    $navs = Get_Sidebar();
    foreach ($navs as $nav) {
        if ($nav->id == $nav_id) {
            $navs_keys = get_navkey_by_nav_id($nav->id);
            foreach ($navs_keys as $navs_key) {
                $perm = get_user_permissions($role_id, $nav->id, $navs_key->id);
                foreach ($perm as $perm) {
                    $arr[] = $navs_key->value;
                }
            }
        }
    }
    return $arr;
}

function checkPermissions($action, $nav_id, $role_id, $user_id)
{
    if ($user_id == 1) {
        return;
    }

    $permission = Get_Permission($nav_id, $role_id);

    if (!in_array($action, $permission)) {
        abort(403, 'Unauthorized action.');
    }
}
