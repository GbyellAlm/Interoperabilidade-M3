<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Voo;

class VooController extends AbstractController
{
    /**
     * @Route("/voos", name="tds_voos", methods={"GET"})
     */
    public function indexVoos()
    {
        $voos = $this->getDoctrine()->getRepository(Voo::class)->findAll();

        return $this->json([
            'tdsVoos' => $voos
        ]);
    }

    /**
     * @Route("/voos/{id}", name="det_voo", methods={"GET"})
     */
    public function mostrarVoo($id)
    {
        $voo = $this->getDoctrine()->getRepository(Voo::class)->find($id);

        if ($voo != false) {
            return $this->json([
                'voo' => $voo
            ]);
        } else {
            return $this->json([
                'mensagemErro' => '404 Not Found (Voo não encontrado!)'
            ]);
        }
    }

    /**
     * @Route("/voos", name="criar_voo", methods={"POST"})
     */
    public function criarVoo(Request $request)
    {
        $dadosReq = $request->request->all();

        $doctrine = $this->getDoctrine()->getManager();
        
        $voo = new Voo();
        
        $voo->setNumero($dadosReq['numero']);
        $voo->setQtdeEscalas($dadosReq['qtdeEscalas']);
        $voo->setDataSaida($dadosReq['dataSaida']);
        $voo->setDataChegada($dadosReq['dataChegada']);
        // PAU: Relação entre aeronave daqui e aeronave da tabela aeronave.
        $voo->setAeronave($dadosReq['aeronave']);
        
        // PAU: Relação entre aeroportoOrigem daqui e aeroporto da tabela aeroporto.
        $voo->setAeroportoOrigem($dadosReq['aeroportoOrigem']);

        // PAU: Relação entre aeroportoDestino daqui e aeroporto da tabela aeroporto.
        $voo->setAeroportoDestino($dadosReq['aeroportoDestino']);
        
        $doctrine->persist($voo);
        $doctrine->flush();

        if ($doctrine != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Voo criado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Voo n criado :('
            ]);
        }
    }

    /**
     * @Route("/voos/{id}", name="deletar_voo", methods={"DELETE"})
     */
    public function deletarVoo($id)
    {
        $doctrine = $this->getDoctrine();

        $voo = $doctrine->getRepository(Voo::class)->find($id);
        
        $manager = $doctrine->getManager();
        $manager->remove($voo);
        $manager->flush();
        
        if ($manager != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Voo deletado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Voo n deletado :('
            ]);
        }
    }
}
