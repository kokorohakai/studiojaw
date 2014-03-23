<?php
if (is_array($argv)){
	if (isset($argv[1])){
		$file = "../dj/mixes/".$argv[1];
		$tempfile = "/tmp/".$argv[1].".png";
		if (file_exists($file)){
			system('sox "'.$file.'" -n spectrogram -x 2000 -y 150 -z 100 -q 20 -l -r -p 6 -o "'.$tempfile.'"');
			$image = new Imagick($tempfile);

			$image->cropImage(2000,150,0,0);

			$mirrorImage = clone $image;
			$mirrorImage->flipImage();

			$gradient = new Imagick();
			$gradient->newPseudoImage(2000,150, "gradient:#FFF7-#FFFF");
			$mirrorImage->compositeImage($gradient, imagick::COMPOSITE_DEFAULT, 0, 0 );

			$final = new Imagick();
			$final->newPseudoImage(2000,300,"canvas:#FFFF");
			$final->compositeImage($image, imagick::COMPOSITE_DEFAULT, 0, 0 );
			$final->compositeImage($mirrorImage, imagick::COMPOSITE_DEFAULT, 0, 150 );
			$final->writeImage($file.".png");
			unlink($tempfile);
		}
	}
}