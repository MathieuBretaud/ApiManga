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

class MangaController extends AbstractController
{
    #[Route('/manga/{id}', name: 'manga_show')]
    public function show(CallApiService $callApiService, $id): Response
    {
        $manga = $callApiService->getMangaId($id);

        return $this->render('manga/show.html.twig', [
            'response' => $manga['data'],
        ]);
    }
}
