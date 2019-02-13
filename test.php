<?php
/**
 * Created by PhpStorm.
 * User: DreamBoy
 * Date: 2016/4/8
 * Time: 21:39
 */
header('content-type:text/html;charset=utf-8');
include_once 'upload.fuc.php';
 
$files = getFiles();
//print_r($files);
 
foreach($files as $fileInfo) {
    $res = uploadFile($fileInfo);
    echo $res['mes'],'<br/>';
 
    if(isset($res['dest'])) {
        $uploadFiles[] = $res['dest'];
    }
}
//过滤掉上传失败的文件
/**
 * array_values() 函数返回一个包含给定数组中所有键值的数组，但不保留键名。
 * 提示：被返回的数组将使用数值键，从 0 开始并以 1 递增。
 */
/**
 * array_filter() 函数用回调函数过滤数组中的值。
 * 该函数把输入数组中的每个键值传给回调函数。如果回调函数返回 true，
 * 则把输入数组中的当前键值返回结果数组中。数组键名保持不变。
 */
//这里使用array_filter过滤掉数组中的空内容
if(isset($uploadFiles)) {
    $uploadFiles=array_filter($uploadFiles);
 
    print_r($uploadFiles);
}
