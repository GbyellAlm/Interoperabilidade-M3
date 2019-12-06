<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Assento;

class AssentoController extends AbstractController
{
    /**
     * @Route("/assentos", name="tds_assentos", methods={"GET"})
     */
    public function indexAssentos()
    {
        $assentos = $this->getDoctrine()->getRepository(Assentos::class)->findAll();

        return $this->json([
            'tdsAssentos' => $assentos
        ]);
    }

    /**
     * @Route("/assentos/{id}", name="det_assento", methods={"GET"})
     */
    public function mostrarAssento($id)
    {
        $assento = $this->getDoctrine()->getRepository(Assento::class)->find($id);

        if ($assento != false) {
            return $this->json([
                'assento' => $assento
            ]);
        } else {
            return $this->json([
                'mensagemErro' => '404 Not Found (Assento não encontrado!)'
            ]);
        }
    }

    /**
     * @Route("/assentos", name="criar_assento", methods={"POST"})
     */
    public function criarAssento(Request $request)
    {
        $dadosReq = $request->request->all();

        $doctrine = $this->getDoctrine()->getManager();
        
        $assento = new Assento();
        
        $assento->setCodAssento($dadosReq['codAssento']);
        
        // PAU: Relação entre aeronave daqui e aeronave da tabela aeronave.
        $assento->setAeronave($dadosReq['aeronave']);
      
        $doctrine->persist($assento);
        $doctrine->flush();

        if ($doctrine != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Assento criado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Assento n criado :('
            ]);
        }
    }

    /**
     * @Route("/assentos/{id}", name="deletar_assento", methods={"DELETE"})
     */
    public function deletarAssento($id)
    {
        $doctrine = $this->getDoctrine();

        $assento = $doctrine->getRepository(Assento::class)->find($id);
        
        $manager = $doctrine->getManager();
        $manager->remove($assento);
        $manager->flush();
        
        if ($manager != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Assento deletado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Assento n deletado :('
            ]);
        }
    }
}
