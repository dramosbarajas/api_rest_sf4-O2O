<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use \GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class RecipesController extends AbstractController
{

    /**
     * @Route("/recipes/keyword", methods="POST")
     *
     */

    public function recipesByKeyword(Request $request)
    {
        //Comprobamos que la petición llega por POST

        $type = 'q'; //Comodin para recetas

        if ($request->isMethod('post')) {
            $keyword = $this->getRequest($request); //Recuperamos del payload el valor de búsqueda.
            $response = $this->checkResponse($this->call($type,$keyword['recipe']));//Llamamos a la función que compone la llamada y la ejecuta.
        };

        //si la respuesta es true envia ok false fallo.
        if($response){
            return $this->render(
                'recipes/keyword/responseKeyword.html.twig',
                array('recipes' => $response->results)
            );
        } else {
            return $this->json([
                'msj' => 'Algo ha fallado!'
            ]);
        }

    }

    /**
     * @Route("/recipes/ingredients", methods="post")
     */
    public function recipesbyingredients(request $request)

    {

        $type = 'i';//Comodin para ingredientes
        if ($request->ismethod('post')) {
            $keyword = $this->getrequest($request); //recuperamos del payload el valor de búsqueda.
            $response = $this->checkResponse($this->call($type,$keyword['ingredients']));//llamamos a la función que compone la llamada, la ejecuta y comprueba la respuesta.
        };

        //si la respuesta es true envia ok false fallo.
        if($response){
            return $this->render(
                'recipes/ingredient/responseingredient.html.twig',
                array('recipes' => $response->results)
            );
        } else {
            return $this->json([
                'msj' => 'algo ha fallado!'
            ]);
        }
    }

    //Recupera los parametros del post
    public  function getRequest ($request) {
        parse_str($request->getContent(), $data);
        return $data;
    }

    //Realiza la llamada al api externo.
    public function call ($type,$search){
        //Variable para la la url de la llamada

        $uri = 'http://www.recipepuppy.com/api/';

        $client = new Client([
            'base_uri' => $uri,
            'timeout'  => 2.0,
        ]);

        $response = $client->request('GET', '?' . $type .'='. $search );

        return $response;
    }

    public function checkResponse ($response) {
        if($response->getstatuscode() == 200){
            return $response =  json_decode( $response->getBody()->getContents() );
        };

        return false;
    }

}
