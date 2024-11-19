<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Loja de Discos')</title>
    <!-- Fonte "Poppins" -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <style>

        /* Estilos para a página "show" */
.show-container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    background-color: #FFF5F5; /* Fundo suave */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center; /* Centraliza os textos */
}

.info-box {
    background-color: #FFEBE8; /* Fundo mais claro */
    border: 1px solid #FFB6C1; /* Borda em tom suave */
    border-radius: 8px;
    padding: 15px;
    margin-bottom: 20px;
}

.image-box {
    margin: 20px 0;
}

.disc-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}


.styled-table {
    width: 100%;
    border-collapse: collapse;
    margin: 20px 0;
    font-size: 16px;
    text-align: left;
}

.styled-table thead tr {
    background-color: #FFC1C1; /* Cabeçalho em vermelho claro */
    color: #8B0000; /* Vermelho escuro */
    text-align: center;
    font-weight: bold;
}

.styled-table th, .styled-table td {
    padding: 12px 15px;
    border: 1px solid #FFB6C1;
}

.styled-table tbody tr {
    background-color: #FFF5F5; /* Fundo alternado */
}

.styled-table tbody tr:nth-of-type(even) {
    background-color: #FFE4E4; /* Fundo para linhas pares */
}

.styled-table tbody tr:hover {
    background-color: #FFCCCC; /* Hover */
}

.center-link {
    margin-top: 20px;
}

.center-link .action-button {
    background-color: #8B0000; /* Vermelho escuro */
    color: #FFF;
    padding: 10px 20px;
    text-decoration: none;
    border-radius: 8px;
    font-weight: bold;
}

