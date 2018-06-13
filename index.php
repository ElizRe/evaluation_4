<!DOCTYPE html>
<html>
    <head>
        <title>Hotel Ritz Cahors Accueil</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale-1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
        <header>
        <h1 class="text-logo"><span><img src="images/logo.png"></span> Gestion des réservations <span class="glyphicon"></span></h1>
        </header>
        <div class="container admin">
            <div class="row">
                <div class="col-lg-8 col-xs-12 col-centered">
                <h1><strong>Gestion des réservations </strong></h1>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Client</th>
                            <th>Chambre</th>
                            <th>Dates</th>
                            <th>Statut</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require 'database.php';
                        $db = Database::connect();
                        $statement = $db->query('Select reservations.clientId,clients.nom,
                        clients.prenom,chambres.numero,reservations.dateEntree,
                        reservations.dateSortie,reservations.statut 
                        FROM chambres,clients,reservations
                        ORDER BY reservations.clientId,clients.nom,clients.prenom,
                        chambres.numero,reservations.dateEntree,reservations.dateSortie,reservations.statut');
                        while ($item = $statement->fetch()) {
                            echo '<tr>';
                            echo '<td>' . $item['id'] . '</td>';
                            echo '<td>' . $item['nom'] .'<p>,</p>'. $item['prenom'] . '</td>';
                            echo '<td>' . $item['chambres.numero'] . '</td>';
                            echo '<td>' . '<p>Du</p>'.$item['dateEntree'] .'<p>au</p>' . $item['dateSortie'] . '</td>';
                            echo '<td>' . $item['statut'] . '</td>';
                            echo '<td width="300">';
                            
                            echo '<a class="btn btn-primary" href="update.php?id=' . $item['clients.id'] . '"><span class="glyphicon glyphicon-pencil"></span> Modifier</a>';
                            echo ' ';
                            echo '<a class="btn btn-danger" href="delete.php?id=' . $item['clients.id'] . '"><span class="glyphicon glyphicon-remove"></span> Supprimer</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>

                    </tbody>
                </table>
            </div>
        </div>

    </body>
</html>