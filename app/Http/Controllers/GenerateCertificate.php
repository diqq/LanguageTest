<?php

namespace App\Http\Controllers;

use DateTime;
use DateInterval;
use App\Models\ept_score;
use App\Models\toeic_score;
use Endroid\QrCode\QrCode;
use Illuminate\Http\Request;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Storage;

class GenerateCertificate extends Controller
{
    public function generate(Request $request)
    {
        if($request->category == 'ept'){
            $data = ept_score::where('user_id', auth()->user()->id)->where('score_code', $request->score_code)->first();
            $templatePath = public_path('storage/ept_certificate_template/ept_certificate_template.png');
            $fontPath = public_path('storage/ept_certificate_font/ept_certificate_font.ttf');
            $link = url('/certificate/ept/' . $data->score_code);
            $text7 = "Listening : " . $data->score_first_section;
            $text8 = "Structure : " . $data->score_second_section;
            $text9 = "Reading : " . $data->score_third_section;
        }
        else{
            $data = toeic_score::where('user_id', auth()->user()->id)->where('score_code', $request->score_code)->first();
            $templatePath = public_path('storage/toeic_certificate_template/toeic_certificate_template.png');
            $fontPath = public_path('storage/toeic_certificate_font/toeic_certificate_font.ttf');
            $link = url('/certificate/toeic/' . $data->score_code);
            $text7 = "Listening : " . $data->score_listening;
            $text8 = "Reading : " . $data->score_reading;
            $text9 = "";
        }

        $category = $request->category;
        $qrCode = new QrCode($link);
        $writer = new PngWriter();
        $pngResult = $writer->write($qrCode);
        $pngString = $pngResult->getString();
        $directoryPath = 'public/qrcode/';
        $filename = 'qrCode_' . $data->score_code . '.png';
        Storage::put($directoryPath . $filename, $pngString);
        $qrPath = public_path('storage/qrcode/' . $filename);

        $certificateImage = imagecreatefrompng($templatePath);  

        $black = imagecolorallocate($certificateImage, 0, 0, 0);    

        $name = $data->user->name;

        $date = $data->created_at;

        $timestamp = strtotime($date);

        $date_formatted = date('d F Y', $timestamp);

        $imageWidth = imagesx($certificateImage);

        $maxTextWidth = 0.8 * $imageWidth;

        $fontSize = 90;
        $fontScale = 1.0;

        do {
            $fontSize *= $fontScale;
            $textBoundingBox = imagettfbbox($fontSize, 0, $fontPath, $name);
            $textWidth = $textBoundingBox[2] - $textBoundingBox[0];
            $fontScale = $maxTextWidth / $textWidth;
        } 
        while ($textWidth > $maxTextWidth);

        $originalDate = DateTime::createFromFormat('d F Y', $data->created_at);

        if ($originalDate === false) {
            $originalDate = DateTime::createFromFormat('Y-m-d', $data->created_at);
            if ($originalDate === false) {
                $originalDate = new DateTime();
            }
        }
        
        $newDate = $originalDate->add(new DateInterval('P2Y'))->format('d F Y');

        $text1 = "THIS IS TO CERTIFY THAT";
        $text2 = $name;
        $text3 ="Student ID No. : " . $data->user->profile->npm ;
        $text4 = "has taken the " . strtoupper($category) . " - Utama on";
        $text5 = $date_formatted;
        $text6 = "With the following result:";
        $text10 = "OVERALL : " . $data->score_total;
        $text11 = "Valid until : " . $newDate;
        $text12 = "Ida Zuraida, Hj., S.S., M.Pd.";
        $text13 = "Head of Lembaga Bahasa";

        $fontSize1 = 20;
        $fontSize2 = 40;

        $textWidth1 = imagettfbbox($fontSize1, 0, $fontPath, $text1)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text1)['0'];
        $x1 = (imagesx($certificateImage) - $textWidth1) / 2;

        $textWidth2 = imagettfbbox($fontSize2, 0, $fontPath, $text2)['2'] - imagettfbbox($fontSize2, 0, $fontPath, $text2)['0'];
        $x2 = (imagesx($certificateImage) - $textWidth2) / 2;

