<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Aeroporto;

class AeroportoController extends AbstractController
{
    /**
     * @Route("/aeroportos", name="tds_aeroportos", methods={"GET"})
     */
    public function indexAeroportos()
    {
        $aeroportos = $this->getDoctrine()->getRepository(Aeroporto::class)->findAll();

        return $this->json([
            'tdsAeronaves' => $aeroportos
        ]);
    }

    /**
     * @Route("/aeroportos/{id}", name="det_aeroporto", methods={"GET"})
     */
    public function mostrarAeroporto($id)
    {
        $aeroporto = $this->getDoctrine()->getRepository(Aeroporto::class)->find($id);

        if ($aeroporto != false) {
            return $this->json([
                'aeroporto' => $aeroporto
            ]);
        } else {
            return $this->json([
                'mensagemErro' => '404 Not Found (Aeroporto não encontrado!)'
            ]);
        }
    }

    /**
     * @Route("/aeroportos", name="criar_aeroporto", methods={"POST"})
     */
    public function criarAeroporto(Request $request)
    {
        $dadosReq = $request->request->all();

        $doctrine = $this->getDoctrine()->getManager();
        
        $aeroporto = new Aeroporto();
        
        $aeroporto->setSigla($dadosReq['sigla']);
        $aeroporto->setNome($dadosReq['nome']);
        $aeroporto->setCidade($dadosReq['cidade']);
        
        $doctrine->persist($aeroporto);
        $doctrine->flush();

        if ($doctrine != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Aeroporto criado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Aeroporto n criado :('
            ]);
        }
    }

    /**
     * @Route("/aeroportos/{id}", name="deletar_aeroporto", methods={"DELETE"})
     */
    public function deletarAeroporto($id)
    {
        $doctrine = $this->getDoctrine();

        $aeroporto = $doctrine->getRepository(Aeroporto::class)->find($id);
        
        $manager = $doctrine->getManager();
        $manager->remove($aeroporto);
        $manager->flush();
        
        if ($manager != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Aeroporto deletado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Aeroporto n deletado :('
            ]);
        }
    }
}
