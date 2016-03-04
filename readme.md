#REGISTRO DE IMPRESSORA
--corrigido bug para mostrar validação de resultados;
--melhorado validação com bootstrap demarcadores;
--pagina de exclusão de impressora;
--pagina de cadastro de impressora;
--pagina de edição de impressora cadastrada;
---------25/02/2016
--mudança na exibição dos dados de impressora pelo modo decrescente;
--mudança na parte de layout;
--mudança no arquivo app>http>controllers>impressoracontroller;
--mudança arquivo resources>views>ditep>impressora>index.blade.php
--mudança arquivo resources>views>ditep>impressora>form.blade.php
--mudança arquivo resources>views>layout>ditep>default.blade.php
----------25/02/2016
--Indentação do código nas paginas resources>views>ditep>impressora>form.blade.php
--Indentação do código nas paginas resources>views>ditep>impressora>index.blade.php
--Adicionado extensão .blade ao arquivo resources>views>ditep>layouts>ditep>skeleton.blade.php

#REGISTRO DE CLIENTES
----------28/02/2016
--Trabalhdo Model Cliente;
--trabalhado ClienteController;
--Criação do Form.blade.php e index.blade.php para o Model Cliente;
--Modificação do Route.php para acessar o ClienteController;
--Modificação do menu.blade.php para linkar clientes;
--Acréscimo do Pacote linguagem "pt-BR" em Resource/lang;
--Edição de "locale" em config para "pt-BR";

#AUMENTO DE CONTEÚDO
----------02/03/2016
--Mudança no visual das páginas já criadas, botão de excluir e editar gerando mais espaço para colunas das tabelas de relatórios;
--Incluso novo arquivo no migration para criação de setores separando assim, gerando possibilidade de filtro e do usuário não ficar digitando setores;
--Incluso model de setor, na pasta APP>MODELS>DITEP>SETOR.PHP

#REGISTRO DE SETORES
----------02/03/2016
--Devido a constatar melhoras nos relatórios e no uso do sistema foi implmentado a sessão para cadastro de setores...
--Nova pasta RESOURCES>DITEP>SETOR>FORM.PHP E INDEX.PHP
--Menu adicionado link para acesso a gestão de setores
--Adicionado Rota para pagina de setores
--Adicionado mudanças na pagina principal e de cadastros com novos botões de excluir e editar...
--Adicionado busca na variavél $titulo, caso não econtre lança título padrão a página..
--Tentativa de ajustar exbição de todos os dados cadastrados no cadastro de clientes, no caso para exbir o setor, deve-se buscar pelo id setor mas, não exibe...