        $textWidth3 = imagettfbbox($fontSize1, 0, $fontPath, $text3)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text3)['0'];
        $x3 = (imagesx($certificateImage) - $textWidth3) / 2;

        $textWidth4 = imagettfbbox($fontSize1, 0, $fontPath, $text4)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text4)['0'];
        $x4 = (imagesx($certificateImage) - $textWidth4) / 2;

        $textWidth5 = imagettfbbox($fontSize1, 0, $fontPath, $text5)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text5)['0'];
        $x5 = (imagesx($certificateImage) - $textWidth5) / 2;

        $textWidth6 = imagettfbbox($fontSize1, 0, $fontPath, $text6)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text6)['0'];
        $x6 = (imagesx($certificateImage) - $textWidth6) / 2;

        $textWidth7 = imagettfbbox($fontSize1, 0, $fontPath, $text7)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text7)['0'];
        $x7 = (imagesx($certificateImage) - $textWidth7) / 2;

        $textWidth8 = imagettfbbox($fontSize1, 0, $fontPath, $text8)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text8)['0'];
        $x8 = (imagesx($certificateImage) - $textWidth8) / 2;

        $textWidth9 = imagettfbbox($fontSize1, 0, $fontPath, $text9)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text9)['0'];
        $x9 = (imagesx($certificateImage) - $textWidth9) / 2;

        $textWidth10 = imagettfbbox($fontSize1, 0, $fontPath, $text10)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text10)['0'];
        $x10 = (imagesx($certificateImage) - $textWidth10) / 2;

        $textWidth12 = imagettfbbox($fontSize1, 0, $fontPath, $text12)['2'] - imagettfbbox($fontSize1, 0, $fontPath, $text12)['0'];

        imagettftext($certificateImage, $fontSize1, 0, $x1, 325, $black, $fontPath, $text1);
        imagettftext($certificateImage, $fontSize2, 0, $x2, 400, $black, $fontPath, $text2);
        imagettftext($certificateImage, $fontSize1, 0, $x3, 475, $black, $fontPath, $text3);
        imagettftext($certificateImage, $fontSize1, 0, $x4, 525, $black, $fontPath, $text4);
        imagettftext($certificateImage, $fontSize1, 0, $x5, 575, $black, $fontPath, $text5);
        imagettftext($certificateImage, $fontSize1, 0, $x6, 625, $black, $fontPath, $text6);
        imagettftext($certificateImage, $fontSize1, 0, $x7, 675, $black, $fontPath, $text7);
        imagettftext($certificateImage, $fontSize1, 0, $x8, 725, $black, $fontPath, $text8);
        imagettftext($certificateImage, $fontSize1, 0, $x9, 775, $black, $fontPath, $text9);
        imagettftext($certificateImage, $fontSize1, 0, $x10, 825, $black, $fontPath, $text10);
        imagettftext($certificateImage, $fontSize1, 0, 100, 875, $black, $fontPath, $text11);
        imagettftext($certificateImage, $fontSize1, 0, 1500, 1155, $black, $fontPath, $text12);
        imagettftext($certificateImage, $fontSize1, 0, 1510, 1195, $black, $fontPath, $text13);
        imageline($certificateImage, 1500, 1165, (1500 + $textWidth12) ,1165, $black );


        // Load the QR code image
        $qrImage = imagecreatefrompng($qrPath);

        // Set the position to overlay the QR code (right bottom)
        $qrX = ($imageWidth - imagesx($qrImage))/2; // X-coordinate
        $qrY = imagesy($certificateImage) - imagesy($qrImage) - 125; // Y-coordinate

        // Copy the QR code image onto the certificate image
        imagecopy($certificateImage, $qrImage, $qrX, $qrY, 0, 0, imagesx($qrImage), imagesy($qrImage));

        // Output the resulting image
        header('Content-Type: image/png');
        header('Content-Disposition: attachment; filename="certificate.png"');
        imagepng($certificateImage);

        // Clean up resources
        imagedestroy($certificateImage);
        imagedestroy($qrImage);
        unlink($qrPath);
    
        return redirect()->back();
    }
}
