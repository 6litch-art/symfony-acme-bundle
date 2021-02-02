<?php

// src/Acme/AcmeBundle/Controller/AcmeController.php
namespace Acme\AcmeBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;

use Acme\AcmeBundle\Service\AcmeService;
use Acme\AcmeBundle\Model\Anvil;

class AcmeController extends AbstractController
{
    public static $foundAcmeService       = false;
    public static $foundAcmeListener      = false;
    public static $foundAcmeSubscriber    = false;
    public static $foundAcmeTwigExtension = false;

    private $service;
    public function __construct(AcmeService $service) {

        $this->service = $service;
    }

    /**
     * Controller example
     *
     * @Route("/acme", name="app_acme")
     */
    public function Main(): Response
    {
        $version = Kernel::VERSION;
        $docVersion = substr(Kernel::VERSION, 0, 3);
        $projectDir = \dirname(__DIR__);

        dump($this);
        $anvil = new Anvil(1);
        $configPath = $projectDir."/Resources/config/acme_bundle.yaml";
        $publicPath = $projectDir."/Resources/public";
        $twigResourcePath = $projectDir."/Resources/views";
        $acmeFound = [
            "service" => AcmeController::$foundAcmeService,
            "listener" => AcmeController::$foundAcmeListener,
            "subscriber" => AcmeController::$foundAcmeSubscriber,
            "twig" => AcmeController::$foundAcmeTwigExtension
        ];

        ob_start();
        $hue = 345;
        $color = "#75001e";
        include \dirname(__DIR__).'/Resources/views/welcome.html.php';
        return new Response(ob_get_clean(), Response::HTTP_NOT_FOUND);
    }
}
