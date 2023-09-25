<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifica se há erros durante o upload da imagem
    if ($_FILES["imagem"]["error"] > 0) {
        echo "Erro no upload da imagem: " . $_FILES["imagem"]["error"];
    } else {
        // Move a imagem para o diretório de uploads
        $imagem_nome = $_FILES["imagem"]["name"];
        $imagem_tmp = $_FILES["imagem"]["tmp_name"];
        $imagem_destino = "uploads/" . $imagem_nome;
        move_uploaded_file($imagem_tmp, $imagem_destino);

        // Exibe a imagem
        echo "<h2>Imagem:</h2>";
        echo "<img src='$imagem_destino' alt='Imagem'>";
    }

    // Verifica se há erros durante o upload do PDF
    if ($_FILES["pdf"]["error"] > 0) {
        echo "Erro no upload do PDF: " . $_FILES["pdf"]["error"];
    } else {
        // Move o PDF para o diretório de uploads
        $pdf_nome = $_FILES["pdf"]["name"];
        $pdf_tmp = $_FILES["pdf"]["tmp_name"];
        $pdf_destino = "uploads/" . $pdf_nome;
        move_uploaded_file($pdf_tmp, $pdf_destino);

        // Cria um link para o PDF
        echo "<h2>Link para o PDF:</h2>";
        echo "<a href='$pdf_destino' target='_blank'>Abrir PDF</a>";
    }
} else {
    echo "Erro: Este script deve ser acessado via método POST.";
}
?>
    