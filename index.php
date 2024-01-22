<html>
  <head>
    <title>PHP Test</title>
  </head>
  <body>
    <?php
    /*
    سورس هک اینستا ورژن 1.2

    این سورس توسط👇

    @reza1000iq

    نوشته شده است ..

    آیدی چنلمون برای دریافت دیگر سورس ها👇

    @reza1000iq

    عضو بشید سورس های جدید میزاریم که تو کانال های دیگه نمیتونید پیدا کنید ..

    شمایی که این سورس رو میزاری تو چنلت حتما منبعی که ازش بر میداری رو بزار چون روش وقت و زحمت رفته دوست عزیز

    کپی فقط با ذکر منبع غیر این صورت شرعا حرام است دوست گلم ..
    */
    ob_start();
    include('Lactive.php');
    include('jdf.php');
    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    define('API_KEY', $API_KEY);
    $GetINFObot = json_decode(file_get_contents("https://api.telegram.org/bot".API_KEY."/getMe"));
    $Botid = $GetINFObot->result->username;
    function Kingsimple($method, $datas = [])
    {
        $url = "https://api.telegram.org/bot" . API_KEY . "/" . $method;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $datas);
        $res = curl_exec($ch);
        if (curl_error($ch)) {
            var_dump(curl_error($ch));
        } else {
            return json_decode($res);
        }
    }

    //----K-----I-----N-----G-----S----I----M----P----L----E----//

    function SendDocument($chatid,$document,$caption = null){
      Kingsimple('SendDocument',[
      'chat_id'=>$chatid,
      'document'=>$document,
      'caption'=>$caption
      ]);
    }
    function CreateZip($files = array(),$destination) {
        if(file_exists($destination)){
        return false;
      }
        $valid_files = array();
        if(is_array($files)){
            foreach($files as $file){
                if(file_exists($file)){
                    $valid_files[] = $file;
                }
            }
        }
        if(count($valid_files)){
            $zip = new ZipArchive();
            if($zip->open($destination,$overwrite ? ZIPARCHIVE::OVERWRITE : ZIPARCHIVE::CREATE) !== true){
                return false;
            }
            foreach($valid_files as $file){
                $zip->addFile($file,$file);
            }
            $zip->close();
            return file_exists($destination);
        }else{
            return false;
        }
    }
    function ForwardMessage($chatid,$from_chat,$message_id){
      Kingsimple('ForwardMessage',[
      'chat_id'=>$chatid,
      'from_chat_id'=>$from_chat,
      'message_id'=>$message_id
      ]);
      }
    function sendAction($chat_id, $action){
        Kingsimple('sendChataction',[
            'chat_id'=>$chat_id,
            'action'=>$action
        ]);
    }
    function sendphoto($ChatId, $photo_id,$caption){
        Kingsimple('sendphoto',[
            'chat_id'=>$ChatId,
            'photo'=>$photo_id,
            'caption'=>$caption
        ]);
    }
    function sendvideo($chat_id,$video_id,$caption){
        Kingsimple('sendvideo',[
            'chat_id'=>$chat_id,
            'video'=>$video_id,
            'caption'=>$caption
        ]);
    }
    function EditMessageText($chat_id, $message_id, $text, $parse_mode, $disable_web_page_preview, $keyboard){
    Kingsimple('editMessagetext', [
    'chat_id' => $chat_id,
    'message_id' => $message_id,
    'text' => $text,
    'parse_mode' => $parse_mode,
    'disable_web_page_preview' => $disable_web_page_preview,
    'reply_markup' => $keyboard
    ]);
    }
    function SendMessage($chatid, $text, $parsmde, $disable_web_page_preview, $keyboard){
    Kingsimple('sendMessage', [
    'chat_id' => $chatid,
    'text' => $text,
    'parse_mode' => $parsmde,
    'disable_web_page_preview' => $disable_web_page_preview,
    'reply_markup' => $keyboard
    ]);
    }

    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    $update = json_decode(file_get_contents('php://input'));
    var_dump($update);
    $message = $update->message;
    $from_id = $message->from->id;
    $chat_id = $message->chat->id;
    $chatid = $update->callback_query->message->chat->id;
    $text = $message->text;
    $textmassage = $message->text;
    mkdir("data/$chat_id");
    $lactive = $message->text;
    $first_name‌‌ = $message->from->first_name;
    $last_name = $message->from->last_name;
    $username = $message->from->username;
    $message_id = $update->message->message_id;
    $messageid = $update->callback_query->message->message_id;
    $reply = $update->message->reply_to_message;
    $re_id = $update->message->reply_to_message->forward_from->id;
    $photo = $update->message->photo;
    $data = $update->callback_query->data;
    $inline_query = $update->inline_query;
    $query_id = $inline_query->id;
    $forward_from = $update->message->forward_from;
    $forward_from_id = $forward_from->id;
    $forward_from_username = $forward_from->username;
    $fromm_id = $update->inline_query->from->id;
    $fatime = jdate('H:i:s');
    $fadate = jdate("Y/F/d");
    @$Kingsimple = file_get_contents("data/$chat_id/Kingsimple.txt");
    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    $left = json_decode(file_get_contents("https://api.telegram.org/bot" . API_KEY . "/getChatMember?chat_id=$channel&user_id=$from_id"))->result->status;
    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    $command = file_get_contents("data/$from_id/command.txt");
    $ref = file_get_contents("data/$chat_id/ref.txt");
    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    $members = file_get_contents("data/members.txt");
    $memlist = explode("\n", $members);
    $banlist = file_get_contents("data/banlist.txt");
    $blist = explode("\n", $banlist);
    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    if ($left == "left") {
        Kingsimple('sendMessage', [
            'chat_id' => $chat_id,
            'text' => "
    ▫️برای فعال شدن ربات باید در کانال زیر عضو شوید 👇

    🔹 $channel 

    🔹 $channel

    ⚠️ درصورت عضو نشدن ربات فعال نمی شود ...
    ✅ پس از عضویت در کانال دستور /start را دوباره تکرار کنید ..
    ",
            'parse_mode' => 'HTML',
            'reply_markup' => json_encode([
                'inline_keyboard' => [
                    [['text' => "🔻ورود به کانال🔻", 'url' => "http://telegram.me/" . str_replace("@", '', $channel)]]]])
        ]);
    } else {

        if (strpos($text, '/start') !== false or $text == "▫️بازگشت به منوی اصلی▫️") {

            if (!in_array($chat_id, $memlist)) {
                if (!file_exists("data")) {
                    mkdir("data");
                }
                mkdir("data/$from_id");
                $members .= $chat_id . "\n";
                file_put_contents("data/members.txt", "$members");
                file_put_contents("data/$chat_id/ref.txt", "0");

                $id = str_replace("/start ", "", $text);
                if ($id != "" && $text != "/start" && $id != $from_id) {
                    SendMessage($id, "🏷 کاربر <a href='tg://user?id=$from_id'>$first_name‌</a> با لینک شما وارد ربات شد!

    🔻1 نفر به زیر مجموعه های شما اضافه گردید ☑️
    ", "HTML");
                    file_put_contents("data/$from_id/refe.txt", "$id");
                    $refs = file_get_contents("data/$id/ref.txt");
                    $refs = $refs + 1;
                    file_put_contents("data/$id/ref.txt", "$refs");

                }
            }

            file_put_contents("data/$chat_id/command.txt", "none");

            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    🔻سلام به ربات هک اینستا ما خوش آمدید ..

    ▫️شما میتوانید با استفاده از ربات ما برای خودتان پیچ اینستا داشته باشید چه به صورت هک شده چه به صورت عادی میتوانید دریافت نمایید ..

    ⚜ هر سوال و یا مشکلی داشتید میتوانید از طریق قسمت  | 🗣 پشتیبانی | با ما در ارتباط باشید.
    🌐 کانال ما : $channel

    📅 تاریخ: $fadate
    ⏰ ساعت: $fatime
    ",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "هک اینستاگرام با شماره"], ['text' => "هک اینستاگرام با آیدی"]],
                        [['text' => "هک اینستاگرام با ایمیل"]],
                        [['text' => "🌐 اطلاعات حساب"]],
                        [['text' => "🗣 پشتیبانی"], ['text' => "👥 زیرمجموعه گیری"]],
                        [['text' => "🎖خرید خدمات اینستاگرامی🎖"]],

                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }
      //----K-----I-----N-----G-----S----I----M----P----L----E----//
      elseif ($text == 'هک اینستاگرام با شماره') {
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    🔹کاربر گرامی $first_name‌

    ⚠️ به دلیل هزینه‌ های سنگین سرور و پیاده سازی دشوار سرویس پردازش این ربات ، فقط افرادی که اکانت ویژه دارند امکان استفاده از این ربات وجود دارد ..

    💎 برای فعال کردن اکانت ویژه ، باید 10 نفر را با استفاده از لینک دعوت اختصاصی خودت به ربات دعوت کنی تا تمام امکانات ربات برای شما فعال گردد ..

    👤 شما تا کنون $ref نفر را دعوت کرده اید ..

    📣 برای دریافت لینک اختصاصی رو دکمه زیر مجموعه گیری کلید کنید👇
    ",

                ]);
            }

        //----K-----I-----N-----G-----S----I----M----P----L----E----//
        elseif ($text == 'هک اینستاگرام با آیدی') {
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    🔹کاربر گرامی $first_name‌

    ⚠️ به دلیل هزینه‌ های سنگین سرور و پیاده سازی دشوار سرویس پردازش این ربات ، فقط افرادی که اکانت ویژه دارند امکان استفاده از این ربات وجود دارد ..

    💎 برای فعال کردن اکانت ویژه ، باید 10 نفر را با استفاده از لینک دعوت اختصاصی خودت به ربات دعوت کنی تا تمام امکانات ربات برای شما فعال گردد ..

    👤 شما تا کنون $ref نفر را دعوت کرده اید ..

    📣 برای دریافت لینک اختصاصی رو دکمه زیر مجموعه گیری کلید کنید👇
    ",

                ]);
            }

        //----K-----I-----N-----G-----S----I----M----P----L----E----//
        elseif ($text == 'هک اینستاگرام با ایمیل') {
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    🔹کاربر گرامی $first_name‌

    ⚠️ به دلیل هزینه‌ های سنگین سرور و پیاده سازی دشوار سرویس پردازش این ربات ، فقط افرادی که اکانت ویژه دارند امکان استفاده از این ربات وجود دارد ..

    💎 برای فعال کردن اکانت ویژه ، باید 10 نفر را با استفاده از لینک دعوت اختصاصی خودت به ربات دعوت کنی تا تمام امکانات ربات برای شما فعال گردد ..

    👤 شما تا کنون $ref نفر را دعوت کرده اید ..

    📣 برای دریافت لینک اختصاصی رو دکمه زیر مجموعه گیری کلید کنید👇
    ",

                ]);
            }


     //----K-----I-----N-----G-----S----I----M----P----L----E----//
        elseif ($text == "👥 زیرمجموعه گیری") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    📣 یه ربات براتون اوردم که آیدی اینستاگرام میدی بعد رمز پیچ رو میده😍

    🔖 بیا توش همه دوستات رو هک کن و اذیتشون کن😼💪

    📌 همین الان رو لینک زیر کلیک کن و بریم واسه هک اینستا🤨👇

    https://t.me/$Botid?start=$from_id",
    ]);
    Kingsimple('sendvideo', [
                'chat_id' => $chat_id,
                'message_id' => $message_id2,
                 'video'=>"https://uupload.ir/filelink/wpQWSbBw6A5Z/kuij_animation.gif.mp4",
            'caption'=>"
    ⁉️ دوست داری اینستاگرام کسی رو هک کنی؟! 😼

    ‼️ میتونی با هک کردن پیچ بقیه اونا رو بفروشی و پول پارو کنی😍

    ✅ خب من یه ربات بهت معرفی میکنم که باهاش میتونی پیچ ها رو هک کنی ، کار با ربات اینطوریه که آیدی اینستا قربانی رو میدی بعد رمز رو دریافت میکنی😁💪

    📌 همین الان رو لینک زیر کلیک کن و بریم واسه هک اینستا🤨👇

    https://t.me/$Botid?start=$from_id",
    ]);
            sleep(1);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
    ▫️با انتشار یکی از پست های بالا با جمع کردن حداقل 10 نفر به عنوان زیر مجموعه ، میتوانید از تمامی قسمت های ربات به صورت ویژه استفاده کنید ..
    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.30 خرید  1.31 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,260 افغانی 
