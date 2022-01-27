<?php


namespace App\Http\Services;


class ImageUpload
{
    public static function UploadImage($file, $path)
    {
        $fileTmpPath = $file['tmp_name'];
        $fileName = $file['name'];
        $fileSize = $file['size'];
        $fileType = $file['type'];
        $fileNameSeprate = explode('.',$fileName);

        if(!file_exists($path))
        {
            mkdir($path);
        }

        $fileExtention = strtolower(end($fileNameSeprate));
        $newFileName = md5(time().$fileName).'.' . $fileExtention;
        $allowedFileExtentions = ['jpg','jpeg','png'];
        if(in_array($fileExtention,$allowedFileExtentions))
        {
            $allowedMaxFileSize = 30 * 1024 * 1024;
            if($fileSize < $allowedMaxFileSize)
            {
                $uploadFileDir = $path;
                $destPath =  $uploadFileDir . $newFileName;
                if(move_uploaded_file($fileTmpPath, $destPath))
                {
                    return $destPath;
                }
                else{
                    error('error', 'اپلود فایل با خطا روبرو شد');
                    return redirectBack();
                }

            }
            else{
                error('hajm','حجم فایل شما بیش از حد مجاز می باشد!');
                return redirectBack();
            }
        }

        else{
            error('file','فایل مورد نظر برای اپلود مجاز نمی باشد لطفا عکس اپلود کنید');
            return redirectBack();
        }
    }

    public static function remove($path)
    {
        $path = trim(BASE_PATH, '/ ') . '/' . trim($path, '/ ');
        unlink($path);
    }
}

