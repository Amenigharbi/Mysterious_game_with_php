<?php
session_start();

// Vérifiez si l'utilisateur est connecté
if (!isset($_SESSION['id'])) {
    header("location: jeu.php");
    exit();
}

?>
<!-- Reste du code HTML -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Guess the Number Game</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    />
    <style>
      body {
        background-color:#001f3f;
        background-size: cover;
        padding-top: 50px; /* Espace en haut */
        color: #fff; /* Couleur du texte */
      
      }

      .container {
        background-color: rgba(255, 255, 255, 0.8);
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        padding: 20px;
        margin-top: 20px; /* Ajustement de l'espace en haut */
        max-width: 600px;
        width: 100%;
      }

      h2 {
        color: #007bff;
      }

      .btn-primary,
      .btn-danger,
      .btn-info {
        color: #fff;
      }

      .historique {
        background-color: #007bff;
        color: #fff;
      }

      .game-description {
    color: #000; /* Noir */
}

/* Ajoutez ces styles pour changer la couleur du texte */

/* Ajouter la couleur du texte pour l'en-tête du tableau */
.table-header th {
    color: #000; /* Noir */
}

      .player-section {
        display: flex;
        justify-content: space-between;
        margin-top: 20px;
      }

      .player-box {
        background-color: #007bff;
        color: #fff;
        padding: 20px;
        border-radius: 10px;
        margin-top: 20px;
        text-align: center;
        max-width: 400px;
        width: 100%;
        margin: 0 auto;
      }

      .player-box img {
        max-width: 100px;
        border-radius: 50%;
        margin-bottom: 10px;
      }

      .player-box form {
        margin-top: 20px;
      }

      .player-box input {
        margin-bottom: 10px;
      }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center">
            <h2>Guess the Number Game</h2>
            <p class="game-description">
    <i>You have 3 attempts to guess the number chosen by the computer</i><br />
    <i>at random between 1 and 100.</i>
</p>

        </div>
        <div class="player-section">
            <div class="player-box">
                <h4>Player 1</h4>
                <img src="https://static.vecteezy.com/ti/vecteur-libre/p3/10967316-avatar-homme-barbu-gratuit-vectoriel.jpg" alt="Player 1">
                <div class="mx-auto">
                    <form name="player1" action="historique.php" method="post">
                        <input type="reset" class="btn btn-primary" value="Nouveau jeu" onclick="initialisation()">
                        <input type="button" class="btn btn-danger" value="Quitter" id="quiter" onclick="window.close()">
                        <input type="button" class="btn btn-info" value="Réponse" onclick="affiche1()">
                        <div>
                            <label for="prop"><i>Proposition:</i></label>
                            <input type="text" class="form-control" name="prop" size="30" onchange="verif1(document.player1.prop.value)">
                        </div>
                        <div>
                            <label for="essai"><i>N°essai:</i></label>
                            <input type="text" class="form-control" name="essai" size="30">
                        </div>
                        <div>
                            <label for="msg"><i>Message:</i></label>
                            <input type="text" class="form-control" name="msg" size="30">
                        </div>
                        <div>
                            <label for="rep"><i>Réponse:</i></label>
                            <input type="text" class="form-control" name="rep" size="30" id="rep">
                        </div>
                        <input type="submit" value="sauvegarder" class="bg-orange-500 cursor-pointer p-2 rounded-full  font-bold hover:bg-blue-950"/>
                    </form>
                </div>
            </div>
        </div>
        <div class="mt-4">
    <table class="table">
        <thead>
            <tr class="table-header">
                <th>Player</th>
                <th>Attempt</th>
                <th>Guess</th>
            </tr>
        </thead>
        <tbody class="historique"></tbody>
    </table>
</div>

    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script>
        var a = Math.round(Math.random() * 100);
        let essai = 0;
        let his = document.querySelector(".historique");
        let gameEnded = false;

        function initialisation() {
            a = Math.round(Math.random() * 100);
            essai = 0;
            let table = [];
            console.log(a);
            his.innerHTML = "";
            document.player1.prop.value = "";
            document.player1.essai.value = "";
            document.player1.msg.value = "";
            document.player1.rep.value = "";
            gameEnded = false;
            sessionStorage.removeItem("gameState");
        }

        function saveGameState() {
    let currentState = {
        essai: essai,
        history: his.innerHTML,
        prop: document.player1.prop.value,
        msg: document.player1.msg.value,
        rep: document.player1.rep.value,
        randomNumber: a,
        gameEnded: gameEnded,
    };
    sessionStorage.setItem("gameState", JSON.stringify(currentState));
}

function loadGameState() {
    let savedState = JSON.parse(sessionStorage.getItem("gameState"));
    if (savedState) {
        essai = savedState.essai;
        his.innerHTML = savedState.history;
        document.player1.prop.value = savedState.prop;
        document.player1.essai.value = essai;
        document.player1.msg.value = savedState.msg;
        document.player1.rep.value = savedState.rep;
        a = savedState.randomNumber;
        gameEnded = savedState.gameEnded;
    }
}

        function affiche1() {
            document.player1.rep.value = "la valeur recherchée est :" + a;
        }



function verif1(x) {
    if (!gameEnded) {
        if (essai < 3) {
          essai++;
            sessionStorage.setItem(essai, x);
            document.player1.essai.value = essai;
            

            if (x > a) {
                document.player1.msg.value = "C'est moins";
            } else if (x < a) {
                document.player1.msg.value = "C'est plus";
            } else {
                document.player1.msg.value = "Bravo ! Vous avez trouvé le nombre mystérieux.";
                gameEnded = true; // Mark the game as ended
                saveGameState();
            }

            updateAttempts1();
            // Increment essai after updating the attempts
        } else {
            alert("Vous avez dépassé le nombre maximum d'essais. La réponse était " + a);
            
            gameEnded = true; // Mark the game as ended
            saveGameState();
        }
    }
}






  function updateAttempts1() {
    if (!gameEnded) {
        let row = document.createElement("tr");
        let playerCell = document.createElement("td");
        playerCell.innerHTML = "Player 1"; 
        let attemptCell = document.createElement("td");
        attemptCell.innerHTML = essai;
        let guessCell = document.createElement("td");
        guessCell.innerHTML = document.player1.prop.value;

        row.appendChild(playerCell);
        row.appendChild(attemptCell);
        row.appendChild(guessCell);
        his.appendChild(row);
    }
}

window.onload = function () {
        loadGameState();
      
    };

  
  

    </script>
  </body>

</html>
