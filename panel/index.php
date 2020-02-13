<?php
$url = "http://userpanel.lc/";
//var_dump($_COOKIE);die;
if (isset($_COOKIE)){
    echo "به پنل خود خوش آمدید";
    echo "<br>";
    echo "رمز جدید هر روز برای شما ارسال می شود";
    echo "<br>";
    echo "این نشست تا 6000 ثانیه دیگر برای شما منقضی می شود :)";


}
else {
    header("Location: $url");
}