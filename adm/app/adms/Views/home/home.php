<?php
if(!defined('R3F3CC')){
    header("Location: /");
    die("Página não encontrada.");
}

header("Refresh: 30;");

?>



<div class="maindash">

     

     <!-- <div class="cardBox">
     <div class="img-perfil"> 
        <img src="<?php echo URLADM;?>app/adms/assets/imagens/topo/<?php echo $imagem_topo;?>"height="130" class="rounded float-start" alt="Foto-principal">
            <div class="edit">
            <a href="<?php echo URLADM ?>topoimg" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
            </div>
        </div>
         <div class="card">
             <div>
                 <div class="numbers">13.525</div>
                 <div class="cardname">VIsualizações</div>
              </div>            
         </div>

         <div class="card">
             <div>
                 <div class="numbers">13.525</div>
                 <div class="cardname">VIsualizações</div>
             </div>
         </div>

         <div class="card">
             <div class="exemplo">
                 <div class="numbers">13.525</div>
                 <div class="cardname">VIsualizações</div>
                 </div>
         </div>

         </div> -->



      

         <div class="detalhes">
         <div class="ofertasRecentes">
             <div class="cardHeader">
                 <p> <?php echo count($bilhetes) . " bilhetes vendidos.  Total R$ ".number_format($bilhetes[0]['total'],2,",","."); ?></p>
                 <!-- <a href="#" class="btn">Ver Todas</a> -->
            </div>

             <!-- <?php

                

                    foreach($barcos as $embarcacao){

                        echo "<div class='box[]'>";

                    echo '<table class="table table-striped table-hover">
                    <thead>
                    <p>Embarcação '.$embarcacao['nome_barco'].'</p>
                        <tr>
                            <td>Passageiro</td><td>Bilhete</td><td>Preço</td><td>Status</td>
                        </tr>
                    </thead>';


                    foreach($bilhetes as $bilhete){
                   
                    $dia = $bilhete['dia']; $preco = $bilhete['preco'];

                    echo "<tbody>";
                    // echo "<tr><td>".date('d/m/y', strtotime($dia))."</td><td>".$bilhete['nome_barco']."</td><td>".$bilhete['nome']."</td><td>".$bilhete['numero']."</td><td>".$bilhete['andar']."</td><td>"."R$ ".number_format($preco,2,",",".")."</td><td>".'<span class="status delivered">+</span>'."</td>";
                    echo "<tr><td>".$bilhete['nome']."</td><td>".$bilhete['numero']."</td><td>"."R$ ".number_format($preco,2,",",".")."</td><td>".'<span class="status delivered">+</span>'."</td>";
                    
                    

                }  echo"</tr>";
                echo "</tbody>";
                echo "</table>";
                echo "</div>";
            
            }

              

                


            ?>  -->
            


            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <td class="hora">Hora</td>
                        <!-- <td class="data">Data</td> -->
                        <td class="nome">Nome</td> 
                        <td class="passageiro">Passageiro</td><td class="bilhete">Bilhete</td>
                        <!-- <td class="andar">Andar</td> -->
                        <td class="preco">Preço</td><td class="">Status</td>
                        <!-- <td class="passageiro">Passageiro</td><td>Bilhete</td><td>Preço</td><td>Status</td> -->

                    </tr>
                </thead>
                <tbody>
                    
                    <?php foreach($bilhetes as $bilhete){ $dia = $bilhete['dia']; $preco = $bilhete['preco'];
                    echo '<tr><td class="hora">hora</td><td class="data">'.date('d/m/y', strtotime($dia)).'</td><td class="nome">'.$bilhete['nome_barco'].'</td><td class="passageiro">'.$bilhete['nome'].'</td><td class="bilhete">'.$bilhete['numero'].'</td><td class="andar">'.$bilhete['andar']."</td><td>"."R$ ".number_format($preco,2,",",".")."</td><td>".'<span class="status delivered">+</span>'."</td></tr>";} 
                    // echo "<tr><td>".$bilhete['nome']."</td><td>".$bilhete['numero']."</td><td>"."R$ ".number_format($preco,2,",",".")."</td><td>".'<span class="status delivered">+</span>'."</td>";}?>
                    
                    
                </tbody>
            </table>

         </div>
<!-- <select name="customSelect" id="cusomSelect" multiple>
    <option value="30">tetstetet</option>
    <option value="30">tetstetet</option>
    <option value="30">tetstetet</option>
    <option value="30">tetstetet</option>
    <option value="30">tetstetet</option>
    <option value="30">tetstetet</option>

</select> -->

     <?php if(isset($_SESSION['msg2'])){
    echo $_SESSION['msg2'];
    unset($_SESSION['msg2']);} ?>
     <div class="voltar"><button class="btn" onclick="history.go(-1);">Voltar 1</button></div>

</div>
</div>
</div>


