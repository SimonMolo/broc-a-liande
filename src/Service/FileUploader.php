<?php
namespace App\Service;

use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\File\UploadedFile;
use Symfony\Component\String\Slugger\SluggerInterface;

class FileUploader{
    private $targetDirectory;
    private $slugger;

    public function __construct($targetDirectory, SluggerInterface $slugger){
        $this->targetDirectory= $targetDirectory;
        $this->slugger = $slugger;
    }
    public function upload(UploadedFile $articleFile): string
    {
        $originalFilename = pathinfo($articleFile->getClientOriginalName(), PATHINFO_FILENAME);
        $safeFilename = $this->slugger->slug($originalFilename);
        $fileName = $safeFilename . '-' . uniqid() . '-' . $articleFile->guessExtension();
   try{
       $articleFile->move($this->getTargetDirectory(), $fileName);
   } catch (FileException $e) {
   }
   return $fileName;

    }
    public function getTargetDirectory(){
        return $this->targetDirectory;
    }
}