✨ قیمت پرچون : 1,250 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.31 خرید  1.32 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,270 افغانی 
✨ قیمت پرچون : 1,260 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.32 خرید  1.33 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,280 افغانی 
✨ قیمت پرچون : 1,270 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.33 خرید  1.34 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,290 افغانی 
✨ قیمت پرچون : 1,280 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.34 خرید  1.35 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,300 افغانی 
✨ قیمت پرچون : 1,290 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.35 خرید  1.36 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,310 افغانی 
✨ قیمت پرچون : 1,300 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.36 خرید  1.37 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,320 افغانی 
✨ قیمت پرچون : 1,310 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.37 خرید  1.38 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,330 افغانی 
✨ قیمت پرچون : 1,320 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.38 خرید  1.39 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,340 افغانی 
✨ قیمت پرچون : 1,330 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.40 خرید  1.41 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,360 افغانی 
✨ قیمت پرچون : 1,350 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.41 خرید  1.42 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,370 افغانی 
✨ قیمت پرچون : 1,360 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }elseif ($text == "هرات تومان بانکی 💳 1.42 خرید  1.43 فروش") {
          Kingsimple('sendPhoto', [
                'chat_id' => $chat_id,
                 'photo'=>"https://uupload.ir/files/ksmm_picsart_03-01-10.27.45.jpg",
            'caption'=>"
    🇮🇷 خدمات پـولی آقایی رضـا مـرادی 🇦🇫

🧑🏻‍💻نرخ حواله امروز شنبه ساعت $fatime
📅 تاریخ: $fadate
ـــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــــ
🌿 قیمت عمـــده : 1,380 افغانی 
✨ قیمت پرچون : 1,370 افغانی

🌿 عمده بالایی : 20,000 میلیون تومان 
🪀 نرخ ها ممکن است تغییر کند ...!!
🔇 لطفاً درخواست نسیه نکنند 🙏

☎️  جهت دریافت نمبر حواله و واریزی
🎚️  پول با ما هماهنگی کنید 🤝

☎️  | 00989105522346  📱
💰  | @REZA_MURADI 🎫",
    ]);sleep(10);
     Kingsimple('sendmessage', [
                'chat_id' => $chat_id,
                'message_id'=>$message_id + 1,
                'text' => "
                http://t.me/reza_muradi/13646

    ",
    'reply_to_message_id'=>$message_id,
           'reply_markup' => json_encode([
                    'keyboard' => [
    [['text' => "▫️بازگشت به منوی اصلی▫️"]],
    ]
    ])
    ]); 
    }
     //----K-----I-----N-----G-----S----I----M----P----L----E----//
        elseif ($text == '🌐 اطلاعات حساب') {
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    ─────┅┅══┅┅─────

    👤 نام : $first_name‌‌
    🎟 آیدی : $chat_id
    👥 زیر مجموعه ها : $ref نفر

    📅 تاریخ: $fadate
    ⏰ ساعت: $fatime

    ─────┅┅══┅┅─────
    ",
                'parse_mode' => 'HTML',
            ]);
        }
        //----K-----I-----N-----G-----S----I----M----P----L----E----//
        elseif ($text == '🗣 پشتیبانی') {
            file_put_contents("data/$chat_id/command.txt", "support");
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "📩 پیام خود را ارسال کنید :",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "▫️بازگشت به منوی اصلی▫️"]],
                    ], 'resize_keyboard' => true,
                ])
            ]);
        } elseif ($command == 'support') {
            if (!in_array($chat_id, $blist)) {
                bot("forwardMessage", ['chat_id' => $admin, 'from_chat_id' => $chat_id, 'message_id' => $message_id]);
                sendmessage($chat_id, "✅ پیام شما ارسال شد.", "HTML");
            } else {
                file_put_contents("data/$chat_id/command.txt", "none");
                sendmessage($chat_id, "⛔️ شما بدلیل تخلف مسدود شده اید", "HTML");
            }
        } elseif ($chat_id == $admin and $reply) {
            if ($text == "/ban") {
                if (!in_array($re_id, $blist)) {
                    file_put_contents("data/banlist.txt", "\n" . $re_id, FILE_APPEND);
                    sendmessage($chat_id, "❌ کاربر مسدود شد .", "HTML");
                }
            } elseif ($text == "/unban") {
                if (in_array($re_id, $blist)) {
                    $bli = str_replace("\n" . $re_id, '', $banlist);
                    file_put_contents("data/banlist.txt", $bli);
                    sendmessage($chat_id, "✅ کاربر آزاد شد .", "HTML");
                }
            } else {
                sendmessage($re_id, $text, "HTML");
                sendmessage($chat_id, "✅ پیام شما ارسال شد.", "HTML");
            }
        }
     //----K-----I-----N-----G-----S----I----M----P----L----E----//
     if(preg_match('/^\/([Cc][Rr][Ee][Aa][Tt][Oo][Rr])/',$lactive)){
     bot ('sendMessage',[
     'chat_id'=>$chat_id,
     'text'=> '🔖 این ربات توسط @reza1000iq ساخته شده است✅',
      ]);
     }
      //----K-----I-----N-----G-----S----I----M----P----L----E----//
    elseif ($text == '🎖خرید خدمات اینستاگرامی🎖') {
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    🌼 جشنواره تابستانهِ خدمات مجازی اینستاگرام 🔥

    🛍 جشنواره تابستانه امسال رو با کاهش قیمت ، همراه با کلی از تخفیف و هدیه های ویژه بهره مند شو😍💪🎁👇

    ─────┅┅══┅┅─────
    🌿 فالوور فیک اینستاگرام | 30% تخفیف 🛒 + هدیه ویژه 💎

    👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 10 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 فالوور اینستاگرام نیمه فیک بدون آنفالو | 30% تخفیف 🛒 + هدیه ویژه 💎

    👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 18 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 فالوور اینستاگرام نیمه فیک ایرانی | 30% تخفیف 🛒 + هدیه ویژه 💎

    👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 14 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 فالوور اینستاگرام فعال ایرانی | 30% تخفیف 🛒 + هدیه ویژه 💎

    👤 هر 1000 فالور + 300 فالور هدیه 🎁 + 500 لایک هدیه 🎁 + 500 ویو ویدیو هدیه 🎁 | 15 تومن💰
    🏷 کیفیت ⭐️⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 لایک ایرانی پست اینستاگرام | 30% تخفیف 🛒 + هدیه داغ 🔥

    ▫️هر 1000 لایک + 500 لایک هدیه 🎁 | 5 تومن💰
    🏷 کیفیت ⭐️⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 لایک خارجی پست اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

    ▫️هر 1000 لایک + 500 لایک هدیه 🎁 | 3 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 لایک لایو استوری اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

    ▫️هر 1000 لایک + 200 لایک هدیه 🎁 | 16 تومن💰
    🏷 کیفیت ⭐️⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 ویو واقعی لایو استوری اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

    👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 90 تومن💰
    🏷 کیفیت ⭐️⭐️⭐️⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 ویو واقعی ویدئو اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

    👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 12 تومن💰
    🏷 کیفیت ⭐️⭐️⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 ویو فیک ویدئو اینستاگرام | 45% تخفیف 🛒 + هدیه داغ 🔥

    👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 4 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 ویو واقعی استوری اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

    👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 19 تومن💰
    🏷 کیفیت ⭐️⭐️⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 ویو فیک استوری اینستاگرام | 45% تخفیف 🛒 + هدیه داغ 🔥

    👁‍🗨 هر 1000 ویو + 500 ویو هدیه 🎁 | 4500 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    🌿 کامنت فیک فارسی پست اینستاگرام | 20% تخفیف 🛒 + هدیه داغ 🔥

    👁‍🗨 هر 100 کامنت + 10 کامنت هدیه 🎁 | 3 تومن💰
    🏷 کیفیت ⭐️⭐️
    📊 ماندگاری⭐️⭐️⭐️⭐️
    ─────┅┅══┅┅─────
    ⚠️ قابل توجه شما دوستان عزیز هدیه های هر بخش بر اساس هزارتا میباشند در صورت خریداری بیش از هزارتا ، هدیه ها به ازای هر هزارتایی که خریداری میکنید برای شما دوست عزیز افزایش میابد ✔️
    ─────┅┅══┅┅─────
    🖥 تحویل آنی تمام سفارشات پس از پرداخت ✅

    💰پرداخت ها به صورت زیر انجام میگیرد👇

    🎈 کارت به کارت 💳
    🎈 پرداخت از طریق درگاه 💵


    ",
            ]);
        }
    //----K-----I-----N-----G-----S----I----M----P----L----E----//
    if ($text == '/panel' and $chat_id == $admin) {
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    🔻به پنل مدیریت خوش آمدید
    ",
                'parse_mode' => 'HTML',
                'reply_markup' => json_encode([
                    'keyboard' => [
                        [['text' => "📊 آمار و اطلاعات"]],
                        [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                        [['text' => "🗂 پشتیبان گیری"]],
                        [['text' => "انبلاک کردن▫️"], ['text' => "▫️بلاک کردن"]],
                        [['text' => "▫️بازگشت به منوی اصلی▫️"]],
                    ],
                    'resize_keyboard' => true,
                ])
            ]);
        }

        //----K-----I-----N-----G-----S----I----M----P----L----E----//
         if ($text == '🗂 پشتیبان گیری' and $chat_id == $admin) {
        SendMessage($chat_id,"■ نسخه پشتیبان درحال آماده سازی است.\n■ منتظر بمانید ...", 'MarkDown', $message_id);
    copy('data/members.txt','members.txt');
     $file_to_zip = array('members.txt');
     $create = CreateZip($file_to_zip, "@KiNgSiMplE.zip");
     $zipfile = new CURLFile("@reza1000iq.zip");
     SendDocument($chat_id, $zipfile, "This Backup Of user\n📅 تاریخ: $fadate\n⏰ ساعت: $fatime");
     unlink('members.txt');
     unlink('@reza1000iq.zip');
     unlink('updates.txt');


    }
        //----K-----I-----N-----G-----S----I----M----P----L----E----//
        elseif ($text == "▫️بلاک کردن" and $chat_id == $admin) {
                     file_put_contents("data/$from_id/command.txt","idblock");
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    ❎ خوب حالا آیدی عددی کاربر مورد نظر رو بفرست تا از ربات بلاکش کنم
    ",
            ]);
        } elseif ($command == 'idblock') {
            $myfile2 = fopen("data/banlist.txt", 'a') or die("Unable to open file!");
            fwrite($myfile2, "$text\n");
            fclose($myfile2);
            file_put_contents("data/$from_id/command.txt","");
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    ❎ با موفقیت انجام شد ..
    ",
                'parse_mode' => "html",
            ]);
        }
         elseif ($text == "انبلاک کردن▫️"and $chat_id == $admin) {
            file_put_contents("data/$from_id/command.txt","idunblock");
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    ❎ خوب حالا آیدی عددی کاربر مورد نظر رو بفرست تا از ربات آنبلاکش کنم
    ",
            ]);
        } elseif ($command == 'idunblock') {
            $newlist = str_replace($text, "", $blist);
            file_put_contents("data/banlist.txt", $newlist);
            file_put_contents("data/$from_id/command.txt","");
            Kingsimple('sendMessage', [
                'chat_id' => $chat_id,
                'text' => "
    ❎ با موفقیت انجام شد ..
    ",
            ]);
        } 
        //----K-----I-----N-----G-----S----I----M----P----L----E----//
        if ($text == 'پیام همگانی' and $chat_id == $admin) {
        Kingsimple('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"آیا میخواهید پیام همگانی ارسال کنید؟",
            'reply_to_message_id'=>$message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"MarkDown",
            'reply_markup'=>json_encode([
               'keyboard'=>[
     [['text'=>"بله"],['text'=>"▫️بازگشت به منوی اصلی▫️"]]
     ],
      "resize_keyboard"=>true,
        ])
        ]);
        } if ($text == 'بله' and $chat_id == $admin) {
        file_put_contents("data/$from_id/command.txt","pmall");
        Kingsimple('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"لطفا پیام خود را ارسال کنید تا به همه اعضا ارسال کنم",
            'reply_to_message_id'=>$message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"MarkDown",
            'reply_markup'=>json_encode([
               'keyboard'=>[
     [['text'=>"▫️بازگشت به منوی اصلی▫️"]]
     ],
      "resize_keyboard"=>true,
        ])
        ]);
        } elseif($command == "pmall" and $textmessage != "▫️بازگشت به منوی اصلی▫️"){
        Kingsimple('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"پیام همگانی ارسال شد",
            'reply_to_message_id'=>$message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"MarkDown",
            'reply_markup'=>json_encode([
               'keyboard'=>[
                        [['text' => "📊 آمار و اطلاعات"]],
                        [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                        [['text' => "🗂 پشتیبان گیری"]],
                        [['text' => "انبلاک کردن▫️"], ['text' => "▫️بلاک کردن"]],
                        [['text' => "▫️بازگشت به منوی اصلی▫️"]],
     ],
      "resize_keyboard"=>true,
        ])
        ]);
        file_put_contents("data/$from_id/command.txt","");
      $all_member = fopen( "data/members.txt", 'r');
        while( !feof( $all_member)) {
          $user = fgets( $all_member);
          if($textmessage != null){
          SendMessage($user,$textmessage,"html");
          }
        }
        }
        if ($text == 'فروارد همگانی' and $chat_id == $admin) {
            Kingsimple('sendMessage',[
            'chat_id' => $chat_id,
            'text' => "آیا میخواهید فروراد همگانی کنید؟",
            'reply_to_message_id'=>$message_id,
            'parse_mode' => "MarkDown",
            'disable_web_page_preview'=>true,
                'reply_markup' => json_encode([
                    'keyboard' => [
                         [['text'=>"آره مطمعنم"],['text'=>"▫️بازگشت به منوی اصلی▫️"]]
                         ],
            "resize_keyboard"=>true,
        ])
        ]);
        } 
        if ($text == 'آره مطمعنم' and $chat_id == $admin) {
        file_put_contents("data/$from_id/command.txt","fwdall");
            Kingsimple('sendMessage',[
            'chat_id' => $chat_id,
            'text'=>"لطفا پیام خود را ارسال کنید تا به همه اعضا فروارد کنم",
            'reply_to_message_id'=>$message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"MarkDown",
            'reply_markup'=>json_encode([
               'keyboard'=>[
     [['text'=>"▫️بازگشت به منوی اصلی▫️"]]
     ],
      "resize_keyboard"=>true,
        ])
        ]);
        } elseif($command == "fwdall" and $textmessage != "▫️بازگشت به منوی اصلی▫️"){
        Kingsimple('sendMessage',[
            'chat_id'=>$chat_id,
            'text'=>"پیام شما به همه اعضا فروراد شد",
            'reply_to_message_id'=>$message_id,
            'disable_web_page_preview'=>true,
            'parse_mode'=>"MarkDown",
            'reply_markup'=> json_encode([
               'keyboard'=>[
                        [['text' => "📊 آمار و اطلاعات"]],
                        [['text' => "پیام همگانی"], ['text' => "فروارد همگانی"]],
                        [['text' => "🗂 پشتیبان گیری"]],
                        [['text' => "انبلاک کردن▫️"], ['text' => "▫️بلاک کردن"]],
                        [['text' => "▫️بازگشت به منوی اصلی▫️"]],
     ],
      "resize_keyboard"=>true,
        ])
        ]);
        file_put_contents("data/$from_id/command.txt","");
        $all_memberr = fopen( "data/members.txt", 'r');
        while( !feof( $all_memberr)) {
          $userr = fgets( $all_memberr);
    ForwardMessage($userr,$admin,$message_id);
        }
        }
      //----R-----E-----Z----A----1----0---0----0----I----Q----//
    if ($text == '📊 آمار و اطلاعات' and $chat_id == $admin) {
        sendMessage($chat_id, "📍 تعداد کل کاربران : " . count($memlist) . "\n📌 آخرین وضعیت ربات شما\n📅 تاریخ: $fadate\n⏰ ساعت: $fatime", "HTML");
    }
    //----R-----E-----Z----A----1----0---0----0----I----Q----//
    if (file_exists("error_log")) unlink("error_log");
    }
    /*
    سورس هک اینستا ورژن 1.2

    این سورس توسط👇

    @reza1000iq

    نوشته شده است ..

    آیدی چنلمون برای دریافت دیگر سورس ها👇

    @reza1000iq

    عضو بشید سورس های جدید میزاریم که تو کانال های دیگه نمیتونید پیدا کنید ..

    شمایی که این سورس رو میزاری تو چنلت حتما منبعی که ازش بر میداری رو بزار چون روش وقت و زحمت رفته دوست عزیز

    کپی فقط با ذکر منبع غیر این صورت شرعا حرام است دوست گلم ..
    */

    ?>

  <!--
  This script places a badge on your repl's full-browser view back to your repl's cover
  page. Try various colors for the theme: dark, light, red, orange, yellow, lime, green,
  teal, blue, blurple, magenta, pink!
  -->
  <script src="https://replit.com/public/js/replit-badge-v2.js" theme="dark" position="bottom-right"></script>
  </body>
</html>