.center-link .action-button:hover {
    background-color: #B22222; /* Vermelho mais vibrante */
}

        
        /* Estilo Global */
        body {
    font-family: 'Poppins', Arial, sans-serif;
    margin: 0;
    padding: 0;
    background: linear-gradient(to bottom right, #e0c3fc, #ffdde1); /* Gradiente roxo-amarelo claro */
    color: #444;
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}

 /* Cabeçalho */
 header {
            background-color: #5d3ea8; /* Roxo escuro */
            color: #fff;
            padding: 20px 0;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 7px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }


        /* Menu de Navegação */
        nav {
            background-color: #e0d4f4; /* Roxo pastel */
            padding: 15px;
            display: flex;
            justify-content: center;
            gap: 20px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        nav a {
            color: #5d3ea8; /* Roxo médio */
            text-decoration: none;
            font-size: 16px;
            font-weight: 500;
            padding: 10px 20px;
            border-radius: 8px;
            background-color: #f4eafa; /* Fundo mais claro */
        }

        nav a:hover {
            background-color: #d3c3f4; /* Hover suave */
            color: #4b0082; /* Roxo intenso */
        }

        /* Cabeçalhos Principais */
        h1 {
            color: #5d3ea8;
            text-align: center;
            margin-top: 20px;
        }

        /* Estilo Base para Botões */
      /* Estilo Base para Botões */
.action-button {
    display: inline-block;
    padding: 10px 15px;
    font-size: 14px;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
    border: none; /* Remove borda padrão */
    text-align: center;
    color: #fff; /* Cor do texto */
}

/* Botão "Salvar" */
.action-button.save {
    background-color: #5d3ea8; /* Roxo pastel */
}

.action-button.save:hover {
    background-color: #4b2e89; /* Roxo mais escuro */
}

        /* Botões "Ver" e "Editar" */
        .action-button.view {
            background-color: #5d3ea8; /* Azul pastel */
            color: #fff;
        }

        .action-button.edit {
            background-color: #5d3ea8; /* Roxo pastel */
            color: #fff;
        }

        .action-button.view:hover, .action-button.edit:hover {
            background-color: #4b2e89; /* Roxo mais escuro */
        }

        /* Botão Excluir */
        .action-button.delete {
            background-color: #f08080; /* Vermelho pastel */
            color: #fff;
            border: none; /* Remove borda padrão */
            text-align: center; /* Centraliza o texto */
            line-height: 1; /* Remove espaçamento vertical adicional */
            width: auto; /* Garante que o botão se ajuste ao texto */
        }

        .action-button.delete:hover {
            background-color: #e63946; /* Vermelho mais escuro */
        }

        /* Espaçamento entre Botões */
        table td .action-button {
            margin-right: 5px; /* Espaçamento lateral */
        }
        
/* Formulário de Exclusão */
.delete-button {
    display: inline; /* Garante que o formulário fique na mesma linha */
    margin: 0; /* Remove margens extras */
    padding: 0; /* Remove preenchimentos extras */
}

/* Estilo Base para Botões */
.action-button {
    display: inline-block; /* Garante alinhamento na mesma linha */
    padding: 6px 12px; /* Ajusta o espaçamento interno */
    font-size: 14px;
    font-weight: bold;
    text-decoration: none; /* Remove sublinhado */
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease, box-shadow 0.3s ease; /* Suaviza transições */
    border: none;
    text-align: center; /* Centraliza o texto */
    color: #fff;
}

/* Botão "Ver" */
.action-button.view {
    background-color: #5d3ea8; /* Azul pastel */
}

.action-button.view:hover {
    background-color: #4b2e89; /* Azul mais escuro */
}

/* Botão "Editar" */
.action-button.edit {
    background-color: #5d3ea8; /* Roxo pastel */
}

.action-button.edit:hover {
    background-color: #4b2e89; /* Roxo mais escuro */
}

/* Botão "Excluir" */
.action-button.delete {
    background-color: #f08080; /* Vermelho pastel */
}

.action-button.delete:hover {
    background-color: #e63946; /* Vermelho mais escuro */
}

/* Espaçamento entre Botões */
table td .action-button {
    margin-right: 5px; /* Espaçamento lateral entre botões */
}
/* Centralizar e estilizar a div */
.action-button-add {
    display: flex; /* Usar flexbox para centralização */
    justify-content: center; /* Centraliza horizontalmente */
    margin: 20px 0; /* Espaçamento acima e abaixo */
}

/* Estilo para o botão de adição */
.action-button-add .action-button {
    background-color: #5d3ea8; /* Roxo pastel */
    color: #fff; /* Texto branco */
    padding: 12px 24px; /* Espaçamento interno maior */
    font-size: 16px; /* Texto um pouco maior */
    font-weight: bold; /* Texto em negrito */
    border-radius: 8px; /* Bordas mais arredondadas */
    text-decoration: none; /* Remove sublinhado */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Suaviza hover e clique */
}

/* Estilo de hover */
.action-button-add .action-button:hover {
    background-color: #4b2e89; /* Roxo mais escuro */
    transform: scale(1.05); /* Leve aumento no hover */
}



/* Estilo ao clicar */
.action-button-add .action-button:active {
    background-color: #3a256f; /* Roxo ainda mais escuro */
    transform: scale(0.95); /* Leve redução ao clicar */
}

        

        /* Tabelas */
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        table th {
            background-color: #E6E6FA; /* Amarelo pastel */
            color: #444;
            padding: 12px 10px;
        }

        table td {
            padding: 10px;
            text-align: left; /* Alinha à esquerda */
            vertical-align: middle; /* Centraliza verticalmente */
            word-wrap: break-word;
        }

        table tr:nth-child(even) {
            background-color: #fafafa;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        /* Formulários */
        form {
            max-width: 600px;
            margin: 10px auto;
            background-color: #fff;
            padding: 25px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        form label {
            display: block;
            font-weight: 500;
            margin-bottom: 8px;
            color: #5d3ea8;
        }

        form input, form select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }

        form button {
            display: block;
            width: 100%;
            background-color: #5d3ea8;
            color: #fff;
            font-weight: 600;
        }

        form button:hover {
            background-color: #4b2e89;
        }

        /* Centralizar a div */
.center-link {
    display: flex; /* Usar flexbox para centralização */
    justify-content: center; /* Centraliza horizontalmente */
    margin: 20px 0; /* Adiciona espaçamento acima e abaixo */
}

/* Estilo para o link */
.center-link .action-button {
    background-color: #5d3ea8; 
    color: #fff; /* Texto branco */
    padding: 10px 20px; /* Espaçamento interno */
    font-size: 16px; /* Tamanho do texto */
    font-weight: bold; /* Texto em negrito */
    text-decoration: none; /* Remove sublinhado */
    border-radius: 8px; /* Bordas arredondadas */
    transition: background-color 0.3s ease, transform 0.2s ease; /* Suaviza hover e clique */
}

/* Estilo de hover */
.center-link .action-button:hover {
    background-color: #708090; /* Azul mais escuro */
    transform: scale(1.05); /* Leve aumento no hover */
}

/* Estilo ao clicar */
.center-link .action-button:active {
    background-color: #1e6091; /* Azul ainda mais escuro */
    transform: scale(0.95); /* Leve redução ao clicar */
}
.new-sale-button {
    position: fixed;
    bottom: 20px; /* Distância do canto inferior */
    right: 20px; /* Distância do canto direito */
    background-color: #5d3ea8; /* Roxo */
    color: #fff;
    padding: 15px 20px;
    border-radius: 50px; /* Botão arredondado */
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.new-sale-button:hover {
    background-color: #4b2e89; /* Roxo mais escuro no hover */
    transform: scale(1.1); /* Leve aumento no hover */
}
/* Grid para os discos */
.disc-grid {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Permite que os itens quebrem linha */
    margin-top: 20px;
}

.disc-card {
    background-color: #FFF5F5; /* Fundo suave */
    border: 1px solid #FFB6C1;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    max-width: 200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.disc-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.disc-card h3 {
    font-size: 18px;
    color: #8B0000;
    margin-bottom: 5px;
}

.disc-card p {
    font-size: 16px;
    color: #444;
    font-weight: bold;
}
/* Estilo para o container de discos em destaque */
.featured-discs-container {
    margin-top: 40px; /* Espaço entre as seções */
    padding: 20px;
    background-color: #FFF5F5; /* Fundo suave */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    text-align: center;
}

/* Título da seção de discos */
.featured-discs-container h2 {
    color: #8B0000; /* Vermelho escuro */
    margin-bottom: 20px;
}

/* Grid para os discos */
.disc-grid {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap; /* Permite que os itens quebrem linha */
}

/* Cartão individual de disco */
.disc-card {
    background-color: #FFF5F5; /* Fundo suave */
    border: 1px solid #FFB6C1;
    border-radius: 8px;
    padding: 15px;
    text-align: center;
    max-width: 200px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}

.disc-image {
    max-width: 100%;
    height: auto;
    border-radius: 8px;
    margin-bottom: 10px;
}

.disc-card h3 {
    font-size: 18px;
    color: #8B0000;
    margin-bottom: 5px;
}

.disc-card p {
    font-size: 16px;
    color: #444;
    font-weight: bold;
}

    </style>
</head>
<body>
<body>
    <header>
        SCREAM! discos
    </header>
<nav>
    <a href="{{ route('genres.index') }}">Gêneros</a>
    <a href="{{ route('artists.index') }}">Artistas</a>
    <a href="{{ route('formats.index') }}">Formatos</a>
    <a href="{{ route('discs.index') }}">Discos</a>
    <a href="{{ route('customers.index') }}">Clientes</a> <!-- Novo menu -->
    <a href="{{ route('sales.index') }}">Vendas</a> <!-- Novo menu -->
</nav>

    <hr>

    <div>
        @yield('content')
    </div>

    <a href="{{ route('sales.create') }}" class="new-sale-button">Nova Venda</a>

</body>
</html>
