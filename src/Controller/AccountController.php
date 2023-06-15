<?php

namespace App\Controller;

use App\Entity\User;
use App\Form\ImageType;
use App\Form\NetworkType;
use App\Form\DescType;
use App\Form\PasswordType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Services\ImageUploaderHelper;
use App\Repository\UserRepository;
use Symfony\Contracts\Translation\TranslatorInterface;


#[Route('/account')]
class AccountController extends AbstractController
{
    #[Route('/', name: 'app_account')]
    public function manage(Request $request, EntityManagerInterface $entityManager): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur actuellement connecté

        $form = $this->createForm(ImageType::class);
        $form->handleRequest($request);

        // if ($form->isSubmitted() && $form->isValid()) {
        //     $formData = $form->getData();

        //     // Vérifier si le mot de passe actuel est correct
        //     if (!$this->passwordEncoder->isPasswordValid($user, $formData['currentPassword'])) {
        //         $this->addFlash('error', 'Le mot de passe actuel est incorrect.');
        //         return $this->redirectToRoute('account_manage');
        //     }

        //     // Mettre à jour le mot de passe
        //     $user->setPassword($this->passwordEncoder->encodePassword($user, $formData['newPassword']));
        //     $entityManager->flush();

        //     $this->addFlash('success', 'Le mot de passe a été modifié avec succès.');
        //     return $this->redirectToRoute('account_manage');
        // }
        
        return $this->render('account/manage.html.twig', [
            'connected_user' => $user,
            'controller_name' => 'AccountController',
            'form' => $form,
        ]);
    }   

    #[Route('/apparence', name: 'app_account_appearance')]
    public function image(Request $request, EntityManagerInterface $entityManager, ImageUploaderHelper $imageUploaderHelper, UserRepository $userRepository, TranslatorInterface $translator): Response
    {
        $user = $this->getUser(); // Récupère l'utilisateur actuellement connecté

        $form = $this->createForm(ImageType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {

            $errorMessage = $imageUploaderHelper->uploadImage($form, $user);
            if (!empty($errorMessage)) {
                $this->addFlash ('danger', $translator->trans('An error has occured: ') . $errorMessage);
            }
            $userRepository->save($user, true);

            return $this->render('/account/manage.html.twig', [
                'connected_user' => $user,
                'controller_name' => 'AccountController',
                'form' => $form,
            ]);
        }
        return $this->render('account/image.html.twig', [
            'connected_user' => $user,
            'controller_name' => 'AccountController',
            'form' => $form,
        ]);
    } 
    #[Route('/network', name: 'app_account_network')]
    public function network(Request $request, EntityManagerInterface $entityManager){
        $user = $this->getUser();

        $form = $this->createForm(NetworkType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrez les liens vers les réseaux sociaux dans l'entité User
            // Accédez aux champs de formulaire via $form->get('nomDuChamp')
            $user->setFacebook($form->get('facebook')->getData());
            $user->setTwitter($form->get('twitter')->getData());
            $user->setLinkedin($form->get('linkedin')->getData());
            $user->setInstagram($form->get('instagram')->getData());
    
            $entityManager->flush();
    
            // Redirigez ou affichez un message de confirmation
            return $this->render('/account/manage.html.twig', [
                'connected_user' => $user,
                'controller_name' => 'AccountController',
                'form' => $form,
            ]);
        }

        return $this->render('account/network.html.twig', [
            'connected_user' => $user,
            'controller_name' => 'AccountController',
            'form' => $form,
        ]);
    }

    #[Route('/description', name: 'app_account_desc')]
    public function desc(Request $request, EntityManagerInterface $entityManager){
        $user = $this->getUser();

        $form = $this->createForm(DescType::class);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            // Enregistrez les liens vers les réseaux sociaux dans l'entité User
            // Accédez aux champs de formulaire via $form->get('nomDuChamp')
            $user->setDescription($form->get('description')->getData());
    
            $entityManager->flush();
    
            // Redirigez ou affichez un message de confirmation
            return $this->render('/account/description.html.twig', [
                'connected_user' => $user,
                'controller_name' => 'AccountController',
                'form' => $form,
            ]);
        }

        return $this->render('account/description.html.twig', [
            'connected_user' => $user,
            'controller_name' => 'AccountController',
            'form' => $form,
        ]);
    }

    #[Route('/password', name: 'app_account_password')]
    public function password(Request $request, EntityManagerInterface $entityManager){
        $user = $this->getUser();

        $form = $this->createForm(PasswordType::class, $user);
        $form->handleRequest($request);
    
        if ($form->isSubmitted() && $form->isValid()) {
            // Save the new password in the User entity
            $user->setPassword($form->get('password')->getData());
    
            $entityManager->flush();
    
            // Redirect or show a confirmation message
            return $this->render('/account/manage.html.twig', [
                'connected_user' => $user,
                'controller_name' => 'AccountController',
                'form' => $form,
            ]);
        }
    
        return $this->render('account/password.html.twig', [
            'connected_user' => $user,
            'controller_name' => 'AccountController',
            'form' => $form,
        ]);
    }
  
}
