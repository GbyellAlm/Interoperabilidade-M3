<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Aeronave;

class AeronaveController extends AbstractController
{
    /**
     * @Route("/aeronaves", name="tds_aeronaves", methods={"GET"})
     */
    public function indexAeronaves()
    {
        $aeronaves = $this->getDoctrine()->getRepository(Aeronave::class)->findAll();

        return $this->json([
            'tdsAeronaves' => $aeronaves
        ]);
    }

    /**
     * @Route("/aeronaves/{id}", name="det_aeronave", methods={"GET"})
     */
    public function mostrarAeronave($id)
    {
        $aeronave = $this->getDoctrine()->getRepository(Aeronave::class)->find($id);

        if ($aeronave != false) {
            return $this->json([
                'aeronave' => $aeronave
            ]);
        } else {
            return $this->json([
                'mensagemErro' => '404 Not Found (Aeronave não encontrada!)'
            ]);
        }
    }

    /**
     * @Route("/aeronaves", name="criar_aeronave", methods={"POST"})
     */
    public function criarAeronave(Request $request)
    {
        $dadosReq = $request->request->all();

        $doctrine = $this->getDoctrine()->getManager();
        
        $aeronave = new Aeronave();
        
        $aeronave->setPrefixo($dadosReq['prefixo']);
        $aeronave->setModelo($dadosReq['modelo']);
        $aeronave->setCapacidade($dadosReq['capacidade']);
        
        $doctrine->persist($aeronave);
        $doctrine->flush();

        if ($doctrine != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Aeronave criada c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Aeronave n criada :('
            ]);
        }
    }

    /**
     * @Route("/aeronaves/{id}", name="deletar_aeronave", methods={"DELETE"})
     */
    public function deletarAeronave($id)
    {
        $doctrine = $this->getDoctrine();

        $aeronave = $doctrine->getRepository(Aeronave::class)->find($id);
        
        $manager = $doctrine->getManager();
        $manager->remove($aeronave);
        $manager->flush();
        
        if ($manager != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Aeronave deletada c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Aeronave n deletada :('
            ]);
        }
    }
}
