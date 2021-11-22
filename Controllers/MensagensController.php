<?php

class MensagemController extends Controller
{


    //o home controller deve ter um index
    //porque criamos no Core
    public function sucesso()
    {
        $this->carregarTemplate('Mensagens/sucesso', '../');
    }


    public function erro()
    {
        $this->carregarTemplate('Mensagens/erro', '../');
    }
}
