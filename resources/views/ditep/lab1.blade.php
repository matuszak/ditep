<h1>Instânciando uma classe</h1>

<?php
    class Pessoa{
        private $nome;
        private $sobrenome;


        function setNome($nome){
            $this->nome = $nome;
        }
        function setSobreNome($sobrenome){
            $this->sobrenome = $sobrenome;
        }
        function getNomeCompleto(){
            return $this->nome.' '.$this->sobrenome;
        }

    }



    $lailson = new Pessoa();
        $lailson->setNome('Lailson');
        $lailson->setSobreNome('Matuszak');

    $joao = new Pessoa();
        $joao->setNome('João');
        $joao->setSobreNome('de Medeiros Moraes');

    $o = new Pessoa('Maria', 'Joaquina');



        print 'Seu nome completo é: '.$lailson->getNomeCompleto().'<br>';
        print 'Seu nome completo é: '.$joao->getNomeCompleto().'<br>';


?>