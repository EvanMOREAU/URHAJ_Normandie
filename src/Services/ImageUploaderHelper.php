<?php

namespace App\Services;

use Symfony\Component\String\Slugger\SluggerInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;

class ImageUploaderHelper {

    private $slugger;
    private $translator;
    private $params;
    private $flash;

    public function __construct(SluggerInterface $slugger, TranslatorInterface $translator, ParameterBagInterface $params) {
        $this->slugger = $slugger;
        $this->translator = $translator;
        $this->params = $params;
        }

    public function uploadImage($form, $user): String {
        $errorMessage = "";
        $imageFile = $form->get('image')->getData();

        if ($imageFile) {
            $originalFilename = pathinfo($imageFile->getClientOriginalName(), PATHINFO_FILENAME);
           
            // dump($originalFilename);

            $safeFilename = $this->slugger->slug($originalFilename);
            $newFilename = $safeFilename.'-'.uniqid().'.'.$imageFile->guessExtension();
        
            // dump($safeFilename);
            // dump($newFilename);
            
            try {
                $imageFile->move(
                    $this->params->get('images_directory'),
                    $newFilename
                );
            } catch (FileException $e) {
               $errorMessage = $e->getMessage();
            }
            $user->setimageFilename($newFilename);
            
        }
        return $errorMessage;
    }
}