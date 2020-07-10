
<?php require_once './header.php'; ?>
        
        <h1>Liste des personnes</h1>

        <table class="t2">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Adresse</th>
                        <th>Mail</th>
                        <th>Téléphone</th>
                    </tr>
        <?php
            include 'function/connexion.php';  
             
            $sel = $bdd->query('SELECT * FROM personne');
            $personnes=$sel->fetchAll();
            foreach($personnes as $personne){
                ?>              
                    <tr>
                        <td><?php echo $personne['nomPersonne'];?></td>
                        <td><?php echo $personne['prenomPersonne'];?></td>
                        <td><?php echo $personne['adresse'];?></td>
                        <td><?php echo $personne['mail'];?></td>
                        <td><?php echo $personne['telephone'];?></td>
                    </tr>            
        <?php
            };
        ?>
        </table> 
        
    </body>
    </html>

