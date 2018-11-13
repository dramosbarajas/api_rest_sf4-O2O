<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class RecipesController extends AbstractController
{

    private $uri = 'http://www.recipepuppy.com/api/';
    /**
     * @Route("/recipes/keyword/{keyword}", name="recipesByKeyword", methods={"GET","HEAD"})
     */
    public function recipesByKeyword($keyword)
    {

        $client = new Client([
            'base_uri' => $this->uri,
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '?q='. $keyword );
        if($response->getStatusCode() == 200){
            $response =  json_decode( $response->getBody()->getContents() );
            $data = json_decode(json_encode($response->results), true);
            return $this->render(
                'recipes/keyword/responseKeyword.html.twig',
                array('recipes' => $data)
            );
        } else {
            return response()->json([
                'status' => $response->getStatusCode(),
                'msj' => 'Algo ha fallado!'
            ]);
        }

    }

    /**
     * @Route("/recipes/ingredients/{ingredients}", name="recipesByIngredients", methods={"GET","HEAD"})
     */
    public function recipesByIngredients(Request $request)

    {

        $client = new Client([
            'base_uri' => $this->uri,
            'timeout'  => 2.0,
        ]);
        $response = $client->request('GET', '?i='. $ingredients );
        if($response->getStatusCode() == 200){
            $response =  json_decode( $response->getBody()->getContents() );
            $data = json_decode(json_encode($response->results), true);
            var_dump($data); die;
            return $this->render(
                'recipes/ingredient/responseIngredient.html.twig',
                array('recipes' => $data)
            );
        } else {
            return response()->json([
                'status' => $response->getStatusCode(),
                'msj' => 'Algo ha fallado!'
            ]);
        }
    }


}
