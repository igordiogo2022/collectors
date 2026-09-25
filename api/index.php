<?php
require_once 'dados.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="/img/collectors.png" type="image/x-icon">
    <link rel="stylesheet" href="..\css\style.css">
    <title>Título da Página</title>
</head>
<body>
    <?php 
    include 'header.php'; 
    ?>
    <section id="carrossel" class="carousel slide"> 
        <div class="carousel-inner">
            <?php for($i=0; $i<count($noticias); $i++): ?> 
                <?php $noticia = $noticias[$i]; ?>
                <div class="carousel-item <?= $i === 0 ? 'active' : '' ?>">
                    <article class="noticia">
                        <img src=<?= $noticia['imagem'] ?> alt="Imagem notícia">
                        <div class="conteudo">
                            <h2><?= $noticia['titulo'] ?></h2>
                            <p><?= $noticia['descricao'] ?></p>
                        </div>
                    </article>
                </div>
            <?php endfor; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carrossel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carrossel" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </section>

    <section id="staff">
        <h1>Staff</h1>
        <?php $funcoes = ["dono", "presidente", "diretor", "administrador", "senior", "moderador"];?>
        <?php foreach($funcoes as $funcao): ?>
        <div class="linha-staff">
            <?php $usuarioComCargo = array_filter($staff, fn($usuario) => $usuario["cargo"]==$funcao);
            foreach($usuarioComCargo as $usuario):?>
                <article class="card-staff <?= $usuario["cargo"] ?>">
                    <img src="<?= $usuario["avatar"] ?>" alt="">
                    <h2><?= $usuario["nome"] ?></h2>
                    <p><?= ucfirst($usuario["cargo"]) ?></p>
                </article>
            <?php endforeach; ?>
        </div>
        <?php endforeach; ?>
        
        <!-- <div class="linha-staff">
            <article class="card-staff dono">
                <img src="https://images-ext-1.discordapp.net/external/Zn8pkA36Y-6yOG6rVoUphNGJ-bTkoUPjyJyIqRHhIRs/%3Fsize%3D2048/https/cdn.discordapp.com/avatars/1349709444782493767/4ee66cd52810c945c2263ec880a16e7a.png?format=webp&quality=lossless&width=482&height=482" alt="">
                <h2>Debus</h2>
                <p>Dono</p>
            </article>
            <article class="card-staff dono">
                <img src="https://images-ext-1.discordapp.net/external/Zn8pkA36Y-6yOG6rVoUphNGJ-bTkoUPjyJyIqRHhIRs/%3Fsize%3D2048/https/cdn.discordapp.com/avatars/1349709444782493767/4ee66cd52810c945c2263ec880a16e7a.png?format=webp&quality=lossless&width=482&height=482" alt="">
                <h2>Debus</h2>
                <p>Dono</p>
            </article>
        </div> -->
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>