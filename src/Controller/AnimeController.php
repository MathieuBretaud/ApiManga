<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace App\Controller;

use App\Service\CallApiService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AnimeController extends AbstractController
{
    #[Route('/anime/{id}', name: 'anime_read')]
    public function show(CallApiService $callApiService, $id): Response
    {
        $anime = $callApiService->getAllAnimeId($id);

        return $this->render('anime/index.html.twig', [
            'response' => $anime['data'],
        ]);
    }
}
