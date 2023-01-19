<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Endroid\QrCode\Color\Color;
use Endroid\QrCode\ErrorCorrectionLevel\ErrorCorrectionLevelHigh;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Label\Label;
use Endroid\QrCode\Logo\Logo;
use Endroid\QrCode\RoundBlockSizeMode\RoundBlockSizeModeEnlarge;
use Endroid\QrCode\Writer\PngWriter;

class QrController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function create(Request $req)
    {
        $rgbLabel = hexToRgb($req->labelColor);
        $rgbFore = hexToRgb($req->ForegroundColor);
        $rgbBack = hexToRgb($req->BackgroundColor);
        $write = new PngWriter();
        $qrCode = QrCode::create($req->url)
            ->setEncoding(new Encoding('UTF-8'))
            ->setErrorCorrectionLevel(new ErrorCorrectionLevelHigh())
            ->setSize(500)
            ->setMargin(10)
            ->setRoundBlockSizeMode(new RoundBlockSizeModeEnlarge)
            ->setForegroundColor(new Color($rgbFore['r'], $rgbFore['g'], $rgbFore['b']))
            ->setBackgroundColor(new Color($rgbBack['r'], $rgbBack['g'], $rgbBack['b']));
        $label = null;
        if ($req->label) {
            $label = Label::create($req->label)->setTextColor(new Color($rgbLabel['r'], $rgbLabel['g'], $rgbLabel['b']));
        }
        if ($req->hasFIle('image')) {
            if (!$req->logoWidth) {
                $logo = Logo::create($req->image)
                    ->setResizeToHeight($req->logoHeight);
            } elseif (!$req->logoHeight) {
                $logo = Logo::create($req->image)
                    ->setResizeToWidth($req->logoWidth);
            } elseif (!$req->logoHeight && !$req->logoWidth) {
                $logo = Logo::create($req->image);
            } else {
                $logo = Logo::create($req->image)
                    ->setResizeToWidth($req->logoWidth)
                    ->setResizeToHeight($req->logoHeight);
            }
            $result = $write->write($qrCode, $logo, $label);
        } else {
            $result = $write->write($qrCode, null, $label);
        }
        return $result->getDataUri();
    }
}
