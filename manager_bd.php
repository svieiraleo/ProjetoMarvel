<?php

use LDAP\Result;

    function fav($id)
    {
        include_once 'conecta_bd.php';
        $sql = "insert into personagem
                    (id_personagem)
                values
                    (".$id.")
                on duplicate key update
                    id_personagem = ".$id.",
                    favoritos = favoritos+1;";

        if(mysqli_query($strcon, $sql)){
            echo "Adicionado a favorito com sucesso: ".$id;
        } else {
            echo "ERRO: gravando favorito:" 
                                    . mysqli_error($strcon);
        } 
        mysqli_close($strcon);
    }

    function showFav()
    {
        include_once 'conecta_bd.php';
        require_once './includes/MarvelApi/MarvelApi.php';

        $sql = "select * from personagem order by favoritos desc;";


        if ($res = mysqli_query($strcon, $sql)) {
            if (mysqli_num_rows($res) > 0) {

                $marvelApi = new MarvelApi();
                 while ($row = mysqli_fetch_array($res)) {
                     $id = $row['id_personagem'];
                     $favoritos = $row['favoritos'];
                     $result = json_decode($marvelApi->getCharacter($id), true);
                    
                     $character = $result['data']['results'][0];

                     echo "<article>";
                     echo "        <figure class=\"marvel_characters__content__character_image\">";
                     echo "            <img src=\"".$character['thumbnail']['path']."/portrait_medium.".$character['thumbnail']['extension']."\" alt=\"".$character['name']."\">";
                     echo "        </figure>";
                     echo "    <div class=\"marvel_characters__content__character_content\">";
                     echo "        <h2 class=\"marvel_characters__content__character_title\">".$character['name']."</h2>";
                     echo "        <h3> ".$favoritos." votos</h3>";
                    //  echo "            <div class=\"marvel_characters__content__character_info\">";
                    //  echo "                <h3 class=\"marvel_characters__content__character_subtitle\">Description</h3>";
                    //  echo "                <p>".$character['description']."</p>";
                    //  echo "            </div>";
                     echo "    </div>";
                     echo "</article>";


                 }
                 unset($_GET['showFav']);             
            }
            else {
                echo "Nenhum registro encontrado";
            }
        }
        else {
            echo "ERRO: lendo favorito:" 
                                    . mysqli_error($strcon);
        } 
        mysqli_close($strcon);
    }
?>
