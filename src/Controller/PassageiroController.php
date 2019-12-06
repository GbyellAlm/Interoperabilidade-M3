<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Entity\Passageiro;

class PassageiroController extends AbstractController
{
    /**
     * @Route("/passageiros", name="tds_passageiros", methods={"GET"})
     */
    public function indexPassageiros()
    {
        $passageiros = $this->getDoctrine()->getRepository(Passageiro::class)->findAll();

        return $this->json([
            'tdsPassageiros' => $passageiros
        ]);
    }

    /**
     * @Route("/passageiros/{id}", name="det_passageiro", methods={"GET"})
     */
    public function mostrarPassageiro($id)
    {
        $passageiro = $this->getDoctrine()->getRepository(Passageiro::class)->find($id);

        if ($passageiro != false) {
            return $this->json([
                'passageiro' => $passageiro
            ]);
        } else {
            return $this->json([
                'mensagemErro' => '404 Not Found (Passageiro não encontrado!)'
            ]);
        }
    }

    /**
     * @Route("/passageiros", name="criar_passageiro", methods={"POST"})
     */
    public function criarPassageiro(Request $request)
    {
        $dadosReq = $request->request->all();

        $doctrine = $this->getDoctrine()->getManager();
        
        $passageiro = new Passageiro();
        
        $passageiro->setNomeComp($dadosReq['nomeComp']);
        $passageiro->setCpf($dadosReq['cpf']);
        $passageiro->setIdade($dadosReq['idade']);
        $passageiro->setCodReserva($dadosReq['codReserva']);
        
        // PAU: Relação entre voo daqui e voo da tabela voo.
        $passageiro->setVoo($dadosReq['voo']);
        
        $doctrine->persist($passageiro);
        $doctrine->flush();

        if ($doctrine != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Passageiro criado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Passageiro n criado :('
            ]);
        }
    }

    /**
     * @Route("/passageiros/{id}", name="deletar_passageiros", methods={"DELETE"})
     */
    public function deletarPassageiros($id)
    {
        $doctrine = $this->getDoctrine();

        $passageiro = $doctrine->getRepository(Passageiro::class)->find($id);
        
        $manager = $doctrine->getManager();
        $manager->remove($passageiro);
        $manager->flush();
        
        if ($manager != false) {
            return $this->json([
                'mensagemSucesso' => '200 OK (Passageiro deletado c/ sucesso!)'
            ]);
        } else {
            return $this->json([
                'mensagemErro' => 'Passageiro n deletado :('
            ]);
        }
    }
}
